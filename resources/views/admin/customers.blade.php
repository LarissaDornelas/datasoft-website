@extends('admin/appbar')

@section('content')

<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Gerenciar dados</span>
            <h3 class="page-title">Clientes datasoft</h3>
        </div>
    </div>


    <div class="row ">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">

                    Usuários que contataram através do portal "Fale Conosco".
                </div>

                <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0 table-striped">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" class="border-0">#</th>
                                <th scope="col" class="border-0">Nome</th>
                                <th scope="col" class="border-0">Email</th>
                                <th scope="col" class="border-0">Telefone</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customersData as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>
                                <td style="text-align: center">

                                    <span data-toggle="modal" data-target="#delete-customer">
                                        <button class="btn btn-danger deleteCustomer" data-toggle="tooltip" data-placement="top" title="Excluir" data-value="{{$item->id}}"> <i class="material-icons">delete</i></button>
                                    </span>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade darken-background" id="delete-customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="deleteCustomerForm" method="POST">
                {{ csrf_field()}}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModal">Excluir item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Tem certeza que deseja realizar esta operação?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>

@endsection