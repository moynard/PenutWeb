<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$conta= 0;
?>

<div class="g960">
    <div class="row text-center">
        <div class="c12">
            <table class="space-top">
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
                <?php if(isset($detalles) && $detalles != FALSE){ if( isset($detalles[0])){foreach ($detalles as $key => $list) {?>
                        <tr>
                            <td class="text-center">
                                <?php $conta=$conta+1; echo $conta; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $list['fechamovimiento']; ?>
                            </td>
                            <td class="text-center">
                                <?php if($list['idestado']=='1'){
                                        echo "Arrivado";
                                    }elseif($list['idestado']==2){
                                        echo "Disponible";
                                    }elseif($list['idestado']==3){
                                        echo "Preparado";
                                    }else{
                                        echo "Hold";
                                    }
                                ?>
                            </td>
                            <td class="text-center">
                                <?php echo $list['numfacturapro'];  ?>
                            </td>
                            <td class="text-center">
                                <?php echo $list['numfacturacomercial'] ?>
                            </td>

                            <?php if($list['tipodemovimiento']=='R'){ ?>
                            <td class="text-center">
                                <?php echo $list['cantidad']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo "-"   ?>
                            </td>
                            <?php }else{?>  
                            <td class="text-center">
                                <?php echo "-"   ?>
                            </td>
                            <td class="text-center">
                                <?php echo $list['cantidad']; ?>
                            </td>
                            <?php }?>
                            <td class="text-center">
                                <?php echo $list['idubicacionalmacen'];  ?>
                            </td>
                        </tr>
                <?php  }}else{?>
                        <tr>
                            <td class="text-center">
                                <?php $conta=$conta+1; echo $conta; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $detalles['fechamovimiento']; ?>
                            </td>
                            <td class="text-center">
                                <?php if($detalles['idestado']==1){
                                        echo "Arrivado";
                                    }elseif($detalles['idestado']==2){
                                        echo "Disponible";
                                    }elseif($detalles['idestado']==3){
                                        echo "Preparado";
                                    }else{
                                        echo "Hold";
                                    }
                                ?>
                            </td>
                            <td class="text-center">
                                <?php echo $detalles['numfacturapro'];  ?>
                            </td>
                            <td class="text-center">
                                <?php echo $detalles['numfacturacomercial'] ?>
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
                                <?php echo $detalles['idubicacionalmacen'];  ?>
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

