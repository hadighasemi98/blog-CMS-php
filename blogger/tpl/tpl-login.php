<?= blog_header() ?>

	<div class="col-md-9 main">
	<!-- login-page -->
	<div class="login">
		<div class="login-grids">
			<div class="col-md-6 log">
					 <h3 class="tittle">ورود <i class="glyphicon glyphicon-lock"></i></h3><br>
					 <p >لطفا موارد زیر را وارد کنید</p>
					 
					 <!-- Show Message -->
					 <?= isset($successLogin) ? "<div class='alert alert-success' role='alert'>$successLogin </div> " : "" ?>
					 <?= isset($errorLogin) ? "<div class='alert alert-danger' role='alert'>$errorLogin </div> " : "" ?>

					 <form action="login.php?action=login" method="POST" >
						 <h5>ایمیل :</h5>	
						 <input type="email" name="emailAddress" value="" >
						 <h5>رمز عبور:</h5>
						 <input type="password" name="password" value="">	
						 <div  class="g-recaptcha" data-sitekey="6LfWDeEaAAAAAHY95gpEZI6I6z8rwtxd0L2nJcp_" ></div>				
						 <?= isset($errorCaptcha) ? "<span style='color: red; font-size: 1rem;'> $errorCaptcha </span>" : "" ?><br><br>
						 <input type="submit" 	name="submit"	value="ورود">
						  
					 </form>
					<a href="forget-pass.php"> رمز عبور فراموش شده؟ </a>
			</div>
			<div class="col-md-6 login-left">
					 <h3 class="tittle">ثبت نام جدید <i class="glyphicon glyphicon-file"></i></h3>
					<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد</p>
					<a href="registration.php" class="hvr-bounce-to-bottom button">ایجاد یک حساب کاربری</a>
					<!-- <p>اگر قبلا ثبت نام کردید<a href="#">اینجا کلبک کنید</a></p> -->

				</div>
			<br><br><br>

			<div class="clearfix"></div>
		</div>
	</div>
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
<!-- </div>	 -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

		<!--//footer-->
			<!--start-smooth-scrolling-->
						<script type="text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>


</body>
</html>
