<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>


	<!-- BEGIN OF Article section -->
	<div class="section b-article" id="s-top">
		

		<article class="s-content" id="post-<?php the_ID(); ?>">
			<h2 class="title">No post available</h2>
			
			

			<div class="article">
				
				
				<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

                    <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'twentysixteen' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

                <?php elseif ( is_search() ) : ?>

                    <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentysixteen' ); ?></p>
                    <?php get_search_form(); ?>

                <?php else : ?>

                    <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'twentysixteen' ); ?></p>
                    <?php get_search_form(); ?>

                <?php endif; ?>
			</div>
		</article>
		
		<footer class="entry-footer">
		<?php
		
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer>

	</div>
	<!-- END OF  Article section -->







