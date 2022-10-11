<?php
/**
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
?>
<?php get_template_part( 'global-templates/hero' ); ?>
<div id="index-wrapper">

	<div id="content" tabindex="-1">
	<section class="sections" id="services">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<h1 class="title lined text-primary">About Frosted Hill Equestrian</h1>

					<p>Frosted Hill Equestrian was established in 2013 by Kristin McCullough offering freelance equestrian services in Kawartha Lakes, ON. Through the years FHE has specialized in building confidence, creating strong partnerships, and providing safe & fun equestrian education throughout every lesson. FHE is devoted to developing Equestrian riders for both the Hunter/Jumper & Dressage ring, and to produce quality equine teammates.</p> 
					<p>In 2019 FHE expanded their services across Southern Ontario while still having a home base facility in Lindsay, ON. In 2021 FHE will be opening the doors to their second home base in Burlington, ON.</p>
					<h2 class="serif-title py-5">At Frosted Hill Equestrian our goal is developing the industry leaders of tomorrow with every stride.</h2>	
					<a href="/about" class="btn btn-primary btn-lg">Learn More</a>			
				</div>
				<div class="col-md-6">
					<img src="/frostedhill/wp-content/uploads/2021/01/services.jpg" id="map-image" style="width: 100%; height: auto;" alt="" usemap="#map" />
					<map name="map">
					    <area shape="poly" coords="203, 798, 396, 599, 201, 403, 3, 599" href="http://thenufasgroup.com/frostedhill/equine-canada-rider-coaching-examination/" alt="Rider Levels" title="Rider Levels"/ >
					    <area shape="poly" coords="598, 400, 400, 204, 205, 400, 400, 598" href="/frostedhill/sales" alt="Sales" title="Sales"/>
					    <area shape="poly" coords="202, 3, 4, 202, 203, 397, 398, 201" href="http://thenufasgroup.com/frostedhill/lindsay/lessons/" alt="Lessons and Training" title="Lessons and Training"/>
					</map>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/image-map-resizer/1.0.10/js/imageMapResizer.min.js"></script>
					<script>jQuery(document).ready(function(e){jQuery("map").imageMapResize();});</script>
				</div>							
			</div>
		</div>
	</section>
	<section class="sections" id="testimonial">																<div class="container">
			<div class="row">
				<div class="col-md-5">
					<h1 class="title lined">Amanda Law Testimonial</h1>
					<img src="/frostedhill/wp-content/uploads/2021/01/testimonial.jpeg" class="w-100">
				</div>
				<div class="col-md-7">
					<p>My twin sister Emily and I started taking lessons at Ajax Riding Academy when we were 11. We had a few coaches through the years but it was not until Kristin started coaching at Ajax that I really started to expand my knowledge and understanding of how to ride a horse correctly. She was the first coach that really took time to ensure we had a good base understanding of flatwork before allowing us to jump. After Kristin had been coaching us for a while she decided to run a clinic at Ajax Riding Academy taught by her coach, a Grad Prix Rider, Stephanie Jensen. After this clinic is where both my sister and my life changed forever. Stephanie invited us to move to her barn and start training on her dressage horses while being coached by Kristin. Kristin taught us all of the basics of flatwork and the first steps to understanding how to use a horse’s body correctly. We then moved up to being trained by Stephanie herself and I rode her old Grand Prix horse, Gus, AKA Addiction, and my sister rode her Prix St.George horse, Bella. After only riding at Stephanie’s for a year or so she asked us if we would like to try out for the FEI Junior team. This was an insane opportunity considering my sister and I had never shown in our life. However, due to a tone of help, I was able to make the Junior team, on Gus, and go to New York and be apart of the North American Youth Championships. Without Kristin showing me the ropes and introducing me to Steph I would have never been able to make the Junior team or be where I am now in my training. She was an amazing first trainer and supplied me with all of the knowledge that I needed to move up to training with a Grand Prix Rider.</p>
				</div>
			</div>
		</div>			
	</div><!-- Container end -->

</div><!-- Wrapper end -->
<div id="footer-gradient"></div>
<?php get_footer(); ?>
