<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    $conta = 0;
?>


<table>
    <tr>
        <th> # </th>
        <th>Producto</th>
        <th>IdSKU</th>
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
                    <?php echo $list['idSKU']; ?>
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
                    <?php echo $datosBusqueda['idSKU']; ?>
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
