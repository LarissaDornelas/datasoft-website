@extends('admin/appbar')

@section('content')

<!-- / .main-navbar -->
<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Gerenciar conteúdo</span>
            <h3 class="page-title">Quem somos</h3>
        </div>
    </div>

    <div class="row" id="card-area" style="display:block; margin-bottom: 40px">
        <div class="col-sm-12">
            <div class="card card-small mb-4">
                <div class="card-edit-button">
                    <button class="card-button" onclick="changeContent()">
                        <i class="material-icons">edit</i>
                    </button>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item p-4 card-li-fix-height">
                        <h5 class="card-title">Texto principal</h5>
                        <p class="card-text d-inline-block mb-3">{{$data['text']->text}}</p>
                    </li>
                    <li class="list-group-item p-4 card-li-fix-height">
                        <h5 class="card-title">Missão</h5>
                        <p class="card-text d-inline-block mb-3">{{$data['mission']->text}}</p>
                    </li>
                    <li class="list-group-item p-4 card-li-fix-height">
                        <h5 class="card-title">Visão</h5>
                        <p class="card-text d-inline-block mb-3">{{$data['vision']->text}}</p>
                    </li>
                    <li class="list-group-item p-4 card-li-fix-height">
                        <h5 class="card-title">Valores</h5>
                        <p class="card-text d-inline-block mb-3">{{$data['values']->text}}</p>
                        <p class="text-muted status-update">alteração realizada no dia {{ Carbon\Carbon::parse($data['vision']->updated_at)->format('d-m-Y') }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row" id="edit-area" style="display: none;">
        <div class="col-lg-12">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Editar conteúdo</h6>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{ route('editContent', ['page' => 'sobre'])}}">
                                    {{ csrf_field()}}
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="textMain">Texto principal</label>
                                            <textarea class="form-control" name="text" rows="3">{{$data['text']->text}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="textMain">Missão</label>
                                            <textarea class="form-control" name="mission" rows="3">{{$data['mission']->text}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="textMain">Visão</label>
                                            <textarea class="form-control" name="vision" rows="3">{{$data['vision']->text}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="textMain">Valores</label>
                                            <textarea class="form-control" name="values" rows="3">{{$data['values']->text}}</textarea>
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


    @endsection