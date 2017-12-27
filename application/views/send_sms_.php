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

    <link rel="stylesheet" href="<?php echo base_url('assets/consultas')?>/js/datepicker/datepicker3.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/consultas')?>/timepicker/dist/wickedpicker.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/consultas')?>/js/toastr/toastr.css">
 <link href="<?php echo base_url('assets/admin_theme') ?>/vendor/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css">

 <link rel="stylesheet" href="<?php echo base_url('assets/admin_theme/vendor')?>/clockpicker/dist/bootstrap-clockpicker.css">
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
          <h3 class="mt-3">Envio de SMS</h3>
          <p></p>

    
          <form action="<?php echo base_url('api/sendsms') ?>" role="form" class="" method="post" id="form">
            
            <div class="row">
             <div class="col-md-4 form-group">
            <label for="especialidad">ESPECIALIDAD</label>
            <select name="especialidad" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required="required" id="select-especialidad">
            <option value="">ESPECIALIDAD</option>
                <?php 
                  foreach($specialties as $row){ ?>
                  <option value="<?php echo $row->id; ?>"><?php echo $row->especialidad; ?></option>
                <?php
                  }
                ?>
                </select>
            </div>

              <div class="col-md-4 form-group">
            <label for="profesional">PROFESIONAL</label>
            <select name="profesional" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required="required" id="select-profesional">
            <option value="">PROFESIONAL</option>

                </select>
            </div>
<!-- 
                <div class="col-md-4 form-group">
            <label for="doctor">Médico</label>
                <input type="text" name="doctor" class="form-control" required="required" placeholder="Pedro Gonzalez">
            </div>
                -->
            <div class="col-md-2 form-group">
            <label for="fecha">Fecha</label>
                <input type="text" name="fecha" class="form-control datepicker" data-date-start-date="0d" required="required" placeholder="19/11/2017">
            </div>

                <div class="col-md-2 form-group">
            <label for="hora">Hora</label>
                <input type="text" name="hora" class="form-control timepicker" placeholder="10:30" required="required">

            </div>
            </div>

            <div class="row">
                    <div class="col-md-4 form-group">
            <label for="paciente">Paciente</label>
                <input type="text" name="paciente" class="form-control" required="required" placeholder="Juan Pérez">
            </div>

            <div class="col-md-4 form-group">
            <label for="lugar">Lugar</label>
                <!-- <input type="text" name="lugar" class="form-control" required="required"> -->
              <select name="lugar" id="" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required="required">
                <option value="">LUGAR DE ATENCIÓN</option>
                <?php 
                  foreach($locations as $row){ ?>
                  <option value="<?php echo $row->id; ?>"><?php echo $row->location. ', '.$row->address; ?></option>
                <?php
                  }
                ?>
              </select>
            </div>

            <div class="col-md-4 form-group">
            <label for="celular">Celular</label>
                <input type="text" id="celular" name="celular" class="form-control numbersOnly" required="required" placeholder="955423534" data-toggle="tooltip" title="Número celular con 9 digitos">
            </div>

            <div class="col-md-4 form-group">
                <button type="submit" class="btn btn-success" id="submit-btn">Enviar</button>  <input type="reset" class="btn btn-default" value="Limpiar" />
            </div>
            </div>

          </form>
       
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
    
<script src="<?php echo base_url('assets/consultas')?>/js/popper.js"></script>
<script src="<?php echo base_url('assets/consultas')?>/js/datepicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url('assets/consultas')?>/js/datepicker/locales/bootstrap-datepicker.es.js"></script>
    <script src="<?php echo base_url('assets/consultas')?>/js/toastr/toastr.min.js"></script>
    <script src="<?php echo base_url('assets/consultas')?>/js/jquery-validation/jquery.validate.js"></script>
<!--     <script type="text/javascript" src="<?php echo base_url('assets/consultas')?>/timepicker/dist/wickedpicker.min.js"></script> -->
 <script src="<?php echo base_url('assets/admin_theme') ?>/vendor/bootstrap-select/dist/js/bootstrap-select.js"></script>
       <script src="<?php echo base_url('assets/admin_theme/vendor')?>/mask/jquery.mask.min.js"></script>
       <script src="<?php echo base_url('assets/admin_theme/vendor')?>/clockpicker/dist/bootstrap-clockpicker.js"></script>
 <script src="<?php echo base_url('assets') ?>/global.js"></script>


    <script>
        $(document).ready(function(){
            $('#form').validate({
                 onkeyup: false,
                 rules:{
                     celular: {
                     required: true,
                     minlength: 9,
                     maxlength: 9,
                    },
                 hora:{
                    required: true,
                     time24: true
                 }
                 }
            });


             $('#form').ajaxForm({
                beforeSubmit: function () {
                     $('#form').find('#submit-btn').val("Espere por favor...").click(function(e){
                        e.preventDefault();
                        return false;
                    });
                    return $("#form").valid(); // TRUE Cuando el formulario es valido
                },
                success: function(res) {
                            var form = this;
                            var result = res.result;
                            if(result == true){
                                toastr["success"]("OPERACIÓN REALIZADA CON ÉXITO!");
                                 setTimeout(function () { 
                                     location.reload();
                                    }, 6000);

                            }else{
                                toastr["error"]("SE PRODUJO UN ERROR, POR FAVOR INTENTELO MAS TARDE!");

                            }
                        }
             });


        });
        
            $('#select-especialidad').on('changed.bs.select',function(e){
                 var selector = $(this);
                 $.ajax({
                        url : BASE_URL +'/seleccion/profesionales',
                         data : {id : selector.val()},
                        type : 'POST',
                        dataType : 'html',
                          success : function(html) {


                              $('#select-profesional').html('<option value="" ></option>');
                              $('#select-profesional').append(html);
                              $('#select-profesional').selectpicker('refresh');
                           
                        },
                           error : function(xhr, status) {
                              
                          },
                         complete : function(xhr, status) {
                            //alert('Petición realizada');
                            
                        }});
            });
        
            jQuery.extend(jQuery.validator.messages, {
                                required: "Este campo es obligatorio.",
                                remote: "Por favor, rellena este campo.",
                                email: "Por favor, escribe una dirección de correo válida",
                                url: "Por favor, escribe una URL válida.",
                                date: "Por favor, escribe una fecha válida.",
                                dateISO: "Por favor, escribe una fecha (ISO) válida.",
                                number: "Por favor, escribe un número entero válido.",
                                digits: "Por favor, escribe sólo dígitos.",
                                creditcard: "Por favor, escribe un número de tarjeta válido.",
                                equalTo: "Por favor, escribe el mismo valor de nuevo.",
                                accept: "Por favor, escribe un valor con una extensión aceptada.",
                                maxlength: jQuery.validator.format("Por favor, no escribas más de {0} digitos."),
                                minlength: jQuery.validator.format("Por favor, no escribas menos de {0} digitos."),
                                rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
                                range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
                                max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
                                min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
                });

      $('.datepicker').mask('00/00/0000');
$('.timepicker').mask('00:00');
$('.timepicker').clockpicker({
        default: 'now',
        donetext: 'OK',
        autoclose: true,
        placement: 'left',
    });
$('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    language: 'es',
    autoclose:true,
    todayHighlight: true,
    title: 'Seleccione fecha',
});



              
    </script>

</body>

</html>
