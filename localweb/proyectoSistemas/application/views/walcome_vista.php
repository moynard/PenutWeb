<?php
    $this->load->library('table');
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
<div class="row">
    
        <?php
        
        
            
        ?>
    
</div>
            

