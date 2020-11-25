<?php 
require_once 'includes/header.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> الرئيسيه</a></li>
        <li class="active">المجموعات</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">



            <a href=" groups.php" class="btn btn-primary">إضافة مجموعة</a>
            <br /> <br />
          

          <div class="box">
            <div class="box-header">
              <h4 class="box-title">إدارة المجموعة</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="groupTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align: right;">إسم المجموعه</th>
                
                    <th style="text-align: right;">الخيارات</th>
                </tr>
                </thead>
                <tbody>
        
                      <tr>
                        <td></td>

                    
                        <td>

                          <a href="" class="btn btn-default"><i class="fa fa-edit"></i></a>  

                          <a href="" class="btn btn-default"><i class="fa fa-trash"></i></a>
                        
                        </td>
                       
                      </tr>
                
                </tbody>
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
      $('#groupTable').DataTable();

      $("#mainGroupNav").addClass('active');
      $("#manageGroupNav").addClass('active');
    });
  </script>



<?php
require_once 'includes/footer.php';
?>