<?php
	include "../bootstrap/init.php";

	// View record
    if (isset($_POST['action']) && $_POST['action'] == "view") {
		
        getPostTableByAjax();
                
    }
    
// Get Record In Input
	if (isset($_POST['editId'])) {
		$editId = $_POST['editId'];
		$row = getRecordPostById($editId);
		echo json_encode($row);
	}

# Update Data with Ajax

// if (isset($_POST['action']) && $_POST['action'] == 'update') {
	
//         $title  = $_POST ['upname']   ;
//         $author = $_POST ['upauther'] ;
//         $post 	= $_POST ['uppost']   ;
//         $image  = $_FILES["updatefile"]["name"] ;
//         $id 	= $_POST ['upid'] ;

// 		updatePosts($title, $author, $post, $image, $id);

// 		$tempname = $_FILES["uploadfile"]["tmp_name"];    
// 		$folder = "blogger/assets/images/" . $image;
// 		move_uploaded_file($tempname, $folder);            

// }	

# Delete Data

if (isset($_POST['deleteBtn']) ) {

	$id = $_POST['deleteBtn'] ;

	deletePosts($id);

}	