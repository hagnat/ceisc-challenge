@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Postagens</div>

                <div class="card-body">
                    @forelse ($postagens as $postagem)
                        <div class="card" style="width: 18rem;">
                            <img src="{{ URL::asset('storage/'.$postagem->imagem) }}"
                                class="card-img-top" alt="{{ $postagem->titulo }}">

                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $postagem->titulo }}
                                </h5>
                                <p class="card-text">
                                    {{ $postagem->descricao }}
                                </p>
                                <a href="{{ URL::to('postagem', ['id' => $postagem->id, 'slug' => $postagem->slug()]) }}"
                                    class="btn btn-primary">
                                    Abrir
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="card" style="width: 18rem;">
                            <em>Nenhuma postagem encontrada.</em>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
