<?php defined('BLOG_URL')  or die('Permision Denied !');



function get_post_singlePage(){
	global $pdo ;
	
	$category= $_GET['category'] ?? null;
	$condition ='';
	$id ='';

	if(isset($_GET['post-id']))
	{
		$postId = $_GET['post-id'];
		$id = "and id = $postId";
	}

	if(isset($category))
	{
		$condition = "WHERE categories_id = $category ";
	}
    $sql = "SELECT * from posts $condition $id ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    // $data = [];
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // $data[] = $row;
        // $image = $row["image"];
        // $title = $row["title"];
        // $name = $row["name"];
}


function errorMessage($error){

	isset($error) ? "<span style='color: red; font-size: 1rem;'>$error </span>" : '' ;
}


function recaptcha ($response){
	$public_key  = "6LfWDeEaAAAAAHY95gpEZI6I6z8rwtxd0L2nJcp_";
	$private_key = "6LfWDeEaAAAAANQgbki43kVCiN5HqNlEFbJKlC3N";
	$url         = "https://www.google.com/recaptcha/api/siteverify";

	//Google recaptcha
	// $response = $_POST['g-recaptcha-response'];
	$response = file_get_contents($url . "?secret=" . $private_key . "&response=" . $response . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
	$response = json_decode($response);
	// print_r($response);
	
}

function getToken($len) {

	$rand_str = md5(uniqid(mt_rand(), true));
	$base64_encode = base64_encode($rand_str);
	$modified_base64_encode = str_replace(array('+', '='), array('', ''), $base64_encode);
	$token = substr($modified_base64_encode, 0, $len);
	return $token;

}

function already_exist($table ,$row , $input)
{
	global $pdo ;
	
    $sql   = "SELECT * FROM $table WHERE $row = '$input' ";
    $stmt  = $pdo->prepare($sql);
    $stmt ->execute();
    $count = $stmt->rowCount();
    return $count ;
}


function keepValue($input){
	echo isset($input )? $input : null ;
}

// function readMoreHelper($story_desc, $chars = 100) {
// 	$story_desc = substr($story_desc,0,$chars);  
// 	$story_desc = substr($story_desc,0,strrpos($story_desc,' '));  
// 	$story_desc = $story_desc." <a href=# > read more </a> ";  
// 	return $story_desc;  
// } 
function newPass($pass,$email)
{
    global $pdo ;
	$pass = password_hash($pass,PASSWORD_BCRYPT);

    $sql= "UPDATE usertable SET password = :pass WHERE emailAddress = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':pass' => $pass , ':email' => $email ]);
	echo $stmt->rowCount();
}
#============================================================Comments============================================================


function addComment($full_name , $email , $subject, $message , $post_id){
	global $pdo ;

	$sql   = "INSERT INTO comments (full_name , email , subject, message , post_id)
			  value(:full_name , :email , :subject, :message , :post_id) ";

	$stmt = $pdo->prepare($sql);
	$stmt->execute([':full_name' => $full_name , ':email' => $email , ':subject' => $subject ,
			 ':message' => $message , ':post_id' => $post_id]);

	$stmt->rowCount();		 

}


function getComment(){
	global $pdo ;

	$condition = "";
	if(isset($_GET['post-id'])){
		$postId = $_GET['post-id'];
		$condition = "WHERE post_id = $postId ";
	}

	$sql   = "SELECT * FROM comments $condition ";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result ;

}

function commentCount($post_id){
	global $pdo ;

	$sql  = "SELECT * FROM comments WHERE post_id = $post_id ";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->rowCount() ;

}


function is_verify($email) {
	global $pdo ;

	$sql  = "SELECT * FROM usertable WHERE emailAddress= :email && is_active = 1";
	$stmt = $pdo->prepare($sql);	
	$stmt->execute([':email' => $email]);
	return $stmt->rowCount();
}







#============================================================Tamplete Function==================================================
function blog_header(){

   echo "
<!DOCTYPE HTML>
<html>
<head>
<title>وبلاگ آزمایشی</title>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<meta name='keywords' content='Blogger Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android  Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design' />

<script type='application/x-javascript'> addEventListener('load', function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='assets/css/bootstrap.css' rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:700,700italic,800,300,300italic,400italic,400,600,600italic' rel='stylesheet' type='text/css'>
<!--Custom-Theme-files-->
	<link href='assets/css/style.css' rel='stylesheet' type='text/css' />	
	<script src='assets/js/jquery.min.js'> </script>
<!--/script-->
<script type='text/javascript' src='assets/js/move-top.js'></script>
<script type='text/javascript' src='assets/js/easing.js'></script>
<script type='text/javascript'>

	jQuery(document).ready(function($) {
		$('.scroll').click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
		});
	});
</script>


</head>
<body>
	<!-- header-section-starts -->
	<!--ترجمه شده توسط مرجع تخصصی برنامه نویسان-->
      <div class='h-top' id='home'>
		   <div class='top-header'>
				  <ul class='cl-effect-16 top-nag'>	
						<li><a href='index.php'>خانه</a></li> 
						<li><a href='single.php' data-hover=''>دسته بندی ها</a></li>
						<li><a href='login.php' data-hover='Login'>ورود به سایت</a></li>
						<li><a href='registration.php' data-hover='SignIn'>ثبت نام</a></li> 
						<li><a href='tpl/tpl-contact.php' data-hover='CONTACT'>تماس با ما</a></li>
						<li><a href='tpl/tpl-about.php' data-hover='About'>درباره ما</a></li>
					</ul>

					<div class='search-box'>
					    <div class='b-search'>
								<form>
										<input type='text' value='جستجو...' onfocus='this.value = '';' onblur='if (this.value == '') {this.value = 'Search';}'>
										<input type='submit' value=''>
								</form>

							</div>
							
						</div>

					<div class='clearfix'></div>
				</div>
       </div>
	<div class='full'>
			<div class='col-md-3 top-nav'>
				     <div class='logo'>
						<a href='index.php'><h1>وبلاگ نویس</h1></a>
					</div>
					<div class='top-menu'>
					 <span class='menu'> </span>

					<ul class='cl-effect-16'>
						<li><a class='active' href='index.php' data-hover='HOME'>صفحه اصلی</a></li> 
						<li><a href='tpl/tpl-about.php' data-hover='About'>درباره ما</a></li>
						<li><a href='tpl/tpl-grid.html' data-hover='Grids'>گرید ها</a></li>
						<li><a href='tpl/tpl-services.html' data-hover='Services'>خدمات</a></li>
						<li><a href='tpl/tpl-gallery.html' data-hover='Gallery'>گالری</a></li>
						<li><a href='tpl/tpl-contact.php' data-hover='CONTACT'>تماس با ما</a></li>
					</ul>
					<!-- script-for-nav -->
					<script>
						$( 'span.menu' ).click(function() {
						  $( '.top-menu ul' ).slideToggle(300, function() {
							// Animation complete.
						  });
						});
					</script>
				<!-- script-for-nav --> 	
				<!--ترجمه شده توسط مرجع تخصصی برنامه نویسان-->
					<ul class='side-icons'>
							<li><a class='fb' href='#'></a></li>
							<li><a class='twitt' href='#'></a></li>
							<li><a class='goog' href='#'></a></li>
							<li><a class='drib' href='#'></a></li>
					   </ul>
			    </div>
			</div>
    
    ";
}


