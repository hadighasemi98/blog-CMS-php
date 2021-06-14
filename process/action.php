<?php
	include "../bootstrap/init.php";


	// View record
    if (isset($_POST['action']) && $_POST['action'] == "view") {
        getCategoryTableByAjax();
	}
	
	// Insert Record	
	if (isset($_POST['action']) && $_POST['action'] == "insert") {

		$name = $_POST['name'];
		
		addCategories($name);
	}

	// Edit Record	
	if (isset($_POST['editId'])) {
		$editId = $_POST['editId'];
		$row = getRecordById($editId);
		echo json_encode($row);
	}


	// Update Record
	if (isset($_POST['action']) && $_POST['action'] == "update") {
		$id = $_POST['id'];
		$name = $_POST['upName'];
		
		updateRecord($id, $name);
	}


	// Delete Record	
	if (isset($_POST['deleteBtn'])) {
		$deleteBtn = $_POST['deleteBtn'];
		deleteCategories($deleteBtn);
	}


	// Export to excel
	if (isset($_GET['export']) && $_GET['export'] == 'excel') {

		header("Content-type: application/vnd.ms-excel; name='excel'");
		header("Content-Disposition: attachment; filename=customers.xls");
		header("Pragma: no-cache");
		header("Expires: 0");

		$exportData = displayRecord();

		echo'<table border="1">
			<tr style="font-weight:bold">
			    <td>Id</td>
			    <td>Name</td>
			    <td>Email</td>
			    <td>Username</td>
			    <td>Dob</td>
			</tr>';
		foreach ($exportData as $export) {
		echo'<tr>
			<td>'.$export['id'].'</td>
			<td>'.$export['name'].'</td>
			<td>'.$export['user_id'].'</td>
			<td>'.$export['created_at'].'</td>
		     </tr>';
			}		
		echo '</table>';
	}
