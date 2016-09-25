<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

<?php get_sidebar(); ?>

<style>
	.blog .content .page-header {
		z-index: 1;
	}
	.b-article .s-content{
		position: relative;
	}
	.b-article .s-content:before {
		position: absolute;
		content: "";
		top: -144px;
		right: 0;
		height: 1px;
		max-width: 960px;
		width: 100%;
		background: #49a947;
	}
	/*.b-article .s-content:before{
		display: none;
	}*/
</style>

<!-- BEGIN OF Main content -->
<div class="main clearfix blog" id="top">
	<!-- BEGIN OF Page contents -->
	<div class="content">
		
		<header class="page-header">
			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'tfmwalpha' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
			<div class="taxonomy-description"><p><?php printf( __( 'Count : %s', 'tfmwalpha' ), '<span>' . count( have_posts() ) . '</span>' ); ?></p></div>
			
		</header><!-- .page-header -->

		
		
		
		
		<?php 
		
		// Include the serchbar and recent posts.
		get_template_part( 'template-parts/right-sidebar', 'single' );
		
		if ( have_posts() ) : 
		
		
		
			// Start the Loop.
			while ( have_posts() ) : the_post();
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/post-content', 'search');
                
			// End the loop.
			endwhile;


		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/post-content', 'none' );

		endif;
      
        get_template_part( 'template-parts/recents-section', 'search' );
      
		?>

	</div>
	<!-- END OF Page contents -->
</div>
<!-- END OF Main content -->

<?php get_footer(); ?>
