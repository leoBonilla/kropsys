<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url('assets/img') ?>/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('assets/img') ?>/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('assets/img') ?>/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img') ?>/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('assets/img') ?>/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('assets/img') ?>/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url('assets/img') ?>/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('assets/img') ?>/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/img') ?>/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url('assets/img') ?>/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assets/img') ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('assets/img') ?>/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/img') ?>/favicon-16x16.png">
    <link rel="manifest" href="<?php echo base_url('assets/img') ?>/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo base_url('assets/img') ?>/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <title><?php echo $title;?></title>

    <!-- Bootstrap Core CSS -->
<!--     <link href="<?php echo base_url('assets/admin_theme') ?>/vendor/bootstrap/css/bootstrap.min.css?v=<?php echo VERSION; ?>" rel="stylesheet">
 -->

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- MetisMenu CSS -->
    <link href=".<?php echo base_url('assets/admin_theme') ?>/vendor/metisMenu/metisMenu.min.css?v=<?php echo VERSION; ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/admin_theme') ?>/dist/css/sb-admin-2.css?v=<?php echo VERSION; ?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url('assets/admin_theme') ?>/vendor/morrisjs/morris.css?v=<?php echo VERSION; ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets/admin_theme') ?>/vendor/font-awesome/css/font-awesome.min.css?v=<?php echo VERSION; ?>" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="<?php echo base_url('assets/admin_theme')?>/vendor/datepicker/datepicker3.css?v=<?php echo VERSION; ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin_theme'); ?>/vendor/bootstrap-select/dist/css/bootstrap-select.css?v=<?php echo VERSION; ?>">
     <link rel="stylesheet" href="<?php echo base_url('assets/admin_theme/vendor') ?>/toastr/toastr.css?v=<?php echo VERSION; ?>">
    

    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin_theme/vendor'); ?>/bootstrap-daterangepicker/daterangepicker.css?v=<?php echo VERSION; ?>">
    <?php if(isset($dt_js)){
        if($dt_js== true){ ?>
                <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
                <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css">


      <?php  }
    }?>
    <?php foreach ($css as $css) :?>
    <link href="<?php echo base_url('assets/admin_theme/').$css.'?v='.VERSION ; ?>" rel="stylesheet" />
    <?php endforeach; ?>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin_theme')?>/vendor/datatables-plugins/buttons.dataTables.min.css?v=<?php echo VERSION; ?>">

      <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"
  integrity="sha384-OHBBOqpYHNsIqQy8hL1U+8OXf9hH6QRxi0+EODezv82DfnZoV7qoHAZDwMwEJvSw"
  crossorigin="anonymous">
  <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin_theme/vendor/select2/select2.css') ?>">


</head>

