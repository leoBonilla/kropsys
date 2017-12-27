<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Community Auth - Login Form View
 *
 * Community Auth is an open source authentication application for CodeIgniter 3
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2017, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */


if( ! isset( $on_hold_message ) )
{
	if( isset( $login_error_mesg ) )
	{ ?>
	

<div class="alert alert-danger">
	Error de usuario o contraseña #  <?php echo  $this->authentication->login_errors_count . '/' . config_item('max_allowed_attempts') ; ?>

</div>	


	<?php }

	if( $this->input->get(AUTH_LOGOUT_PARAM) )
	{  ?>
		<div class="alert alert-success">
                                Se ha cerrado su sesión.
                            </div>
<?php	}

	echo form_open( $login_url, ['class' => 'std-form'] ); 
?>

	  <fieldset>
                                <div class="form-group">
                                   
                                    <input type="text" name="login_string" id="login_string" class="form-control" type="email"autocomplete="off" maxlength="255" required="required" data-toggle="tooltip" title="Rut sin puntos ej. 12534153-4 , email o nombre de usuario" placeholder="12534153-4" autofocus/>

                                </div>
                                <div class="form-group">
                                    <input type="password" name="login_pass" id="login_pass" class="form-control" <?php 
			if( config_item('max_chars_for_password') > 0 )
				echo 'maxlength="' . config_item('max_chars_for_password') . '"'; 
		?> autocomplete="off" readonly="readonly" onfocus="this.removeAttribute('readonly');"  placeholder="Contraseña" required="required" />
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Recordarme
                                    </label>
                                </div>
                          
                             
                                <button type="submit" class="btn btn-lg btn-success btn-block">Ingresar</button>
                            </fieldset>
</form>

<?php

	}
	else
	{ ?>
		
		<div class="alert alert-danger">
                                Se ha excedido el numero maximo de intentos.
                                El acceso a su cuenta se ha bloqueado por  ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutos.
                            </div>





	<?php }

/* End of file login_form.php */
/* Location: /community_auth/views/examples/login_form.php */ 