<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kropsys</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/admin_theme') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href=".<?php echo base_url('assets/admin_theme') ?>/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/admin_theme') ?>/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url('assets/admin_theme') ?>/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets/admin_theme') ?>/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="<?php echo base_url('assets/admin_theme') ?>/vendor/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="<?php echo base_url('assets/consultas')?>/js/datepicker/datepicker3.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/consultas')?>/timepicker/dist/wickedpicker.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/consultas')?>/js/toastr/toastr.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>">Kropsys</a>
            </div>
            <!-- /.navbar-header -->

     <ul class="nav navbar-top-links navbar-right">
               
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                       <li><a href="#"><i class="fa fa-user fa-fw"></i><?php echo $auth_username; ?></a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      <!--   <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                        
                        </li> -->
                        <li>
                            <a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                        </li>
                           <li>
                            <a href="<?php echo base_url('registros'); ?>"><i class="fa fa-eye fa-fw"></i> Mis Registros</a>
                        </li>

                           <li>
                            <a href="#"><i class="fa fa-calendar fa-fw"></i> Cupos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('cupos/listado'); ?>">Listado</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('cupos'); ?>">Ingresar cupo</a>
                                </li>
                       </ul>
                          
                        </li> 

                       <!--  <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">Flot Charts</a>
                                </li>
                                <li>
                                    <a href="morris.html">Morris.js Charts</a>
                                </li>
                            </ul>
                          
                        </li> -->
                        <!-- <li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                                <li>
                                    <a href="icons.html"> Icons</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grid</a>
                                </li>
                            </ul>
                            
                        </li> -->
                        <!-- <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                  </li>
                            </ul>
                           
                        </li> -->
                       <!--  <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
                                </li>
                            </ul>
                            
                        </li> -->
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->

		
        </nav>

        <div id="page-wrapper">
            <!-- /.row -->
            <div class="row">
                   <div class="col-lg-12 col-md-12"> 
        <!--   <h1 class="mt-5">Envio de sms</h1> -->
<!--           <h3 class="mt-3">Agendamiento</h3>
          <p></p>

 -->

 <p></p>
    <div class="row">
         <div class="col-md-12 ">
             <ul class="nav nav-pills" id="myTab">
                                <li class="active"><a href="#home-pills" data-toggle="tab" aria-expanded="true">AGENDAMIENTO</a>
                                </li>
                                <li class=""><a href="#profile-pills" data-toggle="tab" aria-expanded="false">REASIGNACIÓN</a>
                                </li>
                                <li class=""><a href="#messages-pills" data-toggle="tab" aria-expanded="false">CONFIRMACIONES</a>
                                </li>
                                 <li class=""><a href="#otros-pills" data-toggle="tab" aria-expanded="false">OTROS</a>
                                </li> 
                            </ul>
           <br>
           <br>
            <div class="tab-content">
                                <div class="tab-pane fade active in" id="home-pills">
                                <h4>AGENDAMIENTO</h4>
<!--INICIO AGENDAMIENTO -->

      <?php echo form_open(base_url('agendamiento/processagendamiento'),array('role' => 'form', 'method' => 'post', 'id' => 'form_agendamiento')); ?>
<div class="row">
                <div class="col-md-4 form-group">
                                <label for="especialidad">ESPECIALIDAD</label>
                                <select name="especialidad" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" id="select-especialidad-agendamiento" required="required">
                                                <option value=""></option>
                                                <?php  foreach($espec as $row) :?>
                                                <option value="<?php echo $row->id ?>">
                                                                <?php echo $row->especialidad; ?>
                                                </option>
                                                <?php endforeach; ?>
                                </select>
                </div>
                <div class="col-md-4 form-group">
                                <label for="doctor">PROFESIONAL</label>
                                <select name="profesional" class="form-control selectpicker select-profesional" data-show-subtext="true" data-live-search="true" id="select-profesional-agendamiento" required="required">
                                                <option value=""></option>
                                </select>
                </div>
                <div class="col-md-4 form-group">
                                <label for="doctor">PRESTACIÓN</label>
                                <select name="prestacion" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required="required">
                                                <option value=""></option>
                                                <?php  foreach($prestaciones as $row) :?>
                                                <option value="<?php echo $row->id ?>">
                                                                <?php echo $row->prestacion; ?>
                                                </option>
                                                <?php endforeach; ?>
                                </select>
                </div>
