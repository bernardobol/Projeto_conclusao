@extends('layout')
@section('title', 'Categorias')
@section('content')
    
    <div class="row">
        <div class="col">   
            <a href="{{ route('categoriasnovo') }}" class="btn btn-success mb-3">Novo</a>
            <table class="table table-hover talbe-bordered">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Situação</th>
                    <th>Ações</th>
                </tr>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->active ? 'Ativo' : 'Inativo' }}</td>
                    <td>
                        <form action="{{ route('categoriasdelete', ['id'=> $category->id]) }}" method="POST">
                            <a href="{{ route('categoriasform', ['id'=> $category->id]) }}" class="btn btn-info">Editar</a>
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>    
        </div>
    </div> 
@endsection