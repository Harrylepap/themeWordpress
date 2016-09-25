<?php 
/** * The Header for our theme. */
?>

<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?> style="margin-top : 0px !important">

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Wordpress will manage title tag-->
		<!--<title><?php 
		/*	if ( is_category() ) {
		echo theme_locals("category_for")." &quot;"; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
	} elseif ( is_tag() ) {
		echo theme_locals("tag_for")." &quot;"; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
	} elseif ( is_archive() ) {
		wp_title(''); echo " ".theme_locals("archive")." | "; bloginfo( 'name' );
	} elseif ( is_search() ) {
		echo theme_locals("fearch_for")." &quot;".esc_html($s).'&quot; | '; bloginfo( 'name' );
	} elseif ( is_home() || is_front_page()) {
		bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
	}  elseif ( is_404() ) {
		echo theme_locals("error_404")." | "; bloginfo( 'name' );
	} elseif ( is_single() ) {
		wp_title('');
	} else {
		wp_title( ' | ', true, 'right' ); bloginfo( 'name' );
	} */
			?></title>-->
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--   If Disable screen scaling-->
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, user-scalable=0">


		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

		<!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />
		
		
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />

		<!-- Vendors style CSS -->
		<link rel="stylesheet" href="<?php echo ngo_get_assets(); ?>/js/vendor/owl.carousel.css">
		<link rel="stylesheet" href="<?php echo ngo_get_assets(); ?>/js/vegas/vegas.min.css">
		<link rel="stylesheet" href="<?php echo ngo_get_assets(); ?>/css/foundation.min.css">
		<link rel="stylesheet" href="<?php echo ngo_get_assets(); ?>/css/animate.css">
		<link rel="stylesheet" href="<?php echo ngo_get_assets(); ?>/css/normalize.css">

			<!-- Webfont CSS -->
		<link rel="stylesheet" href="<?php echo ngo_get_assets(); ?>/fonts/glacial/stylesheet.css">
		<link rel="stylesheet" href="<?php echo ngo_get_assets(); ?>/fonts/roboto/stylesheet.css">
		<link rel="stylesheet" href="<?php echo ngo_get_assets(); ?>/css/ionicons.min.css">

			<!-- Main CSS -->
		<link rel="stylesheet" href="<?php echo ngo_get_assets(); ?>/css/main.css">

		<script src="<?php echo ngo_get_assets(); ?>/js/vendor/modernizr-2.7.1.min.js"></script>
		
		<?php 
			wp_head(); 
		?>

	</head>

	<body>

		<!--[if lt IE 8]>
		  <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->

		<!-- Page Loader -->
		<!--
		<div class="page-loader" id="page-loader">
		  <div><i class="ion ion-loading-d"></i><p>loading</p></div>
		</div>
	-->
		
		<!-- BEGIN OF site cover -->
    <div class="page-cover" 
		 id="cover"
		 style="background-image: url('<?php echo background_image(); ?>');
background-repeat: no-repeat;
background-position: center center;
background-size: cover;"
		 >
      <!-- Cover Background -->
<!--      <div class="cover-bg full-size bg-img" data-image-src="<?php echo background_image(); ?>"></div>-->
			
      <!-- BEGIN OF Slideshow Background -->
      <!--<div class="cover-bg  full-size slide-show">
				<i class='img' data-src='./img/bg-slide1.jpg'></i>
				<i class='img' data-src='./img/bg-slide2.jpg'></i>
				<i class='img' data-src='./img/bg-slide3.jpg'></i>
				<i class='img' data-src='./img/bg-slide4.jpg'></i>
			</div>-->
      <!-- END OF Slideshow Background -->
      
      <!--BEGIN OF Static video bg - uncomment below to use Video as Background-->

		<?php 
			global $post;
		 if(hh_is_homepage($post->ID) && cs_get_option('site_home_videobackground_enable') && cs_get_option('site_videobackground')) :
			 ?>
		  <div id="container" class="video-container cover-bg show-for-medium-up">
			<video autoplay="autoplay" loop="loop" autobuffer="autobuffer" muted="muted"
				width="640" height="360">
			  <source src="<?php echo cs_get_option('site_videobackground'); ?>" type="video/mp4">
			</video>
		  </div>
		<?php
		elseif( cs_get_option('site_allpages_videobackground_enable') && cs_get_option('site_videobackground') ) :
		 ?>
		  <div id="container" class="video-container cover-bg show-for-medium-up">
			<video autoplay="autoplay" loop="loop" autobuffer="autobuffer" muted="muted"
				width="640" height="360">
			  <source src="<?php echo cs_get_option('site_videobackground'); ?>" type="video/mp4">
			</video>
		  </div>
		<?php
		endif ; ?>
		
      <!--END OF Static video bg-->
			
			<!-- Solid color as background -->
<!--      <div class="cover-bg full-size bg-color" data-bgcolor="rgba(80, 24, 133, 0.9)"></div>-->
			
			<!-- Solid color as filter -->
		<?php 
		 if(cs_get_option('site_mask_background')) :
			 ?>
			  <div class="cover-bg cover-bg-mask full-size bg-color" data-bgcolor="<?php echo cs_get_option('site_mask_background') ;?>"></div>
			<?php
			 else :
		?>
		 <div class="cover-bg cover-bg-mask full-size bg-color" data-bgcolor="rgba(52, 52, 52, 0.42)"></div>
		<?php
		 endif;
		?>
      <div class="cover-bg cover-bg-mask full-size bg-color" data-bgcolor="rgba(52, 52, 52, 0.42)"></div>
      
    </div>
    <!--END OF site Cover -->