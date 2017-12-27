<div class="col-md-12">
	<ul class="nav nav-pills" id="myTab">
                 <li class="active"><a href="#agendamientos" data-toggle="tab" aria-expanded="true">AGENDAMIENTOS</a>
                                </li>
                 <li class=""><a href="#reasignaciones" data-toggle="tab" aria-expanded="false">REASIGNACIONES</a>
                                </li>
                 <li class=""><a href="#confirmaciones" data-toggle="tab" aria-expanded="false">CONFIRMACIONES</a>
                                </li>
                 <li class=""><a href="#otros" data-toggle="tab" aria-expanded="false">OTROS</a>
                                </li> 
     </ul>
    <div class="tab-content">
    							<div class="tab-pane fade active in" id="agendamientos">
                                	<?php $this->load->view('agendamientos/agendamientos'); ?>
                                </div>
                                <div class="tab-pane fade" id="reasignaciones">
                                	<?php $this->load->view('agendamientos/reasignaciones'); ?>
                                </div>
                                 <div class="tab-pane fade" id="confirmaciones">
                                	<?php $this->load->view('agendamientos/confirmaciones'); ?>
                                </div>
                                 <div class="tab-pane fade" id="otros">
                                	<?php $this->load->view('agendamientos/otros'); ?>
                                </div>
    </div>
</div>