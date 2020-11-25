<?php
session_start();
require_once 'php_action/core.php';
 include 'functions.php';
  include 'php_action/db_connect.php';
  $user_id = $_SESSION['userId'];
  $sql = "SELECT * FROM permission WHERE user_id = {$user_id}";
  $query = $connect->query($sql);
  $result = $query->fetch_assoc();
?>

</DOCTYPE html>
<html dir="rtl" lang="ar">
    <head>
     	<title>Stock Management System</title>
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">	
 <!-- datatabels -->
   <link rel="stylesheet" href="assests/plugins/datatables/datatables.min.css">
  <!-- faile input -->
   <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">
  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body dir="rtl" lang="ar">
        
        <nav class="navbar navbar-default" dir="rtl" lang="ar">
  <div class="container-fluid" dir="rtl" lang="ar">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class=" nav navbar-nav navbar-right">
		
		
		
         <li id="navReport"><a href="report.php"><i class="glyphicon glyphicon-check"></i> التقارير </a></li>
		 
		 
		   <li class="dropdown" id="navUser">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			<i class="fa fa-users"></i>المستخدمين <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li id="topNavAddOrder"><a href="cearetuser.php"><i class="glyphicon glyphicon-plus"></i> إضافة مستخدم </a></li>
             <li id="navReport"><a href="Users.php"> <i class="glyphicon glyphicon-edit"></i> إدارة المستخدمين </a></li>
          </ul>
        </li>
		 
		 
		   <li class="dropdown" id="navGroups">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			<i class="fa fa-files-o"></i>المجموعات  <span class="caret"></span></a>
          <ul class="dropdown-menu">
			  <li id="navReport"><a href="groups.php"> <i class="glyphicon glyphicon-plus"></i> اضافة مجموعه  </a></li> 
             <li id="navReport"><a href="cearetgroups.php"> <i class="glyphicon glyphicon-edit"></i> إدارة المجموعة  </a></li>
          </ul>
        </li>
		 
		
		 
        <li class="dropdown" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			<i class="glyphicon glyphicon-shopping-cart"></i>الطلبات <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li id="topNavAddOrder"><a href="orders.php?o=add"><i class="glyphicon glyphicon-plus"></i>اضافة طلب </a></li>
            <li id="topNavManageOrder"><a href="orders.php?o=manord"><i class="glyphicon glyphicon-edit"></i>ادرة الطلب</a></li>
          </ul>
        </li>
          <li id="navProduct"><a href="product.php"> <i class="glyphicon glyphicon-ruble"></i> المنتجات </a></li>  
         <li id="navCategories"><a href="Categories.php"><i class="glyphicon glyphicon-th-list"></i> الاصناف </a></li>
		
            <li id="navBrand"><a href="brand.php"><i class="glyphicon glyphicon-btc"></i>   الشركات</a></li>
          <li id="navDashboard"><a href="index.php"><i class="glyphicon glyphicon-list-alt"></i> لوحة التحكم</a></li>
        
      </ul>
     
      <ul class="nav navbar-nav " id="navSetting">
      
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
             aria-expanded="false"><i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li id="topNavSetting"><a href="setting.php"><i class="glyphicon glyphicon-wrench"></i>الاعدادات</a></li>
            <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i>تسجيل خروج</a></li>
          
          </ul>
        </li>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
        <div class="container">
