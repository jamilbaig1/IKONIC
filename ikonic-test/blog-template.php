<?php
/**
 * Template Name: Blog Page Template
 *
 * Description: A custom blog page template.
 *
 * @package YourThemeName
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="blog-top-row" style="background-image: url(<?=get_template_directory_uri().'/images/blog-banner.jpg'?>)">	
					<h1 class="blog-heading">Blog</h1>
		</div>

		<div class="blog-posts-row">
<?php
        // Set up the arguments for the query
        $args = array(
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' => -1, // Retrieve all published posts
        );

        // Create a new WP_Query instance
        $query = new WP_Query( $args );

        // Check if there are any posts to display
        if ( $query->have_posts() ) :

            // Start the loop to display each post
            while ( $query->have_posts() ) :
                $query->the_post();
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
