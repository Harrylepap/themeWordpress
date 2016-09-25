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
<!--			<h2 class="title">Apply today to become a research fellow</h2>-->
			<?php the_title( sprintf( '<h2 class="title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			<div class="illustr">
				<!--							<img alt="blog title" src="img/bg_features.jpg">-->
				<?php  
					if(the_post_thumbnail() ):
						echo the_post_thumbnail() ;
					else : 
				?>
						<div class="cover bg-img" data-image-src="<?php echo ngo_get_assets();?>/img/train.jpg"></div>
				<?php
					endif;
				 ?>
				
			</div>
			<div class="author">
				<a href="
<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>">
					<div class="avatar">
	<!--					<img alt="author pict" src="img/user-1.jpg">-->
						<?php echo get_avatar(get_the_author_meta( 'ID' ));?>
					</div>
				</a>
				<div class="name">
					<a href="
<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>"><?php echo
				get_the_author();
					?></a>
					<span class="date"><?php  hh_entry_date() ; ?></span>
				</div>
				<div class="sub"><span class="role"><?php echo
				//get_the_author_meta( 'user_email' );
				the_author_meta( 'description' );
				?></span>
				</div>
			</div>

			<div class="article">
				
				
				<?php
				the_content( sprintf(
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'ngo' ),
					get_the_title()
				) );
				?>
			</div>
		</article>
		
		<div class="s-comment">
<!--			<div id="comments">-->

			<?php 
// If comments are open or we have at least one comment, load up the comment template.
//				if ( comments_open() || get_comments_number() ) {
					comments_template();
//				}
			?>
				
		</div>
		
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







