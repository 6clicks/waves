<?php
/**
 * Template part for displaying the custom header media
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

if ( ! has_header_image() ) {
	return;
}
wp_rig()->print_styles( 'wp-rig-GASP' );
?>
<figure class="header-image" id="header-bgimg" data-background="<?php header_image(); ?>">
</figure><!-- .header-image -->
