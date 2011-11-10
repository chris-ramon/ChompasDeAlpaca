<?php $cart =  $this->cart->contents(); ?>
<section id="cart">
	<p>Your Cart</p>
	<div class="separator"></div>
	<?php if(!(count($cart)>0)) { ?>
	<img src="<?php echo base_url(); ?>application/site_media/img/cart_empty.png" id="cart_empty"/>
	<?php } else { ?>		
	<table id="tablecart">
		<tr>
			<th>Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Subtotal</th>
		</tr>				
			<?php echo form_open('shop/checkout'); ?>
			<?php foreach($cart as $chompa) {?>			
			<tr>
				<td><?php echo $chompa['name'] ?></td>
				<td>$<?php echo $chompa['price'] ?></td>
				<td><input type="text" name="qty[]" value="<?php echo $chompa['qty'] ?>" class="degradado"
				maxlength=2 /></td>
				<input type="hidden" name="rowid[]" value="<?php echo $chompa['rowid'] ?>"/>
				<td><?php echo $chompa['subtotal'] ?></td>
			
			</tr>			
			<?php } ?>					
		<tr>
			<td colspan="3"><strong>Total</strong></td>
			<td><?php echo $this->cart->total(); ?></td>
		</tr>
	</table>
	<button id="checkout" class="boton">Check Out</button>
	<?php echo form_close(); ?>
	<?php } ?>
	
</section>
<section id="productos">	
	<?php foreach($chompas as $chompa) { ?>	
	<?php echo form_open('shop/add'); ?>
	<article>		
		<img src="<?php echo base_url() ?>application/site_media/img/<?php echo $chompa->imagen; ?>" title="<?php echo $chompa->nombre; ?>" />
		<input type="hidden" name="id" value="<?php echo $chompa->id; ?>" />
		<button class="boton botoncomprar">Add to Cart</button>
	</article>
	<?php echo form_close(); ?>
	<?php } ?>	
	
</section>