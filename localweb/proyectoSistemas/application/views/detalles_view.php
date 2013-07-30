<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$conta= 0;
$cantTotal = 0;
$list = NULL;
?>

<div class="g960">
	<div class="row">
		<div class="btnLogOut space-top" style="margin-bottom: -20px; padding-bottom: 5px; background-color: #9FC6B9;">
			<label>Historial de Movimientos para el Producto : <?php echo $descProducto; ?></label>
		</div>
	</div>
    <div class="row text-center">
        <div class="c12">
            <table class="space-top tabla">
                <tr>
                    <th> # </th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Factura de Proveedor</th>
                    <th>Factura Comercial</th>
                    <th>Cantidad Entrante</th>
                    <th>Cantidad Saliente</th>
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
                                <?php if($list['idEstado']==1){
                                        echo "Arrivado";
                                    }elseif($list['idEstado']==2){
                                        echo "Disponible";
                                    }elseif($list['idEstado']==3){
                                        echo "Preparado";
                                    }elseif($list['idEstado']==4){
                                        echo "Entregado";
                                    }else{
                                    	echo "Retenido";
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
                       
                <?php  }?>


 <tr>
            		<td colspan="5" class="text-right">
            			<label>Cantidad: </label>
            		</td>
            		<td colspan="2" class="text-center">
            			<?php echo $cantTotal;?>
            		</td>
            		<td>
            			<a href="<?php echo base_url().'index.php/catalogoProductos/exportarExcelHistorialMovimientos/'.$detalles[0]['idProducto']?>">
			        		<img src="<?php echo base_url()?>assets/img/Office-Excel-icon.png" alt="Excel" width="25em">
			        	</a>
            		</td>
            	</tr>



<?php }else{
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
                                    }elseif($detalles['idEstado']==4){
                                        echo "Entregado";
                                    }else{
                                    	echo "Retenido";
                                    }
                                ?>
                            </td>
                            <td class="text-center">
                                <?php echo $detalles['facProveedor'];  ?>
                            </td>
                            <td class="text-center">
                                <?php echo $detalles['facComercial'] ?>
                            </td>
        
                            <td class="text-center">
                                <?php echo $detalles['cantEntrada']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo "-"   ?>
                            </td>
                            <td class="text-center">
                                <?php echo $detalles['idUbicacion'];  ?>
                            </td>
                        </tr>      
<tr>
            		<td colspan="5" class="text-right">
            			<label>Cantidad: </label>
            		</td>
            		<td colspan="2" class="text-center">
            			<?php echo $cantTotal;?>
            		</td>
            		<td>
            			<a href="<?php echo base_url().'index.php/catalogoProductos/exportarExcelHistorialMovimientos/'.$detalles['idProducto']?>">
			        		<img src="<?php echo base_url()?>assets/img/Office-Excel-icon.png" alt="Excel" width="25em">
			        	</a>
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

