<?php 

include "bootstrap/init.php";

if(!isLoggedInUser()){
    $auth = "auth.php";
    header("Location:" . site_url('auth.php'));
}




if (isset($_POST['upload'])) {
    
    $filename    = $_FILES["uploadfile"]["name"];
    $post        = $_POST['post']    ?? null  ;
    $title       = $_POST['title']   ?? null  ;
    $author      = $_POST['author']  ?? null  ;
    $category_id = $_GET['categories_id'] ?? null  ;
        
    $sql = "INSERT INTO posts (title,author,post,image,categories_id,user_id) 
                VALUES ('$title','$author','$post','$filename','$category_id',4)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    // $stmt->rowCount();
    uploadImages("uploadfile");
}




if (isset($_POST['upSub'])) {
    $title  = $_POST ['upname']   ;
    $author = $_POST ['upauther'] ;
    $post 	= $_POST ['uppost']   ;
    $image  = $_FILES["updatefile"]["name"] ;
    $id 	= $_POST ['upid'] ;

    updatePosts($title, $author, $post, $image, $id);
    uploadImages("updatefile");
    
}
    


include "tpl/tpl-AddNewPost.php"; 