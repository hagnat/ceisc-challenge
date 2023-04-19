@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>{{ $postagem->titulo }}</h2>
                </div>
        
                <div class="card-body">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ URL::asset('storage/'.$postagem->imagem) }}"
                            class="card-img-top" alt="{{ $postagem->titulo }}" >
                    </div>

                    <p class="card-text">
                        {{ $postagem->descricao }}
                    </p>

                    <div class='text-right'>
                        <input type="button" value="Voltar" class="btn btn-link"
                            onclick="window.history.back()" />
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
