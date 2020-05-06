@extends('admin/appbar')

@section('content')

<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Gerenciar conteúdo</span>
            <h3 class="page-title">Downloads</h3>
        </div>
    </div>

    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row ">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new-download"><i class="material-icons">add</i> Novo link para download</button>
                </div>
                @if(sizeOf($downloadsData) > 0)
                <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0 ">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" class="border-0">Nome</th>
                                <th scope="col" class="border-0">Descrição</th>
                                <th scope="col" class="border-0">Link</th>
                                <th scope="col" class="border-0"></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($downloadsData as $download)
                            <tr>

                                <td>{{$download->title}}</td>
                                <td>{{$download->description}}</td>
                                <td>{{$download->link}}</td>
                                <td style="text-align: center">
                                    <span data-toggle="modal" data-target="#edit-download">
                                        <button class="btn btn-warning edit" data-toggle="tooltip" data-toggle="modal" data-placement="top" title="Editar" data-value="{{$download->id}}" data-title="{{$download->title}}" data-description="{{$download->description}}" data-link="{{$download->link}}"> <i class="material-icons">edit</i></button>
                                    </span>
                                    <span data-toggle="modal" data-target="#delete-download">
                                        <button class="btn btn-danger delete" data-toggle="tooltip" data-placement="top" title="Excluir" data-value="{{$download->id}}"> <i class="material-icons">delete</i></button>
                                    </span>

                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @else
                    <h6 style="text-align: center; margin-top: 12px;">Ainda não há downloads disponíveis</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade darken-background" id="edit-download" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="editForm" method="POST">
                {{ csrf_field()}}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar link para download</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nome:</label>
                            <input required type="text" class="form-control" name="title" id="editTitle" placeholder="Exemplo: Atualização do Sig Gerencial">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label" maxlength="30">Descrição:</label>
                            <input required type="text" class="form-control" name="description" id="editDescription" placeholder="Exemplo: versão 1.2 disponível">
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Link:</label>
                                    <input required type="text" class="form-control" name="link" id="editLink" placeholder="Exemplo: https://www.linkparadownload.com.br">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade darken-background" id="new-download" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{route('createDownload')}}">
                {{ csrf_field()}}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastrar link para download</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nome:</label>
                            <input required type="text" class="form-control" name="title" placeholder="Exemplo: Atualização do Sig Gerencial">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label" maxlength="30">Descrição:</label>
                            <input required type="text" class="form-control" name="description" placeholder="Exemplo: versão 1.2 disponível">
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Link:</label>
                                    <input required type="text" class="form-control" name="link" placeholder="Exemplo: https://www.linkparadownload.com.br">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade darken-background" id="delete-download" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="deleteForm" method="POST">
                {{ csrf_field()}}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModal">Excluir link</h5>
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