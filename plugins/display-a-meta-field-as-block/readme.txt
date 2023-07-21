=== Meta Field Block ===
Contributors:      Mr2P
Tags:              blocks, gutenberg, meta field, ACF, custom field
Requires PHP:      7.0.0
Requires at least: 5.8.0
Tested up to:      6.1
Stable tag:        1.0.10
License:           GPL-3.0
License URI:       https://www.gnu.org/licenses/gpl-3.0.html

Display a meta field as a block on the front end, supporting ACF fields.

== Description ==

The plugin allows developers/users to display a meta field as a block on the front end, supporting ACF fields. It can be nested inside a parent block that has `postId`, `postType` context such as `Query Block` or stand-alone.

= How to use the block with ACF Field Types? =

1. Link type - the setting for the return value must be `Link Array`. The output markup is `<a href={url} target={target} rel="noreferrer noopener">{title}</a>`. There is no `rel` attribute if the `target` is not `_blank`
2. Image type - the setting for the return value must be `Image Array` or `Image ID`. The output markup by the [wp_get_attachment_image](https://developer.wordpress.org/reference/functions/wp_get_attachment_image/) function. The image size is from the Preview Size setting.
3. Page link type, Post object type - The output markup for a single-value field is `<a href={url} rel="bookmark">{title}</a>`, and for a multiple-value field is `<ul><li><a href={url} rel="bookmark">{title}</a></li></ul>`.
4. Relationship type - The output markup is `<ul><li><a href={url} rel="bookmark">{title}</a></li></ul>`
5. Taxonomy type - The output markup is `<ul><li><a href={term_url}>{term_name}</a></li></ul>`
6. User type - The output markup for a single-value field is `display_name`, and for a multiple-value field is `<ul><li>{display_name}</li></ul>`. The known issue: the value is not shown in the editor due to permission in REST API, but it works fine on the front end, and it's safe to use.
7. For other complex field types, you can code a custom output markup by the hook `apply_filters( 'meta_field_block_get_acf_field', 'field_value', 'post_id', 'field' )` or by the general hook in the advanced use cases.

= Advanced use cases =

1. [How to change the output of the block?](https://wordpress.org/support/topic/how-to-change-the-output-of-the-block/)
2. [How to display a complex value like a dynamic field that depends on multiple meta fields?](https://wordpress.org/support/topic/how-to-display-a-complex-value-that-depends-on-multiple-meta-fields/)

If this plugin is useful for you, please do a quick review and [rate it](https://wordpress.org/support/plugin/display-a-meta-field-as-block/reviews/#new-post) on WordPress.org to help it spread to more people. I would very much appreciate it.

Please check out my other plugins if you're interested:

* [Content Blocks Builder](https://wordpress.org/plugins/content-blocks-builder) - A tool to create blocks, patterns or variations easily for your site directly on the Block Editor.
* [Block Enhancements](https://wordpress.org/plugins/block-enhancements) - A plugin to add more useful features to blocks likes: icons, box-shadow, transform...
* [Icon separator](https://wordpress.org/plugins/icon-separator) - A tiny block just like the core/separator block but with the ability to add an icon to it.
* [SVG Block](https://wordpress.org/plugins/svg-block) - A block to insert inline SVG images easily and safely. It also bundles with more than 3000 icons and some common non-rectangular dividers.
* [Counting Number Block](https://wordpress.org/plugins/counting-number-block) - A block to display a number that has the number-counting effect.
* [Breadcrumb Block](https://wordpress.org/plugins/breadcrumb-block) - A simple breadcrumb trail block that supports JSON-LD structured data.
* [Better Youtube Embed Block](https://wordpress.org/plugins/better-youtube-embed-block) - Embed Youtube videos without slowing down your site.

The plugin is developed using @wordpress/create-block.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/meta-field-block` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress


== Frequently Asked Questions ==

= Who needs this plugin? =

This plugin is created for developers, but end users can also use it.

= Does it support inputting and saving meta value? =

No, It does not. It only displays meta fields as blocks.

= Does it support all types of meta fields? =

Only simple types such as string, integer, or number can be used directly. Other complex types such as object, array need to be converted to HTML markup strings.

= Does it support all types of ACF fields? =

It supports all basic field types that can be retrieved value by the get_field or the_field functions. Some complex field types like image, link, page_link, post_object, relationship, taxonomy, and user are also supported.

= What are the prefix and suffix for? =

The value for those settings should be plain text. They're helpful for some use cases like displaying a value with a prefix or suffix, e.g. $100, 100px, etc.

= Does it include some style for the meta field? =

The block does not provide any CSS style for the meta field value. But it does provide a basic display inline style from the settings.

= Does it support other meta-field frameworks? =

Yes, it does as long as those meta fields can be accessed value via REST API.

== Screenshots ==

1. Block's settings

== Changelog ==

= 1.0.10 =
*Release Date - 02 Feb 2023*

* DEV - Support multiple values for ACF User type

= 1.0.9 =
*Release Date - 15 Sep 2022*

* FIX - Change the textdomain to the plugin slug

= 1.0.8 =
*Release Date - 10 Sep 2022*

* FIX - Wrong handle for wp_set_script_translations. Thanks to Loïc Antignac (@webaxones)

= 1.0.7 =
*Release Date - 07 Sep 2022*

* FIX - Add a null check for meta fields value before accessing it's property

= 1.0.6 =
*Release Date - 25 Jun 2022*

* DEV - Add an option to show the block's outline on the Editor

= 1.0.5 =
*Release Date - 21 Jun 2022*

* DEV - Display the placeholder text on the template context

= 1.0.4 =
*Release Date - 02 May 2022*

* DEV - Support displaying some field types for ACF such as image, link, page_link, post_object, relationship, taxonomy

= 1.0.3 =
*Release Date - 30 April 2022*

* DEV - Add supports for borders, and full typography options

= 1.0.2 =
*Release Date - 28 April 2022*

* DEV - Add the title to block registration in JS
* REFACTOR source code

= 1.0.1 =
*Release Date - 23 March 2022*

* FIX - The block does not work in the site editor.

= 1.0.0 =
*Release Date - 22 February 2022*

