<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

wp_rig()->print_styles( 'wp-rig-footer' );
?>
<div class="instagram-footer">
<?php echo do_shortcode( '[instagram-feed num=6 cols=6 showfollow=false]' ); ?>
</div>
<div class="footer-contact">
	<div class="footer-logo"></div>
	<div class="footer-social"></div>
</div>
	<footer id="colophon" class="site-footer">
		<?php get_template_part( 'template-parts/footer/info' ); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