</div>
<div class="row">
                <div class="col-md-3 form-group">
                                <label for="p_agendados">Nº PACIENTES AGENDADOS</label>
                                <input type="text" name="p_agendados" class="form-control numbersOnly" placeholder="0" required="required">
                </div>
                <div class="col-md-3 form-group">
                                <label for="no_contestaron">NO CONTESTARON</label>
                                <input type="text" name="no_contestaron" class="form-control numbersOnly" placeholder="0" required="required">
                </div>
                <div class="col-md-3 form-group">
                                <label for="rechazos_anulacions">RECHAZOS / ANULACIONES</label>
                                <input type="text" name="rechazos_anulaciones" class="form-control numbersOnly" placeholder="0" required="required">
                </div>
                <div class="col-md-3 form-group">
                                <label for="hora_ya_asignada">HORAS YA ASIGNADAS</label>
                                <input type="text" name="hora_ya_asignada" class="form-control numbersOnly" placeholder="0" required="required">
                </div>

                   <div class="col-md-3 form-group">
                                <label for="erroneos">NRO ERRONEO / SIN NUMERO</label>
                                <input type="text" name="erroneos" class="form-control numbersOnly" placeholder="0" required="required">
                </div>
</div>
<div class="row">
                <div class="form-group col-md-12">
                                <label>OBSERVACIONES</label>
                                <textarea name="observaciones" class="form-control" rows="3" placeholder="Aquí sus Observaciones"></textarea>
                </div>
</div>
<div class="row">
                <div class="col-md-3 form-group">
                              <!--   <button class="btn btn-primary">Guardar</button> -->
                              <input type="submit" value="Guardar" class="btn btn-primary btn-submit" />
                </div>
</div>
</form>

<!--FIN AGENDAMIENTO -->

                                </div>
                                <div class="tab-pane fade" id="profile-pills">
                                   <h4>REASIGNACION</h4>

<!--COMIENZO REASIGNACIONES -->
      <?php echo form_open(base_url('agendamiento/processreasignaciones'),array('role' => 'form', 'method' => 'post', 'id' => 'form_reasignaciones')); ?>
<div class="row">
                <div class="col-md-4 form-group">
                                <label for="especialidad">ESPECIALIDAD</label>
                                <select name="especialidad" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" id="select-especialidad-reasignaciones" required="required">
                                                <option value=""></option>
                                                <?php  foreach($espec as $row) :?>
                                                <option value="<?php echo $row->id ?>">
                                                                <?php echo $row->especialidad; ?>
                                                </option>
                                                <?php endforeach; ?>
                                </select>
                </div>
                <div class="col-md-4 form-group">
                                <label for="doctor">PROFESIONAL</label>
                                <select name="profesional" class="form-control selectpicker select-profesional" data-show-subtext="true" data-live-search="true" id="select-profesional-reasignaciones" required="required">
                                                <option value=""></option>
                                </select>
                </div>
                <div class="col-md-4 form-group">
                                <label for="doctor">PRESTACIÓN</label>
                                <select name="prestacion" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required="required">
                                                <option value=""></option>
                                                <?php  foreach($prestaciones as $row) :?>
                                                <option value="<?php echo $row->id ?>">
                                                                <?php echo $row->prestacion; ?>
                                                </option>
                                                <?php endforeach; ?>
                                </select>
                </div>
</div>
<div class="row">
                <div class="col-md-3 form-group">
                                <label for="pacientes">Nº PACIENTES </label>
                                <input type="text" name="pacientes" class="form-control numbersOnly" placeholder="0" required="required">
                </div>
                <div class="col-md-3 form-group">
                                <label for="p_agendados">Nº PACIENTES AGENDADOS</label>
                                <input type="text" name="p_agendados" class="form-control numbersOnly" placeholder="0" required="required">
                </div>
                <div class="col-md-3 form-group">
                                <label for="no_contestaron">NO CONTESTARON</label>
                                <input type="text" name="no_contestaron" class="form-control numbersOnly" placeholder="0" required="required">
                </div>
                <div class="col-md-3 form-group">
                                <label for="rechazos_anulacions">RECHAZOS / ANULACIONES</label>
                                <input type="text" name="rechazos_anulaciones" class="form-control numbersOnly" placeholder="0" required="required">
                </div>
                <div class="col-md-3 form-group">
                                <label for="hora_ya_asignada">HORAS YA ASIGNADAS</label>
                                <input type="text" name="hora_ya_asignada" class="form-control numbersOnly" placeholder="0" required="required">
                </div>

                <div class="col-md-3 form-group">
                                <label for="sin_cupo">SIN CUPO</label>
                                <input type="text" name="sin_cupo" class="form-control numbersOnly" placeholder="0" required="required">
                </div>

                    <div class="col-md-3 form-group">
                                <label for="erroneos">NRO ERRONEO / SIN NUMERO</label>
                                <input type="text" name="erroneos" class="form-control numbersOnly" placeholder="0" required="required">
                </div>
