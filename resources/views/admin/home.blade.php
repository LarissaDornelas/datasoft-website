@extends('admin/appbar')

@section('content')

<!-- / .main-navbar -->
<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Gerenciar conteúdo</span>
            <h3 class="page-title">Início</h3>
        </div>
    </div>

    <div class="row" id="card-area" style="display:block">
        <div class="col-sm-12">
            <div class="card card-small card-post card-post--aside
                card-post--1">
                <div class="card-edit-button">
                    <button class="card-button" onclick="changeContent()">
                        <i class="material-icons">edit</i>
                    </button>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Ultima atualização</h5>
                    <p class="card-text d-inline-block mb-3">Com a Datasoft você
                        tem soluções práticas para o seu negócio.</p>
                    <p class="text-muted status-update">alteração realizada por
                        Carlos Duarte
                        no dia 27 de janeiro</p>
                </div>
            </div>
        </div>

    </div>

    <div class="row" id="edit-area" style="display: none;">
        <div class="col-sm-12">
            <!-- Add New Post Form -->
            <div class="card card-small mb-3">
                <div class="card-body">
                    <form class="add-new-post">
                        <input class="form-control form-control-lg mb-3"
                            type="text" placeholder="Your Post Title">
                        <div id="editor-container" class="add-new-post__editor
                            mb-1"></div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>


@endsection