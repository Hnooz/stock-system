<?php require_once 'includes/header.php'; ?>

<?php 
$user_id = $_SESSION['userId'];
$sql = "SELECT * FROM users WHERE user_id = {$user_id}";
$query = $connect->query($sql);
$result = $query->fetch_assoc();

$connect->close();
?>

<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
		  <li><a href="dashboard.php">الصفحة الرئيسيه</a></li>		  
		  <li class="active">الاعدادت</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-wrench"></i> الاعدادات</div>
			</div> <!-- /panel-heading -->

			<div class="panel-body">

				

				<form action="php_action/changeUsername.php" method="post" class="form-horizontal" id="changeUsernameForm">
					<fieldset>
						<legend>تغير اسم المستخدم</legend>

						<div class="changeUsenrameMessages"></div>			

						<div class="form-group">
					    
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="username" name="username" placeholder="Usename" value="<?php echo $result['username']; ?>"/>
					    </div>
						<label for="username" class="col-sm-2 control-label">اسم المسخدم</label>
					  </div>

					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					    	<input type="hidden" name="user_id" id="user_id" value="<?php echo $result['user_id'] ?>" /> 
					      <button type="submit" class="btn btn-success" data-loading-text="Loading..." id="changeUsernameBtn"> <i class="glyphicon glyphicon-ok-sign"></i> حفظ  </button>
					    </div>
					  </div>
					</fieldset>
				</form>

				<form action="php_action/changePassword.php" method="post" class="form-horizontal" id="changePasswordForm">
					<fieldset>
						<legend>تغير كلمة السر</legend>

						<div class="changePasswordMessages"></div>

						<div class="form-group">
					    
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="password" name="password" placeholder="إنشاء كلمة سر">
					    </div>
						<label for="password" class="col-sm-2 control-label">انشاء كلمة مرور</label>
					  </div>

					  <div class="form-group">
					   
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="npassword" name="npassword" placeholder="كلمة سر جديدة">
					    </div>
						 <label for="npassword" class="col-sm-2 control-label">كلمة سر جديدة </label>
					  </div>

					  <div class="form-group">
					   
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="تأكيد كلمة السر">
					    </div>
						 <label for="cpassword" class="col-sm-2 control-label">تأكيد كلمة السر</label>
					  </div>

					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					    	<input type="hidden" name="user_id" id="user_id" value="<?php echo $result['user_id'] ?>" /> 
					      <button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-ok-sign"></i> حفظ</button>
					      
					    </div>
					  </div>


					</fieldset>
				</form>

			</div> <!-- /panel-body -->		

		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->	
</div> <!-- /row-->


<script src="custom/js/setting.js"></script>
<?php require_once 'includes/footer.php'; ?>