<?php
/**
 * The template part for displaying recents
 *
 * @package WordPress
 * @subpackage tfmwalpha
 */


?>


<!-- BEGIN OF Recents  section -->
	<div class="section b-recents" id="recents">
		<div class="right-panel">


			<div class="r-title">
				<h2>News and Recents</h2>
				<div class="r-img">
					<!--								<img src="img/img-sample.jpg" alt="about us picture">-->
					<!--								<div class="bg-img" data-image-src="img/img-sample.jpg"></div>-->
				</div>
			</div>
			<?php if(cs_get_option('about_rightsidebar_quote') ) :?>
			<div class="r-quote">
				
				<cite><?php echo cs_get_option('about_rightsidebar_quote') ; ?> </cite>
				<p><?php echo cs_get_option('about_rightsidebar_quote_author') ; ?> </p>
			  
			</div>
			 <?php endif; ?>
		</div>



		<div class="s-content">
			<h2 class="title">Recents</h2>

			<!-- Begin of post list -->
			<div class="post-list">
              <?php 
                get_template_part( 'template-parts/posts-list', 'archive');
              ?>
				<!--<ul>
					
					<li>
						<div class="l-wrapper">
							<h4>Research fellows</h4>
							<p>Become a protector of education by signing up as a volunteer.</p>
							<a class="btn" href="">Read more</a>

							<div class="detail">
								<p>
									<span class="date-value">21 Jan 2016 </span>
									<i class="icon-categorie ion-person-add"></i>
								</p>
							</div>
						</div>
					</li>
					<li>
						<div class="l-wrapper">
							<div class="img bg-img" data-image-src="img/train.jpg"></div>
							<h4>Our new school</h4>
							<p>Become a protector of education. The name says it all. </p>
							<a class="btn" href="">Read more</a>


							<div class="detail">
								<p>
									<i class="icon-categorie ion-home"></i>
								</p>
							</div>

						</div>
					</li>
					<li>
						<div class="l-wrapper">
							<div class="img bg-img" data-image-src="img/img-sample.jpg"></div>
							<h4>The original avant-garde</h4>
							<p>Become a protector of education by signing up as a volunteer.</p>
							<a class="btn" href="">Read more</a>
						</div>
					</li>
					<li>
						<div class="l-wrapper">
							<h4>Our new school</h4>
							<p>Become a protector of education by signing up as a volunteer.</p>
							<a class="btn" href="">Read more</a>
						</div>
					</li>
					<li>
						<div class="l-wrapper">
							<h4>Our new school</h4>
							<p>Become a protector of education by signing up as a volunteer.</p>
							<a class="btn" href="">Read more</a>
						</div>
					</li>
				</ul>-->
			</div>
			<!-- End of post list -->
		</div>

		<div class="scroll">
			<!--						<a href="">Learn about the team</a>-->
		</div>
	</div>
	<!-- END OF Recents  section -->
