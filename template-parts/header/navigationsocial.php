<?php
/**
 * Template part for displaying the header navigation Social menu
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

if ( ! wp_rig()->is_secondary_nav_menu_active() ) {
	return;
}
wp_rig()->print_styles( 'wp-rig-menu' );
?>

<nav id="site-navigation-social" class="secondary-navigation " aria-label="<?php esc_attr_e( 'Social menu', 'wp-rig' ); ?>"
	<?php
	if ( wp_rig()->is_amp() ) {
		?>
		[class]=" siteNavigationMenu.expanded ? 'secondary-navigation  nav--toggled-on' : 'secondary-navigation ' "
		<?php
	}
	?>
>
	<?php
	if ( wp_rig()->is_amp() ) {
		?>
		<amp-state id="socialNavigationMenu">
			<script type="application/json">
				{
					"expanded": true
				}
			</script>
		</amp-state>
		<?php
	}
	?>

	<div class="secondary-menu-container">
		<?php wp_rig()->display_secondary_nav_menu( array( 'menu_id' => 'secondary-menu' ) ); ?>
	</div>
</nav><!-- #site-navigation -->
