<section id="main_content">
	<table id="pedidos">
		<tr>
			<th># Pedido</th>
			<th>Insumo</th>
			<th>Estado</th>
			<th>Fecha Envío</th>
			<th>Opción</th>
		</tr>

		<?php foreach($pedidos as $pedido) { ?>
			<?php if($pedido->estado == 'enviado') { ?>
				<tr>
					<td><?php echo $pedido->id ?></td>
					<td><?php echo $pedido->id_insumo ?></td>
					<td><?php echo $pedido->estado ?></td>
					<td><?php echo $pedido->fecha_envio ?></td>
					<td><a href="<?php echo base_url() ?>pedido/aceptar/<?php echo $pedido->id ?>">Aceptar Llegada</a></td>
				</tr>
			<?php } ?>
		<?php } ?>

	</table>

	<div class="separator"></div>

	<table id="chompas">
		<tr>
			<th>Chompa</th>
			<th>Stock Actual</th>
			<th>Cantidad Pendiente por Llegar</th>
		</tr>

		<?php foreach($chompas as $chompa) { ?>
			<?php if($chompa->cantidad_pendiente > 0) { ?>
			<tr class="resaltado">
				<td><?php echo $chompa->nombre ?></td>
				<td><?php echo $chompa->stock_actual ?></td>
				<td><?php echo $chompa->cantidad_pendiente ?></td>
			</tr>
			<?php } else {?>			
				<tr>
					<td><?php echo $chompa->nombre ?></td>
					<td><?php echo $chompa->stock_actual ?></td>
					<td><?php echo $chompa->cantidad_pendiente ?></td>
				</tr>
			<?php } ?>
		<?php } ?>
	</table>
</section>