<?php include('header.php'); 
?>
<body>

	<h1 class="text-center" style="margin-top: 6%;">YOUR ORDER DETAILS</h1>
	<?php 
	$sql="select * from purchase order by purchaseid desc";
	$query=$conn->query($sql);
	if($row=$query->fetch_array()){
	?>
	<?php
		}
	?>	
	<div class="container">
		<div><h2>Customer Name: <b><?php echo $row['customer']; ?></b><br> Order: <b><?php echo $row['purchaseid']; ?></b></h2></div>
		<table class="table table-striped table-bordered" style="margin-top: 5%;">
		<thead>
			<th>Product Name</th>
			<th>Price</th>
			<th>Purchase Quantity</th>
			<th>Subtotal</th>
		</thead>
		<tbody>
			<?php
              $sql="select * from purchase_detail left join product on product.productid=purchase_detail.productid where purchaseid='".$row['purchaseid']."'";
              $dquery=$conn->query($sql);
              while($drow=$dquery->fetch_array()){
              ?>

             <tr>
	              <td><?php echo $drow['productname']; ?></td>
	              <td class="text-right">&#8369; <?php echo number_format($drow['price'], 2); ?></td>
	              <td class="text-right"><?php echo $drow['quantity']; ?></td>
	              <td class="text-right">&#8369; <?php $subt = $drow['price']*$drow['quantity']; echo number_format($subt, 2); ?> </td>
             </tr>
              <?php
               }
              ?>
               <tr>
                   <td colspan="3" class="text-right"><b>TOTAL</b></td>
                   <td class="text-right">&#8369; <?php echo number_format($row['total'], 2); ?></td>
               </tr>
		</tbody>
	</table>

	</div>
	<div style="display: flex;
				align-items: center;
				justify-content: center;">

		<a href="order.php"><button class="btn btn-success" style="height: 10vh; font-weight: bolder;font-size: 20px; ">ORDER AGAIN</button></a>
	</div>


</body>