<?php

include 'lib/session.php';
Session::init();
?>
<?php

include 'lib/database.php';
include 'helpers/format.php';

spl_autoload_register(function($class){
	include_once "classes/".$class.".php";
});


$db = new Database();
$fm = new Format();
$ct = new cart();
$us = new user();
$cs = new customer();
$cat = new category();
$product = new product();
?>

<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache"); 
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
header("Cache-Control: max-age=2592000");
?>

<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquerymain.js"></script>
	<script src="js/script.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
	<script type="text/javascript" src="js/nav.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script> 
	<script type="text/javascript" src="js/nav-hover.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
	<script type="text/javascript">
		$(document).ready(function($){
			$('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
		});
	</script>
<?php
if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
	$customer_id = Session::get('customer_id');
	$insertOrder = $ct->insertOrder($customer_id);
	$delCart = $ct->del_all_data_cart();
	header('Location:success.php');
}
?>
<?php
if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
	$customer_id = Session::get('customer_id');
	$insertOrder = $ct->insertOrder($customer_id);
	$delCart = $ct->del_all_data_cart();
	header('Location:success.php');
}
?>
<style type="text/css">
	.box_left {
		width: 50%;
		border: 1px solid #666;
		float: left;
		padding: 4px;

	}

	.box_right {
		width: 47%;
		border: 1px solid #666;
		float: right;
		padding: 4px;
	}

	.a_order {
		background: #653092;
		color: aliceblue;
		padding: 10px;
		font-size: 25px;
		border-radius: none;
		cursor: pointer;
	}

	body {
		margin: 0;
		padding: 0;
		background-color: #FAFAFA;
		font: 12pt "Tohoma";
	}

	* {
		box-sizing: border-box;
		-moz-box-sizing: border-box;
	}

	.page {
		width: 21cm;
		overflow: hidden;
		min-height: 297mm;
		padding: 2.5cm;
		margin-left: auto;
		margin-right: auto;
		background: white;
		box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
	}

	.subpage {
		padding: 1cm;
		border: 5px red solid;
		height: 237mm;
		outline: 2cm #FFEAEA solid;
	}

	@page {
		size: A4;
		margin: 0;
	}

	button {
		width: 100px;
		height: 24px;
	}

	.header {
		overflow: hidden;
	}

	.logo {
		background-color: #FFFFFF;
		text-align: left;
		float: left;
	}

	.company {
		padding-top: 24px;
		text-transform: uppercase;
		background-color: #FFFFFF;
		text-align: right;
		float: right;
		font-size: 16px;
	}

	.title {
		text-align: center;
		position: relative;
		color: #0000FF;
		font-size: 24px;
		top: 1px;
	}

	.footer-left {
		text-align: center;
		text-transform: uppercase;
		padding-top: 24px;
		position: relative;
		height: 150px;
		width: 50%;
		color: #000;
		float: left;
		font-size: 12px;
		bottom: 1px;
	}

	.footer-right {
		text-align: center;
		text-transform: uppercase;
		padding-top: 24px;
		position: relative;
		height: 150px;
		width: 50%;
		color: #000;
		font-size: 12px;
		float: right;
		bottom: 1px;
	}

	.TableData {
		background: #ffffff;
		font: 11px;
		width: 100%;
		border-collapse: collapse;
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 12px;
		border: thin solid #d3d3d3;
	}

	.TableData TH {
		background: rgba(0, 0, 255, 0.1);
		text-align: center;
		font-weight: bold;
		color: #000;
		border: solid 1px #ccc;
		height: 24px;
	}

	.TableData TR {
		height: 24px;
		border: thin solid #d3d3d3;
	}

	.TableData TR TD {
		padding-right: 2px;
		padding-left: 2px;
		border: thin solid #d3d3d3;
	}

	.TableData TR:hover {
		background: rgba(0, 0, 0, 0.05);
	}

	.TableData .cotSTT {
		text-align: center;
		width: 10%;
	}

	.TableData .cotTenSanPham {
		text-align: left;
		width: 40%;
	}

	.TableData .cotHangSanXuat {
		text-align: left;
		width: 20%;
	}

	.TableData .cotGia {
		text-align: right;
		width: 120px;
	}

	.TableData .cotSoLuong {
		text-align: center;
		width: 50px;
	}

	.TableData .cotSo {
		text-align: right;
		width: 120px;
	}

	.TableData .tong {
		text-align: right;
		font-weight: bold;
		text-transform: uppercase;
		padding-right: 4px;
	}

	.TableData .cotSoLuong input {
		text-align: center;
	}

	@media print {
		@page {
			margin: 0;
			border: initial;
			border-radius: initial;
			width: initial;
			min-height: initial;
			box-shadow: initial;
			background: initial;
			page-break-after: always;
		}
	}
</style>

<body onload="window.print();">
<form action="" method="POST">
	<div class="main">
		<div class="content">
			<div class="section group">
				<div class="heading">
					<h3>Thông tin hoá đơn</h3>
				</div>
				<div class="clear"></div>
				<div class="">
					<div class="cartpage">
						<?php
						if (isset($update_quantity_Cart)) {
							echo $update_quantity_Cart;
						}
						?>
						<?php
						if (isset($delcart)) {
							echo $delcart;
						}
						?>
						<?php
						if (isset($delcart)) {
							echo $delcart;
						}
						?>
						<table class="tblone">
							<tr>
								<th width="5%">Stt</th>
								<th width="15%">Tên sản phẩm</th>
								<th width="15%">Giá</th>
								<th width="25%">Số lượng</th>
								<th width="20%">Tổng giá</th>

							</tr>
							<?php
							$get_product_cart = $ct->get_product_cart();
							if ($get_product_cart) {
								$subtotal = 0;
								$qty = 0;
								$i = 0;
								while ($result = $get_product_cart->fetch_assoc()) {
									$i++;

							?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $result['productName'] ?></td>

										<td><?php echo $result['price'] . ' VND' ?></td>
										<td>
											<?php echo $result['quantity'] ?>
										</td>
										<td>
											<?php
											$total = $result['price'] * $result['quantity'];
											echo $total . ' VND';
											?>
										</td>

									</tr>
							<?php

									$subtotal += $total;
									$qty = $qty + $result['quantity'];
								}
							}
							?>

						</table>
						<?php
						$check_cart = $ct->check_cart();
						if ($check_cart) {

						?>
							<table style="float:right;text-align:left;" width="40%">
								<tr>
									<th>Tổng giá : </th>
									<td>
										<?php echo $subtotal . ' VND';

										Session::set('sum', $subtotal);
										Session::set('qty', $qty);
										?>
									</td>
								</tr>
								<tr>
									<th>Thuế : </th>
									<td>10% (<?php echo $vat = $subtotal * 0.1 . ' VND'; ?>)</td>
								</tr>
								<tr>
									<th>Tổng cộng :</th>
									<td><?php
										$vat = $subtotal * 0.1;
										$grandTotal = $subtotal + $vat;
										echo $grandTotal . ' VND';
										?> </td>
								</tr>
							</table>
						<?php
						} else {
							echo 'Your cart is Empty ! Please Shopping now';
						}
						?>
					</div>


                </div>
                <div class="footer-left"> HN, ngày 22 tháng 11 năm 2020<br/>
                Khách hàng </div>
            <div class="footer-right"> HN, ngày 22 tháng 11 năm 2020<br/>
                Nhân viên </div>
				
            </div>
            
		</div>

		
		
	</div>
</form>
</body>