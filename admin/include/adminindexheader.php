<?php 
    include '../include/congif.php';
    if(!isset($_SESSION['username']))
    {
      header('location: adminlogin.php?msgadmin=You Are Not Admin..<br/> Else Login first!!!!!');
    } 
?> 
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- <title> Admin Index</title> -->

    <!-- Bootstrap Core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

     <link href="<?php echo $url; ?>/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo $url; ?>/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    <!-- Custom Fonts -->
    <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    


<style type="text/css">
.logo{
        background-color: #367fa9;
        color: #fff;
        border-bottom: 0 solid transparent;
        float: left;
        height: 50px;
        background: #357ca5;
        outline: 0;
        display: block;
        font-size: 20px;
        line-height: 50px;
        text-align: center;
        width: 230px;
        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
        padding: 0 15px;
        font-weight: 300;
}
</style>
</head>

	<body>
    <div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" style="background-color: #3c8dbc;" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="logo" href="<?php echo $url; ?>/index.php">FRUIT Bazar</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown" >
                    <a class="dropdown-toggle" data-toggle="dropdown" style="color: lightblue;" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                               
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                               
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
            
            
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" style="color: lightblue;" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="index.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li><a href="<?php echo $url ?>/admin/adminlogout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
 
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu" >
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="tables.php"><i class="fa fa-table fa-fw"></i>Item list</a>
                        </li>
                        <li>
                            <a href="form.php"><i class="fa fa-edit fa-fw"></i>Add New Item</a>
                        </li>
                        <li>
                                <a href="<?php echo $url; ?>admin/deleteditem.php"><i class="fa fa-trash-o"></i>Show deleted items</a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i>Admin Guide<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                
                                <li>
                                    <a href="guid.php">Content Info</a>
                                </li>
                                <li>
                                    <a href="webhandler.php">Super Admin info</a>
                                </li>
                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>  
        <div id="page-wrapper">