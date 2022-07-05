<?php

include 'config.php';
include 'lib/nganluong.class.php';
	// Lấy các tham số để chuyển sang Ngânlượng thanh toán:

 //$ten= $_POST["txt_test"];
    $receiver=RECEIVER;
	//Mã đơn hàng 
	$order_code='Ma_'.time();
	//Khai báo url trả về 
	$return_url= $_SERVER['HTTP_REFERER']. "/success.php";
	// Link nut hủy đơn hàng
	$cancel_url= $_SERVER['HTTP_REFERER'];	
	//Giá của cả giỏ hàng 
	$txh_name =$_POST['txh_name']; 	
	$txt_email =$_POST['txt_email']; 	
	$txt_phone =$_POST['txt_phone']; 	
	$price =(int)$_POST['txt_gia']; 
	$info = $_POST['info_order'];	
	//Thông tin giao dịch
	$transaction_info="Thong tin giao dich";
	$currency= "vnd";
	$quantity=1;
	$tax=0;
	$discount=0;
	$fee_cal=0;
	$fee_shipping=0;
	$order_description="Thong tin don hang: ".$info;
	$buyer_info=$txh_name."*|*".$txt_email."*|*".$txt_phone;
	$affiliate_code="";
    //Khai báo đối tượng của lớp NL_Checkout
	$nl= new NL_Checkout();
	$nl->nganluong_url = NGANLUONG_URL;
	$nl->merchant_site_code = MERCHANT_ID;
	$nl->secure_pass = MERCHANT_PASS;
	//Tạo link thanh toán đến nganluong.vn
	$url= $nl->buildCheckoutUrlExpand($return_url, $receiver, $transaction_info, $order_code, $price, $currency, $quantity, $tax, $discount , $fee_cal,    $fee_shipping, $order_description, $buyer_info , $affiliate_code);
	//$url= $nl->buildCheckoutUrl($return_url, $receiver, $transaction_info, $order_code, $price);
	
	
	//echo $url; die;
	if ($order_code != "") {
		//một số tham số lưu ý
		//&cancel_url=http://yourdomain.com --> Link bấm nút hủy giao dịch
		//&option_payment=bank_online --> Mặc định forcus vào phương thức Ngân Hàng
		$url .='&cancel_url='. $cancel_url;
		//$url .='&option_payment=bank_online';
		
		echo '<meta http-equiv="refresh" content="0; url='.$url.'" >';
		//&lang=en --> Ngôn ngữ hiển thị google translate
	}

?>