function get_slider(){
	
$getCategories = displayRecord();

 $outPut = "
	<div class='banner-left-text'>
	<h3 class='tittle'>اخبارها<i class='glyphicon glyphicon-facetime-video'></i></h3>
	<!--/general-news-->
	<div class='general-news'>
	<div class='general-inner'>
		<div class='general-text'>
				<a href='single.html'><img src='assets/images/gen1.jpg' class='img-responsive' alt=''></a>
				<h5 class='top'><a href='single.html'>لورم ایپسوم متن ساختگی</a></h5>
				<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</p>
				<p>On Jun 25 <a class='span_link' href='#'><span class='glyphicon glyphicon-comment'></span>0 </a><a class='span_link' href='#'><span class='glyphicon glyphicon-eye-open'></span>56 </a><a class='span_link' href='single.html'><span class='glyphicon glyphicon-circle-arrow-right'></span></a></p>
			</div>
			<div class='edit-pics'>
						<div class='editor-pics'>
						<h3 class='inner two'> دسته بندی ها</h3>
						<br>";
							foreach($getCategories as $cate){								 
								$outPut=
								"<div class='col-md-9 item-details'>
									<h5 class='inner two'><a href='tpl/tpl-single.html'>$cate[name]</a></h5>
										<div class='td-post-date two'><a href='#'> </a></div>
									</div";
									}
									$outPut="<div class='clearfix'></div>
							
								<div class='clearfix'></div>
							</div>
						</div>
					<div class='media'>	
						<h3 class='tittle media'>رسانه ها<i class='glyphicon glyphicon-floppy-disk'></i></h3>
						<div class='general-text two'>
							<a href='single.html'><img src='assets/images/gen3.jpg' class='img-responsive' alt=''></a>
							<h5 class='top'><a href='single.html'>لورم ایپسوم متن ساختگی</a></h5>
							<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</p>
							<p>On Jun 27 <a class='span_link' href='#'><span class='glyphicon glyphicon-comment'></span>0 </a><a class='span_link' href='#'><span class='glyphicon glyphicon-eye-open'></span>56 </a><a class='span_link' href='single.html'><span class='glyphicon glyphicon-circle-arrow-right'></span></a></p>
						</div>
					</div>
			<div class='general-text two'>
				<a href='single.html'><img src='assets/images/gen2.jpg' class='img-responsive' alt=''></a>
				<h5 class='top'><a href='single.html'>لورم ایپسوم متن ساختگی</a></h5>
				<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</p>
				<p>On Jun 27 <a class='span_link' href='#'><span class='glyphicon glyphicon-comment'></span>0 </a><a class='span_link' href='#'><span class='glyphicon glyphicon-eye-open'></span>56 </a><a class='span_link' href='single.html'><span class='glyphicon glyphicon-circle-arrow-right'></span></a></p>
			</div>
		</div>
	</div>	
	<!--//general-news-->
	<!--/news-->
	</div>
	<div class='clearfix'> </div>
	";

	echo $outPut;

}


