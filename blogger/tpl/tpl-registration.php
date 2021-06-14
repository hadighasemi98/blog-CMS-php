<?= blog_header(); ?>

	<div class="col-md-9 main">
	<!-- register -->
			<div class="sign-up-form">
				 <h3 class="tittle">ثبت نام<i class="glyphicon glyphicon-file"></i></h3>
					<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</p>
				<div class="sign-up">
					 <h3 class="tittle reg">اطلاعات شخصی <i class="glyphicon glyphicon-user"></i></h3>
					
							<!-- FORM -->
				<form id="formData" method="POST" action="registration.php?action=register" >
							<div class="sign-u">
							<div class="sign-up1">
								<h4 class="a">نام کامل (Full Name) :</h4>
							</div>
						<div class="sign-up2">
							<input type="text" class="text" name="fullName" value='<?= keepValue($fullName ?? null) ?>' placeholder="Enter Your User Name" >
							<?= isset($errorFN) ? "<span style='color: red; font-size: 1rem;'> $errorFN </span>" : '' ;?>
						</div>
						<div class="clearfix"> </div>
					</div>

					<div class="sign-u">
						<div class="sign-up1">
							<h4 class="b">ایمیل (Email) :</h4>
						</div>
						<div class="sign-up2">
							<input type="text" class="text"  name="emailAddress" value='<?= keepValue($emailAddress ?? null) ?>' placeholder="Enter Your Email"    >
							<?= isset($errorEmail) ? "<span style='color: red; font-size: 1rem;'> $errorEmail </span>" : '' ;?>

						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4 class="c">رمز کاربری (Password) :</h4>
						</div>
						<div class="sign-up2">
							<input type="password" class="text"   name="password" placeholder="Enter Your Password">
							<?= isset($errorPass) ? "<span style='color: red; font-size: 1rem;'> $errorPass </span>" : '' ;?>

						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4 class="c">تایید رمز کاربری (Confirm Password) :</h4>
						</div>
						<div class="sign-up2">
							<input type="password" class="text"   name="confirm_password" placeholder="Enter Your Confirm Password">
							<?= isset($errorPass) ? "<span style='color: red; font-size: 1rem;'> $errorPass </span>" : '' ;?>

						</div>
						<div class="clearfix"> </div>
					</div>
					<!-- recaptcha block -->
					<div class="sign-up2">
						<!-- <div class="g-recaptcha" data-sitekey = "6LfD244UAAAAAI6ot-UBtAxvy9bzBwuX8-ZyX0fl"></div> -->
						<div class="g-recaptcha" data-sitekey="6LfWDeEaAAAAAHY95gpEZI6I6z8rwtxd0L2nJcp_"></div>
						<?= isset($errorCaptcha) ? "<span style='color: red; font-size: 1rem;'> $errorCaptcha </span>" : '' ;?>
					</div>
					<div class="sign-up sign-up1 sign-up2">
					<input name="submit-form" type="submit" value="ثبت" id="submit">
					<br><br><br><br><br><br><br><br><br>

					</div>

				</form>

				</div>
			</div>
			<br><br><br><br>
<!-- //register -->
<!-- //login-page -->
			<div class="clearfix"> </div>
	<!--/footer-->
	     <div class="footer">
				 <div class="footer-top">
				    <div class="col-md-4 footer-grid">
					     <h4>لورم ایپسوم</h4>
				          <ul class="bottom">
							 <li>صفحه‌آرایی و طراحی گرافیک</li>
							 <li>صفحه‌آرایی و طراحی گرافیک</li>
						 </ul>
				    </div>
					  <div class="col-md-4 footer-grid">
					     <h4>پیام ما در حال حاضر</h4>
				            <ul class="bottom">
						     <li><i class="glyphicon glyphicon-home"></i>در دسترس 24/7</li>
							 <li><i class="glyphicon glyphicon-envelope"></i><a href="mailto:info@example.com">mail@example.com</a></li>
						   </ul>
				    </div>
					<div class="col-md-4 footer-grid">
					     <h4>آدرس محل سکونت</h4>
				           <ul class="bottom">
						     <li><i class="glyphicon glyphicon-map-marker"></i>شریعتی-خ ملک کوچه ایرانیاد</li>
							 <li><i class="glyphicon glyphicon-earphone"></i>تلفن: (888) 123-456-7899 </li>
						   </ul>
				    </div>
					<div class="clearfix"> </div>
				 </div>
	     </div>
		<div class="copy">
		    <p>کلیه حقوق مادی و معنوی برای مجموعه برنامه نویسان محفوظ می باشد<a href="http://barnamenevisan.org/">برنامه نویسان</a> </p>
		</div>
	 <div class="clearfix"> </div>
	</div>
	<div class="clearfix"> </div>
</div>	
		<!--//footer-->
				<!--ترجمه شده توسط مرجع تخصصی برنامه نویسان-->
			<!--start-smooth-scrolling-->
	<script src="assets/js/jquery.min.js"> </script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

	<script type="text/javascript">
  		$(document).ready(function(){
				// $(document).ready(function() {
				// 	/*
				// 	var defaults = {
			  	// 		containerID: 'toTop', // fading element id
				// 		containerHoverID: 'toTopHover', // fading element hover id
				// 		scrollSpeed: 1200,
				// 		easingType: 'linear' 
			 	// 	};
				// 	*/
					
				// $().UItoTop({ easingType: 'easeOutQuart' });
					
				// insert ajax request data
				// $("#submit").click(function(e){
				// 	if ($("#formData")[0].checkValidity()) {
				// 	e.preventDefault();
				// 	$.ajax({
				// 		url : "process/insertUserAjax.php",
				// 		type : "POST",
				// 		data : $("#formData").serialize()+"&action=insert",
				// 		success:function(response){
				// 			Swal.fire({
				// 				icon: 'success',
				// 				title: 'User added successfully - <a href="login.php"> Please Do Login !</a> ',

				// 			});
				// 			$("#formData")[0].reset();
				// 		}
				// 	});
				// 	}
				// });				 



		});
	</script>
		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
</body>
</html>
