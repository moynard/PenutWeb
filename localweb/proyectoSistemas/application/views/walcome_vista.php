<?php
    $conta = 0;
    
?>


<div class='g960'>
    <div class="row">
        <div class="c12">
            <?php echo form_open('catalogoProductos/filtro')?>
            <table class="space-top">
                <tr>
                    <td width="17.5%">
                        <label>Filtrar por Producto: </label>
                    </td>
                    <td width="82.5%">
                        <input type="text" name="txtBusqueda" id="txtBusqueda" style="width:100%;">
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div id="dvTabla">
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
                            <?php echo $list['cantidadReal']; ?>
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
                        <td>
                            <?php echo $datosTabla['cantidadReal']; ?>
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
