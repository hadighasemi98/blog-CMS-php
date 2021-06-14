<?php defined('SITE_URL')  or die('Permision Denied !');

function headerTpl($page){
  $admin    = getAdmin();
  $site     = site_url();
  $sign_out =  site_url('?action=signout');

  echo "
  
  <html lang='en'>
    <head>
      <meta charset='utf-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1'>
      <meta name='description' content=''>
      <!-- <meta name='author' content='Mark Otto, Jacob Thornton, and Bootstrap contributors'> -->
      <!-- <meta name='generator' content='Hugo 0.82.0'> -->
      <title> $page </title>
      
      <!-- Bootstrap core CSS -->
      <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>

    <link href='vendor/fontawesome-free/css/all.min.css' rel='stylesheet' type='text/css'>
    <link rel='stylesheet' href='https://pro.fontawesome.com/releases/v5.10.0/css/all.css'/>
    <link rel='stylesheet' type='text/css' href='https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css'/>

    <link rel='stylesheet' href='https://pro.fontawesome.com/releases/v5.10.0/css/all.css'/>

  
  
  
      <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }
  
       
      </style>
  

      <!-- Custom styles for this template -->
      <link href='assets/css/style.css' rel='stylesheet'>
      <link href='assets/css/addNew.css' rel='stylesheet'>

    </head>
    <body style='
    background-color: fff;
'>
      
  <header class='navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow'>
    <a class='navbar-brand col-md-3 col-lg-2 me-0 px-3' href='$site'>Admin Panel</a>
    <button class='navbar-toggler position-absolute d-md-none collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#sidebarMenu' aria-controls='sidebarMenu' aria-expanded='false' aria-label='Toggle navigation'>
      <span class='navbar-toggler-icon'></span>
    </button>
    <input class='form-control form-control-dark w-50' type='text' placeholder='Search' aria-label='Search'>
  

  <!-- Nav Item - User Information -->
    <li class='nav-item dropdown no-arrow'>
        <a class='nav-link dropdown-toggle' href='#' id='userDropdown' role='button'
            data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
            <span class='mr-2 d-none d-lg-inline text-gray-600 small'> $admin->full_name </span>
            <i class='fas fa-user fa-sm fa-fw mr-2 text-gray-400'></i>
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

            <a class='nav-link' name='signOut' href= $sign_out >
                <i class='fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400'></i>
                Logout
            </a>
        </div>
    </li>
  </header>
  
  
  
  ";
  }

  // get number of column of tables
  function getCountTables($table){
    global $pdo;

    $sql = "SELECT count(*)  FROM `$table`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetchColumn();
    return $record;
    }

  function getInfoTables($table){
    global $pdo;

    $sql = "SELECT *  FROM `$table`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $record[0] ?? null;
    }

    