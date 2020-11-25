<?php 	

require_once 'core.php';

$sql = "SELECT order_id, order_date, client_name, client_contact, payment_status FROM orders WHERE order_status = 1";
$result = $connect->query($sql);

//$sq ="SELECT quantity FROM order_item";
//$res = $connect->query($sq);

$output = array('data' => array());

if($result->num_rows > 0) { 
 
 $paymentStatus = ""; 
 $x = 1;

 while($row = $result->fetch_array()) {
 	$orderId = $row[0];

 	$countOrderItemSql = "SELECT count(*) FROM order_item WHERE order_id = $orderId";
 	$itemCountResult = $connect->query($countOrderItemSql);
 	$itemCountRow = $itemCountResult->fetch_row();

$quant ="SELECT quantity FROM order_item WHERE order_id = $orderId";
     $item = $connect->query($quant);
 	$itemquant = $item->fetch_row();

 	// active 
 	if($row[4] == 1) { 		
 		$paymentStatus = "<label class='label label-success'>دفع كامل</label>";
 	} else if($row[4] == 2) { 		
 		$paymentStatus = "<label class='label label-info'>دفع مقدم</label>";
 	} else { 		
 		$paymentStatus = "<label class='label label-warning'>لم يتم الدفع  </label>";
 	} // /else

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    اجراءات <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a href="orders.php?o=editOrd&i='.$orderId.'" id="editOrderModalBtn"> <i class="glyphicon glyphicon-edit"></i> تعديل</a></li>
	    
	    <li><a type="button" data-toggle="modal" id="paymentOrderModalBtn" data-target="#paymentOrderModal" onclick="paymentOrder('.$orderId.')"> <i class="glyphicon glyphicon-save"></i> الدفع</a></li>

	    <li><a type="button" onclick="printOrder('.$orderId.')"> <i class="glyphicon glyphicon-print"></i> طباعة </a></li>
	    
	    <li><a type="button" data-toggle="modal" data-target="#removeOrderModal" id="removeOrderModalBtn" onclick="removeOrder('.$orderId.')"> <i class="glyphicon glyphicon-trash"></i> حذف</a></li>       
	  </ul>
	</div>';		

 	$output['data'][] = array( 		
 		// image
 		$x,
 		// order date
 		$row[1],
 		// client name
 		$row[2], 
 		// client contact
 		$row[3], 		 	
 		$itemCountRow, 
   	$itemquant,
 		$paymentStatus,
 		// button
 		$button 		
 		); 	
 	$x++;
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);