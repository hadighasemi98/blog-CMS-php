<?php defined('SITE_URL')  or die('Permision Denied !');

 
  

#=====================Messages================================

function Messages($msg,$cssClass = 'info'){
    echo "<div class='$cssClass' style='padding: 20px; width: 80%; margin: 10px auto; background: #f9dede; border: 1px solid #cca4a4; color: #521717; border-radius: 5px; font-family: sans-serif;'>$msg</div>";
}

function AdminSuccessMessage($msg,$cssClass = 'success'){

    echo "<div class='$cssClass' style='padding: 20px;position: absolute;width:50%;margin: 45% 30%;background: #90df7c;border: 1px solid #234525;color: #521717;border-radius: 5px;font-family: sans-serif;'  >$msg</div>";
}
function AdminErrorMessage($msg,$cssClass = 'info'){

    echo "<div class='$cssClass' style='padding: 20px;position: absolute;width:50%;margin: 45% 30%;background: #f9dede;border: 1px solid #234525;color: #521717;border-radius: 5px;font-family: sans-serif;'  >$msg</div>";
}

function dd($var){
  echo "<pre style='color: #9c4100; background: #fff; z-index: 999; position: relative; padding: 10px; margin: 10px; border-radius: 5px; border-left: 3px solid #c56705;'>";
  var_dump($var);
  echo "</pre>";
}
#=====================Categories Function=======================



  function addCategories($nameCategories){

    // $nameCategories = $_POST["name"] ?? null;
    // $auther     = $_POST["creator"]    ?? null;
  
    global $pdo;
    $sql = "INSERT INTO categorise (name) VALUE( :nameCategories  )";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':nameCategories' => $nameCategories ]);
    return $stmt->rowCount();
    
  } 

  function displayRecord()
  {
    global $pdo ;
    

    $sql = "SELECT * FROM `categorise`  ";
    $query = $pdo->prepare($sql);
    $query->execute();
    $data = array();
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $data[] = $row;
      // $categoryName = $row["name"];
    }
    return $data;
    
  }

    function getRecordById($id)
    {
        global $pdo;

        $query = "SELECT * FROM`categorise`WHERE id = '$id'";
        $result = $pdo->query($query);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    
    
  function totalCategotyRowCount(){
    global $pdo;
    $sql = "SELECT * FROM `categorise` ";
    $stmt = $pdo->query($sql);
     $stmt->execute();
     $rowCount = $stmt->rowCount();
    return $rowCount;
  }



function deleteCategories($id){
  
    // $id = $_GET['id'] ?? null;
    global $pdo;
    $sql = "DELETE FROM `categorise` where id = $id ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
    
  } 

  // function updateCategories($name,$id){

  //   global $pdo;
  //   $sql = "UPDATE categorise SET name=$name  WHERE id =$id ";
  //   $stmt = $pdo->prepare($sql);
  //   $stmt->execute();
  //   return $stmt->rowCount();
    
  // } 
  function updateRecord($id, $name)
  {
    global $pdo;
    $sql = "UPDATE categorise SET name = '$name' WHERE id = '$id'";
    $stmt = $pdo->prepare($sql);
     $stmt->execute();
     return $stmt->rowCount();
  }

  #=====================Post Function=======================

  function addPost($image){

    global $pdo;

    $sql = "INSERT INTO posts (image) VALUE( $image)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    echo $stmt->rowCount();
    
  } 

  function get_home_Post(){
  
    global $pdo;
    
    $sql = "SELECT * FROM `posts` where categories_id = 260";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    

  } 

  function getPost(){
    global $pdo;
    
    $sql = "SELECT * FROM `posts` ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $data = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $data[] = $row;
    }
    return $data;
    
  } 

  function getRecordPostById($id)
  {
      global $pdo;

      $query = "SELECT * FROM`posts`WHERE id = '$id'";
      $result = $pdo->query($query);
      $row = $result->fetch(PDO::FETCH_ASSOC);
      return $row;
  }

  function getPostById($category){
    global $pdo;
    
    $sql = "SELECT * FROM `posts` WHERE categories_id = :category ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':category' => $category]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  } 


//get data for slider
  function getSlider(){
    global $pdo;
    
    $sql = "SELECT * FROM `posts` where id between 87 and 89 ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
  } 

  function totalPostsRowCount(){
    global $pdo;
    $sql = "SELECT * FROM `posts` ";
    $stmt = $pdo->prepare($sql);
     $stmt->execute();
     $rowCount = $stmt->rowCount();
    return $rowCount;
  }

  function deletePosts($id){
  
    global $pdo;
    $sql = "DELETE FROM `posts` where id = $id ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
    
  } 
  function updatePosts($title,$author,$post,$image,$id){

    global $pdo;
    $sql = "UPDATE `posts` SET title='$title ', author='$author' ,post='$post', image = '$image'  where id ='$id' ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
    
  } 
  function uploadImages($inputImage){

    $image  = $_FILES["$inputImage"]["name"] ;
    $tempname = $_FILES["$inputImage"]["tmp_name"];
    $folder = "blogger/assets/images/" . $image;
    move_uploaded_file($tempname, $folder);
}

// Delete Comments
function deleteComments($id){
  global $pdo ;

  $sql = "DELETE FROM comments WHERE id = '$id' ";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  return $stmt->rowCount();

}

#================Get POST With Ajax =================
  function getPostTableByAjax()
  {
    $output = "";
    
		$postRecord = getPost();
    
   if (totalPostsRowCount() > 0) {
       $output .="
            <div class='table-responsive'>
                  <table class='table table-striped table-sm'>
                    <thead class='thead-dark'>
                      <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>author</th>
                        <th>post</th>
                        <th>image</th>
                        <th>category</th>
                        <th>created_at</th>
                        <th>action</th>
                      </tr>
                </thead>
                <tbody>
                ";
            
          foreach ($postRecord as $post) {
                    $output.="
					      <tr>
			            <td>  $post[id] </td>
			            <td>".$post['title']."</td>
			            <td>".$post['author']."</td>
			            <td>".$post['post']."</td>
						      <td>".$post['image']."</td>
						      <td> ".$post['categories_id']." </td>
			            <td>".$post['created_at']."</td>
			            <td>
			              <a href='#editModal' style='color:green' data-toggle='modal' 
			              class='editBtn' id='".$post['id']."'><i class='fa fa-pencil'></i></a>&nbsp;
			              <a href='' style='color:red' class='deleteBtn' id='".$post['id']."'>
			              <i class='fa fa-trash' ></i></a>
			            </td>
			        </tr>";
                }
            
          $output .= "</tbody>
			   </table>
			   </div>";
                echo $output ;
            }
  }

#================Get Categories With Ajax =================
function getCategoryTableByAjax()
{
    $output = "";

    $CategoryRecord = displayRecord();
    $admin = getAdmin();

    if (totalCategotyRowCount() > 0) {
        $output .="
			
			<table class='table table-hover table-striped'>
			  <thead class='thead-dark'>
				      <tr>
			            <th>Id</th>
			            <th>Name</th>
			            <th>user_id</th>
			            <th>created_at</th>
		            <th>action</th>
			          </tr>
			        </thead>
			        <tbody>";
        foreach ($CategoryRecord as $Category) {
            $output.="
					<tr>
			            <td>  $Category[id]  </td>
			            <td>  $Category[name] </td>
			            <td>  $admin->user_name </td>
			            <td>  $Category[created_at] </td>						
						<td>
						<a href='#editModal' style='color:green' data-toggle='modal' 
						  class='editBtn' id='".$Category['id']."'><i class='fa fa-pencil'></i></a>&nbsp;
						  
						<a href='' style='color:red' class='deleteBtn' id=' $Category[id]'>
						<i class='fa fa-trash' ></i></a>
			              
			            </td>
			        </tr>";
        }
        $output .= "</tbody>
			  </table>";
        echo $output ;
    } else {
        echo '<h3 class="text-center mt-5">No records found</h3>';
    }
}

#================Get Comments With Ajax ================================

function getCommentsTableByAjax()
  {
    $output = "";
    
		$commentRecord = getComment();
    
       $output .="
            <div class='table-responsive'>
                  <table class='table table-striped table-sm'>
                    <thead class='thead-dark'>
                      <tr>
                        <th>Id</th>
                        <th>full_name</th>
                        <th>email</th>
                        <th>subject</th>
                        <th>message</th>
                        <th>post_id</th>
                        <th>created_at</th>
                        <th>action</th>
                      </tr>
                </thead>
                <tbody>
                ";
            
          foreach ($commentRecord as $comment) {
                    $output.="
					      <tr>
			            <td>  $comment[id] </td>
			            <td>".$comment['full_name']."</td>
			            <td>".$comment['email']."</td>
			            <td>".$comment['subject']."</td>
						      <td>".$comment['message']."</td>
						      <td>".$comment['post_id']." </td>
			            <td>".$comment['created_at']."</td>
			            <td>
			              <a href='' style='color:red' class='deleteBtn' id='".$comment['id']."'>
			              <i class='fa fa-trash' ></i></a>
			            </td>
			        </tr>";
                }
            
          $output .= "</tbody>
			   </table>
			   </div>";
                echo $output ;
            
  }
