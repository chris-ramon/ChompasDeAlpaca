<?php $cart =  $this->cart->contents(); ?>
<?php if(count($cart)>0) { ?>
	<?php echo '<pre>' ?>
	<?php echo var_dump($cart); ?>
	<?php echo '</pre>' ?>
<?php } ?>
<article>
	<ul>
	</ul>
</article>
<article id="productos">	
	<?php foreach($chompas as $chompa) { ?>
	<?php echo form_open('shop/add'); ?>	
	<article>			
		<img src="<?php echo base_url() ?>application/site_media/img/<?php echo $chompa->imagen; ?>" title="<?php echo $chompa->nombre; ?>" />
		<input type="hidden" name="id" value="<?php echo $chompa->id; ?>" />
		<button class="boton botoncomprar">Add Cart</button>
	</article>
	<?php echo form_close(); ?>
	<?php } ?>	
	
</article>