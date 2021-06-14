<?php

include "../bootstrap/init.php";


if (isset($_POST['action']) && $_POST['action'] == "view") {
    $output = "";

    $get_user = getUsers();

        $output .="
        <div class='table-responsive'>
          <table class='table table-striped table-sm'>
                <thead class='thead-dark'>
                  <tr>
                    <th>Id</th>
                    <th>FullName</th>
                    <th>Email</th>
                    <th>Avatar</th>
                    <th>Created_At</th>
                    <th>is_active</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                ";
        foreach ($get_user as $user) {
            $output.="
                <tr>
                    <td>".$user['id']."</td>
                    <td>".$user['fullName']."</td>
                    <td>".$user['emailAddress']."</td>
                    <td>".$user['Avatar']."</td>                    
                    <td>".$user['created_at']."</td>
                    <td>".$user['is_active']."</td>                    
                    <td>
                      <a href='#editModal' style='color:green' data-toggle='modal' 
                      class='editBtn' id='".$user['id']."'><i class='fa fa-pencil'></i></a>&nbsp;
                      <a href='' style='color:red' class='deleteBtn' id='".$user['id']."'>
                      <i class='fa fa-trash' ></i></a>
                    </td>
                </tr>";
        }
        $output .= "</tbody>
          </table>
          </div>";
        echo $output ;
    
}

// if (isset($_POST['action']) && $_POST['action'] == "insert") {
  
//     $user_name = $_POST['fullName'];
//     $email     = $_POST['emailAddress'];
//     $password  = $_POST['password'];
//     $Avatar   = $_FILES["Avatar"]["name"] ?? null;

//     register($user_name, $password, $email, $Avatar);
// }   




    if (isset($_POST['deleteBtn'])) {

      $id = $_POST['deleteBtn'] ?? null;
      deleteUser($id);

    }

    if (isset($_POST['editId'])) {

      $id = $_POST['editId'] ?? null;
      $row = getUserById($id);
      echo json_encode($row);
    }

    