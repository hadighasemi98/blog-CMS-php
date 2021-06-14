<!-- header -->
<?= blog_header(); ?>
<?php include "../vendor/autoload.php" ; 
use Hekmatinasser\Verta\Verta;
?>
<!-- Main Content -->
		<div class="col-md-9 main">
		<div class="banner-section">

		<!--banner-section-->
		<div>
		<?php $get_posting = get_post_singlePage(); ?>
		
		<?php foreach($get_posting as $post ){ 	?>

		   <h3 class="tittle"><?= $post['title'] ?><i class="glyphicon glyphicon-file"></i></h3>
			<div class="single">
				<div>
			   <img src="assets/images/<?= $post['image'] ?>" class="img-responsive" alt="" style="width: 732px;height: 390px;" />
			   </div>  
			   <div class="b-bottom"> 
				  <h5 class="top"><a href="#"><?= $post['title'] ?></a></h5>
				  
				   <p class="sub"><?php if(strlen($post['post']) >500){ echo substr($post['post'],0,500); }?> ... </p>
				  
				   <p style="direction:ltr;margin: 0 0 32px;" ><?= new Verta($post['created_at']);  ?> <a class="span_link"  href="#"><span class="glyphicon glyphicon-comment"></span> <?= commentCount($post['id']) ?> </a></p>
					 
				   <a href="fullPost.php?category=<?= $post['categories_id'] ?>&post-id=<?= $post['id'] ?>">
				   <button class="btn btn-info" name="readMore" style=" direction: ltr; margin-right: 86%;" type="button">  Read more ...  </button>
					</a>
					 <hr>
				</div>
			 </div>
			 <br>
		 <?php } ?>
		 </div>
			  <div class="single-bottom">
								<div class="single-middle">
								<ul class="social-share">
									<li><span>اشتراک گذاری</span></li>
									<li><a href="#"><i> </i></a></li>						
									<li><a href="#"><i class="tin"> </i></a></li>
									<li><a href="#"><i class="message"> </i></a></li>				
								</ul>
								<a href="#"><i class="arrow"> </i></a>
								<div class="clearfix"> </div>
						   </div>

					    </div>
						<!-- <div class="response">
					<h4> پاسخ </h4>
					<div class="media response-info">
						<div class="media-right response-text-right">
							<a href="#">
								<img class="media-object" src="assets/images/sin1.jpg" alt=""/>
							</a>
							<h5><a href="#">نام کاربر</a></h5>
						</div>
						<div class="media-body response-text-left">
							<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد</p>
							<ul>
								<li>Sep 21, 2015</li>
								<li><a href="single.html">پاسخ</a></li>
							</ul>
							<div class="media response-info">
								<div class="media-right response-text-right">
									<a href="#">
										<img class="media-object" src="assets/images/sin2.jpg" alt=""/>
									</a>
									<h5><a href="#">نام کاربر</a></h5>
								</div>
								<div class="media-body response-text-left">
									<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد</p>
									<ul>
										<li>July 17, 2015</li>
										<li><a href="single.html">پاسخ</a></li>
									</ul>		
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="media response-info">
						<div class="media-right response-text-right">
							<a href="#">
								<img class="media-object" src="assets/images/sin1.jpg" alt=""/>
							</a>
							<h5><a href="#">نام کاربر</a></h5>
						</div>
						<div class="media-body response-text-left">
							<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد</p>
							<ul>
								<li>Mar 28, 2015</li>
								<li><a href="single.html">پاسخ</a></li>
							</ul>
							<div class="media response-info">
								<div class="media-right response-text-right">
									<a href="#">
										<img class="media-object" src="assets/images/sin2.jpg" alt=""/>
									</a>
									<h5><a href="#">نام کاربر</a></h5>
								</div>
								<div class="media-body response-text-left">
									<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد</p>
									<ul>
										<li>Feb 19, 2015</li>
										<li><a href="single.html">پاسخ</a></li>
									</ul>		
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>	
				<div class="coment-form">
					<h4>ارسال نظر</h4>
					<form>
						<input type="text" value="نام" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
						<input type="email" value="ایمیل" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email (will not be published)*';}" required="">
						<input type="text" value="وب سایت" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Website';}" required="">
						<textarea onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Comment...';}" required="">پیام...</textarea>
						<input type="submit" value="ارسال" >
					</form>
				</div>	
				<div class="clearfix"></div>-->
			</div> 
			<!--//banner-->
				<!--ترجمه شده توسط مرجع تخصصی برنامه نویسان-->
			<!--//banner-section-->
			<div class="banner-left-text">
			 <h3 class="tittle"> اخبارها <i class="glyphicon glyphicon-facetime-video"></i></h3>
			<!--/general-news-->
			 <div class="general-news">
				<div class="general-inner">
					<div class="general-text">
						 <a href="#"><img src="assets/images/what-is-programmingjpg.jpg" class="img-responsive" alt=""></a>
						    <h5 class="top"><a href="#"> لورم ایپسوم یا طرح‌نما</a></h5>
							<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</p>
						    <p>On Jun 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
					 </div>
						<hr>
						<h3>دسته بندی ها  : </h3>
					 <div class="edit-pics">

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
												 <!-- <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i><?= new Verta($cate['created_at']); ?><a href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div> -->
											 </div>
											<div class="clearfix"></div>
										</div>
										<?php
                                        } ?>
										
								 </div>
							</div>	
			<!--//general-news-->
			<!--/news-->
			<!--/news-->
		 </div>
			<div class="clearfix"> </div>
			<br><br><br><br>
			<br><br><br><br>
			<br><br><br><br>

			<?= get_footer(); ?> 	