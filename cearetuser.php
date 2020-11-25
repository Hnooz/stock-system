<?php 
require_once 'includes/header.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسيه</a></li>
        <li class="active">المستخدمين</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">أضافة مستخدمين</h3>
            </div>
            <form role="form" action="cearetuser.php" method="post">
              <div class="box-body">

             

                <div class="form-group">
                  <label for="groups">المجموعات </label>
                  <select class="form-control" id="groups" name="groups">
                    <option value="">إختيار مجموعة</option>
                    
                      <option> </option>
                    
                  </select>
                </div>

                <div class="form-group">
                  <label for="username">إسم المستخدم</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="اسم المستخدم" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="email">الإيميل</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="الإيميل" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="password">كلمة المرور</label>
                  <input type="text" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="cpassword">تأكيد كلمة المرور</label>
                  <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="fname">الاسم الاول</label>
                  <input type="text" class="form-control" id="fname" name="fname" placeholder="الاسم الاول" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="lname">الاسم الاخير</label>
                  <input type="text" class="form-control" id="lname" name="lname" placeholder="الاسم الاخير" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="phone">الهاتف</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="رقم الهاتف" autocomplete="off">
                </div>

                
                  </div>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary"> حفظ </button>
                <a href="Users.php" class="btn btn-warning">رجوع</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function() {
    $("#groups").select2();

    $("#mainUserNav").addClass('active');
    $("#createUserNav").addClass('active');
  
  });
</script>

<?php
require_once 'includes/footer.php';
?>