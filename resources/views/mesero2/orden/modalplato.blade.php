<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-nuevoplato">
	{{Form::Open(array('action'=>array('Mesero2Controller@store'),'method'=>'POST'))}}

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"
        aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Selecciona la mesa para generar la orden</h4>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">

            <label>Mesa: </label>
            <select name="mesa" id="mesa">
              <option value="1">Mesa 1</option>
              <option value="2">Mesa 2</option>
              <option value="3">Mesa 3</option>
              <option value="4">Mesa 4</option>
              <option value="5">Mesa 5</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <button class="btn btn-primary" type="submit">Guardar</button>
          <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
      </div>
    </div>
  </div>

	{{Form::Close()}}

</div>