<body> 
    <div id="wrapper">


        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>">
                    <img src="<?php echo base_url('assets/img/logo.png') ?>" alt="" class="logo" style="height:30px;margin-top:-5px;">
                </a>
            </div>
            <!-- /.navbar-header -->

       <ul class="nav navbar-top-links navbar-right notifications-nav">
                <li class="dropdown ">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="true">
                        <i class="fa fa-bell fa-fw"></i>
                            <?php if($notifications){ ?>
                                   <span class="badge badge-notify" id="notification-count" ><?php echo count($notifications); ?></span> 
                                <?php }
                                    else{ ?>
                                    <span class="badge badge-notify" id="notification-count" style="display:none">0</span> 
                                    <?php }

                                 ?><i class="fa fa-caret-down"></i>
                    </a>
                  
                    <?php if($notifications != false) :?>
                        <ul class="dropdown-menu dropdown-alerts" id="navbar-notifications">
                            <?php foreach ($notifications as $row) : ?>
                                <li>
                            <a href="<?php echo base_url('documentos'); ?> " data-noti-id="<?php echo $row->id; ?>" class="notification-link">
                                <div>
                                    <i class="fa fa-comment fa-tasks"></i> <?php echo $row->title; ?>
                                    <span class="pull-right text-muted small"><time class="timeago" datetime="<?php echo $row->time ?>"><?php echo $row->time ?></time></span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                            <?php endforeach; ?>
             <!--            <li>
                           <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-tasks"></i> 
                                    <span class="pull-right text-muted small">Eliminar todas</span>
                                </div>
                            </a>
                        </li> -->
                        </ul>

                    <?php else: ?>
                        <ul class="dropdown-menu dropdown-alerts" id="navbar-notifications" style="display: none">
                            
                        </ul>


                    <?php  endif; ?>
            <!--         <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul> -->
                    <!-- /.dropdown-alerts -->
                </li>
               
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                       
                        <li><a href="<?php echo base_url('users/perfil'); ?>"><i class="fa fa-user fa-fw"></i>Perfil</a>
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
                        <?php if(in_array($auth_level, array(4,9,12))): ?>
                                      <li>
                            <a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                        </li>
                           <li>
                            <a href="<?php echo base_url('registros'); ?>"><i class="fa fa-eye fa-fw"></i> Mis Registros</a>
                        </li>

                      <li>
                            <a href="#"><i class="fa fa-ticket fa-fw"></i> Cupos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('cupos/listado'); ?>">Listado</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('cupos'); ?>">Ingresar cupo</a>
                                </li>
                       </ul>
                          
                        </li> 
                        <?php endif; ?>
                            
                        <?php if($auth_level >= ADMIN_LEVEL) :?>
                              <li>
                            <a href="#"><i class="fa  fa-suitcase"></i> Administrador<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                 <li>
                                    <a href="<?php echo base_url('users'); ?>"><i class="fa fa-users "></i> Usuarios</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('profesionales'); ?>"><i class="fa fa-user-md "></i> Profesionales</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('reportes'); ?>"><i class="fa fa-bar-chart-o "></i>  Reportes</a>
                                </li>

                                <li>
                                    <a href="<?php echo base_url('registros/llamadas'); ?>"><i class="fa fa-phone "></i> Llamadas</a>
                                </li>

                               
                            </ul>
                        </li>
                        <?php endif; ?>


                 
                    <?php if(in_array($auth_level, array(2,3, 9,12))): ?>
                               <li>
                            <a href="#"><i class="fa  fa-building "></i> Inmunomedica <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                 <li>
                                    <a href="<?php echo base_url('inmunomedica/'); ?>"><i class="fa fa-arrow-circle-right"></i> Panel</a>
                                </li>
                                 <li>
                                    <a href="<?php echo base_url('inmunomedica/reportes'); ?>"><i class="fa fa-bar-chart-o"></i> Reportes</a>
                                </li>
                             
                             

                               
                            </ul>
                        </li>
                     <?php endif; ?>
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
            <div class="row">
                <div class="col-lg-12">
                    <!-- <h3 class="page-header"><?php echo $page_header; ?></h3> -->
                    
                        <div class="col-md-9"><h3 class="" style="margin-left:-16px;"><?php echo $page_header; ?></div>
                        <div class="col-md-3" >
                           
                            <div class="btn-group btn-group-xs pull-right" style="margin-right:-15px;margin-top: 10px;">
                                <?php if(isset($buttons)){
                                    echo $buttons; 
                                }?>
                        <a class="btn btn-sm btn-default " href="<?php echo base_url(); ?>" ><i class="fa fa-home"></i></a>
                            </div>
                        </div>
                    
                    <h3 class="page-header"></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <img src="<?php echo base_url(); ?>assets/img/ajax-loader.gif" id="loading-indicator" style="display:none" />
              <!-- PAGE CONTENT BEGINS -->
 <?php echo $contents;?>
 <!-- PAGE CONTENT ENDS -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->



                   <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                        </div>
                                        <div class="modal-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->

    <!-- jQuery -->
   <!-- <script src="<?php echo base_url('assets/admin_theme') ?>/vendor/jquery/jquery.min.js?v=<?php echo VERSION; ?>"></script> -->

   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <!-- Bootstrap Core JavaScript -->
