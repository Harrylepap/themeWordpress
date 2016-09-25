<?php 
/*Template Name: Home */
get_header();
?>
	
<?php get_sidebar(); ?>

<!-- BEGIN OF Main content -->
	<div class="main clearfix home" id="top">
		<!-- BEGIN OF Header of page -->
		<div class=""></div>
		<!-- END OF Header of page -->

		<!-- BEGIN OF Page contents -->
		<div class="content">

			<!-- BEGIN OF Home First section -->
			<div class="section fill-h h-top center-vh" id="home">
				<aside class="right-panel widget-area" role="complementary">
					<nav class="widget-container">
						<div class="buzz-list">
                          <?php 
                            get_template_part( 'template-parts/posts-list' );
                          ?>
							<!--<ul class="recent-list ">
								<li>
									<div class="l-wrapper">
									
										<div class="img" >
                                          <img src="img/train.jpg" alt="honey">
                                        </div>
										<h4>Recruitment of Media fellows</h4>
										<p>Become a protector of education ...</p>
										<a class="btn" href="">Read more</a>
									</div>
								</li>
							</ul>-->
						</div>
					</nav>
				</aside>

				<div class="s-content ">
                  <!-- Title -->
					<?php if(cs_get_option('home_top_title') ) :?>
					<h2 class="title"><?php echo cs_get_option('home_top_title') ; ?> </h2>
                    <?php else :?>
                    <h2 class="title">Edit this from Site configuration</h2>
                    <?php endif;?>
                  <!-- Description or Moto -->
					<div class="moto">
                      <?php if(cs_get_option('home_top_description') ) :?>
					   <p><?php echo cs_get_option( 'home_top_description' ); ?></p>
                      <?php else :?>
                        <p>Edit this from Site configuration</p>
                      <?php endif;?>
					</div>
					<div class="btns">
                      <?php if(cs_get_option('home_top_learnmore_text') ) :?>
					   <a class="btn s-scroll" href="#about"><?php echo cs_get_option( 'home_top_learnmore_text' ); ?></a>
                      <?php else :?>
                        <a class="btn s-scroll" href="#about">Read more</a>
                      <?php endif;?>
                      
					</div>
				</div>

				<div class="scroll">
					<a href="#about" class="s-scroll">About Us</a>
					<a href="" class="right-arrow">More News</a>
				</div>
			</div>
			<!-- END OF Home First section -->

			<!-- BEGIN OF About section -->
			<?php if(!cs_get_option('home_hide_about')) : ?>
			<div class="section fill-h h-about  bg-white bg-transparent " id="about">
				<div class="right-panel">
					<div class="r-title">
                      <?php if(cs_get_option('about_rightsidebar_title') ) :?>
                        <h2 class="title"><?php echo cs_get_option('about_rightsidebar_title') ; ?> </h2>
                      <?php else :?>
                        <h2 class="title">About us</h2>
                      <?php endif;?>
						<div class="r-img">
							<!--								<img src="img/img-sample.jpg" alt="about us picture">-->
							<div class="bg-img" data-image-src="<?php echo ngo_get_assets();?>/img/header/school.png"></div>
						</div>
					</div>
					<div class="r-quote">
						<div class="item">
                          <?php if(cs_get_option('about_rightsidebar_quote') ) :?>
                            <cite><?php echo cs_get_option('about_rightsidebar_quote') ; ?> </cite>
                            <p><?php echo cs_get_option('about_rightsidebar_quote_author') ; ?> </p>
                          <?php else : ?>
                            <cite>Become the best experiene sharer, so signup now.</cite>
							<p>Bob Sharley</p>
                          <?php endif; ?>
						</div>
					</div>
				</div>

				<article class="s-content">
					
					<!--<div class="title-icon">
						<div class="icon ion-ios-lightbulb-outline"></div>
						<a href="">
							<img src="img/honey.png" alt="honey">
						</a>
					</div>-->
                  <!-- Title -->
					<header>
					  <?php if(cs_get_option('about_title') ) :?>
						<h2 class="title"><?php echo cs_get_option('about_title') ; ?> </h2>
					  <?php else :?>
						<h2 class="title">Mission and vision</h2>
					  <?php endif;?>
                  	</header>
					<div class="bar"></div>
                  
                  <!-- Description -->
					<div class="desc">
                      <?php if(cs_get_option('about_description') ) :?>
                        <?php echo ngo_format_html(cs_get_option('about_description')) ; ?> 
                      <?php else :?>
                        <p>Fill the description in site config</p>
                      <?php endif;?>
						<!--<p>Teach For Madagascar is continuing to move toward achieving its vision and fulfilling its mission.</p>
						<p><strong>We are</strong>
						</p>
						<ul>
							<li>
								<strong>1</strong> To recruit highly-motivated and distinguished university students, recent graduates, and leaders from all backgrounds and career interests, who are committed to educating children, especially those from low-income communities.
							</li>
							<li>
								<span class="num">2</span> To provide the training and ongoing support necessary to help its recruited educators increase their impact, sharpen their skills and understanding of what it takes to improve education in Madagascar.
							</li>
							<li>
								<span class="num">3</span> A Research Fellow works in a team and is responsible for much of the research used in every project at TFM, by collecting data and providing well-analyzed information. The team works to produce, edit and publish research-based reports and articles on diverse topics related to education for Malagasy youth and children development.
							</li>
						</ul>-->
					</div>
				</div>

				<footer class="scroll">
					<!--						<a href="">Learn about the team</a>-->
				</footer>
			</article>
			<?php endif; ?>
			<!-- END OF About section -->

			<!-- BEGIN OF Team section -->
			<?php if(!cs_get_option('home_hide_team')) : ?>
			<div class="section  h-team" id="team">
				<div class="s-content">
					<div class="honeycomb-cont">
							<style>
							.home .h-team .honeycomb li {
								// filter: drop-shadow(0px 0px 10px rgba(224, 27, 240, 0.5));
							}
							.home .h-team .honeycomb li a{
								clip-path: url(#honeyClip);
								
							}
						</style>
						<svg width="0" height="0">
						  <defs>
							<clipPath id="honeyClip" clipPathUnits = "objectBoundingBox">
								<polygon points="0.25 0.07, 0.75 0.07, 1.00 0.50, 0.75 0.93, 0.25 0.93, 0 0.50"></polygon>
							</clipPath>
						  </defs>
						</svg>
						<ul class="honeycomb">
                          <?php 
                            foreach( ngo_get_team_pages() as $team_page ){
                              ?>
                            <li>
								<a href="<?php echo get_permalink($team_page->ID) ; ?>" title="<?php echo get_the_title($team_page->ID).' - '.hh_get_post_excerpt($team_page) ; ?>"><img src="<?php
//								echo ngo_get_post_featured_image($team_page) ;
									echo wp_get_attachment_thumb_url( get_post_thumbnail_id($team_page->ID) );
									?>" alt="honey">
								</a>
							</li>
                          <?php
                            }
                          ?>
							<!--<li>
								<a href=""><img src="img/user-1.jpg" alt="honey">
								</a>
							</li>
							</li>-->
							<!--								<li><a href=""><img src="img/honey.png" alt="honey"></a></li>-->
							<!--								<li><a href=""><img src="img/honey.png" alt="honey"></a></li>-->
							<!--								<li><a href=""><img src="img/honey.png" alt="honey"></a></li>-->
						</ul>
					</div>

					<div class="h-desc">
                      <?php if(cs_get_option('team_description') ) :?>
                        <?php echo ngo_format_html(cs_get_option('team_description')) ; ?> 
                      <?php else :?>
                        <p>Fill the description in site config</p>
                      <?php endif;?>
						<!--<p>Si tu aimes la communication, si tu es passionné(e) de communication digitale, si tu veux participer à la promotion d’un site web et que surtout tu crois au pouvoir de l’éducation à apporter le changement.</p>-->
					</div>
				</div>

				<div class="right-panel">
					<div class="r-title">
						<?php if(cs_get_option('team_rightsidebar_title') ) :?>
                        <h2 class="title"><?php echo cs_get_option('team_rightsidebar_title') ; ?> </h2>
                      <?php else :?>
                        <h2 class="title">The team</h2>
                      <?php endif;?>
						<div class="r-img">
							<!--								<img src="img/bg_features.jpg" alt="about us picture">-->
							<div class="bg-img" data-image-src="img/header/users.png"></div>
						</div>
					</div>
					<div class="r-quote">
                        <div class="item">
                          <?php if(cs_get_option('team_rightsidebar_quote') ) :?>
                            <cite><?php echo cs_get_option('team_rightsidebar_quote') ; ?> </cite>
                            <p><?php echo cs_get_option('team_rightsidebar_quote_author') ; ?> </p>
                          <?php else : ?>
                            <cite>You can place an awesome quote here.</cite>
							<p>Ohabolana</p>
                          <?php endif; ?>
						</div>
						<!--<div class="item">
							<div class="name">
								<h4>Alan bill</h4>
							</div>
							<cite>Become the best experiene sharer, so signup now.</cite>
							<p>Bob Sharley</p>
						</div>-->
					</div>
				</div>

			</div>
			<?php endif; ?>
			<!-- END OF Team section -->

			<!-- BEGIN OF leadership section bg-white -->
			<?php if(!cs_get_option('home_hide_leadership')) : ?>
			<div class="section fill-h h-leadership " id="leadership">
				<article class="s-content">
                  <!-- Title -->
					<header>
						<?php if(cs_get_option('leadership_title') ) :?>
						<h2 class="title"><?php echo cs_get_option('leadership_title') ; ?> </h2>
					  <?php else :?>
						<h2 class="title">Join our leadership team</h2>
					  <?php endif;?>
					</header>
					<div class="bar"></div>
                  
                  <!-- Description -->
					<div class="desc">
                      <?php if(cs_get_option('leadership_description') ) :?>
                        <?php echo ngo_format_html(cs_get_option('leadership_description')) ; ?> 
                      <?php else :?>
                        <p>Fill the description in site config</p>
                      <?php endif;?>
						<!--<p>Teach For Madagascar is continuing to move toward achieving its vision and fulfilling its mission.</p>
						<p><strong>We are</strong>
						</p>
						<p>
							<img src="img/user-1.jpg" alt="leader"> Voici un bref aperçu de la mission assignée au Research Fellow au sein de TFM: Le Research Fellow travaille au sein d’une équipe. Il est responsable de l’essentiel des travaux de recherche à la base de chaque projet de TFM pour lesquels, il devra recueillir des données et fournir des informations pertinentes. L’équipe va également produire, éditer et publier des rapports et articles fondés sur ses propres recherches, traitant de divers sujets liés à l’éducation et destinés au développement des jeunes et des enfants malgaches.
						</p>-->
					</div>
				</article>

				<div class="right-panel">
					<div class="r-title">
						<?php if(cs_get_option('leadership_rightsidebar_title') ) :?>
                        <h2 class="title"><?php echo cs_get_option('leadership_rightsidebar_title') ; ?> </h2>
                      <?php else :?>
                        <h2 class="title">TFM Leadership</h2>
                      <?php endif;?>
						<div class="r-img">
							<!--								<img src="img/bg_features.jpg" alt="about us picture">-->
							<div class="bg-img" data-image-src="<?php echo ngo_get_assets();?>/img/header/user-alt.png"></div>
						</div>
					</div>
					<div class="r-quote">
						<div class="item">
                          <?php if(cs_get_option('leadership_rightsidebar_quote') ) :?>
                            <cite><?php echo cs_get_option('leadership_rightsidebar_quote') ; ?> </cite>
                            <p><?php echo cs_get_option('leadership_rightsidebar_quote_author') ; ?> </p>
                          <?php else : ?>
                            <cite>You can place an awesome quote here.</cite>
							<p>Ohabolana</p>
                          <?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<!-- END OF leadership section -->

			<!-- BEGIN OF partners section -->
			<?php if(!cs_get_option('home_hide_partners')) : ?>
			<div class="section h-partners bg-white" id="partners">
				<div class="s-content">
					<!-- Title -->
					<?php if(cs_get_option('partners_title') ) :?>
                    <h2 class="title"><?php echo cs_get_option('partners_title') ; ?> </h2>
                  <?php else :?>
                    <h2 class="title">Partners</h2>
                  <?php endif;?>
					<div class="bar"></div>
                  
                  <!-- Description -->
					<div class="desc">
                      <?php if(cs_get_option('partners_description') ) :?>
                        <?php echo ngo_format_html(cs_get_option('partners_description')) ; ?> 
                      <?php else :?>
                        <p>Fill the description in site config</p>
                      <?php endif;?>
<!--						<p>Teach For Madagascar is collaborating with many associations, and here are a few of them.</p>-->
					</div>
				</div>

				<div class="logo-list">
					<ul class="small-block-grid-4">
					<?php 
						$partners_gallery = cs_get_option( 'partners_images' );
						$image_list = array();
						if( ! empty( $partners_gallery ) ) {

						  $ids = explode( ',', $partners_gallery );

						  foreach ( $ids as $id ) {
							$attachment = wp_get_attachment_image_src( $id, 'full' );
							  //$url =  $attachment[0];
							  
							  ?>
							<li class="item">
									<img src="<?php echo $attachment[0]; ?>" alt="A product">
							</li>
							<?php
						  }
						}
					?>
						
					</ul>
					
					<!--<ul class="small-block-grid-4">
						<li class="item">
							<a>
								<img src="./img/client/svg/client1.svg" alt="A product">
							</a>
						</li>
						<li class="item">
							<a>
								<img src="./img/client/svg/client2.svg" alt="A product">
							</a>
						</li>
						<li class="item">
							<a>
								<img src="./img/client/svg/client3.svg" alt="A product">
							</a>
						</li>
						<li class="item">
							<a>
								<img src="./img/client/svg/client4.svg" alt="A product">
							</a>
						</li>
						<li class="item">
							<a>
								<img src="./img/client/svg/client5.svg" alt="A product">
							</a>
						</li>
						<li class="item">
							<a>
								<img src="./img/client/svg/client6.svg" alt="A product">
							</a>
						</li>
						<li class="item">
							<a>
								<img src="./img/client/svg/client7.svg" alt="A product">
							</a>
						</li>
						<li class="item">
							<a>
								<img src="./img/client/svg/client8.svg" alt="A product">
							</a>
						</li>
					</ul>-->
				</div>

				<div class="right-panel">
					<div class="r-title">
						<?php if(cs_get_option('partners_rightsidebar_title') ) :?>
                        <h2 class="title"><?php echo cs_get_option('partners_rightsidebar_title') ; ?> </h2>
                      <?php else :?>
                        <h2 class="title">Partners</h2>
                      <?php endif;?>
						<div class="r-img">
				
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<!-- END OF partners section -->

			<!-- BEGIN OF gallery section -->
			<?php if(!cs_get_option('home_hide_gallery')) : ?>
			<div class="section fill-h h-gallery bg-white" id="gallery">

				<div class="gallery-cont">
					<div class="gallery row">
					<?php 
						$gallery = cs_get_option( 'gallery_images' );
						$image_list = array();
						if( ! empty( $gallery ) ) {

						  $ids = explode( ',', $gallery );

						  foreach ( $ids as $id ) {
							$attachment = wp_get_attachment_image_src( $id, 'full' );
							  $image_list[] =  $attachment[0];
						  }
						}
					?>
						<div class="small-12 medium-6 large-4 columns col-cont">
							<div class="row">
								<div class="small-12 columns small-height img-cont">
									<div class="bg-img" data-image-src="<?php echo $image_list[0]?>"></div>
								</div>
								<div class="small-12 columns img-cont">
									<div class="bg-img" data-image-src="<?php echo $image_list[1]?>"></div>
								</div>
							</div>
						</div>
						<div class="small-12 medium-6 large-8 columns col-cont">
							<div class="row">
								<div class="small-12 columns img-cont">
									<div class="bg-img" data-image-src="<?php echo $image_list[2]?>"></div>
								</div>
								<div class="small-12 medium-6 small-height columns img-cont">
									<div class="bg-img" data-image-src="<?php echo $image_list[3]?>"></div>
								</div>
								<div class="small-12 medium-6 small-height columns img-cont">
									<div class="bg-img" data-image-src="<?php echo $image_list[4]?>"></div>
								</div>
							</div>
						</div>
					</div>
					<!--<ul>
							<li class="bg-img" data-image-src="img/train.jpg">
								<a></a>
							</li>
							<li class="bg-img" data-image-src="img/train.jpg">
								<a></a>
							</li>
						</ul>-->
				</div>

				<div class="right-panel">
					<div class="r-title">
						<?php if(cs_get_option('gallery_rightsidebar_title') ) :?>
                        <h2 class="title"><?php echo cs_get_option('gallery_rightsidebar_title') ; ?> </h2>
                      <?php else :?>
                        <h2 class="title">Pictures</h2>
                      <?php endif;?>
						<div class="r-img">
							<!--								<img src="img/bg_features.jpg" alt="about us picture">-->
							<div class="bg-img" data-image-src="img/header/user-alt.png"></div>
						</div>
					</div>
					<div class="r-quote">
						<div class="item">
                          <?php if(cs_get_option('gallery_rightsidebar_quote') ) :?>
                            <cite><?php echo cs_get_option('gallery_rightsidebar_quote') ; ?> </cite>
                            <p><?php echo cs_get_option('gallery_rightsidebar_quote_author') ; ?> </p>
                          <?php else : ?>
                            <cite>You can place an awesome quote here.</cite>
							<p>Ohabolana</p>
                          <?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<!-- END OF gallery section -->



		</div>
		<!-- END OF Page contents -->


	</div>
	<!-- END OF Main content -->

<?php get_footer();?>