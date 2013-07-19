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
        <link href="<?php echo base_url()?>assets/CSS/ivory.css" rel="stylesheet" type="text/css">
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
            <div class="c12">
                <div class="row" style="margin-top: 5px;">
                    <div class="c2 feature">
                        <a href="<?php echo base_url();?>/index.php/">
                            <img src="<?php   echo base_url(); ?>/assets/img/glm.png" alt_="logoGLM">
                        </a>
                    </div>
                    <div clasS="c8 text-left">
                        Bienvenido <?php echo $this->session->userdata('email') ?>
                    </div>
                    <div clasS="c2 text-right">
                        <?php echo anchor('login/logOut','LogOut'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid" id="cuerpo">