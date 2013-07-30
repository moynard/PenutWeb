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
        <link href="<?php echo base_url()?>CSS/ivory2.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url()?>assets/CSS/bootstrap-.css" rel="stylesheet" type="text/css">
        <?php
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename=ReporteProductos ".date('Y M d h:i:s A').".xls");
			header("Pragma: no-cache");
			header("Expires: 0");
		?>
    </head>
    <?php
        if ($this->session->userdata['verificacion']) {
            
        }  else {
            redirect('login');
        }
    ?>
    <body>
        <div class="grid" id="contentt">
        	<?php
			    $conta = 0;
			?>
			<div class='g960'>
				<div class="row">
					<div id="header-image">
						<img src="<?php echo base_url()?>assets/img/glm.png" alt="Logo"  align="center " width="20%"/>
					</div>
					<div id="header-link">
					    <p></p>
					</div>
				</div>
			    <div id="dvTabla">
			    	<table border="none"><tr></tr></table>
			    	<table border="0"></table>
			        <table>
			            <tr>
			                <th> # </th>
			                <th>Producto</th>
			                <th>IdSKU</th>
			                <th>Cantidad en Existencia</th>
			            </tr>
			            <?php if(isset($datosTabla) && $datosTabla != FALSE){ if( isset($datosTabla[0])){foreach ($datosTabla as $key => $list) {?>
			                    <tr>
			                        <td>
			                            <?php $conta=$conta+1; echo $conta; ?>
			                        </td>
			                        <td>
			                            <?php echo $list['descProducto']; ?>
			                        </td>
			                        <td>
			                            <?php echo $list['idSKU']; ?>
			                        </td>
			                        <td>
			                            <?php 
			                            	if($list['cantidad']==NULL){
			                            		echo $list['entradas'];
			                            	}else{
			                            		echo $list['cantidad'];
			                            	}                           
			                            	
										 ?>
			                        </td>
			                    </tr>
			            <?php  }}else{?>
			                    <tr>
			                        <td>
			                            <?php $conta=$conta+1; echo $conta; ?>
			                        </td>
			                        <td>
			                            <?php echo $datosTabla['descProducto']; ?>
			                        </td>
			                        <td>
			                            <?php echo $datosTabla['idSKU']; ?>
			                        </td>
			                        <td>
			                            <?php 
			                            	if($datosTabla['cantidad']==NULL){
			                            		echo $datosTabla['entradas'];
			                            	}else{
			                            		echo $datosTabla['cantidad'];
			                            	}                           
			                            	
										 ?>
			                        </td>
			                    </tr>        
			
			           <?php }}else{ ?>
			
			                    <tr>
			                        <td colspan='3'>
			                            No se encontraron Productos Coincidentes.
			                        </td>
			                    </tr>
			          <?php }  ?>
			        </table> 
			    </div>
			</div>
        </div>
    </body>
</html>