function get_footer(){
	
	echo $outPut = "
	
	
<!--/footer-->
<div class='footer'>
		<div class='footer-top'>
		   <div class='col-md-4 footer-grid'>
				<h4>لورم ایپسوم</h4>
				 <ul class='bottom'>
					<li>صفحه‌آرایی و طراحی گرافیک</li>
					<li>صفحه‌آرایی و طراحی گرافیک</li>
				</ul>
		   </div>
			 <div class='col-md-4 footer-grid'>
				<h4>پیام ما در حال حاضر</h4>
				   <ul class='bottom'>
					<li><i class='glyphicon glyphicon-home'></i>در دسترس 24/7</li>
					<li><i class='glyphicon glyphicon-envelope'></i><a href='mailto:info@example.com'>hadi77.hg@gmail.com</a></li>
				  </ul>
		   </div>
		   <div class='col-md-4 footer-grid'>
				<h4>آدرس محل سکونت</h4>
				  <ul class='bottom'>
					<li><i class='glyphicon glyphicon-map-marker'></i>تهران-</li>
					<li><i class='glyphicon glyphicon-earphone'></i>تلفن: (888) 123-456-7899 </li>
				  </ul>
		   </div>
		   <div class='clearfix'> </div>
		</div>
</div>
<div class='copy'>
   <p>کلیه حقوق مادی و معنوی برای مجموعه برنامه نویسان محفوظ می باشد<a href='http://barnamenevisan.org/'>برنامه نویسان</a> </p>
</div>
<div class='clearfix'> </div>
</div>
<div class='clearfix'> </div>
</div>	
<!--//footer-->
<!--ترجمه شده توسط مرجع تخصصی برنامه نویسان-->
   <!--start-smooth-scrolling-->
			   <script type='text/javascript'>
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
<a href='#home' id='toTop' class='scroll' style='display: block;'> <span id='toTopHover' style='opacity: 1;'> </span></a>
</body>
</html>
";
}


function userInfo(){


	$user = getUsers();
    echo "

<!-- Nav Item - User Information -->
<li class='nav-item dropdown no-arrow'>
	<a class='nav-link dropdown-toggle' href='#' id='userDropdown' role='button'
		data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
		<span class='mr-2 d-none d-lg-inline text-gray-600 small'> user </span>
		<i class='fas fa-user fa-sm fa-fw mr-2 text-gray-400'></i>
			<!-- src='assets/images/admin-settings.png'> -->
	</a>
	<!-- Dropdown - User Information -->
	<div class='dropdown-menu dropdown-menu-right shadow animated--grow-in'
		aria-labelledby='userDropdown'>
		<a class='dropdown-item' href='profile.php'>
			<i class='fas fa-user fa-sm fa-fw mr-2 text-gray-400'></i>
			Profile
		</a>
		<a class='dropdown-item' href='#'>
			<i class='fas fa-cogs fa-sm fa-fw mr-2 text-gray-400'></i>
			Settings
		</a>
		<a class='dropdown-item' href='#'>
			<i class='fas fa-list fa-sm fa-fw mr-2 text-gray-400'></i>
			Activity Log
		</a>
		<div class='dropdown-divider'></div>

		<a class='nav-link' name='signOut' href='#' >
			<i class='fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400'></i>
			Logout
		</a>
	</div>
</li>
</header>

";
}