
<!-- header -->
<?= headerTpl('Profile') ?>

<!-- sidebar -->
<div class="container-fluid" style=" width: 123%; margin-left: -6%; " >
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul id="side-Menu" class="nav flex-column">
          <li class="nav-item">
          <span class="bi bi-house-door-fill"></span>
            <a class="nav-link" aria-current="page" href="dashboard.php">
              <span data-feather="home"></span>
              <span class="bi bi-house-door-fill"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="AddNewPost.php">
              <span data-feather="file"></span>
              Add new post
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="categories.php">
              <span data-feather="shopping-cart"></span>
              Categories
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="users.php">
              <span data-feather="users"></span>
              Manage Users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="comments.php">
              <span data-feather="bar-chart-2"></span>
              Comments
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" style=" background-color: #abd1eaad; " href="profile.php">
              <span data-feather="bar-chart-2"></span>
              AdminProfile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= blog_url(); ?>" target="_blank">
              <span data-feather="layers"></span>
              Live Blog 
            </a>
          </li>
        </ul>

        </ul>
      </div>
    </nav>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


    <div class="main-panel">
      <!-- Navbar -->
       <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top "> 
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          
          </div> 
      </nav>
      <!-- End Navbar -->
  
      <div class="content" style="margin-top: 0;">
        <div class="container-fluid">
          <div class="row" style="margin: 3% 0 0 21%;">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary" style=" background: linear-gradient( 60deg , #1ab, #1ab); " >
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body" style="padding-bottom: 65px;">

                  <form action="profile.php?action=update" method="POST">
                    <div class="row">
                      
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" name="user_name" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" name="email" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Full Name</label>
                          <input type="text" name="full_name" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right" style=" background-color: #1ab; border-color: #1ab; ">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
              <div class="card-avatar">
                  <a href="javascript:;">
                    <img class="img" style="height: 169px;margin-left: 20%;" src="assets/images/hadi1.jfif " />
                  </a>
                </div>

                <?php
                   $table = "admins";
                   $admins = getInfoTables($table); 
                ?>
                <div class="card-body" style="text-align: center;">
                  <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                  <h4 class="card-title"> <?= $admins->full_name ?><br></h4>
                  
                  <p class="card-description">
                   Email : <?= $admins->email ?><br>
                   User Name : <?= $admins->user_name ?><br>

                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                  </p>
                  
                  <a href="javascript:;" class="btn btn-primary btn-round" style=" background-color: #1ab; border-color: #1ab; ">Follow</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

   <br><br>
    <div class="container"  style="margin-left: 20%;" >
      <div class="row">

          </div>
        </div>

</main>
</div>   
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  
</script>
</body>
</html>