/**
 * Scripts to run when in WordPress Gutenberg editor
 * 
 * Unregister any block styles we don't want user to be able to select
 * or register our own custom block styles.
 */
wp.domReady( () => {
    // Unregister any block styles we don't want user to be able to select
    wp.blocks.unregisterBlockStyle( 'core/button', 'fill' );
    wp.blocks.unregisterBlockStyle( 'core/button', 'outline' );
    wp.blocks.unregisterBlockStyle( 'core/image', 'rounded' );
} );