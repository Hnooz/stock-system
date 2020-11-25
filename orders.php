<?php 
require_once 'php_action/db_connect.php'; 
require_once 'includes/header.php'; 

if($_GET['o'] == 'add') { 
// add order
	echo "<div class='div-request div-hide'>add</div>";
} else if($_GET['o'] == 'manord') { 
	echo "<div class='div-request div-hide'>manord</div>";
} else if($_GET['o'] == 'editOrd') { 
	echo "<div class='div-request div-hide'>editOrd</div>";
} // /else manage order


?>

<ol class="breadcrumb">
  <li><a href="dashboard.php">الرئسية</a></li>
  <li>الطلبات</li>
  <li class="active">
  	<?php if($_GET['o'] == 'add') { ?>
  		اضافة طلب 
		<?php } else if($_GET['o'] == 'manord') { ?>
			ادارة الطلبات
		<?php } // /else manage order ?>
  </li>
</ol>


<h4>
	<i class='glyphicon glyphicon-circle-arrow-right'></i>
	<?php if($_GET['o'] == 'add') {
		echo "اضافة ";
	} else if($_GET['o'] == 'manord') { 
		echo " ادارة الطلب";
	} else if($_GET['o'] == 'editOrd') { 
		echo "تعديل الطلب ";
	}
?>	
</h4>



