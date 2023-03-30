@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Encuesta'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <button type="button" class="btn btn-block btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal-form">Nueva Encuesta</button>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="mascotas" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mascota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $encuestas as $encuesta )
                                    <tr>
                                        <td class="align-middle text-center text-sm">{{$encuesta->id}}</td>
                                        <td class="align-middle text-center text-sm">{{$encuesta->nombre}}</td>
                                        <td class="align-middle text-center text-sm">{{$encuesta->nombreM}}</td>
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">

                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                  <li>
                                                    <a class="dropdown-item" data-bs-toggle="modal" href="#modal-form-update{{ $cliente->id }}">
                                                        <i class="fa-solid fa-pen-to-square"></i><span> </span>Editar
                                                    </a>
                                                </li>
                                                  <li>
                                                    <a class="dropdown-item" data-bs-toggle="modal" href="#modal-delete{{ $cliente->id }}">
                                                        <i class="fa-solid fa-trash-can"></i><span> </span>Elminar
                                                    </a>
                                                </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    @include('pages.Cliente.modal-delete')
                                    @include('pages.Cliente.modal-update')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @extends('pages.Cliente.modal-create')
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
    $('#clientes').DataTable({
        "lengthMenu": [[5,10,50, -1],[5,10,50,"ALL"]]
    });
});
</script>
@stop
