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

    <div class="row" id="edit-area" style="display: none;">
        <div class="col-lg-12">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Editar dados</h6>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="">
                                    {{ csrf_field()}}
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Nome</label>
                                            <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Email">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Nome</label>
                                            <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-row justify-content-end">
                                        <div class="col-xs-12 col-md-2">
                                            <button onclick="changeContent()" type="button" class="mb-2 btn
                                                btn-outline-accent mr-2
                                                btn-block">Cancelar</button>
                                        </div>
                                        <div class="col-xs-12 col-md-2">
                                            <button type="submit" class="btn
                                                btn-accent btn-block">Salvar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>


@endsection