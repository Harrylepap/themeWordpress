<?php 
/*Template Name: Partner page */
get_header();


?>

<style>
	.team .h-team-detail .s-content .illustr img {
		height: 100%;
		max-width: none;
		width: auto;
	}
	
	
</style>
<!-- Side bar at left -->
<?php get_sidebar(); ?>

<!-- BEGIN OF Main content -->
	<div class="main clearfix team" id="top">
		<!-- BEGIN OF Header of page -->
		<div class="header-top">
			<nav class="h-menu">
				<ul  class="location">
					<li><a href="<?php echo esc_url( home_url( '/' ) ) ; ?>" title="home page">Home</a>
					</li>
					<li class="active"><a>Partner</a>
					</li>
				</ul>
			<!--	<div class="user-tool">
                    <a href="<?php echo esc_url( home_url( '/#team' ) ) ; ?>" >
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
					
					<div class="illustr bg-img" data-image-src="<?php  echo the_post_thumbnail_url( 'medium' ) ; ?>">
						
<!--													<img alt="blog title" src="img/bg_features.jpg">-->
					</div>
					

					<article class="article">
						<?php
							// echo get_the_post_thumbnail(); 
						echo //the_post_thumbnail_url( 'medium' ); 
						the_content() ;
						?>
					</article>
					
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
<!--					<a href="<?php echo get_site_url().'#team'?>" class="">More Team Member</a>-->
<!--					<a href="<?php echo get_site_url().'#team'?>" class="right-arrow">Jobs</a>-->
				</div>

			</div>
			<!-- END OF  Portfolio section -->





		</div>
		<!-- END OF Page contents -->


	</div>
	<!-- END OF Main content -->


<!-- Page footer -->
<?php get_footer(); ?>