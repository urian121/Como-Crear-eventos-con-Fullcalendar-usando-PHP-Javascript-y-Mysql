
<div class="modal" id="modalUpdateEvento"  tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Actualizar mi Evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <form name="formEventoUpdate" id="formEventoUpdate" action="" class="form-horizontal" method="POST">
    <input type="hidden" class="form-control" name="idEvento" id="idEvento">
		<div class="form-group">
			<label for="evento" class="col-sm-12 control-label">Nombre del Evento</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="evento" id="evento" placeholder="Nombre del Evento" required/>
			</div>
		</div>
    <div class="form-group">
      <label for="fecha_inicio" class="col-sm-12 control-label">Fecha Inicio</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha Inicio">
      </div>
    </div>
    <div class="form-group">
      <label for="fecha_fin" class="col-sm-12 control-label">Fecha Final</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="fecha_fin" id="fecha_fin" placeholder="Fecha Final">
      </div>
    </div>

    <div class="col-md-12" id="grupoRadio">
      <label class="orange">
        <input type="radio" name="color_evento" id="color_evento" value="orange" checked>
        <div class="layer"></div>
        <div class="button"><span></span></div>
      </label>

      <label class="amber">
        <input type="radio" name="color_evento" id="color_evento" value="amber">
        <div class="layer"></div>
        <div class="button"><span></span></div>
      </label>

      <label class="lime">
        <input type="radio" name="color_evento" id="color_evento" value="lime">
        <div class="layer"></div>
        <div class="button"><span></span></div>
      </label>

      <label class="teal">
        <input type="radio" name="color_evento" id="color_evento" value="teal">
        <div class="layer"></div>
        <div class="button"><span></span></div>
      </label>

      <label class="blue">
        <input type="radio" name="color_evento" id="color_evento" value="blue">
        <div class="layer"></div>
        <div class="button"><span></span></div>
      </label>

      <label class="indigo">
        <input type="radio" name="color_evento" id="color_evento" value="indigo">
        <div class="layer"></div>
        <div class="button"><span></span></div>
      </label>

    </div>
		
	   <div class="modal-footer">
      	<button type="submit" class="btn btn-success" id="updateEvento">Guardar Cambios de mi Evento</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
    	</div>
	</form>
      
    </div>
  </div>
</div>