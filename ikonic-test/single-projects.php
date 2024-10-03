<?php
/**
 * The template for displaying Project Single Post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Ikonic_test
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
			$featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );

?>
<div class="single-project-top-row" style="background-image: url(<?=esc_url( $featured_image_url )?>)" >	
					<h1 class="blog-heading single-project-heading"><?=esc_attr(get_the_title())?></h1>
					  <div class="project-meta-col">
                	<div class="project-meta-data">
                		<p class="project-label">Project Start Date:</p>
                		<p class="project-value"><?=get_post_meta(get_the_ID(), '_project_start_date', true);?></p>
                	</div>

                	<div class="project-meta-data">
                		<p class="project-label">Project End Date:</p>
                		<p class="project-value"><?=get_post_meta(get_the_ID(), '_project_end_date', true)?></p>
                	</div>
                </div>
                <div class="url-row">
                		<a href="<?=get_post_meta(get_the_ID(), '_project_url', true);?>" class="project-url" target="_blank">View</a>
                </div>
		</div>


      <section class="single-project-description">
      	<div class="container">
        <div class="row">
            <div class="col-md-12">
              <div class="project-description">
                	<?php esc_attr(the_content());?>
                </div>
            </div>
        </div>
    </div>
    </section>
<?php
			
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
