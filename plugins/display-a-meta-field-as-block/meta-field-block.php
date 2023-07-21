<?php
/**
 * Plugin Name:       Meta Field Block
 * Description:       Display a meta field as a block on frontend, support ACF fields.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           1.0.10
 * Author:            Phi Phan
 * Author URI:        https://boldblocks.net
 *
 * @package   MetaFieldBlock
 * @copyright Copyright(c) 2022, Phi Phan
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function meta_field_block_init() {
	register_block_type( __DIR__ . '/build', [ 'render_callback' => 'meta_field_block_render_block' ] );
}
add_action( 'init', 'meta_field_block_init' );

/**
 * Renders the `mbf/meta-field-block` block on the server.
 *
 * @param  array    $attributes Block attributes.
 * @param  string   $content    Block default content.
 * @param  WP_Block $block      Block instance.
 * @return string Returns the filtered post meta field for the current post.
 */
function meta_field_block_render_block( $attributes, $content, $block ) {
	if ( isset( $block->context['postId'] ) ) {
		// Get post_id from the context first.
		$post_id = $block->context['postId'];
	} else {
		// Fallback to the current post id.
		$post_id = get_queried_object_id();
	}
	$field_type = $attributes['fieldType'] ?? 'rest_field';
	$field_name = $attributes['fieldName'] ?? '';
	$tag_name   = $attributes['tagName'] ?? 'div';
	if ( empty( $field_name ) ) {
		return '';
	}

	$content = '';
	if ( 'acf' === $field_type ) {
		add_filter( "acf/format_value/name={$field_name}", 'meta_field_block_render_acf_field', 10, 3 );

		if ( function_exists( 'get_field' ) ) {
			$content = get_field( $field_name, $post_id );
		}
	} else {
		$content = get_post_meta( $post_id, $field_name, true );
	}

	// Allow third-party plugins to alter the content.
	$content = apply_filters( 'meta_field_block_get_block_content', $content, $attributes, $block, $post_id );

	$inner_tag = 'div' === $tag_name ? 'div' : 'span';

	// Escape content and wrap around a div.
	$content = $content ? sprintf( '<%2$s class="value">%1$s</%2$s>', wp_kses( $content, wp_kses_allowed_html( 'post' ) ), $inner_tag ) : '';

	$prefix = $attributes['prefix'] ?? '';
	$prefix = $prefix ? sprintf( '<%2$s class="prefix">%1$s</%2$s>', wp_kses( $prefix, wp_kses_allowed_html( 'post' ) ), $inner_tag ) : '';

	$suffix = $attributes['suffix'] ?? '';
	$suffix = $suffix ? sprintf( '<%2$s class="suffix">%1$s</%2$s>', wp_kses( $suffix, wp_kses_allowed_html( 'post' ) ), $inner_tag ) : '';

	$classes = "is-{$field_type}-field";
	if ( ! empty( $attributes['displayLayout'] ) ) {
		$classes .= " is-display-{$attributes['displayLayout']}";
	}
	if ( isset( $attributes['textAlign'] ) ) {
		$classes .= " has-text-align-{$attributes['textAlign']}";
	}
	$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => $classes ) );

	return sprintf( '<%3$s %1$s>%2$s</%3$s>', $wrapper_attributes, $prefix . $content . $suffix, $tag_name );
}

/**
 * Display value for ACF fields
 *
 * @param mixed $value
 * @param int   $post_id
 * @param array $field
 * @return string
 */
