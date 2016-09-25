<nav class="buzz-list right-panel" style="z-index:100;">

      <div class="search-bar">
          <!--<form>
              <label for="search-text">Search in this site</label>
              <input type="text" id="search-text" name="search-text">
              <button class="btn "><i class="ion-ios-search"></i>
              </button>
          </form>-->
		  
		 <!-- <form role="search" method="get" class="search-form" action="<?php echo get_site_url() ;?>">
				<label for="search-text">Search in this site</label>
				<input  type="search"  id="search-text" value="" name="s" title="Search for:">
				<button class="btn "><i class="ion-ios-search"></i>
				</button>
			</form>-->
		  
		  <?php get_search_form(); ?>
		  
          <!--<div class="share">
              <p>Share this page on</p>
              <ul class="share-links">
                  <li><a><i class="ion-social-facebook"></i></a>
                  </li>
                  <li><a><i class="ion-social-twitter"></i></a>
                  </li>
              </ul>
          </div>-->
      </div>
  <?php 
  get_template_part( 'template-parts/posts-list' );
  
  ?>
</nav>