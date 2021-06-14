<!-- header -->
<?= blog_header(); ?>
<?php include "../vendor/autoload.php" ; 
use Hekmatinasser\Verta\Verta;
?>
<!-- Main Content -->
		<div class="col-md-9 main">
		<div class="banner-section">

		<!--banner-section-->
		<!-- <div> -->
		<?php $get_posting = get_post_singlePage(); ?>
		
		<?php foreach($get_posting as $post ){ 	?>

		   <h3 class="tittle"><?= $post['title'] ?><i class="glyphicon glyphicon-file"></i></h3>
			<div class="single">
				<div>
			   <img src="assets/images/<?= $post['image'] ?>" class="img-responsive" alt="" style="width: 732px;height: 390px;" />
			   </div>  
			   <div class="b-bottom"> 
				  <h5 class="top"><a href="#"><?= $post['title'] ?></a></h5>
				  
				   <p class="sub"><?= $post['post']; ?> </p>
				  
				   <p style="direction:ltr;margin: 0 0 32px;" ><?= new Verta($post['created_at']);?><a class="span_link"  href="#"><span class="glyphicon glyphicon-comment"></span><?= commentCount($post['id']) ?> </a></p>
					 
				   <a href="single.php?category=<?= $post['categories_id'] ?>&post-id=<?= $post['id'] ?>">
					</a>
					 <hr>
				</div>
			 </div>
			 <br>
		 <?php } ?>
		 <!-- </div> -->
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
						
					<div class="response">
					<h4> کامنت </h4>
					<div class="media response-info">


					<?php $getComment = getComment($_GET['post-id']) ?>
					<?php foreach($getComment as $comment){ ?>
							<div class="media-right response-text-right">
							<img class="media-object" src="assets/images/sin1.jpg" alt=""/>
							<h5><a href="#"><?= $comment['full_name'] ?></a></h5>
						</div>
						<div class="media-body response-text-left">
							<p><?= $comment['message'] ?></p>
							<ul>
								<li><?= new verta($comment['created_at']) ?></li>
								<li><a href="single.html">پاسخ</a></li>
								<br><br>
							</ul>
							
							</div> 
							<?php } ?>

						</div>
					</div>
				<div class="coment-form">

				<?= isset($error) ? "<div class='alert alert-danger' role='alert'> $error </div> " : "" ?>
				<?= isset($success) ? "<div class='alert alert-success' role='alert'> $success </div> " : "" ?>
					<h4>ارسال نظر</h4>
					<form method="POST" action="">
						<input type="text" 	value="نام" 	  	 name="full_name"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
						<input type="email" value="ایمیل"	  	  name="email"    onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email (will not be published)*';}" required="">
						<input type="text" 	value="عنوان"		 name="subject"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Website';}" required="">
						<textarea onfocus="this.value = '';"	name="message" onblur="if (this.value == '') {this.value = 'Your Comment...';}" required="">پیام...</textarea>
						<input type="submit" name="sub" value="ارسال" >
					</form>
				</div>	
				<div class="clearfix"></div>
			</div>
			<!--//banner-->
				<!--ترجمه شده توسط مرجع تخصصی برنامه نویسان-->
			<!--//banner-section-->
			<!-- <br><br><br><br><br> -->
			<div class="banner-left-text">
			 <h3 class="tittle"> اخبارها <i class="glyphicon glyphicon-facetime-video"></i></h3>
			<!--/general-news-->
			 <div class="general-news">
				<div class="general-inner">
					<div class="general-text">
						 <a href="#"><img src="assets/images/gen1.jpg" class="img-responsive" alt=""></a>
						    <h5 class="top"><a href="#"> لورم ایپسوم یا طرح‌نما</a></h5>
							<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</p>
						    <p>On Jun 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a></p>
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
			<?= get_footer(); ?> 	