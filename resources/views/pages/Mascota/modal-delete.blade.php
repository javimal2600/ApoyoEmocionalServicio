<div class="modal fade" id="modal-delete{{ $mascota->id_mascota }}" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-notification">Favor de confirmar la acción</h6>
          </div>
          <div class="modal-body">
            <div class="py-3 text-center">
                <i class="ni ni-bell-55 ni-3x"></i>
                <h4 class="text-gradient text-danger mt-4">Se eliminará la Mascota {{ $mascota->nombre }}</h4>
                
                <p>Toda la información será borrada de la base de datos una vez confirme la acción.</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger">
                <a href="{{ route('delete_mascota',$mascota->id_mascota) }}" class="text-white">Eliminar</a>
            </button>
            <button type="button" class="btn btn-link ml-auto" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
</div>