<?php
/*
	$con = mysqli_connect('cl1-sql12', 'abbal14', 'EBVx3YE3znmV', 'abbal14') or exit(0);
	
	// assign posted variables to local variables
	$user_id = isset($_POST['custom']) ? mysqli_real_escape_string($con, $_POST['custom']) : '';
	$plan = isset($_POST['item_number']) ? mysqli_real_escape_string($con, $_POST['item_number']) : '';
	$txn_id = isset($_POST['txn_id']) ? mysqli_real_escape_string($con, $_POST['txn_id']) : '';
	$payer_email = isset($_POST['payer_email']) ? mysqli_real_escape_string($con, $_POST['payer_email']) : '';
	$payer_status = isset($_POST['payer_status']) ? mysqli_real_escape_string($con, $_POST['payer_status']) : '';
	$payer_id = isset($_POST['payer_id']) ? mysqli_real_escape_string($con, $_POST['payer_id']) : '';
	$payment_date = isset($_POST['payment_date']) ? mysqli_real_escape_string($con, $_POST['payment_date']) : '';
	$payment_gross = isset($_POST['payment_gross']) ? mysqli_real_escape_string($con, $_POST['payment_gross']) : '';
	$payment_fee = isset($_POST['payment_fee']) ? mysqli_real_escape_string($con, $_POST['payment_fee']) : '';
	$mc_gross = isset($_POST['mc_gross']) ? mysqli_real_escape_string($con, $_POST['mc_gross']) : '';
	$mc_fee = isset($_POST['mc_fee']) ? mysqli_real_escape_string($con, $_POST['mc_fee']) : '';
	$mc_currency = isset($_POST['mc_currency']) ? mysqli_real_escape_string($con, $_POST['mc_currency']) : '';
	
	$sql_new_order = "INSERT INTO orders VALUES (
		NULL,
		'$user_id',
		'$plan',
		'$txn_id',
		'$payer_email',
		'$payer_status',
		'$payer_id',
		'$payment_date',
		'$payment_gross',
		'$payment_fee',
		'$mc_gross',
		'$mc_fee',
		'$mc_currency'
	)";
    
    mysqli_query($con, $sql_new_order);
	
	$sql_update_user = "UPDATE users SET plan = $plan WHERE id = $user_id";
	mysqli_query($con, $sql_update_user);

	// Dates
	$date_now = date('Y-m-d G:i:s');
	$date_inoneyear = date('Y-m-d G:i:s',strtotime(date('Y-m-d G:i:s')) + (24*3600*365));
	
	$sql_update_redirections = "UPDATE redirections SET expired_at = '$date_inoneyear' WHERE user_id = $user_id";
	mysqli_query($con,$sql_update_redirections);
	
	$sql_updated_at = "UPDATE redirections SET updated_at = '$date_now' WHERE user_id = $user_id";
	mysqli_query($con,$sql_updated_at);

	mysqli_close($con);
	
    // IPN message values depend upon the type of notification sent.
    // To loop through the &_POST array and print the NV pairs to the screen:
	$order = '<!DOCTYPE html>';
	$order .= '<html lang="en">';
	$order .= '<head>';
	$order .= '<title>Order</title>';
	$order .= '<link href="../themes/Pratt/assets/css/bootstrap.css" rel="stylesheet">';
	$order .= '<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic" rel="stylesheet" type="text/css">';
	$order .= '<link href="http://fonts.googleapis.com/css?family=Raleway:400,300,700" rel="stylesheet" type="text/css">';
	$order .= '</head>';
	$order .= '<body>';
	$order .= '<table class="table table-hover table table-condensed">';
	$order .= '<tbody>';
	foreach($_POST as $key => $value) {
	  $order .= '<tr><td><b>' . $key . '</b></td><td>' . $value . '</td></tr>';
    }
	$order .= '</tbody>';
	$order .= '</table>';
	$order .= '</body>';
	$order .= '</html>';

	file_put_contents('orders/IPN_VAL_TABLE_' . date("Y-m-d") . '_' . date("H-i-s") . '.html', $order);
	file_put_contents('orders/IPN_VAL_RAW_' . date("Y-m-d") . '_' . date("H-i-s") . '.txt', $raw_post_data);
*/
?>