function meta_field_block_render_acf_field( $value, $post_id, $field ) {
	$field_value = $value;
	if ( 'image' === $field['type'] ) {
		$image_size = $field['preview_size'] ?? 'full';
		$image_id   = is_numeric( $value ) ? $value : ( is_array( $value ) ? ( $value['ID'] ?? 0 ) : 0 );
		if ( $image_id ) {
			$field_value = wp_get_attachment_image( $image_id, $image_size );
		}
	} elseif ( 'link' === $field['type'] ) {
		if ( is_array( $value ) ) {
			$value = wp_parse_args(
				$value,
				[
					'title'  => '',
					'url'    => '',
					'target' => '',
				]
			);
			if ( empty( $value['url'] ) || empty( $value['title'] ) ) {
				$field_value = '';
			} else {
				$rel         = '_blank' === $value['target'] ? ' rel="noreferrer noopener"' : '';
				$field_value = sprintf( '<a href="%1$s" target="%3$s"%4$s>%2$s</a>', $value['url'], $value['title'], $value['target'], $rel );
			}
		}
	} elseif ( 'page_link' === $field['type'] ) {
		$value        = ! is_array( $value ) ? [ $value ] : $value;
		$value_markup = array_filter(
			array_map(
				function ( $item ) {
					if ( is_numeric( $item ) ) {
						return meta_field_block_get_post_link( $item );
					} elseif ( $item ) {
						return sprintf( '<a href="%1$s">%1$s</a>', $item );
					}

					return '';
				},
				$value
			)
		);

		if ( count( $value_markup ) === 0 ) {
			$field_value = '';
		} else {
			if ( count( $value_markup ) > 1 ) {
				$field_value = '<ul><li>' . implode( '</li><li>', $value_markup ) . '</li></ul>';
			} else {
				$field_value = $value_markup[0];
			}
		}
	} elseif ( 'post_object' === $field['type'] ) {
		$post_array = ! is_array( $value ) ? [ $value ] : $value;

		$post_array_markup = array_filter(
			array_map(
				function ( $post ) {
					return meta_field_block_get_post_link( $post );
				},
				$post_array
			)
		);

		if ( count( $post_array_markup ) === 0 ) {
			$field_value = '';
		} else {
			if ( count( $post_array_markup ) > 1 ) {
				$field_value = '<ul><li>' . implode( '</li><li>', $post_array_markup ) . '</li></ul>';
			} else {
				$field_value = $post_array_markup[0];
			}
		}
	} elseif ( 'relationship' === $field['type'] ) {
		$post_array = ! is_array( $value ) ? [ $value ] : $value;

		$post_array_markup = array_filter(
			array_map(
				function ( $post ) {
					return meta_field_block_get_post_link( $post );
				},
				$post_array
			)
		);

		$field_value = count( $post_array_markup ) > 0 ? '<ul><li>' . implode( '</li><li>', $post_array_markup ) . '</li></ul>' : '';
	} elseif ( 'taxonomy' === $field['type'] ) {
		if ( is_array( $value ) ) {
			$terms_markup = array_map(
				function ( $term ) {
					return sprintf( '<a href="%1$s">%2$s</a>', get_term_link( $term ), get_term( $term )->name );
				},
				$value
			);

			$field_value = count( $terms_markup ) > 0 ? '<ul><li>' . implode( '</li><li>', $terms_markup ) . '</li></ul>' : '';
		}
	} elseif ( 'user' === $field['type'] ) {
		$user_array = $value;
		if ( ! ( $field['multiple'] ?? false ) ) {
			$user_array = [ $value ];
		}

		$user_array_markup = array_filter(
			array_map(
				function ( $user ) {
					$user_display_name = '';

					if ( is_object( $user ) ) {
						$user_display_name = $user->display_name ?? '';
					} elseif ( is_numeric( $user ) ) {
						$user_display_name = get_user_meta( $user, 'display_name', true );
					} elseif ( is_array( $user ) ) {
						$user_display_name = $user['display_name'] ?? '';
					}

					return $user_display_name;
				},
				$user_array
			)
		);

		if ( count( $user_array_markup ) === 0 ) {
			$field_value = '';
		} else {
			if ( count( $user_array_markup ) > 1 ) {
				$field_value = '<ul><li>' . implode( '</li><li>', $user_array_markup ) . '</li></ul>';
			} else {
				$field_value = $user_array_markup[0];
			}
		}
	}

	$field_value = is_array( $field_value ) || is_object( $field_value ) ? __( 'This value format is not supported. Please contact author for help.' ) : $field_value;

	return apply_filters( 'meta_field_block_get_acf_field', $field_value, $post_id, $field );
}
add_filter( 'acf/rest/format_value_for_rest', 'meta_field_block_render_acf_field', 10, 3 );

/**
 * Render a post as link
 *
 * @param int|WP_Post $post
 * @return string
 */
function meta_field_block_get_post_link( $post ) {
	$url = esc_url( get_permalink( $post ) );
	if ( $url ) {
		return sprintf(
			'<a href="%1$s" rel="bookmark">%2$s</a>',
			$url,
			esc_html( get_the_title( $post ) )
		);
	} else {
		return '';
	}
}

