<?= blog_header() ?>

	<div class="col-md-9 main">
	<!-- login-page -->
	<div class="login">
		<div class="login-grids">
			<div class="col-md-6 log">

					 <h3 class="tittle">ایجاد رمز جدید  <i class="glyphicon glyphicon-lock"></i></h3><br>
					
					 <!-- Show Message -->
					 <?= isset($error) ? "<div class='alert alert-danger' role='alert'>$error </div> " : "" ?>
					 <?= isset($success) ? "<div class='alert alert-success' role='alert'>$success </div> " : "" ?>
					 <p>لطفا رمز جدید خود را وارد کنید</p>

					 <form action="" method="POST" >
                         <h5>رمز :</h5>	
                         
                         <input type="password" name="new-pass" value="" placeholder="New Password" >
						 <?= isset($errorPass) ? "<div class='alert alert-danger' role='alert'>$errorPass </div> " : "" ?>
		
						 <h5>رمز جدید :</h5>	
                         
                         <input type="password" name="confirm-password" value="" placeholder="Confirm New Password"><br><br><br>
                         
						 <div class="g-recaptcha" data-sitekey="6LfWDeEaAAAAAHY95gpEZI6I6z8rwtxd0L2nJcp_"></div>				
						 <?= isset($errorCaptcha) ? "<span style='color: red; font-size: 1rem;'> $errorCaptcha </span>" : "" ?><br><br>
						 <input type="submit" 	name="new-pass-submit"	value="ورود">
						  
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