</div>

<div class="row">
                <div class="form-group col-md-12">
                                <label>OBSERVACIONES</label>
                                <textarea name="observaciones" class="form-control" rows="3" placeholder="Aquí sus Observaciones"></textarea>
                </div>
</div>
<div class="row">
                <div class="col-md-3 form-group">
                               <input type="submit" value="Guardar" class="btn btn-primary btn-submit" />
                </div>
</div>
</form>


<!--FIN REASIGNACIONES -->
                                    
                                </div>
                                <div class="tab-pane fade" id="messages-pills">
                                    <h4>CONFIRMACIONES</h4>
 <!--COMIENZO CONFIRMACIONES -->
      <?php echo form_open(base_url('agendamiento/processconfirmaciones'),array('role' => 'form', 'method' => 'post', 'id' => 'form_confirmaciones')); ?>
<div class="row">
                <div class="col-md-4 form-group">
                                <label for="especialidad">ESPECIALIDAD</label>
                                <select name="especialidad" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" id="select-especialidad-confirmaciones" required="required">
                                                <option value=""></option>
                                                <?php  foreach($espec as $row) :?>
                                                <option value="<?php echo $row->id ?>">
                                                                <?php echo $row->especialidad; ?>
                                                </option>
                                                <?php endforeach; ?>
                                </select>
                </div>
                <div class="col-md-4 form-group">
                                <label for="doctor">PROFESIONAL</label>
                                <select name="profesional" class="form-control selectpicker select-profesional" data-show-subtext="true" data-live-search="true" id="select-profesional-confirmaciones" required="required">
                                                <option value=""></option>
                                </select>
                </div>
                <div class="col-md-4 form-group">
                                <label for="doctor">PRESTACIÓN</label>
                                <select name="prestacion" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required="required">
                                                <option value=""></option>
                                                <?php  foreach($prestaciones as $row) :?>
                                                <option value="<?php echo $row->id ?>">
                                                                <?php echo $row->prestacion; ?>
                                                </option>
                                                <?php endforeach; ?>
                                </select>
                </div>
</div>
<div class="row">
                <div class="col-md-3 form-group">
                                <label for="p_agendados">Nº PACIENTES </label>
                                <input type="text" name="pacientes" class="form-control numbersOnly" placeholder="0" required="required">
                </div>

                <div class="col-md-3 form-group">
                                <label for="p_agendados">CONFIRMADAS </label>
                                <input type="text" name="confirmadas" class="form-control numbersOnly" placeholder="0" required="required">
                </div>
                <div class="col-md-3 form-group">
                                <label for="no_contestaron">NO CONTESTAN</label>
                                <input type="text" name="no_contestaron" class="form-control numbersOnly" placeholder="0" required="required">
                </div>
                <div class="col-md-3 form-group">
                                <label for="rechazos_anulacions">RECHAZOS / ANULACIONES</label>
                                <input type="text" name="rechazos_anulaciones" class="form-control numbersOnly" placeholder="0" required="required">
                </div>
                <div class="col-md-3 form-group">
                                <label for="hora_ya_asignada">REASIGNADAS</label>
                                <input type="text" name="reasignadas" class="form-control numbersOnly" placeholder="0" required="required">
                </div>

                   <div class="col-md-3 form-group">
                                <label for="erroneos">NRO ERRONEO / SIN NUMERO</label>
                                <input type="text" name="erroneos" class="form-control numbersOnly" placeholder="0" required="required">
                </div>
</div>
<div class="row">
                <div class="form-group col-md-12">
                                <label>OBSERVACIONES</label>
                                <textarea name="observaciones" class="form-control" rows="3" placeholder="Aquí sus Observaciones"></textarea>
                </div>
</div>
<div class="row">
                <div class="col-md-3 form-group">
                               <input type="submit" value="Guardar" class="btn btn-primary btn-submit" />
                </div>
</div>
</form>

<!-- FIN CONFIRMACIONES -->
                              
</div>



                               <div class="tab-pane fade" id="otros-pills">
                                    <h4>OTROS</h4>
 <!--OTROS -->
      <?php echo form_open(base_url('agendamiento/processotros'),array('role' => 'form', 'method' => 'post', 'id' => 'form_otros')); ?>
