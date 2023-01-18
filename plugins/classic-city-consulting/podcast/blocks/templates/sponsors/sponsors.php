<!-- start : callie-and-jeff/app/public/wp-content/themes/callie-and-jeff/inc/podcast/blocks/templates/sponsors/sponsors.php -->
<?php

$prefix = 'sponsors-section';

$display_option = get_field('display'); // 'date', 'choose', 'featured', 'all_featured_first'
$columns = get_field('columns');
$sponsors_list = get_field('sponsors_list');

$section_heading = get_field('section_heading');
$featured_sponsors_subheading = get_field('featured_sponsors_subheading');
$sponsors_subheading = get_field('additional_sponsors_subheading');

$show_subheadings = false;

$sponsors_posts = [];


// Setup the sponsors_posts list based on the display_option
if(
		'date' === $display_option ||
		'all_featured_first' === $display_option ||
		'featured' === $display_option
	) { // If we are not using a manually chosen list, fetch all posts

	$q_args = array(
		'numberposts'	=> -1,
		'order'	=> 'DESC',
		'orderby' => 'date',
		'post_type'	=> 'sponsors',
		'post_status' => 'publish',
	);

	$sponsors_posts = get_posts( $q_args );

} elseif ( 'choose' === $display_option && ! empty( $sponsors_list ) ) { // Use the manually chosen list if not empty

	$sponsors_posts = $sponsors_list;

}

// Iterate through the posts and prepare them for the template

if(
	'date' === $display_option ||
	'choose' === $display_option
){
	$sorting_out_featured = false;
} else {
	$sorting_out_featured = true;
}

$featured_sponsors_cards = ($sorting_out_featured) ? [] : null;
$sponsors_cards = [];

foreach( $sponsors_posts as $post ) {

	if( 'choose' !== $display_option ) { // Inactive sponsors should still be displayed if manually chosen
		$active = get_field('active', $post->ID);
		if( $active === false ) {
			continue;
		}
	}

	$featured_sponsor = get_field('featured', $post->ID) === true;

	if( 'featured' === $display_option && $featured_sponsor === false ) {
		continue;
	}

	$url = get_field('url', $post->ID) ? get_field('url', $post->ID) : '#!';
	$image = get_the_post_thumbnail( $post->ID );

	$sponsor_card = array(
		'name' => get_field('name', $post->ID),
		'description' => wp_strip_all_tags( get_field('description', $post->ID) ),
		'url' => $url,
		'button_text' => wp_strip_all_tags( get_field('button_text', $post->ID) ),
		'image' => $image,
		'featured_sponsor' => $featured_sponsor,
	);


	if( $featured_sponsor && $sorting_out_featured ) {
		$featured_sponsors_cards[]= $sponsor_card;
	} else {
		$sponsors_cards[]= $sponsor_card;
	}

}

// Alphabetize
if( 'all_featured_first' === $display_option ) {

	if( ! empty( $featured_sponsors_cards ) ) {
		usort($featured_sponsors_cards, function($a, $b) {
				return strcmp($a->name, $b->name);
		});
	}
	if( ! empty( $sponsors_cards ) ) {
		usort($sponsors_cards, function($a, $b) {
			return strcmp($a->name, $b->name);
		});
	}

}

if(
	'date' === $display_option ||
	'all_featured_first' === $display_option
	) {
	$show_subheadings = true;
}

if( empty( $columns )) {
	$columns = '3';
}

$modifier_class = 'col-' . $columns;

// var_dump($featured_sponsors_cards);
// var_dump($sponsors_cards);

?>

<?php
	if( ! empty( $featured_sponsors_cards ) || ! empty( $sponsors_cards ) ) :
	?>
		<section class="<?=$prefix?> <?=$modifier_class?>">

			<?php
				if( ! empty( $section_heading )) :
				?>
					<h2><?php echo $section_heading; ?></h2>
				<?php
				endif;
			?>

		<?php
			if( ! empty( $featured_sponsors_cards )) :
				?>

				<?php
					if( $show_subheadings && ! empty( $featured_sponsors_subheading )) :
					?>
						<h3 class="cj-font-accent"><?php echo $featured_sponsors_subheading; ?></h3>
					<?php
					endif;
				?>

				<ul class="<?=$prefix?>__list <?=$prefix?>__list--featured">

					<?php
						foreach($featured_sponsors_cards as $sponsor_card) :
							?>

								<li class="<?=$prefix?>__list-item">
									<a href="<?=$sponsor_card['url']?>" target="_blank" class="<?=$prefix?>__list-link">

										<?php
											if( $sponsor_card['image'] ) {
											echo $sponsor_card['image'];
											} else {
												?>
													<p class="<?=$prefix?>__name"><?=$sponsor_card['name']?></p>
												<?php
											}
										?>

										<p class="<?=$prefix?>__description"><?=$sponsor_card['description']?></p>

										<span class="<?=$prefix?>__button"><?=$sponsor_card['button_text']?></span>

									</a>
								</li>

							<?php
						endforeach;
					?>

				</ul>

				<?php
			endif;
		?>


		<?php
			if( ! empty( $sponsors_cards )) :
				?>

				<?php
					if( $show_subheadings && ! empty( $sponsors_subheading )) :
					?>
						<h3 class="cj-font-accent"><?php echo $sponsors_subheading; ?></h3>
					<?php
					endif;
				?>

				<ul class="<?=$prefix?>__list">


					<?php
						foreach($sponsors_cards as $sponsor_card) :
							?>

								<li class="<?=$prefix?>__list-item">
									<a href="<?=$sponsor_card['url']?>" target="_blank" class="<?=$prefix?>__list-link">

										<?php
											if( $sponsor_card['image'] ) {
											echo $sponsor_card['image'];
											} else {
												?>
													<p class="<?=$prefix?>__name"><?=$sponsor_card['name']?></p>
												<?php
											}
										?>

										<p class="<?=$prefix?>__description"><?=$sponsor_card['description']?></p>

										<span class="<?=$prefix?>__button"><?=$sponsor_card['button_text']?></span>

									</a>
								</li>

							<?php
						endforeach;
					?>

				</ul>

				<?php
			endif;
		?>

		</section>
	<?php
	else:
		if( is_admin() ):
			if('choose' === $display_option):
			?>
				<h2 style="background-color: darkblue; color: white; padding: 1em; text-align: center; cursor: pointer;">
					Click here to choose which Sponsors you want to display
				</h2>
			<?php
			else:
				?>
				<h2 style="background-color: red; color: white; padding: 1em; text-align: center;">
					There were no Sponsors to show with that display option
				</h2>
			<?php
			endif;
		endif;
	endif;
?>
<!-- end : callie-and-jeff/app/public/wp-content/themes/callie-and-jeff/inc/podcast/blocks/templates/sponsors/sponsors.php -->