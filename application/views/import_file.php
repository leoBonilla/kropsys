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
                       <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil</a>
                        </li>
                       <!-- <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li> -->
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->


        </nav>

        <div id="page-wrapper">
            <!-- /.row -->
            <div class="row">
                   <div class="col-lg-12 col-md-12"> 
                     <h3 class="mt-3">Cargar un archivo xlsx</h3>
          <p></p>
      
                   <form action="">
                        <div class="col-md-8">
                            <input type="file" name="file" class="form-control" />
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success">Cargar</button>
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


    <script>
       
    </script>

</body>

</html>
