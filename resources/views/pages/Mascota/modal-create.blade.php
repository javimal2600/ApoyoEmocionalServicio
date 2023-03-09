<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
              <h3 class="font-weight-bolder text-primary">Nueva Mascota</h3>
              <p class="mb-0">Favor de revisar que todos los datos sean correctos</p>
            </div>
            <div class="card-body">
              <form name="form-data" action="{{ route('guardar_mascota') }}" method="POST" role="form text-left">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label>Nombre</label>
                        <div class="input-group mb-3">
                            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Javier" required >
                        </div>
                    </div>
                    <div class="col-md-6">
                      <label>Tamaño</label>
                      <div class="input-group mb-3">
                        <select id="tamanio" name="tamanio" class="form-control" required >
                          <option>Pequeño</option>
                          <option>Mediano</option>
                          <option>Grande</option>
                        </select>
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label>Tipo Mascota</label>
                    <div class="input-group mb-3">
                      <select id="tipo_mascota_id" name="tipo_mascota_id" class="form-control" required>
                        @foreach($tipos as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label>Refugio</label>
                    <div class="input-group mb-3">
                      <select id="refugio_id" name="refugio_id" class="form-control" required>
                        @foreach($refugios as $refugio)
                        <option value="{{$refugio->id}}">{{$refugio->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label>Descripción</label>
                  <div class="input-group mb-3">
                    <textarea id="descripcion" name="descripcion" class="form-control" placeholder="Cuenta su historia" rows="3" required ></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button id="btn-enviar" type="submit" class="btn bg-primary text-white">Registrar</button>
                  <button type="button" class="btn btn-link ml-auto" data-bs-dismiss="modal">Cerrar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>