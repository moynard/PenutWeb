<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    $conta = 0;
?>


<table class="">
    <tr>
        <th> # </th>
        <th>Producto</th>
        <th>IdSKU</th>
        <th>Cantidad en Existencia</th>
    </tr>
    <?php if(isset($datosBusqueda) && $datosBusqueda != FALSE){ if( isset($datosBusqueda[0])){foreach ($datosBusqueda as $key => $list) {?>
            <tr>
                <td>
                    <?php $conta=$conta+1; echo $conta; ?>
                </td>
                <td>
                    <?php echo $list['descProducto']; ?>
                </td>
                    <td>
                        <?php echo anchor('catalogoProductos/detallesProducto/'.$list['idSKU'],$list['idSKU']); ?>
                    </td>
                <td>
                            <?php 
                            		echo $list['cantTotReal'];
							 ?>
                </td>
            </tr>
    <?php  }}else{?>
            <tr>
                <td>
                    <?php $conta=$conta+1; echo $conta; ?>
                </td>
                <td>
                    <?php echo $datosBusqueda['descProducto']; ?>
                </td>
                    <td>
                        <?php echo anchor('catalogoProductos/detallesProducto/'.$datosBusqueda['idSKU'],$datosBusqueda['idSKU']); ?>
                    </td>
                <td>
                            <?php 
                            		echo $datosBusqueda['cantTotReal'];
							 ?>
            </tr>        
        
   <?php }}else{ ?>
       
            <tr>
                <td colspan='3'>
                    No se encontraron Productos Coincidentes.
                </td>
            </tr>
       
  <?php }  ?>
</table> 
