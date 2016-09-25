<!-- Recent post list -->
	
			<ul>
				<?php 
                  $args = array(
                      //'cat' => $category->term_id,
                      'post_type' => 'post',
                      'posts_per_page' => '4',
                  );
                  $query = new WP_Query( $args );
				  if ( $query->have_posts() ) { 
					// echo $category->name;					
					 while ( $query->have_posts() ) {

                          $query->the_post();
                          ?>

                          <li id="post-<?php the_ID(); ?>" <?php post_class( 'category-listing' ); ?>>
                            <div class="l-wrapper">
                              <?php if ( has_post_thumbnail() ) { ?>
                              <div class="img">
                                <?php the_post_thumbnail( 'thumbnail' ); ?>
                              </div>
                              
                                  <!--<a href="<?php the_permalink(); ?>">
                                      <?php the_post_thumbnail( 'thumbnail' ); ?>
                                  </a>-->
                              <?php } ?>

                              <h4 class="entry-title"><?php the_title(); ?></h4>

                            <p><?php
//                                  the_excerpt( __( ' <span class="meta-nav">&rarr;</span>', 'ngo' )); 
						 		
                                if ( has_post_thumbnail()  ) {
									//$title  = get_the_title();
									$title = apply_filters( 'the_title', get_the_title() );
									if ( strlen( $title ) < 35 ) {
										echo hh_the_excerpt(25);
									}
                                }
                                else{
                                  echo hh_the_excerpt(47);
                                }
                              ?></p>

                              <a class="btn" href="<?php the_permalink(); ?>">Read more</a>
                          </div>
                        </li>

                    <?php } // end while ?>

                  <?php } // end if

                  // Use reset to restore original query.
                  wp_reset_postdata();
                  ?>
				
				<!--<li>
						<h4>Recruitment of Media fellows</h4>
						<p>Become a protector of education by signing up as a volunteer.</p>
						<a class="btn" href="">Read more</a>
					</li>
				<li>
					<h4>Research fellows</h4>
					<p>Become a protector of education by signing up as a volunteer.</p>
					<a class="btn" href="">Read more</a>
				</li>
				<li>
					<h4>Our new school</h4>
					<p>Become a protector of education by signing up as a volunteer.</p>
					<a class="btn" href="">Read more</a>
				</li>-->
			</ul>
	<!-- End of recent post lsit -->