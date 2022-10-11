<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$children = get_pages( array( 'child_of' => $post->ID ) );
$container   = get_theme_mod( 'understrap_container_type' );
if (has_post_thumbnail($_post -> ID)){
	$header = get_the_post_thumbnail_url( $page->ID, 'full' );
}else{
	$header = esc_url( home_url( '/' ) ).'/wp-content/uploads/2020/12/brown-white-horse.jpg';
}
?>

<div id="page-wrapper">
<header class="page-header align-items-center text-center d-flex" style="background:url('<?php echo $header; ?>') center no-repeat;background-size:cover;">
	<div class="container">
<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
</div>		
</header>	
	<div class="container"  id="content" tabindex="-1">

		<div class="row no-gutters">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'page' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>
						
			</main><!-- #main -->			

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div><!-- .row -->

		<?php if (is_page() && ($post->post_parent || count( $children ) > 0)) : ?>
		<div id="side-menu">
			<h2 class="text-center title">Navigation</h2>
			<nav class="navbar navbar-expand text-center">
			  <button class="navbar-toggler w-100" type="button" data-toggle="collapse" data-target="#side-nav" aria-controls="side-nav" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="float-left">Navigation: <?php echo get_the_title( $post ); ?></span>
			    <i class="fa fa-bars float-right mt-1" aria-hidden="true"></i>
			  </button>	

				<div class="collapse navbar-collapse" id="side-nav">	
					<ul class="navbar-nav page-nav">


					<li class="title" <?php //if (is_page($post->post_parent)){echo 'class="current_page_item"';} ;?> ><!--<a href="<?php echo get_permalink( $post->post_parent ); ?>">--><?php echo get_the_title( $post->post_parent ); ?></a></li>
					<ul class="children">
					<?php

				        wp_list_pages( array('title_li'=>'','depth'=>2,'child_of'=>get_post_top_ancestor_id()) ); 
				        echo '</ul>';
				        ?>
				    </ul>
				</div>
			</nav>					
		</div>
	<?php endif; ?>
</div>

</div><!-- Wrapper end -->

<?php get_footer(); ?>
