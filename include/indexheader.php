<?php include 'congif.php';?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo $url; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo $url; ?>/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo $url; ?>/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="<?php echo $url; ?>js/script.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <style>
* {
  box-sizing: border-box;

}

.column {

  padding: 25px;
  float: right;
  width:30%;
  border:0;
}

/* Clearfix (clear floats) */
.row::after {
  padding: 20px;
  content: "";
  clear: both;
  display: table;
}
#imgpad{
      /*margin-left:65px; */
      width:170px;
      height:170px;
    }
</style>
  </head>
  <body class="skin-blue">
    <!-- Site wrapper -->
    <div class="wrapper">
      
      <header class="main-header">
        <a href="<?php echo $url;?>index.php" class="logo"><b>FRUIT </b>Bazar</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
         <!-- (edit1)  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>  -->
         <div class="navbar-custom-menu">
            <button type="button" id="regbutton" onclick="window.location.href='<?php echo $url;?>register.php'"   class="logo">Register
            </button>

            <button type="button" onclick="window.location.href='<?php echo $url; ?>login.php'"  class="logo">Login
            </button>
            <button type="button" onclick="window.location.href='<?php echo $url; ?>/admin/adminlogin.php'"  class="logo">Admin</button>
          </div>
        </nav>

 </header>
</div>

<div>
  
