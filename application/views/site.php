<section id="main_content">	
    <button class="boton" id="admin_button">Admin</button>    
    <button class="boton" id="client_button">Client</button>
    <?php $attr = array('id' => 'formulario') ?>
    <?php echo form_open('/user/login', $attr) ?>
    <p>
    	<input type="text" name="username" placeholder="username" class="degradado">    	
    </p>
    <p>
    	<input type="password" name="pwd" placeholder="password" class="degradado">
    </p>

    <p>
    	<input type="submit" value="Login" class="boton" id="login_button">
    </p>
    <em>Username : system | Password : personal</em>
    <?php echo form_close() ?>
</section>