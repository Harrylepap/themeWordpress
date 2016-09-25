
    <!-- BEGIN OF site header / left sidebar Menu -->
		<header class="header-left">
			<div class="logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<span class="img-title clearfix">
                      <!-- Begin of LOGO -->
                      <?php if( cs_get_option('site_logoimage') ) :?>
                        <img class="img" src="<?php echo cs_get_option('site_logoimage'); ?>" alt="Logo TFM">
                      <?php else :?>
						<img class="img" src="<?php echo ngo_get_assets(); ?>/img/logo.png" alt="Logo Brand">
                      <?php endif; ?>
                       <!-- End of LOGO -->
                        <span class="title"><?php  bloginfo( 'name' ); ?></span>
  <!--						<span class="title">Teach <br>for <br>Madagascar</span>-->
					</span>
					<?php
					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
					<span class="desc"><?php echo $description; ?></span>
					<?php endif; ?>
<!--					<span class="desc">education for change</span>-->
				</a>
			</div>
			
			<!-- Begin of Menu button -->
			<div class='menu-btn' id="menu-btn">
			  <!-- add "open" class to open menu -->
			  <div class="magic-menu ">
				<span class="bar1"></span>
				<span class="bar2"></span>
				<span class="bar3"></span>
				<div class='readable'>Menu</div>
			  </div>
			</div>
			<!-- End of Menu button -->
		
			
			<nav class="left-menu ">
				
			<?php
			
			?>
			<?php if ( has_nav_menu( 'primary' ) )  : 
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_class'     => 'menu-list',
                    'walker' => new Primary_Menu_Walker(),
                    'depth' => 0
				 ) );
		  	endif; ?>
				<!-- Search form -->
				<div class="search-cont">
					<?php get_search_form(); ?>
				</div>
			</nav>
			
      		<!--<nav class="left-menu ">
				<ul class="menu-list">
					<li>
						<a href="#">
							Home
						</a>
						<ul class="sub-menu">
							<li><a href="">about us</a></li>
							<li><a href="">the team</a></li>
						</ul>
					</li>
					<li>
						<a href="#">
							Contact
						</a>
					</li>
				</ul>
      		</nav>-->
			
			<div class="left-footer">
				<div class="notice">
					<p><?php echo get_bloginfo( 'name', 'display' ); ?> - <?php echo get_bloginfo( 'description', 'display' ); ?></p>
				</div>
				
				
				<!--<ul class="f-social">
					<li>
						<a href="http://facebook.com/highhay">
							<span class="screen-reader-text">
								Facebook
							</span>
						</a>
					</li>
				</ul>-->
				
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
				
				<ul class="f-contact">
                  <!-- Phone -->
                  <?php if ( get_theme_mod('contact_phone')) : ?>
					<li><a><i class="icon ion-ios-telephone-outline"></i></a><?php echo get_theme_mod('contact_phone'); ?></li>
                  <?php endif;?>
                  <!-- Email -->
                  <?php if ( get_theme_mod('contact_email')) : ?>
					<li><a title="email address" href="mailto://<?php echo get_theme_mod('contact_email');?>"><i class="icon ion-ios-email-outline"></i><?php echo get_theme_mod('contact_email'); ?></a></li>
                  <?php endif;?>
<!--					<li><a href=""><i class="icon ion-ios-email-outline"></i>tfmteachformada@gmail.com</a></li>-->
				</ul>
			</div>
		</header>
    <!-- END OF site header / left sidebar Menu -->
    