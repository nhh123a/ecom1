<div class="container">
	<form action="http://localhost/ecom1/order/order" method = "post">
	<div class="check-out">
		<h1>Checkout</h1>
    	    <table >
		  <tr>
			<th>Item</th>
			<th>Qty</th>		
			<th>Prices</th>
			<th>Delery Detials</th>
			<th>Subtotal</th>
			<th>Delete</th>
			<th>Update</th>
		  </tr>
          <?php
		 	$total = 0; 
		  foreach ($data['datacart'] as $row) {  ?> 
		  <tr>
			<input hidden style="width:50px;" type="text" name= "p_id" value="<?php echo $row['p_id']?>">
			<td class="ring-in"><a href="single.html" class="at-in"><img src="http://localhost/ecom1/ecom/public/images/<?php echo $row['product_image']?>" class="img-responsive" alt=""></a>
			<div class="sed">
				<h5><?php echo $row['product_title']?></h5>
				<p>(<?php echo $row['product_desc']?>) </p>
			
			</div>
			<div class="clearfix"> </div></td>
			<td><input style="width:50px;" type="text" id = "qty" name= "qty" value="<?php echo $row['qty']?>">	</td>
			<td>$<?php echo $row['product_price']?></td>
			<td>FREE SHIPPING</td>
			<td>$<?php echo number_format($row['product_price'] *$row['qty']) ?></td>
			<td><a href="http://localhost/ecom1/cart/delete/<?php echo $row['id']?>">Delete</a></td>
			<td><a href="http://localhost/ecom1/cart/update/<?php echo $row['id']?>" >Update</a></td>
		  </tr>
          <?php 
			$total = $total + $row['product_price']*$row['qty'] ;

		}?>
	</table>
	<div>
	<input type="submit" style="background-color: #52D0C4" value="PROCEED TO BUY" />
	</form>
	<p style="float: right;margin-right:20px;">TOTAL: $<?php echo number_format($total) ?></p>
	<?php $_SESSION['cart'] = $total;?>
	</div>
	<div class="clearfix"> </div>
    </div>
</div>


