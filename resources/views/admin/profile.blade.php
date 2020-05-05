@extends('admin/appbar')

@section('content')

<!-- / .main-navbar -->
<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Gerenciar dados</span>
            <h3 class="page-title">Meu Perfil</h3>
        </div>
    </div>

    <div class="row" id="card-area" style="display:block">
        <div class="col-sm-12">
            <div class="card card-small mb-4">
                <!-- <div class="card-edit-button">
                    <button class="card-button" onclick="changeContent()">
                        <i class="material-icons">edit</i>
                    </button>
                </div> -->
                <ul class="list-group list-group-flush">

                    <li class="list-group-item p-4">
                        <h6 class="card-title">Alterar nome</h6>
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{Route('changeName')}}">
                                    {{ csrf_field()}}
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <input type="text" name="name" class="form-control" placeholder="Novo nome">
                                        </div>

                                        <div class="col-xs-12 col-md-2">
                                            <button type="submit" class="btn
                                                btn-accent btn-block">Salvar</button>
                                        </div>
                                        @if(session('successName'))
                                        <div style="display:block" id="login-alert" class="alert alert-success alert-dismissible col-sm-12" role="alert">{{session('successName')}} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button></div>
                                        @endif
                                        @if(session('errorName'))
                                        <div style="display:block" id="login-alert" class="alert alert-danger alert-dismissible col-sm-12" role="alert">{{session('errorName')}} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button></div>
                                        @endif
                                    </div>

                                </form>
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item p-4">
                        <h6 class="card-title">Alterar senha</h6>
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{Route('changePassword')}}">
                                    {{ csrf_field()}}
                                    <div class="form-row">
                                        <div class="form-group col-md-4 @if(session('errorPassword')) has-error @endif">
                                            <input type="password" name="passwordNow" class="form-control" placeholder="Senha atual">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="password" name="password" class="form-control" placeholder="Nova senha">
                                        </div>

                                        <div class="col-xs-12 col-md-2">
                                            <button type="submit" class="btn
                                                btn-accent btn-block">Salvar</button>
                                        </div>
                                        @if(session('successPassword'))
                                        <div style="display:block" id="login-alert" class="alert alert-success alert-dismissible col-sm-12" role="alert">{{session('successPassword')}} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button></div>
                                        @endif
                                        @if(session('errorPassword'))
                                        <div style="display:block" id="login-alert" class="alert alert-danger alert-dismissible col-sm-12" role="alert">{{session('errorPassword')}} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button></div>
                                        @endif
                                    </div>

                                </form>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item p-4">
                        <div class="row  justify-content-center">
                            <div class="col-12">
                                <button type="button" class="btn btn-outline-danger btn-block" data-toggle="modal" data-target="#deleteModal">Excluir conta</button>
                            </div>
                            @if(session('errorDelete'))
                            <div style="display:block" id="login-alert" class="alert alert-danger alert-dismissible col-sm-12" role="alert">{{session('errorDelete')}} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button></div>
                            @endif
                    </li>
                </ul>
            </div>

        </div>
        <div class="modal fade darken-background" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModal">Excluir conta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Tem certeza que deseja realizar esta operação?
                        <p style="font-weight: normal">Após confirmado sua sessão será encerrada e você não poderá desfazer a ação.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" onclick="location.href = '{{Route('deleteAccount')}}';">Confirmar</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection