<html>
	<head>
		<title>
                    Login
		</title>
            <link href="<?php echo base_url()?>CSS/ivory.css" rel="stylesheet" type="text/css">
	</head>
	<body>
            <?php 
                echo form_open("/login/loginValidation");
            ?>
            <div class="grid">
                <div clss="row"></div>
                <div class="row">
                    <div class="c4"></div>
                    <div class="c4 feature space-top" id="login">
                        <table ID="tblLogin">
                        	<tr>
                        		<td colspan="2">
                        			<img src="<?php echo base_url()?>assets/img/glmmty.png" />
                        		</td>
                        	</tr>
                            <tr>
                                <th colspan="2" >
                                    <label><h5 style="color: white;">WHS Login</h5></label>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <span>Usuario: </span>
                                </td> 
                                <td>
                                    <input type="text" id="txtUsuario" name="txtUsuario" value="" placeholder="Nombre de Usuario" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Contrase&ntilde;a: </span>
                                </td> 
                                <td>
                                    <input type="password" id="txtPassword" name="txtPassword" placeholder="Contrase&ntilde;a" required>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" value="Acceder">
                                    <?php 
                                        $lblArray=array(
                                            'style' => 'color:red;'
                                         );
                                        if(isset($verificacion) and (isset($is_loged_in))){
                                          if($verificacion){
                                                echo form_label("Usuario y/o Contrase&ntilde;a no son Validos!",'Alerta',$lblArray);
                                            }elseif($is_loged_in){
                                                echo form_label("El usuario ya esta loggeado", 'Alerta', $lblArray);
                                            }  
                                        }
                                    ?>
                                </td>
                            </tr>
                        </table>
                        
                    </div>
                    <div class="c4"></div>
                </div>
            </div>
            <?php echo form_close();?>
	</body>
</html>