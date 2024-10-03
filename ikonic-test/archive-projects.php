<?php
/**
*The template for displaying archive Projects
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="blog-top-row" style="background-image: url(<?=get_template_directory_uri().'/images/blog-banner.jpg'?>)">	
					<h1 class="blog-heading">Projects</h1>
		</div>

        <div class="container mt-5">
    <form action="#" method="GET" class="form-inline justify-content-end mb-3">
        <div class="form-group mx-sm-3 mb-2">
            <label for="startDate" class="form-label  mr-2">Start Date</label>
            <input type="date" class="form-control" name="startDate" id="startDate" placeholder="Start Date">
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <label for="endDate" class="form-label  mr-2">End Date</label>
            <input type="date" class="form-control" name="endDate" id="endDate" placeholder="End Date">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </form>
</div>

		<div class="blog-posts-row">
<?php
        
        if ( have_posts() ) :

            // Start the loop to display each post
            while ( have_posts() ) :
               the_post();
              
                 $featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
?>
			<a href="<?=get_the_permalink()?>" class="blog-item-anch">
               <div id="post-<?php the_ID(); ?>" class="blog-item" style="background-image: url(<?=esc_url( $featured_image_url )?>) ;">
               		
               	<div class="blog-data">
               	<h2><?=esc_attr(get_the_title())?></h2>
               	<p><?=esc_attr(get_the_excerpt())?></p>
               </div>

               </div>
           </a>

<?php
            endwhile;

            // Reset post data to ensure the global post object is restored
            wp_reset_postdata();

        else :
            // If no posts were found, display a message
            ?>
            <p><?php esc_html_e( 'No posts found.', 'your-theme-textdomain' ); ?></p>
            <?php
        endif;
        ?>
		</div>

	</main><!-- #main -->

<?php
get_footer();
