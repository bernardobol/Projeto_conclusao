@extends('layout')
@section('title', 'Produtos')
@section('content')
    
    <div class="row">
        <div class="col">   
            <a href="{{ route('produtosnovo') }}" class="btn btn-success mb-3">Novo</a>
            <table class="table table-hover talbe-bordered">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
                @foreach($products as $product)
                    @if($product->active)
                    <tr>
                    @else
                    <tr class="table-secondary">
                    @endif
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->category->title }}</td>
                        <td>
                            <form onsubmit="return confirmDelete();" onsubmit="return confirmDelete()" action="{{ route('produtosdelete', ['id'=> $product->id]) }}" method="POST">
                                <a href="{{ route('produtosform', ['id'=> $product->id]) }}" class="btn btn-info">Editar</a>
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