<?php 
require_once 'php_action/db_connect.php';
session_start();

if(isset($_SESSION['userId'])) {
	header('location: http://localhost/stock_system/dashboard.php');	
}

$errors = array();

if($_POST) {		

	$username = $_POST['username'];
	$password = $_POST['password'];

	if(empty($username) || empty($password)) {
		if($username == "") {
			$errors[] = "Username is required";
		} 

		if($password == "") {
			$errors[] = "Password is required";
		}
	} else {
		$sql = "SELECT * FROM users WHERE username = '$username'";
		$result = $connect->query($sql);

		if($result->num_rows == 1) {
			$password = md5($password);
			// exists
			$mainSql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
			$mainResult = $connect->query($mainSql);

			if($mainResult->num_rows == 1) {
				$value = $mainResult->fetch_assoc();
				$user_id = $value['user_id'];

				// set session
				$_SESSION['userId'] = $user_id;

				header('location: http://localhost/stock_system/dashboard.php');	
			} else{
				
				$errors[] = "Incorrect username/password combination";
			} // /else
		} else {		
			$errors[] = "Username doesnot exists";		
		} // /else
	} // /else not empty username // password
	
} // /if $_POST
?>
 <!DOCTYPE html>
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

  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>
 </head>
<body dir="rtl" lang="ar">
 <div class="container">
		<div class="row vertical">
			<div class="col-md-5 col-md-offset-4">
			<div class="panel panel-info">
							<div class="panel-heading">
						<h3 class="panel-title">الرجاء تسجيل الدخول</h3>
					</div>
      <div class="panel-body">
    			<div class="messages">
							<?php if($errors) {
								foreach ($errors as $key => $value) {
									echo '<div class="alert alert-warning" role="alert">
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									'.$value.'</div>';										
									}
								} ?>
						</div>

						<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="loginForm" dir="rtl" lang="ar">
							<fieldset>
							  <div class="form-group">
									<label for="username" class="col-sm-2 control-label" dir="rtl" lang="ar"></label>
									<div class="col-sm-10">
									  <input type="text" class="form-control" id="username" name="username" placeholder="اسم المستخدم" autocomplete="off"  dir="rtl" lang="ar"/>
									</div>
								</div>
								<div class="form-group">
									<label for="password" class="col-sm-2 control-label" dir="rtl" lang="ar"></label>
									<div class="col-sm-10">
									  <input type="password" class="form-control" id="password" name="password" placeholder="كلمة المرور" autocomplete="off" dir="rtl" lang="ar"/>
									</div>
								</div>								
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
									  <button type="submit" class="btn btn-default" dir="rtl" lang="ar"> <i class="glyphicon glyphicon-log-in" dir="rtl" lang="ar"></i> تسجيل</button>
									</div>
								</div>
							</fieldset>
						</form>
       </div>
     </div>
				</div>
			</div>
		</div>
	</div>
 </body>
</html>