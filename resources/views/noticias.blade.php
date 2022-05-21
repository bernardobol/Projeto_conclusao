@extends('layout')
@section('title', 'Postagens')
@section('content')
@if(Auth::check())
    @include('includes.menu')
@else
    @include('includes.menunoticias')
@endif
<style>
    .img{
        /* width: 800px; */
        height: 400px;
    }

    main.container {
        box-shadow: 0 0 8px 3px #e4e4e4;
    }

    .tltle{
        margin-bottom: 50px !important;
    }

    .divs{
        height: 50px;
    }

    .texto{
        font-size: 18px;
    }


</style>

@foreach($posts as $post)
<main class="container my-5 bg-white p-5">
    <div class="row">
        <div class="col-lg-12 ">
            <h1 >{{ $post->title }}</h1>
            <h5>{{ $post->post_date }}</h5>
                <div class="divs"></div>

                <div >
                    <p>
                    {{ $post->summary }}
                    </p>
                </div>

            <div class="d-flex justify-content-center col-lg-12 ">
                <img class=" img img-fluid" src="{{ $post->link_file }}" alt="Imagem responsiva">
            </div>

            <div class="divs"></div>


            <div class="texto">
                <p>
                {{ $post->text }}
                </p>
            </div>

        </div>
    </div>
</main>

@endforeach
    
@endsection