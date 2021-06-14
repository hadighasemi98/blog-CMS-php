<?php
	include "../bootstrap/init.php";

	// View record
    if (isset($_POST['action']) && $_POST['action'] == "view") {
		
        getCommentsTableByAjax();
                
    }
    
	

# Delete Data

if (isset($_POST['deleteBtn']) ) {

	$id = $_POST['deleteBtn'] ;

	deleteComments($id);

}	