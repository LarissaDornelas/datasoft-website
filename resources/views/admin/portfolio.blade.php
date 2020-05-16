@extends('admin/appbar')

@section('content')

<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Gerenciar conteúdo</span>
            <h3 class="page-title">Portfólio</h3>
        </div>
    </div>
    <div class="row" id="card-area" style="display:block;margin-bottom: 25px;">
        <div class="col-sm-12">
            <div class="card card-small card-post card-post--aside
                card-post--1">
                <div class="card-edit-button">
                    <button class="card-button" onclick="changeContent()">
                        <i class="material-icons">edit</i>
                    </button>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Texto principal</h5>
                    <p class="card-text d-inline-block mb-3">{{$data[0]->text}}</p>
                    <p class="text-muted status-update">alteração realizada no
                        dia {{ Carbon\Carbon::parse($data[0]->updated_at)->format('d/m/Y')
                        }}</p>
                </div>
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
                                <form method="POST" action="{{
                                    route('editContent', ['page'=> 'portfolio'])
                                    }}">
                                    {{ csrf_field()}}
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <textarea class="form-control" name="text" rows="5">{{$data[0]->text}}</textarea>
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
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new-portfolio"><i class="material-icons">add</i> Novo item</button>
                </div>
                @if(sizeOf($portfolioData) > 0)
                <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0 table-striped">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" class="border-0">#</th>
                                <th scope="col" class="border-0">Nome</th>
                                <th scope="col" class="border-0">Descrição</th>
                                <th scope="col" class="border-0">Imagem</th>
                                <th scope="col" class="border-0"></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($portfolioData as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->title}}</td>
                                <td style=" max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{$data->text}}</td>
                                <td>

                                    <img src="{{asset('portfolioImages/' .
                                        $data->image_url)}}" alt="" style="height:80px; width:170px;" />

                                </td>
                                <td style="text-align: center">
                                    <span data-toggle="modal" data-target="#edit-portfolio">
                                        <button class="btn btn-warning editPortfolio" data-toggle="tooltip" data-toggle="modal" data-placement="top" title="Editar" data-value="{{$data->id}}" data-title="{{$data->title}}" data-description="{{$data->text}}"> <i class="material-icons">edit</i></button>
                                    </span>
                                    <span data-toggle="modal" data-target="#delete-portfolio">
                                        <button class="btn btn-danger deletePortfolio" data-toggle="tooltip" data-placement="top" title="Excluir" data-value="{{$data->id}}"> <i class="material-icons">delete</i></button>
                                    </span>

                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @else
                    <h6 style="text-align: center; margin-top: 12px;">Ainda não
                        há dados disponíveis</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade darken-background" id="edit-portfolio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="editPortfolioForm" method="POST" enctype="multipart/form-data">
                {{ csrf_field()}}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar item para portfolio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nome:</label>
                            <input required type="text" class="form-control" maxlength="60" name="title" id="editPortfolioTitle" placeholder="Exemplo: Sig Gerencial">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Descrição:</label>
                            <textarea required class="form-control" name="text" rows="5" id="editPortfolioDescription" placeholder="Descreva aqui sobre o produto/serviço."></textarea>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Imagem:</label>
                                    <input type="file" class="form-control-file" name="image" accept="image/*" id="image">
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

    <div class="modal fade darken-background" id="new-portfolio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{route('createPortfolio')}}" enctype="multipart/form-data">
                {{ csrf_field()}}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastrar item para portfólio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nome:</label>
                            <input required type="title" class="form-control" maxlength="60" name="title" placeholder="Exemplo: Sig Gerencial">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Descrição:</label>
                            <textarea required class="form-control" name="text" rows="5" placeholder="Descreva aqui sobre o produto/serviço."></textarea>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Imagem:</label>
                                    <input type="file" class="form-control-file" name="image" accept="image/*" id="image">
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

    <div class="modal fade darken-background" id="delete-portfolio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="deletePortfolioForm" method="POST">
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