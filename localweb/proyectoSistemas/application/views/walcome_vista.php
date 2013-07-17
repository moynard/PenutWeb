<?php
    $this->load->library('table');
    $conta = 0;
?>

<div class="row">
    <div class="c12">
        <div class="row">
            <div clasS="c12 text-left">
                Bienvenido <?php echo $this->session->userdata('email') ?>
            </div>
        </div>
        <div class="row">
            <div clasS="c12 text-right">
                <?php echo anchor('login/logOut','LogOut'); ?>
            </div>
        </div>
    </div>
</div>
<div class='g960'>
    <div class="row space-top">
        <div class="c12">
            <?php echo form_open('catalogoProductos/filtro')?>
            <table>
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
    <div class="row" id="dvTabla" name="dvTabla">
        <table>
            <tr>
                <th> # </th>
                <th>Producto</th>
                <th>IdSKU</th>
            </tr>
            <?php if(isset($datosTabla)){foreach ($datosTabla as $key => $list) {?>
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
            <?php  }}else{ echo "no contiene Productos registrados";}  ?>
        </table> 
    </div>
</div>
