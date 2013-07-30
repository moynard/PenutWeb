<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="refresh" content="900; URL=<?php echo base_url()?>index.php/login/logOut" >
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Bienvenido <?php echo $this->session->userdata('email') ?> </title>
        <link href="<?php echo base_url()?>CSS/ivory.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url()?>assets/CSS/bootstrap-.css" rel="stylesheet" type="text/css">
        
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js" ></script>
        
        <script type="text/javascript">
            $(document).ready(function(){
               $('#txtBusqueda').keyup(function(){
                    var key = $(this).val();
                    $.ajax({
                       url:'<?php echo base_url()?>index.php/catalogoProductos/busquedaFiltrada',
                       type: 'POST',
                       datatype: 'html',
                       data: "key="+key,
                       success:function(html){
                            $('#dvTabla').html(html);
                       }                       
                    });
               });
            });
        </script>
    </head>
    <?php
        if ($this->session->userdata['verificacion']) {
            
        }  else {
            redirect('login');
        }
    ?>
    <body>
    	<div class="row" id="cabecera">
	        <div class="c2 feature">
	            <a href="<?php echo base_url();?>index.php/catalogoProductos/index">
	                <img src="<?php   echo base_url(); ?>/assets/img/glmmty.png" alt_="logoGLM" class="space-top">
	            </a>
	        </div>
	        <div clasS="c9" style="color: windowtext; font-family: Georgia; padding-top: 5.5em;">
	        	<div class="row">
	        		<div class="c10 text-left btnLogOut" style="padding:0;"> 
	        			<h5>Bienvenido <?php echo $this->session->userdata('email') ?></h5>
	        			
	        		</div>
	        		<div class="c2 text-right btnLogOut">
	        			<?php echo anchor('login/logOut','Cerrar Sesi&oacute;n'); ?>
	        		</div>
	        		
	        	</div>
	            
	            
	        </div>
	    </div>
        <div class="grid" id="cuerpo">
        	 