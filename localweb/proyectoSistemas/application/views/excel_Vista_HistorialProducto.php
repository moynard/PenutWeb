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
        <?php
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename=Historial de Movimientos ".date('Y M d h:i:s A').".xls");
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
        <div class="grid" id="cuerpo">
        	<?php

			/*
			 * To change this template, choose Tools | Templates
			 * and open the template in the editor.
			 */
			$conta= 0;
			$cantTotal = 0;
			?>
			
			<div class="g960">
			    <div class="row text-center">
			        <div class="c12">
			            <table class="space-top tabla">
			                <tr>
			                    <th> # </th>
			                    <th>Fecha</th>
			                    <th>Estado</th>
			                    <th>Factura de Proveedor</th>
			                    <th>Factura Comercial</th>
			                    <th>Productos de Entrada</th>
			                    <th>Productos de Salida</th>
			                    <th>Ubicaci&oacute;n</th>
			                </tr>
			                <?php if(isset($detalles) && $detalles != FALSE){ if( isset($detalles[0])){foreach ($detalles as $key => $list) {
			                	
									if($list['cantSalida']==0){
										$cantTotal = $cantTotal + $list['cantEntrada'];
									}else{
										
										$cantTotal = $cantTotal - $list['cantSalida'];
									}
								
			                	?>
			                        <tr>
			                            <td class="text-center">
			                                <?php $conta=$conta+1; echo $conta; ?>
			                            </td>
			                            <td class="text-center">
			                                <?php echo $list['fechaMovimiento']; ?>
			                            </td>
			                            <td class="text-center">
			                                <?php if($list['idEstado']=='1'){
			                                        echo "Arrivado";
			                                    }elseif($list['idEstado']==2){
			                                        echo "Disponible";
			                                    }elseif($list['idEstado']==3){
			                                        echo "Preparado";
			                                    }else{
			                                        echo "Hold";
			                                    }
			                                ?>
			                            </td>
			                            <td class="text-center">
			                                <?php echo $list['facProveedor'];  ?>
			                            </td>
			                            <td class="text-center">
			                                <?php echo $list['facComercial'] ?>
			                            </td>
			
			                            <?php if($list['cantSalida']=='0'){ ?>
			                            <td class="text-center">
			                                <?php echo $list['cantEntrada']; ?>
			                            </td>
			                            <td class="text-center">
			                                <?php echo "-"   ?>
			                            </td>
			                            <?php }else{?>  
			                            <td class="text-center">
			                                <?php echo "-"   ?>
			                            </td>
			                            <td class="text-center">
			                                <?php echo $list['cantSalida']; ?>
			                            </td>
			                            <?php }?>
			                            <td class="text-center">
			                                <?php echo $list['idUbicacion'];  ?>
			                            </td>
			                        </tr>
			                <?php  }}else{
			                		if($detalles['cantSalida']==0){
										$cantTotal = $cantTotal + $detalles['cantEntrada'];
									}else{
										
										$cantTotal = $cantTotal - $detalles['cantSalida'];
									}
			                	?>
			                        <tr>
			                            <td class="text-center">
			                                <?php $conta=$conta+1; echo $conta; ?>
			                            </td>
			                            <td class="text-center">
			                                <?php echo $detalles['fechaMovimiento']; ?>
			                            </td>
			                            <td class="text-center">
			                                <?php if($detalles['idEstado']==1){
			                                        echo "Arrivado";
			                                    }elseif($detalles['idEstado']==2){
			                                        echo "Disponible";
			                                    }elseif($detalles['idEstado']==3){
			                                        echo "Preparado";
			                                    }else{
			                                        echo "Hold";
			                                    }
			                                ?>
			                            </td>
			                            <td class="text-center">
			                                <?php echo $detalles['facProveedor'];  ?>
			                            </td>
			                            <td class="text-center">
			                                <?php echo $detalles['facComercial'] ?>
			                            </td>
			
			                            <?php if($detalles['tipodemovimiento']==1){ ?>         
			                            <td class="text-center">
			                                <?php echo $detalles['cantidad']; ?>
			                            </td>
			                            <td class="text-center">
			                                <?php echo "-"   ?>
			                            </td>
			
			                            <?php }else{?>
			
			                            <td class="text-center">
			                                <?php echo "-"   ?>
			                            </td>
			                            <td class="text-center">
			                                <?php echo $detalles['cantidad']; ?>
			                            </td>
			
			                            <?php }?>
			                            <td class="text-center">
			                                <?php echo $detalles['idUbicacion'];  ?>
			                            </td>
			                        </tr>      
			
			               <?php }}else{ ?>
			
			                        <tr>
			                            <td colspan='3'>
			                                No se encontraron Productos Coincidentes.
			                            </td>
			                        </tr>
			              <?php }  ?>
			            	<tr>
			            		<td colspan="5" class="text-right">
			            			<label>Cantidad: </label>
			            		</td>
			            		<td colspan="2" class="text-center">
			            			<?php echo $cantTotal;?>
			            		</td>
			            		<td>
			            		</td>
			            	</tr>
			            </table> 
			        </div>
			    </div>
			</div>
        </div>
    </body>
  
</html>