<div class="panel panel-default">
	<div class="panel-heading">

		<?php if($_GET['o'] == 'add') { ?>
  		<i class="glyphicon glyphicon-plus-sign"></i>	اضافة طلب
		<?php } else if($_GET['o'] == 'manord') { ?>
			<i class="glyphicon glyphicon-edit"></i>  ادارة الطلبات
		<?php } else if($_GET['o'] == 'editOrd') { ?>
			<i class="glyphicon glyphicon-edit"></i>  تعديل الطلب
		<?php } ?>

	</div> <!--/panel-->	
	<div class="panel-body">
			
		<?php if($_GET['o'] == 'add') { 
			// add order
			?>			

			<div class="success-messages"></div> <!--/success-messages-->

  		<form class="form-horizontal" method="POST" action="php_action/createOrder.php" id="createOrderForm">

			  <div class="form-group">
	
			    <div class="col-sm-10">
			      <input type="text"  class="form-control" id="orderDate" name="orderDate" autocomplete="off" />
			    </div>
                  		    <label for="orderDate" class="col-sm-2 control-label">تاريخ الطلب </label>
			  </div> <!--/form-group-->
			  <div class="form-group">
			 
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="clientName" name="clientName" placeholder="اسم العميل" autocomplete="off" />
			    </div>
                     <label for="clientName" class="col-sm-2 control-label"> اسم العميل</label>
          </div> <!--/form-group-->
			  <div class="form-group">
			  
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="clientContact" name="clientContact" placeholder="رقم العميل " autocomplete="off" />
			    </div>
                    <label for="clientContact" class="col-sm-2 control-label"> رقم العميل</label>
			  </div> <!--/form-group-->			  

			  <table dir="rtl" class="table" id="productTable">
			  	<thead>
			  		<tr>			  			
			  			<th style="width:15%; text-align: right;">المنتج</th>
			  			<th style="width:15%;text-align: right;">السعر</th>
			  			<th style="text-align: right;">الكمية</th>			  			
			  			<th style="text-align: right;">السعر الكلي</th>			  			
			  			<th style="text-align: right;"></th>
			  		</tr>
			  	</thead>
			  	<tbody>
			  		<?php
			  		$arrayNumber = 0;
			  		for($x = 1; $x < 4; $x++) { ?>
			  			<tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">			  				
			  				<td style="margin-right:20px;">
			  					<div class="form-group">

			  					<select class="form-control" name="productName[]" id="productName<?php echo $x; ?>" onchange="getProductData(<?php echo $x; ?>)" >
                                        <option value="">~~اختيار~~</option>
			  						<?php
			  							$productSql = "SELECT * FROM product WHERE active = 1 AND status = 1 AND quantity != 0";
			  							$productData = $connect->query($productSql);

			  							while($row = $productData->fetch_array()) {									 		
			  								echo "<option value='".$row['product_id']."' id='changeProduct".$row['product_id']."'>".$row['product_name']."</option>";
										 	} // /while 

			  						?>
		  						</select>
			  					</div>
			 </td>
			  				<td style="padding-right:20px;">			  					
			  			<input type="text" name="rate[]" id="rate<?php echo $x; ?>" autocomplete="off" disabled="true" class="form-control" />			  					
			    	<input type="hidden" name="rateValue[]" id="rateValue<?php echo $x; ?>" autocomplete="off" class="form-control" />			  					
			  				</td>
			  				<td style="padding-right:20px;">
			  					<div class="form-group">
			  					<input type="number" name="quantity[]" id="quantity<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
			  					</div>
			  				</td>
			  				<td style="padding-right:20px;">			  					
			  					<input type="text" name="total[]" id="total<?php echo $x; ?>" autocomplete="off" class="form-control" disabled="true" />			  					
			  					<input type="hidden" name="totalValue[]" id="totalValue<?php echo $x; ?>" autocomplete="off" class="form-control" />			  					
			  				</td>
			  				<td>

			  					<button class="btn btn-default removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow(<?php echo $x; ?>)"><i class="glyphicon glyphicon-trash"></i></button>
			  				</td>
			  			</tr>
		  			<?php
		  			$arrayNumber++;
			  		} // /for
			  		?>
			  	</tbody>			  	
			  </table>

		
            
			  <div  class="col-md-6">
			  	<div class="form-group">
			
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="paid" name="paid" autocomplete="off" onkeyup="paidAmount()" />
				    </div>
                    	    <label for="paid" class="col-sm-3 control-label">المبلغ المدفوع</label>
				  </div> <!--/form-group-->			  
				  <div class="form-group">
				   
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="due" name="due" disabled="true" />
				      <input type="hidden" class="form-control" id="dueValue" name="dueValue" />
				    </div>
                       <label for="due" class="col-sm-3 control-label">المبلغ المستحق</label>
				  </div> <!--/form-group-->		
				  <div class="form-group">
				  
				    <div class="col-sm-9">
				      <select class="form-control" name="paymentType" id="paymentType">
				      	<option value="">~~اختيار~~</option>
				      	<option value="1">شيك</option>
				      	<option value="2">كاش</option>
				      	<option value="3"> بطاقة ائتمان</option>
				      </select>
				    </div>
                        <label for="clientContact" class="col-sm-3 control-label"> نوع الدفع</label>
				  </div> <!--/form-group-->							  
				  <div class="form-group">
				 
				    <div class="col-sm-9">
				      <select class="form-control" name="paymentStatus" id="paymentStatus">
				      	<option value="">~~اختيار~~</option>
				      	<option value="1">دفع كامل</option>
				      	<option value="2">دفع مقدم </option>
				      	<option value="3">لايوجد دفع </option>
				      </select>
				    </div>
                         <label for="clientContact" class="col-sm-3 control-label">حالة الدفع</label>
				  </div> <!--/form-group-->							  
			  </div> <!--/col-md-6-->
            	  <div class="col-md-6">
			  	<div class="form-group">
				   
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="subTotal" name="subTotal" disabled="true" />
				      <input type="hidden" class="form-control" id="subTotalValue" name="subTotalValue" />
				    </div>
                     <label for="subTotal" class="col-sm-3 control-label">المبلغ الفرعي</label>
				  </div> <!--/form-group-->			  
				  <div class="form-group">

				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="vat" name="vat" disabled="true" />
				      <input type="hidden" class="form-control" id="vatValue" name="vatValue" />
				    </div>
                      				    <label for="vat" class="col-sm-3 control-label">ضريبة القيمه المضافة 13%</label>
				  </div> <!--/form-group-->	
                      <div class="form-group">
				  <div class="col-sm-9">
				      <input type="text" class="form-control" id="totalAmount" name="totalAmount" disabled="true"/>
				      <input type="hidden" class="form-control" id="totalAmountValue" name="totalAmountValue" />
				    </div>
                      <label for="totalAmount" class="col-sm-3 control-label">المبلغ الكلي </label>
						  
				  <div class="form-group">
				  	  </div> <!--/form-group-->	
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="discount" name="discount" onkeyup="discountFunc()" autocomplete="off" />
				    </div>
                        <label for="discount" class="col-sm-3 control-label">تخفيض</label>
				  </div> <!--/form-group-->	
				  <div class="form-group">
				    
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="grandTotal" name="grandTotal" disabled="true" />
				      <input type="hidden" class="form-control" id="grandTotalValue" name="grandTotalValue" />
				    </div>
                      <label for="grandTotal" class="col-sm-3 control-label"> المجموع الكلي</label>
				  </div> <!--/form-group-->			  		  
			  </div> <!--/col-md-6-->


			  <div class="form-group submitButtonFooter">
			    <div class="col-sm-offset-2 col-sm-10">
			    <button type="button" class="btn btn-default" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i>اضافة صف </button>

			      <button type="submit" id="createOrderBtn" data-loading-text="Loading..." class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> حفظ التغيرلت </button>

			      <button type="reset" class="btn btn-default" onclick="resetOrderForm()"><i class="glyphicon glyphicon-erase"></i> Reset</button>
			    </div>
			  </div>
			</form>
		<?php } else if($_GET['o'] == 'manord') { 
			// manage order
			?>

			<div id="success-messages"></div>
			
			<table class="table" id="manageOrderTable">
				<thead>
					<tr>
						<th style="text-align: right;">#</th>
						<th style="text-align: right;">تاريخ الطلب</th>
						<th style="text-align: right;">اسم العميل</th>
						<th style="text-align: right;">رقم العميل</th>
						<th style="text-align: right;">اجمالي الطلبات</th>
	              <th style="text-align: right;">الكمية المطلوبه </th>
                        
                        <th style="text-align: right;">حالة الدفع</th>
                        <th style="text-align: right;:">خيارات</th>
					</tr>
				</thead>
			</table>

		<?php 
		// /else manage order
		} else if($_GET['o'] == 'editOrd') {
			// get order
			?>
			
			<div class="success-messages"></div> <!--/success-messages-->

  		<form class="form-horizontal" method="POST" action="php_action/editOrder.php" id="editOrderForm">

  			<?php $orderId = $_GET['i'];

  			$sql = "SELECT orders.order_id, orders.order_date, orders.client_name, orders.client_contact, orders.sub_total, orders.vat, orders.total_amount, orders.discount, orders.grand_total, orders.paid, orders.due, orders.payment_type, orders.payment_status  FROM orders 	
					WHERE orders.order_id = {$orderId}";

				$result = $connect->query($sql);
				$data = $result->fetch_row();				
  			?>

			  <div class="form-group">
			    
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="orderDate" name="orderDate" autocomplete="off" value="<?php echo $data[1] ?>" />
			    </div>
                  <label for="orderDate" class="col-sm-2 control-label">تاريخ الطلب</label>
			  </div> <!--/form-group-->
			  <div class="form-group">
			   
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="clientName" name="clientName" placeholder="Client Name" autocomplete="off" value="<?php echo $data[2] ?>" />
			    </div>
                   <label for="clientName" class="col-sm-2 control-label">اسم العميل</label>
			  </div> <!--/form-group-->
			  <div class="form-group">

			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="clientContact" name="clientContact" placeholder="Contact Number" autocomplete="off" value="<?php echo $data[3] ?>" />
			    </div>
                  			    <label for="clientContact" class="col-sm-2 control-label">رقم العميل</label>
			  </div> <!--/form-group-->			  

			  <table class="table" id="productTable">
			  	<thead>
			  		<tr>			  			
			  				<th style="width:15%; text-align: right;">المنتج</th>
			  			<th style="width:15%;text-align: right;">السعر</th>
			  			<th style="text-align: right;">الكمية</th>			  			
			  			<th style="text-align: right;">السعر الكلي</th>			  			
			  			<th style="text-align: right;"></th>
			  		</tr>
			  	</thead>
			  	<tbody>
			  		<?php

			  		$orderItemSql = "SELECT order_item.order_item_id, order_item.order_id, order_item.product_id, order_item.quantity, order_item.rate, order_item.total FROM order_item WHERE order_item.order_id = {$orderId}";
						$orderItemResult = $connect->query($orderItemSql);
						// $orderItemData = $orderItemResult->fetch_all();						
						
						// print_r($orderItemData);
			  		$arrayNumber = 0;
			  		// for($x = 1; $x <= count($orderItemData); $x++) {
			  		$x = 1;
			  		while($orderItemData = $orderItemResult->fetch_array()) { 
			  			// print_r($orderItemData); ?>
			  			<tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">			  				
			  				<td style="margin-right:20px;">
			  					<div class="form-group">

			  					<select class="form-control" name="productName[]" id="productName<?php echo $x; ?>" onchange="getProductData(<?php echo $x; ?>)" >
			  						<option value="">~~اختيار~~</option>
			  						<?php
			  							$productSql = "SELECT * FROM product WHERE active = 1 AND status = 1 AND quantity != 0";
			  							$productData = $connect->query($productSql);

			  							while($row = $productData->fetch_array()) {									 		
			  								$selected = "";
			  								if($row['product_id'] == $orderItemData['product_id']) {
			  									$selected = "selected";
			  								} else {
			  									$selected = "";
			  								}

			  								echo "<option value='".$row['product_id']."' id='changeProduct".$row['product_id']."' ".$selected." >".$row['product_name']."</option>";
										 	} // /while 

			  						?>
		  						</select>
			  					</div>
			  				</td>
			  				<td style="padding-right:20px;">			  					
			  					<input type="text" name="rate[]" id="rate<?php echo $x; ?>" autocomplete="off" disabled="true" class="form-control" value="<?php echo $orderItemData['rate']; ?>" />			  					
			  					<input type="hidden" name="rateValue[]" id="rateValue<?php echo $x; ?>" autocomplete="off" class="form-control" value="<?php echo $orderItemData['rate']; ?>" />			  					
			  				</td>
			  				<td style="padding-right:20px;">
			  					<div class="form-group">
			  					<input type="number" name="quantity[]" id="quantity<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" value="<?php echo $orderItemData['quantity']; ?>" />
			  					</div>
			  				</td>
			  				<td style="padding-right:20px;">			  					
			  					<input type="text" name="total[]" id="total<?php echo $x; ?>" autocomplete="off" class="form-control" disabled="true" value="<?php echo $orderItemData['total']; ?>"/>			  					
			  					<input type="hidden" name="totalValue[]" id="totalValue<?php echo $x; ?>" autocomplete="off" class="form-control" value="<?php echo $orderItemData['total']; ?>"/>			  					
			  				</td>
			  				<td>

			  					<button class="btn btn-default removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow(<?php echo $x; ?>)"><i class="glyphicon glyphicon-trash"></i></button>
			  				</td>
			  			</tr>
		  			<?php
		  			$arrayNumber++;
		  			$x++;
			  		} // /for
			  		?>
			  	</tbody>			  	
			  </table>

			 <div  class="col-md-6">
			  	<div class="form-group">
			
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="paid" name="paid" autocomplete="off" onkeyup="paidAmount()" />
				    </div>
                    	    <label for="paid" class="col-sm-3 control-label">المبلغ المدفوع</label>
				  </div> <!--/form-group-->			  
				  <div class="form-group">
				   
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="due" name="due" disabled="true" />
				      <input type="hidden" class="form-control" id="dueValue" name="dueValue" />
				    </div>
                       <label for="due" class="col-sm-3 control-label">المبلغ المستحق</label>
				  </div> <!--/form-group-->		
				  <div class="form-group">
				  
				    <div class="col-sm-9">
				      <select class="form-control" name="paymentType" id="paymentType">
				      	<option value="">~~اختيار~~</option>
				      	<option value="1">شيك</option>
				      	<option value="2">كاش</option>
				      	<option value="3"> بطاقة ائتمان</option>
				      </select>
				    </div>
                        <label for="clientContact" class="col-sm-3 control-label"> نوع الدفع</label>
				  </div> <!--/form-group-->							  
				  <div class="form-group">
				 
				    <div class="col-sm-9">
				      <select class="form-control" name="paymentStatus" id="paymentStatus">
				      	<option value="">~~اختيار~~</option>
				      	<option value="1">دفع كامل </option>
				      	<option value="2"> دفع مقدم</option>
				      	<option value="3">لم يتم الدفع </option>
				      </select>
				    </div>
                         <label for="clientContact" class="col-sm-3 control-label">حالة الدفع</label>
				  </div> <!--/form-group-->							  
			  </div> <!--/col-md-6-->
            	  <div class="col-md-6">
			  	<div class="form-group">
				   
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="subTotal" name="subTotal" disabled="true" />
				      <input type="hidden" class="form-control" id="subTotalValue" name="subTotalValue" />
				    </div>
                     <label for="subTotal" class="col-sm-3 control-label">المبلغ الفرعي</label>
				  </div> <!--/form-group-->			  
				  <div class="form-group">

				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="vat" name="vat" disabled="true" />
				      <input type="hidden" class="form-control" id="vatValue" name="vatValue" />
				    </div>
                      				    <label for="vat" class="col-sm-3 control-label">ضريبة القيمه المضافة 13%</label>
				  </div> <!--/form-group-->
                        <div class="form-group">
				  <div class="col-sm-9">
				      <input type="text" class="form-control" id="totalAmount" name="totalAmount" disabled="true"/>
				      <input type="hidden" class="form-control" id="totalAmountValue" name="totalAmountValue" />
				    </div>
                      <label for="totalAmount" class="col-sm-3 control-label">المبلغ الكلي </label>
						  	  </div> <!--/form-group-->	
				  <div class="form-group">
				  
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="discount" name="discount" onkeyup="discountFunc()" autocomplete="off" />
				    </div>
                        <label for="discount" class="col-sm-3 control-label">تخفيض</label>
				  </div> <!--/form-group-->	
				  <div class="form-group">
				    
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="grandTotal" name="grandTotal" disabled="true" />
				      <input type="hidden" class="form-control" id="grandTotalValue" name="grandTotalValue" />
				    </div>
                      <label for="grandTotal" class="col-sm-3 control-label"> المجموع الكلي</label>
				  </div> <!--/form-group-->			  		  
			  </div> <!--/col-md-6-->

            
            
            
            

			  <div class="form-group editButtonFooter">
			    <div class="col-sm-offset-2 col-sm-10">
			    <button type="button" class="btn btn-default" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i> اضافة صف  </button>

			    <input type="hidden" name="orderId" id="orderId" value="<?php echo $_GET['i']; ?>" />

			    <button type="submit" id="editOrderBtn" data-loading-text="Loading..." class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> حفظ التغيرات</button>
			      
			    </div>
			  </div>
			</form>

			<?php
		} // /get order else  ?>


	</div> <!--/panel-->	
