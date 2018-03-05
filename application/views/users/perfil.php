<div class="col-md-12">
		<ul class="list-group">
  <li class="list-group-item">NOMBRE : <?php echo strtoupper($user->nombre .' '.$user->apellido) ; ?></li>
  <li class="list-group-item">USERNAME : <?php echo strtoupper($user->username) ;?></li>
  <li class="list-group-item">RUT : <?php echo strtoupper($user->rut);?></li>
  <li class="list-group-item">EMAIL : <?php echo strtoupper($user->email);?></li>
  <li class="list-group-item">ROL : <?php switch ($auth_level) {
  	case 1:
  		  echo 'USUARIO EXTERNO';
  		break;

  		case 3:
  		  echo 'USUARIO INTERNO';
  		break;

  		case 9:
  		  echo 'ADMINISTRADOR';
  		break;

  		case 12:
  		  echo 'SUPER USUARIO';
  		break;
  	
  	default:
  		// code...
  		break;
  } ?> </li>
  <li class="list-group-item">ANEXO : <?php echo $user->anexo;?></li>
</ul>
	</div>
