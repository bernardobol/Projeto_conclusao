@extends('layout')
@section('title', 'Formulário de Postagem')
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

        @if($post->id)
        <form action="{{ route('postagensupdate', ['id' => $post->id]) }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
        @else
        <form action="{{ route('postagensinsert') }}" method="POST">
        @endif
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $post->id }}">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="title">Título da Postagem</label>
                        <input type="text" id="title" name="title" value="{{$post->title}}" class="form-control">
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="category_id">
                            Categoria
                        </label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">Selecione</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ ($post->category_id == $category->id) ? 'selected' : '' }}>
                                    {{ $category->name }} 
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="summary">Resumo</label>
                            <textarea type="text" class="form-control" id="summary" 
                            name="summary">{{ $post->summary }}</textarea>                      
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="text" >Texto</label>
                            <textarea type="text" class="form-control" id="text" 
                            name="text">{{ $post->text }}</textarea>                     
                        </div>
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="link_file">Link do Arquivo</label>
                            <input type="text" class="form-control" name="link_file" id="link_file" 
                            value="{{ $post->link_file }}">
                        </div>
                    </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="active" >Status</label>
                           <select name="active" id="active" class="form-control">
                               <option value="1"{{$post->active ? 'selected' : ''}}>
                                   Ativo
                                </option>
                               <option value="0"{{ !$post->active ? 'selected' : '' }}>
                                   Inativo
                                </option>
                           </select>                      
                    </div>
                </div>
                
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="post_date">Data da Postagem</label>
                        <input type="datetime-local" class="form-control" id="post_date" 
                            name="post_date" value="{{ $post->post_date }}">
                        </input>
                    </div>
                </div>

                
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ route('postagens') }}" class="btn btn-secondary" >Cancelar</a>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </div>

        

        </form>
    </div>
</div
@endsection