<div class="row">
                <div class="col-md-4 form-group">
                                <label for="especialidad">ESPECIALIDAD</label>
                                <select name="especialidad" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" id="select-especialidad-otros" required="required">
                                                <option value=""></option>
                                                <?php  foreach($espec as $row) :?>
                                                <option value="<?php echo $row->id ?>">
                                                                <?php echo $row->especialidad; ?>
                                                </option>
                                                <?php endforeach; ?>
                                </select>
                </div>
                <div class="col-md-4 form-group">
                                <label for="doctor">PROFESIONAL</label>
                                <select name="profesional" class="form-control selectpicker select-profesional" data-show-subtext="true" data-live-search="true" id="select-profesional-otros" required="required">
                                                <option value=""></option>
                                </select>
                </div>
                <div class="col-md-4 form-group">
                                <label for="doctor">PRESTACIÓN</label>
                                <select name="prestacion" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required="required">
                                                <option value=""></option>
                                                <?php  foreach($prestaciones as $row) :?>
                                                <option value="<?php echo $row->id ?>">
                                                                <?php echo $row->prestacion; ?>
                                                </option>
                                                <?php endforeach; ?>
                                </select>
                </div>
</div>
<div class="row">
                <div class="col-md-3 form-group">
                                <label for="p_agendados">Nº PACIENTES </label>
                                <input type="text" name="pacientes" class="form-control numbersOnly" placeholder="0" required="required">
                </div>

                <div class="col-md-3 form-group">
                                <label for="p_agendados">CONFIRMADAS </label>
                                <input type="text" name="confirmadas" class="form-control numbersOnly" placeholder="0" required="required">
                </div>
                <div class="col-md-3 form-group">
                                <label for="no_contestaron">NO CONTESTAN</label>
                                <input type="text" name="no_contestaron" class="form-control numbersOnly" placeholder="0" required="required">
                </div>
                <div class="col-md-3 form-group">
                                <label for="rechazos_anulacions">RECHAZOS / ANULACIONES</label>
                                <input type="text" name="rechazos_anulaciones" class="form-control numbersOnly" placeholder="0" required="required">
                </div>
                <div class="col-md-3 form-group">
                                <label for="hora_ya_asignada">REASIGNADAS</label>
                                <input type="text" name="reasignadas" class="form-control numbersOnly" placeholder="0" required="required">
                </div>

                   <div class="col-md-3 form-group">
                                <label for="erroneos">NRO ERRONEO / SIN NUMERO</label>
                                <input type="text" name="erroneos" class="form-control numbersOnly" placeholder="0" required="required">
                </div>
</div>
<div class="row">
                <div class="form-group col-md-12">
                                <label>OBSERVACIONES</label>
                                <textarea name="observaciones" class="form-control" rows="3" placeholder="Aquí sus Observaciones"></textarea>
                </div>
</div>
<div class="row">
                <div class="col-md-3 form-group">
                               <input type="submit" value="Guardar" class="btn btn-primary btn-submit" />
                </div>
</div>
</form>

<!-- FIN OTROS -->
                              
                                </div>           


                           
                            </div>
     </div>
    </div>
        
      


       
        </div>


        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/admin_theme') ?>/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/admin_theme') ?>/vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url('assets/admin_theme') ?>/dist/js/sb-admin-2.js"></script>

    <script src="<?php echo base_url('assets/consultas')?>/js/ajaxform/jquery.form.js"></script>
      <script src="<?php echo base_url('assets/admin_theme/vendor')?>/metisMenu/metisMenu.min.js"></script>
      <script src="<?php echo base_url('assets/admin_theme/vendor')?>/mask/jquery.mask.min.js"></script>
    
