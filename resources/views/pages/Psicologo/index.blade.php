@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Lista Psicologo'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <button type="button" class="btn btn-block btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal-form">Nuevo Psicologos</button>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="psicologos" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Apellidos</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Telefono</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha de nacimiento</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Correo</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cedula</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $psicologos as $psicologo )
                                    <tr>
                                        <td class="align-middle text-center text-sm">{{$psicologo->id}}</td>
                                        <td class="align-middle text-center text-sm">{{$psicologo->nombre}}</td>
                                        <td class="align-middle text-center text-sm">{{$psicologo->apellido}}</td>
                                        <td class="align-middle text-center text-sm">{{$psicologo->telefono}}</td>
                                        <td class="align-middle text-center text-sm">{{$psicologo->fechanac}}</td>
                                        <td class="align-middle text-center text-sm">{{$psicologo->correo}}</td>
                                        <td class="align-middle text-center text-sm">{{$psicologo->cedula}}</td>
                                        <td class="align-middle text-center text-sm">
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                    
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                  <li>
                                                    <a class="dropdown-item" data-bs-toggle="modal" href="#modal-form-update{{ $psicologo->id }}">
                                                        <i class="fa-solid fa-pen-to-square"></i><span> </span>Editar
                                                    </a>
                                                </li>
                                                  <li>
                                                    <a class="dropdown-item" data-bs-toggle="modal" href="#modal-delete{{ $psicologo->id }}">
                                                        <i class="fa-solid fa-trash-can"></i><span> </span>Elminar
                                                    </a>
                                                </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    @include('pages.Psicologo.modal-delete')
                                    @include('pages.Psicologo.modal-update')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @extends('pages.Psicologo.modal-create')
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
    $('#psicologos').DataTable({
        "lengthMenu": [[5,10,50, -1],[5,10,50,"ALL"]]
    });
});
</script>
@stop