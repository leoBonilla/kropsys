<div class="col-md-12">
      <div class="row filtros">
        <div class="col-md-4">
         <div class="row">
               <div class="input-group input-daterange col-md-12" style="margin-bottom:5px;">
                    <input type="text" class="form-control datepicker" name="fecha" id="fecha" value="" placeholder="01/10/2017">
                     <span class="input-group-btn">
                        <button type="button" class="btn btn-warning date-filter-btn" id="date_btn" type="button"><i class="fa fa-filter"></i></button>
                      </span>
              </div>
         </div>

        </div>

        <div class="col-md-2">
           <input type="checkbox" name="my-checkbox" data-on-text="SI" data-off-text="NO" data-label-text="Historico">
        </div>

          <div class="col-md-4" id="moment_filter" style="display:none;">
         <div class="row">
               <div class="input-group input-daterange col-md-12" style="margin-bottom:5px;">
                    <input type="text" class="form-control datepicker" name="momento" id="momento" value="" placeholder="01/10/2017">
                     <span class="input-group-btn">
                        <button type="button" class="btn btn-warning date-filter-btn" id="btn_moment" type="button"><i class="fa fa-filter"></i></button>
                      </span>
              </div>
         </div>

        </div>
       
      </div>
</div>
<table id="cupos_table" class="table table-striped table-bordered " cellspacing="0" width="100%">
        <thead>
            <tr>

        <th >Especialidad</th>
        <th id="header_1"></th>
        <th id="header_2"></th>
        <th id="header_3"></th>
        <th id="header_4"></th>
        <th id="header_5"></th>
        <th id="header_6"></th>
        <th id="header_7"></th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>

                 <th >Especialidad</th>
        <th id="footer_1"></th>
        <th id="footer_2"></th>
        <th id="footer_3"></th>
        <th id="footer_4"></th>
        <th id="footer_5"></th>
        <th id="footer_6"></th>
                
            </tr>
        </tfoot>
        <tbody>
        </tbody>
    </table>