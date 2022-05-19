@extends('layout')
@section('title', 'Postagens')
@section('content')
    
    <div class="row">
        <div class="col">   
            <a href="{{ route('postagensnovo') }}" class="btn btn-success mb-3">Novo</a>
            <table class="table table-hover talbe-bordered">
                <tr>
                    <th>ID</th>
                    <th>Categoria</th>
                    <th>Data da postagem</th>
                    <th>Título</th>
                    <th>Resumo</th>
                    <th>Texto</th>
                    <th>Status</th>
                </tr>
                @foreach($posts as $post)
                    @if($post->active)
                    <tr>
                    @else
                    <tr class="table-secondary">
                    @endif
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>{{ $post->post_date }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->summary }}</td>
                        <td>{{ $post->text }}</td>
                        <td>{{ $post->active }}</td>
                        <td>
                            <form onsubmit="return confirmDelete();" onsubmit="return confirmDelete()" action="{{ route('postagensdelete', ['id'=> $post->id]) }}" method="POST">
                                <a href="{{ route('postagensform', ['id'=> $post->id]) }}" class="btn btn-info">Editar</a>
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