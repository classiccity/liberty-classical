<?php get_header(); ?>
<main class="<?=prefix()?>main" id="main">
    <div class="container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php the_title(); ?>
            <?php the_content(); ?>
        <?php endwhile; else : ?>
            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?>
