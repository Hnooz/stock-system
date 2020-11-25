<?php 
require_once 'includes/header.php';
?>
<meta charset="UTF-8">
<div class="row" dir="rtl" lang="ar">
    <div class="col-md-12" dir="rtl" lang="ar">
        <ol class="breadcrumb" dir="rtl" lang="ar">
            <li dir="rtl" lang="ar"><a href="dashboard.php">الصفحة الرئيسيه</a></li>
            <li dir="rtl" lang="ar" class="active"> الشركات</li>
        </ol>
        
        <div class="panel panel-default" dir="rtl" lang="ar">
			
	 <div class="div-action pull pull-left" style="padding-bottom:50px;  margin-left:20px;margin-top: 15px; height: 70px;">
	<button class="btn btn-info button1" data-toggle="modal" data-target="#addBrandModel"> <i class="glyphicon glyphicon-plus-sign"></i> إضافة</button>
				</div> <!-- /div-action -->
       <div class="panel-heading" dir="rtl" lang="ar" style="height: 70px; font-size: larger;"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;إدارة الشركات</div>
	   
     <div class="panel-body" dir="rtl" lang="ar">
		
        <div class="remove-messages" dir="rtl" lang="ar"></div>
                <table  id="manageBrandTable" class="table table-bordered table-striped" >
					<thead>
						<tr>
                            <th style="text-align: right;">إسم الشركة</th>
							<th style="text-align: right;">الحالة </th>
							<th style="text-align: right; width: 15%;">الخيارات</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->

<div class="modal fade" id="addBrandModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="submitBrandForm" action="php_action/createBrand.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i>  إضافة</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-brand-messages"></div>

	        <div class="form-group">
	    
				    <div class="col-sm-8">
		<input type="text" class="form-control" id="brandName" placeholder="إسم الشركة" name="brandName" autocomplete="off">
				    </div>
					<label for="brandName" class="col-sm-3 control-label" > إسم الشركة</label>
	        </div> <!-- /form-group-->	         	        
	        <div class="form-group">
	        	
				    <div class="col-sm-8">
				      <select class="form-control" id="brandStatus" name="brandStatus">
				
      	<option value="">~~إختيار~~</option>
				      	<option value="1">متاح</option>
				      	<option value="2">غير متاح</option>
				      </select>
				    </div>
					<label for="brandStatus" class="col-sm-3 control-label" style="text-align: right;">الحاله </label>
	        </div> <!-- /form-group-->	         	        

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
	        
	        <button type="submit" class="btn btn-primary" id="createBrandBtn" data-loading-text="Loading..." autocomplete="off">إضافة</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / add modal -->

<!-- edit brand -->
<div class="modal fade" id="editBrandModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="editBrandForm" action="php_action/editBrand.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i>إضافة الشركات</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="edit-brand-messages"></div>

	      	<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
					</div>

		      <div class="edit-brand-result">
		      	<div class="form-group">
		        
		        	<label class="col-sm-1 control-label"> </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="editBrandName" placeholder="اسم الشركة" name="editBrandName" autocomplete="off">
					    </div>
							<label for="editBrandName" class="col-sm-3 control-label">إسم الشركة </label>
		        </div> <!-- /form-group-->	         	        
		        <div class="form-group">
		        	
		        	<label class="col-sm-1 control-label">  </label>
					    <div class="col-sm-8">
					      <select class="form-control" id="editBrandStatus" name="editBrandStatus">
					      	<option value="">~~إختيار~~</option>
					      	<option value="1">متوفر</option>
					      	<option value="2">غير متوفر</option>
					      </select>
					    </div>
						<label for="editBrandStatus" class="col-sm-3 control-label">الحالة</label>
		        </div> <!-- /form-group-->	
		      </div>         	        
		      <!-- /edit brand result -->

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer editBrandFooter">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i>إغلاق</button>
	        
	        <button type="submit" class="btn btn-success" id="editBrandBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> تعديل</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / add modal -->
<!-- /edit brand -->

<!-- remove brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> حذف العلامة التجاريه</h4>
      </div>
      <div class="modal-body">
        <p>هل انت متأكد من عملية الحذف</p>
      </div>
      <div class="modal-footer removeBrandFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> إغلاق</button>
        <button type="button" class="btn btn-primary" id="removeBrandBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> حذف</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove brand -->

<script src="custom/js/brand.js"></script>
				
      </div>
    </div>
    </div> <!--col-md-12-->
</div><!--row-->

<?php
require_once 'includes/footer.php';
?>