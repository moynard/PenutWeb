<?php
    $conta = 0;
?>


<div class='g960'>
    <div class="row">
		<div class="btnLogOut space-top" style="margin-bottom: -20px; padding-bottom: 5px; background-color: #9FC6B9;">
			<label>Sus Productos en Almacen</label>
		</div>
        <div class="c12 tabla space-top">
            <?php echo form_open('catalogoProductos/filtro')?>
            <table class="">
                <tr>
                    <td width="17.5%">
                        <label>Filtrar por Producto: </label>
                    </td>
                    <td width="82.5%">
                        <input type="text" name="txtBusqueda" id="txtBusqueda" style="width:100%;">
                    </td>
                    
                	<td>
			    		<a href="<?php echo base_url()?>index.php/catalogoProductos/exportarExcel">
			        		<img src="<?php echo base_url()?>assets/img/Office-Excel-icon.png" alt="Excel" width="25em">
			        	</a>
                	</td>
                </tr>
            </table>
        </div>
    </div>
    <div id="dvTabla" class="c12 tabla">
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
                            <?php echo anchor('catalogoProductos/detallesProducto/'.$list['idProducto'],$list['idSKU']); ?>
                        </td>
                        <td>
                            <?php 
                            		echo $list['cantTotReal']." Pzas";
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
                            <?php echo anchor('catalogoProductos/detallesProducto/'.$datosTabla['idProducto'],$datosTabla['idSKU']); ?>
                        </td>
                        <td style="text-align: right;">
                            <?php 
                            		echo $datosTabla['cantTotReal']." Pzas";
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
    <div class="row">
    	<div class="c4"></div>
    	<div class="c4"></div>
    	<div class="c4">
    	</div>
    </div>
</div>
