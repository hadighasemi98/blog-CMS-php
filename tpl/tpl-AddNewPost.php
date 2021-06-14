<!-- header -->
<?= headerTpl('New Post') ?>

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
            <a class="nav-link active" style=" background-color: #abd1eaad; " href="AddNewPost.php">
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
            <a class="nav-link" href="profile.php">
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
          <h4>Posts Records</h4>  
        </div>
        <div class="col-lg-6">
          <button type="button" class="btn btn-primary m-1 float-right" data-toggle="modal" data-target="#addModal">
          <i class="fa fa-plus"></i> Add New Record</button>
          <a href="action.php?export=excel" class="btn btn-success m-1 float-right"> <i class="fa fa-download"></i> 
          Export To Excel</a>
        </div>


       <label for="categories">Select Category:</label>
       <select class="form-control" name="selectCate" onchange="location = this.value;" >
       <option value=""  ></option>
       
       <!------- get categories ----->
       <?php $CategoryRecord = displayRecord(); 
             foreach ($CategoryRecord as $Category) { ?> 
             <option value='AddNewPost.php?categories_id=<?= $Category['id'] ?> ' name='categories_id' > 
            <?=  $Category['name'] ?> </option>
         <?php } ?>               
         </select>

            
      </div><br>
    </div>
    <div class="container"  style="margin-left: 20%;" >
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="table-responsive" id="tableData"></div>
        </div>
      </div>
    </div>

    <!-- Add Record  Modal -->
    <div class="modal" id="addModal">
      <div class="modal-dialog">
        <div class="modal-content" style=" margin-left: -17%; width: 130%; ">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Add New Post</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <form id="formData" method="POST" action="" enctype="multipart/form-data">
              <div class="form-group">

                <label for="name">Title:</label>
                <input type="text" class="form-control" name="title" placeholder="Enter Title" >
              </div>

               <div class="form-group">
                <label for="name">Author Name:</label>
                <input type="text" class="form-control" name="author" placeholder="Enter Author Name" >
              </div>

              <div class="form-group">
                <label for="image">Select Image:</label>
                <input type="file" class="form-control" name="uploadfile" />
              </div>

              

              <div class="form-group">
                <label for="postarea">Post:</label>
                <textarea class="form-control" name="post" placeholder="Write Here ..." ></textarea>
              </div>
              
              

              <hr>
              <div class="form-group float-right">
                <button type="submit" class="btn btn-success" name="upload" id="submit">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>  

            </form>
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
            <h4 class="modal-title">Edit Post</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <form id="EditformData" method="POST" action="" enctype="multipart/form-data">
            <input type="hidden" name="upid" id="edit-form-id">

              <div class="form-group">
                <label for="name">Title:</label>
                <input type="text" class="form-control" id="name" name="upname" placeholder="Enter Title" >
              </div>

               <div class="form-group">
                <label for="name">Author Name:</label>
                <input type="text" class="form-control" id="author" name="upauther" placeholder="Enter Author Name" >
              </div>

              <div class="form-group">
                <label for="name">Select Image:</label>
                <input type="file" class="form-control" id="image" name="updatefile" style="width: 50%;">
                <!-- <input type="text" class="form-control" id="image" style="width: 50%;margin: -38px 50% 0;" > -->

              </div>

              

              <div class="form-group">
                <label for="postarea">Post:</label>
                <textarea class="form-control"  id="post" name="uppost" placeholder="Write Here ..." ></textarea>
              </div>
              
              <hr>
              <div class="form-group float-right">
                <button type="submit" class="btn btn-primary" name='upSub' id="update">Update</button>
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
<script src="assets/js/script-sweetalert.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    
  showAllCustomer();
  //View Record
  function showAllCustomer(){
    $.ajax({
      url : "process/action2.php",
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

    // insert ajax request data
    // $("#submit").click(function(e){
    //     if ($("#formData")[0].checkValidity()) {
    //       e.preventDefault();
    //       $.ajax({
    //         url : "process/action2.php",
    //         type : "POST",
    //         data : $("#formData").serialize()+"&action=insert",
    //         success:function(response){
    //           Swal.fire({
    //             icon: 'success',
    //             title: 'Post added successfully',
    //           });
    //           $("#addModal").modal('hide');
    //           $("#formData")[0].reset();
    //           showAllCustomer();
    //         }
    //       });
    //     }
    // });

    //Edit Record
    $("body").on("click", ".editBtn", function(e){
      e.preventDefault();
      var editId = $(this).attr('id');
      $.ajax({
        url : "process/action2.php",
        type : "POST",
        data : {editId:editId},
        success:function(response){
          // alert(response);
          var data = JSON.parse(response);
          $("#edit-form-id").val(data.id);
          $("#name")        .val(data.title);
          $("#author")      .val(data.author);
          $("#post")        .val(data.post);
          $("#image")       .val(data.image);
        }
      });
    });


    //update ajax request data
    // $("#update").click(function(e){
    //   if ($("#EditformData")[0].checkValidity()) {
    //     e.preventDefault();
    //     $.ajax({
    //       url : "process/action2.php",
    //       type : "POST",
    //       data : $("#EditformData").serialize()+"&action=update",
    //       success:function(response){

    //         Swal.fire({
    //           icon: 'success',
    //           title: 'Post updated successfully',
    //         });
    //         $("#editModal").modal('hide');
    //         $("#EditformData")[0].reset();
    //         alert(response);

    //         showAllCustomer();
    //       }
    //     });
    //   }
    // });

    //Delete Record
    $("body").on("click", ".deleteBtn", function(e){
      e.preventDefault();
      var tr = $(this).closest('tr');
      var deleteBtn = $(this).attr('id');
      if (confirm('Are you sure want to delete this Record')) {
        $.ajax({
          url : "process/action2.php",
          type : "POST",
          data : {deleteBtn:deleteBtn},
          success:function(response){
            tr.css('background-color','#ff6565');
            Swal.fire({
              icon: 'success',
              title: 'Customer delete successfully',
            });
            showAllCustomer();
          }
        });
      }
    });
  }); 
</script>
</body>
</html>