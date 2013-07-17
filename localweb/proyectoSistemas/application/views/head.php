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
        <script src="<?php echo base_url()?>/script/jquery.js" />
        <script type="text/javascript">
            
            $(document).ready(function(){
                $("#txtBusqueda").keypress(function(){
                    
                    var txtBusqueda = $('#txtBusqueda').text();
                
                    $.ajax({
                       url:'<?php echo base_url()?>index.php/catalogoProductos/busquedaFiltrada',
                       type: 'POST',
                       data: ""txtBusqueda;
                       
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
        <div class="grid">
            <?php echo base_url()?>