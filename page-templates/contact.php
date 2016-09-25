<?php 
/*Template Name: Contact page */
get_header();


?>

<!-- Side bar at left -->
<?php get_sidebar(); ?>

<!-- BEGIN OF Main content -->
	<div class="main clearfix team" id="top">
		<!-- BEGIN OF Header of page -->
		<div class="header-top">
			<nav class="h-menu">
				<ul  class="location">
					<li class="active"><a href="<?php echo get_site_url(); ?>">Go Back</a>
					</li>
				</ul>
				<!--<div class="user-tool">
                    <a href=''>
                      <div class="btn">All team </div>
                      <div class="avatar">
                          <i class="icon ion-grid"></i>
                      </div>
                    </a>
				</div>-->
			</nav>
		</div>
		<!-- END OF Header of page -->

		<!-- BEGIN OF Page contents -->
		<div class="content">

			<!-- BEGIN OF Portfolio section -->
			<div class="section h-team-detail center-vh fill-h" id="top">

				
				<div class="s-content">
					<?php
						// Init the post first
						the_post(); 
					?>
<!--					<h2 class="title">User Name</h2>-->
					<h2 class="title"><?php 
						
						echo the_title() ;?></h2>
					
					<div class="illustr">
						<?php  echo the_post_thumbnail() ; ?>
<!--													<img alt="blog title" src="img/bg_features.jpg">-->
<!--						<div class="cover bg-img" data-image-src="<?php  echo the_post_thumbnail() ; ?>"></div>-->
					</div>
					

					<article class="article">
<!--						<p>User description filled by page content</p>-->
						<p><?php  the_content() ;?></p>
						<!--<p>Critères d’adhésion :</p>
						<ul>
							<li>Maîtrise des différentes des méthodes appliquées à la recherche.</li>
							<li>Capacité à planifier et à organiser sa propre charge de travail de manière efficace et sous l’encadrement de superviseurs.</li>
						</ul>-->

					</article>
					
                    <?php
                        // Social links navigation menu.
                        wp_nav_menu( array(
                            'theme_location' => 'social',
                            'depth'          => 1,
                            'menu_class'     => 'f-social',
                            'link_before'    => '<span class="screen-reader-text">',
                            'link_after'     => '</span>',
                        ) );

                    ?>
					<!--<ul class="f-social">
						<li>
							<a href="http://facebook.com/highhay">
								<span class="screen-reader-text">
									Facebook
								</span>
							</a>
						</li>
						<li>
							<a href="http://twitter.com/highhay">
								<span class="screen-reader-text">
									Twitter
								</span>
							</a>
						</li>
					</ul>-->
				</div>
                  
				<div class="scroll">
<!--					<a href="">About Us</a>-->
					<a href="<?php echo get_site_url().'#team'?>" class="right-arrow">Jobs</a>
				</div>

			</div>
			<!-- END OF  Portfolio section -->





		</div>
		<!-- END OF Page contents -->


	</div>
	<!-- END OF Main content -->


<!-- Page footer -->
<?php get_footer(); ?>