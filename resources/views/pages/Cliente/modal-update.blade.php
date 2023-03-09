<div class="modal fade" id="modal-form-update{{ $cliente->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
              <h3 class="font-weight-bolder text-primary">Actualizar Cliente</h3>
              <p class="mb-0">Favor de revisar que todos los datos sean correctos</p>
            </div>
            <div class="card-body">
              <form name="form-data-update{{$cliente->id}}" action="{{ route('update_cliente',$cliente->id) }}" method="POST" role="form text-left">
                @csrf
                <input type="hidden" id="id" value="{{$cliente->id}}">
                <div class="row">
                    <div class="col-md-6">
                        <label>Nombre</label>
                        <div class="input-group mb-3">
                            <input type="text" id="nombre" name="nombre" class="form-control" value="{{$cliente->nombre}}" required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Apellido</label>
                        <div class="input-group mb-3">
                            <input type="text" id="apellido" name="apellido" class="form-control" value="{{$cliente->apellido}}" required >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Telefono</label>
                        <div class="input-group mb-3">
                            <input type="number" id="telefono" name="telefono" class="form-control" value="{{$cliente->telefono}}" required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Fecha Nacimiento</label>
                        <div class="input-group mb-3">
                            <input type="date" id="fechanac" name="fechanac" class="form-control" value="{{$cliente->fechanac}}" required >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label>Correo</label>
                    <div class="input-group mb-3">
                        <input type="email" id="correo" name="correo" class="form-control" value="{{$cliente->correo}}" required >
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btn-enviar" type="submit" class="btn bg-primary text-white">Actualizar</button>
                    <button type="button" class="btn btn-link ml-auto" data-bs-dismiss="modal">Cerrar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>