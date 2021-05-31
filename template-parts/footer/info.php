<?php
/**
 * Template part for displaying the footer info
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<div class="site-info left">
		<?php
		/* translators: %s: CMS name, i.e. WordPress. */
		echo '© ';
		echo 'date'( 'Y' );
		echo( '__'( ' Tout droits réservé ', 'wp-rig' ) );
		echo 'get_bloginfo'( 'name' );
		?>
	</div><!-- .site-info -->
	<div class="site-info right">
	<?php
	/* translators: Theme name. */
	echo( '__'( 'Graphisme:', 'wp-rig' ) );
	echo '<a href="' . esc_url( 'https://www.gipfel.li/' ) . '"> gipfel.li</a> ||';
	?>
	<?php
	/* translators: Theme name. */
	echo( '__'( 'Intégration :', 'wp-rig' ) );
	echo '<a href="' . esc_url( 'https://6clicks.ch/' ) . '"> 6clicks</a>';
	?>
	<?php
	if ( function_exists( 'the_privacy_policy_link' ) ) {
		the_privacy_policy_link( '<span class="sep"> | </span>' );
	}
	?>
	</div><!-- .site-info -->