<script src="<?php echo base_url('assets/consultas')?>/js/popper.js"></script>
<script src="<?php echo base_url('assets/consultas')?>/js/datepicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url('assets/consultas')?>/js/datepicker/locales/bootstrap-datepicker.es.js"></script>
    <script src="<?php echo base_url('assets/consultas')?>/js/toastr/toastr.min.js"></script>
    <script src="<?php echo base_url('assets/consultas')?>/js/jquery-validation/jquery.validate.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/consultas')?>/timepicker/dist/wickedpicker.min.js"></script>

    <script src="<?php echo base_url('assets/admin_theme') ?>/vendor/bootstrap-select/dist/js/bootstrap-select.js"></script><script src="<?php echo base_url('assets')?>/global.js"></script>
    <script>

    $(document).ready(function(){
             
   $('#myTab a').click(function(e) {
  e.preventDefault();
  $(this).tab('show');
});

   $.validator.addMethod("sumConfirmaciones", function(value, element) { 
         var conf = Number($("#form_confirmaciones input[name=confirmadas]").val());
         var no_cont = Number($("#form_confirmaciones input[name=no_contestaron]").val());
         var rec_anula = Number($('#form_confirmaciones input[name=rechazos_anulaciones]').val());
         var rea = Number($('#form_confirmaciones input[name=reasignadas]').val());
         var err = Number($('#form_confirmaciones input[name=erroneos]').val());
         var pac = Number($('#form_confirmaciones input[name=pacientes]').val());
         var sum = conf + no_cont + rec_anula + rea + err;
         if(sum === pac){
            return true;
         } 
    return false;
                }, "La suma para el total de pacientes no es correcta");

    
    $.validator.addMethod("sumReasignaciones", function(value, element) { 
         var pac = Number($('#form_reasignaciones input[name=pacientes]').val());
         var pagen = Number($('#form_reasignaciones input[name=p_agendados]').val());
         var no_cont = Number($("#form_reasignaciones input[name=no_contestaron]").val());
         var rec_anula = Number($('#form_reasignaciones input[name=rechazos_anulaciones]').val());
         var hasig = Number($("#form_reasignaciones input[name=hora_ya_asignada]").val());
         var scupo = Number($('#form_reasignaciones input[name=sin_cupo]').val());
         var err = Number($('#form_reasignaciones input[name=erroneos]').val());

         var sum = pagen+ no_cont + rec_anula + hasig + scupo + err;
         if(sum === pac){
            return true;
         } 
    return false;
                }, "La suma para el total de pacientes no es correcta");

    $.validator.addMethod("sumOtros", function(value, element) { 
         var conf = Number($("#form_otros input[name=confirmadas]").val());
         var no_cont = Number($("#form_otros input[name=no_contestaron]").val());
         var rec_anula = Number($('#form_otros input[name=rechazos_anulaciones]').val());
         var rea = Number($('#form_otros input[name=reasignadas]').val());
         var err = Number($('#form_otros input[name=erroneos]').val());
         var pac = Number($('#form_otros input[name=pacientes]').val());
         var sum = conf + no_cont + rec_anula + rea + err;
         if(sum === pac){
            return true;
         } 
    return false;
                }, "La suma para el total de pacientes no es correcta");
       var form1 =  $('#form_agendamiento').validate();
	   var form2 = $('#form_reasignaciones').validate({
        rules:{
            pacientes : "sumReasignaciones",
        }
       });
	   var form3 = $('#form_confirmaciones').validate({
        rules:{
            pacientes : "sumConfirmaciones",
        }
       });
       var form4 = $('#form_otros').validate({
        rules:{
            pacientes : "sumOtros",
        }
       });
         $('#form_agendamiento,#form_reasignaciones,#form_confirmaciones,#form_otros').ajaxForm({
                beforeSubmit: function () {
					var form = $(this);
					form.find('.btn-submit').prop('value','Espeer');
				   
                },
                success: function(res) {
                            
                        
                            if(res.error == false){
                                toastr["success"]("GUARDADO CON EXITO!");
                                 setTimeout(function () { 
                                    location.reload();
                                    }, 1000);

                            }else{
                                toastr["error"]("SE PRODUJO UN ERROR, POR FAVOR INTENTELO MAS TARDE!");

                            }
                        }
          });

$('#select-especialidad-agendamiento,#select-especialidad-reasignaciones,#select-especialidad-confirmaciones,#select-especialidad-otros').on('changed.bs.select',function(e){
                 var form = $(this).parents('form:first');
var selector = $(this);
                        $.ajax({
                        url : BASE_URL +'/seleccion/profesionales',
                         data : {id : selector.val()},
                        type : 'POST',
                        dataType : 'html',
                          success : function(html) {
                            var id = selector.attr('id');
                            var element_id = '' ;
                             if(id == 'select-especialidad-agendamiento'){
                                
                               element_id = '#select-profesional-agendamiento';
                             }
                              if(id == 'select-especialidad-reasignaciones'){
                                
                               element_id = '#select-profesional-reasignaciones';
                             }

                            if(id == 'select-especialidad-confirmaciones'){
                                
                               element_id = '#select-profesional-confirmaciones';
                             }

                            if(id == 'select-especialidad-otros'){
                                
                               element_id = '#select-profesional-otros';
                             }



                              $(element_id).html('<option value="" ></option>');
                              $(element_id).append(html);
                              $(element_id).selectpicker('refresh');
                           
                        },
                           error : function(xhr, status) {
                              
                          },
                         complete : function(xhr, status) {
                            //alert('Petición realizada');
                            
                        }});
           
        
           });

});



    </script>

</body>

</html>