<!--     <script src="<?php echo base_url('assets/admin_theme') ?>/vendor/bootstrap/js/bootstrap.min.js?v=<?php echo VERSION; ?>"></script> -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url('assets/admin_theme') ?>/vendor/ajaxform/jquery.form.js?v=<?php echo VERSION; ?>"></script>
    <script src="<?php echo base_url('assets/admin_theme') ?>/dist/js/sb-admin-2.js?v=<?php echo VERSION; ?>"></script>
     <script src="<?php echo base_url('assets/admin_theme/vendor')?>/metisMenu/metisMenu.min.js?v=<?php echo VERSION; ?>"></script>
     <script src="<?php echo base_url('assets/admin_theme/vendor') ?>/jquery-validation/jquery.validate.js?v=<?php echo VERSION; ?>"></script>
     <script src="<?php echo base_url('assets/admin_theme/vendor') ?>/mask/jquery.mask.js?v=<?php echo VERSION; ?>"></script>
     <script src="<?php echo base_url('assets/admin_theme/vendor') ?>/toastr/toastr.min.js?v=<?php echo VERSION; ?>"></script>
     <script type="text/javascript" src="<?php echo base_url('assets/admin_theme/vendor')?>/timepicker/dist/wickedpicker.min.js?v=<?php echo VERSION; ?>"></script>
     <script type="text/javascript" src="<?php echo base_url('assets/admin_theme/vendor')?>/datepicker/bootstrap-datepicker.js?v=<?php echo VERSION; ?>"></script>
      <script type="text/javascript" src="<?php echo base_url('assets/admin_theme/vendor')?>/datepicker/locales/bootstrap-datepicker.es.js?v=<?php echo VERSION; ?>"></script>
     <script type="text/javascript" src="<?php echo base_url('assets/admin_theme/vendor')?>/bootstrap-select/dist/js/bootstrap-select.js?v=<?php echo VERSION; ?>"></script>

             <script src="<?php echo base_url('assets/admin_theme/vendor'); ?>/bootstrap-daterangepicker/moment.js?v=<?php echo VERSION; ?>"></script> 
        <script src="<?php echo base_url('assets/admin_theme/vendor'); ?>/bootstrap-daterangepicker/daterangepicker.js?v=<?php echo VERSION; ?>"></script> 
     <script src="<?php echo base_url('assets') ?>/kropsys.jquery.js" ></script>
     <script src="<?php echo base_url('assets')?>/global.js?v=<?php echo VERSION; ?>"></script>
         <script type="text/javascript" src="<?php echo base_url('assets/admin_theme/vendor')?>/snow/snowfall.jquery.min.js?v=<?php echo VERSION; ?>"></script>

         <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
         <script src="<?php echo base_url('assets/admin_theme/vendor')?>/timeago/jquery.timeago.js?v=<?php echo VERSION; ?>" type="text/javascript"></script>

         <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>



        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script> 
                <script src="<?php echo base_url('assets/admin_theme/vendor'); ?>/summernote/lang/summernote-es-ES.js?v=<?php echo VERSION; ?>"></script> 
        <script src="<?php echo base_url('assets/admin_theme/vendor/editable/editable/js/bootstrap-editable.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin_theme/vendor/select2/select2.js') ?>"></script>

  <script>
 // Enable pusher logging - don't include this in production
   // Pusher.logToConsole = true;

    var pusher = new Pusher('d2cee8a3e04c9befaf5d', {
      cluster: 'us2',
      encrypted: true
    });

    var channel = pusher.subscribe('<?php echo $auth_user_id; ?>');
    var notifi_count = $('#notification-count');

///console.log(notifi_count.text());
    channel.bind('notification', function(notification){
            var message = notification.message;
            
            var counter = notifi_count.text();

            counter = Number(counter) + 1;

            notifi_count.text('' + counter);
            if($(notifi_count).is(":visible") === false){
                    $(notifi_count).toggle();
                     $('#navbar-notifications').toggle();
            }
            notifi_count.addClass('animated flash infinite');
            toastr["success"](message);


             $('#navbar-notifications').prepend('<li><a href="" class="notification-link"><div><i class="fa fa-tasks"></i> '+message+'<span class="pull-right text-muted small">Hace menos de un minuto</span></div></a></li><li class="divider"></li>').find('li:first').addClass('animated flash');

        });
  
  </script>
  <!-- CARGAR LOS JS DE DATATABLES -->
  <?php if(isset($dt_js)){
        if($dt_js === true) ?>
 
    
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js"></script>
  <script src="<?php echo base_url('assets/admin_theme/vendor') ?>/datatables-plugins/dataTables.buttons.min.js" ></script>
    <script src="<?php echo base_url('assets/admin_theme/vendor') ?>/datatables-plugins/buttons.bootstrap.min.js" ></script>
    <script src="<?php echo base_url('assets/admin_theme/vendor') ?>/datatables-plugins/jszip.min.js" ></script>
    <script src="<?php echo base_url('assets/admin_theme/vendor') ?>/datatables-plugins/pdfmake.min.js" ></script>
    <script src="<?php echo base_url('assets/admin_theme/vendor') ?>/datatables-plugins/vfs_fonts.js" ></script>
    <script src="<?php echo base_url('assets/admin_theme/vendor') ?>/datatables-plugins/buttons.html5.min.js" ></script>
    <script src="<?php echo base_url('assets/admin_theme/vendor') ?>/datatables-plugins/buttons.print.min.js" ></script>


  <?php 
}
  ?>

 <?php foreach ($scripts as $js) :?>
        <script src="<?php echo base_url('assets/admin_theme/').$js.'?v='.VERSION; ?>"></script>
    <?php endforeach; ?>

</body>

</html>