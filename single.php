<?php
/**
 * The template for displaying all single posts and attachments
 *
 */

get_header(); ?>

<?php get_sidebar(); ?>


<!-- BEGIN OF Main content -->
<div class="main clearfix blog" id="post-top">
	<!-- BEGIN OF Page contents -->
	<div class="content">
		
		
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
		?>
		<!-- BEGIN OF Header of page -->
		<div class="header-top">
			<nav class="h-menu">
				<ul  class="location">
					<li><a title="Go bakc to home page" rel="prev" href="<?php echo get_site_url();?>">Home</a>
					</li>
<!--					<li class="active"><a>Category</a>-->
					
				<?php
				$post_categories = wp_get_post_categories(get_the_ID());
				foreach ($post_categories as $category) :
					if($category > 1) : 
					?>
					<li class="active"><a><?php echo get_category($category)->name;?></a>
					<?php
					endif;
				endforeach; 
				?>
				</ul>
				<div class="user-tool">
					
					<?php
						if(get_current_user_id()){
							// a session exist so user should be able to log out
							$redirect_to = isset( $_REQUEST['redirect_to'] ) ? $_REQUEST['redirect_to'] : '';
							printf( '<div class="btn"><a href="%1$s" title="log out">Log out</a></div>', 
//								  wp_logout_url( $redirect_to ));
								  wp_logout_url() );
						}
						else{
							$login_action = '/wp-login.php';
							printf( '<div class="btn"><a href="%1$s%2$s" title="log out">Log in</a></div>', 
								  get_site_url(),
								  $login_action);
						}
					?>
					<!--<div class="btn hidden"><a>Log out</a>
					</div>
					<div class="btn"><a>Log in</a>
					</div>-->
					<div class="name">
						<?php
						//echo get_current_user_id();
						$user_data = get_user_meta( get_current_user_id() ) ;
							if($user_data['first_name']){
//								echo $user_data->last_name.' '.$user_data->first_name;
								echo $user_data['first_name'][0].' '.$user_data['last_name'][0];
								//var_dump($user_data['first_name']);
							}
							else{
								echo $user_data['nickname'][0];
							}
	//						var_dump (get_user_meta( get_current_user_id() ) );
						?>
					</div>
					<div class="avatar">
						<i class="icon ion-ios-contact"></i>
						<!--							<img src="img/user-1.jpg" alt="Profile">-->
					</div>
				</div>
			</nav>
		</div>
		<!-- END OF Header of page -->

		
		
		<?php
			// Include the serchbar and recent posts.
			get_template_part( 'template-parts/right-sidebar', 'single' );
		
		
			// Include the single post content template.
			get_template_part( 'template-parts/post-content', 'single' );

			

			if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
				) );
			} elseif ( is_singular( 'post' ) ) {
				// Previous/next post navigation.
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );
			}

			// End of the loop.
		endwhile;
		
		/*
		 * Include recents posts list 
		 */
		get_template_part( 'template-parts/recents-section', get_post_format() );
		
		?>
	</div>
	<!-- END OF Page contents -->
</div>
<!-- END OF Main content -->

<?php get_footer(); ?>