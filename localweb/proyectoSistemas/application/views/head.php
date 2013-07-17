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
        <!--script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script-->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js" />
        <script language="javascript" type="text/javascript">
            /*$('#txtBusqueda').live('keypress',function(){
                alert('hola');
            });/**/
            
                /*$('#txtBusqueda').keypress(function(event){
                    alert('hola');
                    //var txtBusqueda = $('#txtBusqueda').text();
                    var hola = "hola";
                    document.write(hola);
                    
                    /*$.ajax({
                       url:'<?php //echo base_url()?>index.php/catalogoProductos/busquedaFiltrada',
                       type: 'POST',
                       datatype: 'html',
                       data: "txtBusqueda="+txtBusqueda,
                       success:function(html){
                            $('#dvTabla').html(html);
                       }
                       
                    });/**/
                    
                /*});/**/
            

        </script>
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
                    });/**/
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