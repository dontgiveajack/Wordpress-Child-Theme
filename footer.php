<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<section id="footer-contact">
	<div class="container">
		<div class="row justify-content-center">
		<div class="col-md-5 py-2"><i class="fa fa-phone fa-5x float-left mr-2" aria-hidden="true"></i>
<h1 class="title">Phone</h1><h2>705-308-1074</h2></div>
		<div class="col-md-5 pb-2"><i class="fa fa-envelope-o fa-5x float-left mr-2" aria-hidden="true"></i><h1 class="title">Email</h1><h2>Send Us a Message</h2></div>
		</div>
	</div>
</div>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row no-gutters">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info">

						Copyright &copy;<?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>
								<span class="sep"> | </span>
						<a href="https://www.nufasmedia.com"><img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/uploads/2020/12/nufas.png" alt="Nufas Media Logo"></a>

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->
<?php wp_footer(); ?>

</body>

</html>

