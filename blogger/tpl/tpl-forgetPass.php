<?= blog_header() ?>

	<div class="col-md-9 main" style="text-align: center; margin-left: -22%;">
	<!-- login-page -->
	<div class="login">
		<div class="login-grids">
			<div class="col-md-6 log">

					 <h3 class="tittle">فراموشی رمز <i class="glyphicon glyphicon-lock"></i></h3><br>
					<!-- Show Message -->
					 <?= isset($error) ? "<div class='alert alert-danger' role='alert'>$error </div> " : "" ?>
					 <?= isset($success_send) ? "<div class='alert alert-success' role='alert'>$success_send </div> " : "" ?>
					 <p>لطفا ایمیل خود را وارد کنید</p>

					 
					 <form action="" method="POST" >
                         <h5>ایمیل :</h5>	
                         
                         <input type="email" name="emailAddress" value="" >
                         
						 <div class="g-recaptcha" data-sitekey="6LfWDeEaAAAAAHY95gpEZI6I6z8rwtxd0L2nJcp_" style=" margin-right: 20%; "></div>				
						 <?= isset($errorCaptcha) ? "<span style='color: red; font-size: 1rem;'> $errorCaptcha </span>" : "" ?><br><br>
						 <input type="submit" 	name="forget-pass-submit"	value="ورود">
						  
					 </form>
			</div>
			<br><br><br>

			<div class="clearfix"></div>
		</div>
	</div>
	</div>
<!-- //login-page -->
			<div class="clearfix"> </div>
	<!--/footer-->

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<br><br><br><br><br><br><br><br><br><br><br><br>

<?= get_footer(); ?>