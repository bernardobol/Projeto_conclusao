@extends('layout')
@section('title', 'Formulário de Categoria')
@section('content')
<div class="row">
    <div class="col">

    
        @if($errors->any())
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-danger">
                    <p class="lead">Os seguintes erros foram encontrados:</p>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            <br>
            @endforeach
                </div>   
            </div>
        </div>
        @endif    

        @if($category->id)
        <form action="{{ route('categoriasupdate', ['id' => $category->id]) }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
        @else
        <form action="{{ route('categoriasinsert') }}" method="POST">
        @endif
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $category->id }}">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="name">Nome da Categoria</label>
                        <input type="text" id="name" name="name" value="{{$category->name}}" class="form-control">
                        <label for="description">Descrição da Categoria</label>
                        <input type="text" id="description" name="description" value="{{$category->description}}" class="form-control">
                        @if($category->id)
                        <label for="active">Status da Categoria</label>
                        <select name="active" id="active" value="{{$category->active}}" class="form-control">
                            <option value="1"{{ $category->active ? 'selected' : '' }}>Ativo</option>
                            <option value="0"{{ !$category->active ? 'selected' : '' }}>Inativo</option>
                        </select>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ route('categorias') }}" class="btn btn-secondary" >Cancelar</a>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </div>

        

        </form>
    </div>
</div
@endsection