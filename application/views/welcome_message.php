
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-paper-plane   fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                  <!-- <div class="huge">26</div> -->
                                    <div>SMS</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url('sms/enviar'); ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Enviar nuevo SMS</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
            </div>
         <?php if($auth_level >= ADMIN_LEVEL) {?>
            <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-user  fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                  <!-- <div class="huge">26</div> -->
                                    <div>Usuarios</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url('users/nuevo'); ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Crear usuarios</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
            </div>
         <?php } ?>
            <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa   fa-clock-o  fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                  <!-- <div class="huge">26</div> -->
                                    <div>Registro de actividad</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url('agendamiento'); ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Registro de actividad</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
            </div>

         <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-calendar  fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <div>Cupos diarios</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url('cupos'); ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Crear cupos</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
            </div>

             <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-tasks  fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <div>Mis tareas</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url('documentos'); ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Mis tareas</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
            </div>

               <?php if($auth_level >= ADMIN_LEVEL) {?>
        <!--        <div class="col-lg-3 col-md-6">
                  <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <div>Administrar tareas</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url('tareas'); ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Gestion de tareas</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
            </div> -->

        
             <div class="col-lg-3 col-md-6">
                  <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-envelope fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <div>Administrador de emails</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url('tareas/email'); ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Administrar emails</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
            </div> 

        <?php } ?>
 