</div> <!--/panel-->	


<!-- edit order -->
<div class="modal fade" tabindex="-1" role="dialog" id="paymentOrderModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-edit"></i>  تعديل الدفع</h4>
      </div>      

      <div class="modal-body form-horizontal" style="max-height:500px; overflow:auto;" >

      	<div class="paymentOrderMessages"></div>

      	     				 				 
			  <div class="form-group">
			 
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="due" name="due" disabled="true" />					
			    </div>
                     <label for="due" class="col-sm-3 control-label">المبلغ المستحق</label>
			  </div> <!--/form-group-->		
			  <div class="form-group">
			  
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="payAmount" name="payAmount"/>					      
			    </div>
                    <label for="payAmount" class="col-sm-3 control-label">المبلغ المدفوع</label>
			  </div> <!--/form-group-->		
			  <div class="form-group">
		
			    <div class="col-sm-9">
			      <select class="form-control" name="paymentType" id="paymentType" >
			      	<option value="">~~اختيار~~</option>
			      	<option value="1">شيك</option>
			      	<option value="2">كاش</option>
			      	<option value="3"> بطاقة ائتمان</option>
			      </select>
			    </div>
                  	    <label for="clientContact" class="col-sm-3 control-label">نوع الدفع </label>
			  </div> <!--/form-group-->							  
			  <div class="form-group">
		
			    <div class="col-sm-9">
			      <select class="form-control" name="paymentStatus" id="paymentStatus">
			      	<option value="">~~اخيار~~</option>
			      	<option value="1">دفع كامل</option>
			      	<option value="2">دفع مقدم</option>
			      	<option value="3">لم يتم الدفع</option>
			      </select>
			    </div>
                  	    <label for="clientContact" class="col-sm-3 control-label"> حالة الدفع</label>
			  </div> <!--/form-group-->							  				  
      	        
      </div> <!--/modal-body-->
      <div class="modal-footer">
      	<button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> اغلاق</button>
        <button type="button" class="btn btn-primary" id="updatePaymentOrderBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> حفظ التغيرات</button>	
      </div>           
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /edit order-->

<!-- remove order -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeOrderModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> حذف الطلب</h4>
      </div>
      <div class="modal-body">

      	<div class="removeOrderMessages"></div>

        <p>حذف ?</p>
      </div>
      <div class="modal-footer removeProductFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> اغلاق</button>
        <button type="button" class="btn btn-primary" id="removeOrderBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> حفظ التغيرات</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove order-->


<script src="custom/js/order.js"></script>

<?php require_once 'includes/footer.php'; ?>


	