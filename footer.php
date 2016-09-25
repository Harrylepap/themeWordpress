
		<!-- BEGIN OF Page footer -->
		<footer class="footer p-footer">
			<div class="row">
				<div class="small-12 medium-4 large-3 columns">
					<div class="item">
						<h5>Address</h5>
                      	<?php if ( get_theme_mod('contact_address') ) : ?>
							<p>
								<?php echo get_theme_mod('contact_address'); ?>
							</p>
						<!--<p>Our address street <br>
						Antananarivo omadagascar</p>-->
						<?php endif; ?>
					</div>
				</div>
				<div class="small-12 medium-3 columns">
					<div class="item">
						<h5>Social</h5>

						<?php if ( has_nav_menu( 'social' ) ) : ?>
						<nav id="social-navigation" class="social-navigation" role="navigation">
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
						</nav><!-- .social-navigation -->
						<?php endif; ?>
						
						<!--<ul class="f-social">
							<li><a><i class="ion-social-facebook"></i></a></li>
							<li><a><i class="ion-social-twitter"></i></a></li>
						</ul>-->
					</div>
				</div>
				<div class="small-12 medium-4 large-3 columns">
					<div class="item">

						<?php if ( has_nav_menu( 'footer' ) ) : ?>
						
						<h5>Recents</h5>
						<nav id="recent-navigation" class="recent-navigation" role="navigation">
							<?php
								// Social links navigation menu.
								wp_nav_menu( array(
									'theme_location' => 'footer',
									'depth'          => 1,
									'menu_class'     => 'f-links',
									'link_before'    => '<span class="screen-reader-text">',
									'link_after'     => '</span>',
								) );

							?>
						</nav><!-- .social-navigation -->
						<?php endif; ?>
						<!--<ul class="f-links">
							<li><a>Job positions</a></li>
							<li><a>Interviews</a></li>
							<li><a>Posts</a></li>
						</ul>-->
					</div>
				</div>
				<div class="small-12 large-3 columns notice">
					<!--<div><p>Website made by <a href="http://highhay.com">MiVFX</a></p></div>
					<div><p>2016 - TFM, All right reserved</p></div>-->
					<div class="item">
<!--						<h5>Recents</h5>-->
						<?php
							if(get_current_user_id()){
								// a session exist so user should be able to log out
								$redirect_to = isset( $_REQUEST['redirect_to'] ) ? $_REQUEST['redirect_to'] : '';
								printf( '<h5 class="btn"><a href="%1$s" title="log out">Log out</a></h5>', 
//									  wp_logout_url( $redirect_to ));
									  wp_logout_url() );
							}
							else{
								$login_action = '/wp-login.php';
								printf( '<h5 class="btn"><a href="%1$s%2$s" title="log out">Log in</a></h5>', 
									  get_site_url(),
									  $login_action);
							}
						?>
					</div>
					
					<?php echo ngo_xss_clean(get_theme_mod('site_footer_note'));?>
				</div>
			</div>
		</footer>
		<!-- END OF Page footer -->


		<!-- Scripts -->
    <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>-->
		<!-- Vendors plugin -->
		<script src="<?php echo ngo_get_assets(); ?>/js/vendor/jquery-1.11.2.min.js"></script>
		<script src="<?php echo ngo_get_assets(); ?>/js/vendor/wow.min.js"></script>
		<script src="<?php echo ngo_get_assets(); ?>/js/vendor/owl.carousel.min.js"></script>
		<script src="<?php echo ngo_get_assets(); ?>/js/vendor/swiper/js/swiper.js"></script>
		<script src="<?php echo ngo_get_assets(); ?>/js/vegas/vegas.min.js"></script>
		<script src="<?php echo ngo_get_assets(); ?>/js/jquery.maximage.js"></script>
<!--		<script src="./js/okvideo.min.js"></script>-->
    <!-- Template script -->
		<script src="<?php echo ngo_get_assets(); ?>/js/main.js"></script>
		<!-- Contact form -->
    <script src="<?php echo ngo_get_assets(); ?>/js/form_script.js"></script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-685771-42', 'auto');
  ga('send', 'pageview');

</script>
  </body>
</html>
