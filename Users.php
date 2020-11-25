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
              <h4 class="box-title"> <i class="glyphicon glyphicon-edit"></i> إدارة المستخدمين</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="userTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align: right;">اسم المستخدم</th>
                  <th style="text-align: right;">الإيميل</th>
                  <th style="text-align: right;">الاسم</th>
                  <th style="text-align: right;">الهاتف</th>
                  <th style="text-align: right;">المجموعات</th>
				  <th style="width:15%; text-align: right;"">الخيارات</th>

                 
                </tr>
                </thead>
              </table>
            </div>
            <!-- /.box-body -->
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
      $('#userTable').DataTable();

      $("#mainUserNav").addClass('active');
      $("#manageUserNav").addClass('active');
    });
  </script>


<?php
require_once 'includes/footer.php';
?>
