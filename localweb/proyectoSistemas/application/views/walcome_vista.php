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
    <div class="row">
        <table>
            <tr>
                <th> # </th>
                <th>IdSKU</th>
                <th>Producto</th>
            </tr>
            <?php foreach ($datosTabla as $key => $list) {?>
            <tr>
                <td>
                    <?php $conta=$conta+1; echo $conta; ?>
                </td>
                <td>
                    <?php echo $list['idSKU']; ?>
                </td>
                <td>
                    <?php echo $list['descProducto']; ?>
                </td>
            </tr>
            <?php  }  ?>
        </table> 
    </div>
</div>
