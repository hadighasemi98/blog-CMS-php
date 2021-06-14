<!-- header -->
<?= headerTpl('Comments') ?>

<!-- sidebar -->

<div class="container-fluid">
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
            <a class="nav-link " href="AddNewPost.php">
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
          <li class="nav-item ">
            <a class="nav-link "  href="users.php">
              <span data-feather="users"></span>
              Manage Users
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" style=" background-color: #abd1eaad; " href="comments.php">
              <span data-feather="bar-chart-2"></span>
              Comments
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="profile.php">
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

   <br><br>
    <div class="container"  style="margin-left: 20%;" >
      <div class="row">
        <div class="col-lg-6">
          <h4>Manage Comments</h4>  
        </div>
      
      </div><br>
    </div>
    <div class="container"  style="margin-left: 20%;" >
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="table-responsive" id="tableData">
            <h3 class="text-center text-success" style="margin-top: 150px;">Loading...</h3>
          </div>
        </div>
      </div>
    </div>

   
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Record  Modal -->
    <div class="modal" id="editModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Edit Users</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
          <form id="EditformData"  method="POST" action="" enctype="multipart/form-data">
              <input type="hidden" name="upid" id="edit-form-id">
              <div class="form-group">
                <label for="name">fullName :</label>
                <input type="text" class="form-control" name="upName" id="fullName"  required="">
              </div>
                <div class="form-group">
                <label for="name">Email :</label>
                <input type="text" class="form-control" name="upEmail" id="email"  required="">
              </div> 
             <div class="form-group">
                <label for="name">Password :</label>
                <input type="text" class="form-control" name="upPass" placeholder="Enter Your New Password"  required="">
              </div> 
             <div class="form-group">
                <label for="name">Avatar :</label>
                <input type="file" class="form-control" name="upAvatar" id="avatar" required="">
              </div> 
             
              <hr>
              <div class="form-group float-right">
                <button type="submit" class="btn btn-primary" name="upSub" id="update">Update</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>  
            </form>
          </div>
        </div>
      </div>
    </div>

</main>
</div>   
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script type="text/javascript">
  $(document).ready(function(){
    
    showAllComments();
  //View Record
  function showAllComments(){
    $.ajax({
      url : "process/commentAjax.php",
      type: "POST",
      
      data : {action:"view"},
      success:function(response){
          $("#tableData").html(response);
          $("table").DataTable({
            order:[0, 'DESC']
          });
        }
      });
    }

    
    

    //Delete Record
    $("body").on("click", ".deleteBtn", function(e){
      e.preventDefault();
      var tr = $(this).closest('tr');
      var deleteBtn = $(this).attr('id');
      if (confirm('Are you sure want to delete this Record')) {
        $.ajax({
          url : "process/commentAjax.php",
          type : "POST",
          data : {deleteBtn:deleteBtn} ,
          success:function(response){
            tr.css('background-color','#ff6565');
            Swal.fire({
              icon: 'success',
              title: 'Customer delete successfully',
            });
            showAllComments();
          }
        });
      }
    });
  }); 
</script>
</body>
</html>