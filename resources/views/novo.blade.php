@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if ($post->id)
                        Edjtar Postagem :
                        <em>{{ $post->titulo }}</em>
                    @else
                        Nova Postagem
                    @endif
                </div>

                <div class="card-body container">
                    {!! Form::open(['route' => 'admin.posts.save', 'files' => true]) !!}
                        {!! Form::hidden('id', $post->id) !!}

                        <div class='form-group row'>
                            <div class='col-3 text-right'>
                                {!! Form::label('titulo') !!}
                            </div>
                            <div class='col-9'>
                                {!! Form::text('titulo', $post->titulo, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class='form-group row'>
                            <div class='col-3 text-right'>
                                {!! Form::label('descricao') !!}
                            </div>
                            <div class='col-9'>
                                {!! Form::textarea('descricao', $post->descricao, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        @if ($post->imagem)
                            <div class='form-group row'>
                                <div class='col-3 text-right'>
                                    Imagem Atual
                                </div>
                                <div class='col-9'>
                                    <img src="{{ URL::asset('storage/'.$post->imagem) }}" alt="{{ $post->titulo }}"
                                        class="img-thumbnail" />
                                </div>
                            </div>
                        @endif

                        <div class='form-group row'>
                            <div class='col-3 text-right'>
                                {!! Form::label('imagem') !!}
                            </div>
                            <div class='col-9'>
                                {!! Form::file('imagem', null, ['class' => 'form-control-file']) !!}
                            </div>
                        </div>

                        <div class='form-group text-right'>
                            <a href="{{ route('home') }}" class="btn btn-link">
                                Cancel
                            </a>
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
                        <div class='form-group'>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
