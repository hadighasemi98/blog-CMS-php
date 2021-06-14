<?= blog_header() ;
use Hekmatinasser\Verta\Verta;

?>

<!-- Main Content -->
<div class="col-md-9 main">
		<!--banner-section-->
		<div class="banner-section">
		   <h3 class="tittle"> عمومی <i class="glyphicon glyphicon-picture"></i></h3>
			
		<div class="banner">			
            <div  class="callbacks_container">
					<ul class="rslides" id="slider4">

					<?php $getPost = get_home_Post(); ?>
					<?php foreach($getPost as $post){ ?>

					       <li>
						   <a href="fullPost.php?category=<?= $post['categories_id'] ?>&post-id=<?= $post['id'] ?>"><img src="assets/images/<?= $post['image']; ?>" class="img-responsive" alt="" style=" width: 700px; height: 400px; "/></a>
							  <h5 class="top"><a href="single.html?post=<?= $post['title']; ?>"><?= $post['title']; ?></a></h5>
							   <p><?php if(strlen($post['post']) > 200){echo substr($post['post'],0,500);}?> ...</p> 
			      			<p>
								<?= new Verta($post['created_at']) ?> 
								<span class="glyphicon glyphicon-comment"> </span>
								
								<a href="fullPost.php?category=<?= $post['categories_id'] ?>&post-id=<?= $post['id'] ?>">
				   					<button class="btn btn-info" name="readMore" style=" direction: ltr; margin-right: 86%;" type="button">  Read more ...  </button><br>
								</a>							
							</p>
							</li>
							<?php } ?>

						</ul>
						
						</div>

					</div>

		<div class="clearfix"> </div>

			   <!--//banner-->

			  <!--/top-news-->
			  <div class="top-news">
				<div class="top-inner">
					<?php $getPost = get_home_Post(); ?>
					<?php foreach($getPost as $post){ ?>
					<div class="col-md-6 top-text">
						 <a href="fullPost.php?category=<?= $post['categories_id'] ?>&post-id=<?= $post['id'] ?>"><img style=" width: 373px; height: 373px; "  src="assets/images/<?= $post['image'] ?>" class="img-responsive" alt=""></a>
						    <h5 class="top"><a href="fullPost.php?category=<?= $post['categories_id'] ?>&post-id=<?= $post['id'] ?>"><?= $post['title'] ?></a></h5>
							<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</p>
							<p><?= new verta($post['created_at']) ?> </p>
							<a href="fullPost.php?category=<?= $post['categories_id'] ?>&post-id=<?= $post['id'] ?>">
				   					<button class="btn btn-info" name="readMore" style=" direction: ltr; margin-right: 86%;" type="button">  Read more ...  </button><br>
								</a>
					 </div>
					<?php } ?>
					
					 <div class="clearfix"> </div>
				 </div>
	            </div>
					<!--//top-news-->
		     </div>
			<!--//banner-section-->

			<div class="banner-left-text">
			 <h3 class="tittle"> اخبارها <i class="glyphicon glyphicon-facetime-video"></i></h3>
			<!--/general-news-->
			 <div class="general-news">
				<div class="general-inner">
					<div class="general-text">
						 <a href="#"><img src="assets/images/what-is-programmingjpg.jpg" class="img-responsive" alt=""></a>
						    <h5 class="top"><a href="single.html">لورم ایپسوم متن ساختگی</a></h5>
							<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</p>
						    <p>On Jun 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a><a class="span_link" href="single.html"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
					 </div>
					 <div class="edit-pics">
							      <div class="editor-pics">
								  <h3 class="inner two"> دسته بندی ها</h3>
								  <div class="editor-pics">
								  		<?php $category= displayRecord(); 
                                        foreach ($category as $cate) {
                                            ?>
										 <div class="col-md-3 item-pic">
										 <a href="single.php?category=<?= $cate['id'] ?>">
										   <img src="assets/images/کتگوری.png" class="img-responsive" alt=""><br>
										   </div>
											
											<div class="col-md-9 item-details">
												<h5 class="inner two" style=" margin-top: 17%; "><?= $cate['name'] ?></h5></a>
												 <!-- <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i><?= new Verta($cate['created_at']); ?></div> -->
											 </div>
											<div class="clearfix"></div>
										</div>
												  <?php
                                                  } ?>
											<div class="clearfix"></div>
										
											<div class="clearfix"></div>
										</div>
									</div>
								 
					
				 </div>
			</div>	
			<!--//general-news-->
			<!--/news-->
			<!--/news-->
		 </div>
			<div class="clearfix"> </div>

			<script src="assets/js/responsiveslides.min.js"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager:true,
			        nav:true,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
			<?= get_footer() ?>