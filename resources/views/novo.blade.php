@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Nova Postagem
                </div>

                <div class="card-body">
                    {!! Form::open(['route' => 'admin.posts.create', 'files' => true]) !!}

                        <div class='form-group'>
                            {!! Form::label('titulo') !!}
                            {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class='form-group'>
                            {!! Form::label('descricao') !!}
                            {!! Form::text('descricao', null, ['class' => 'form-control', 'style' => 'height: 200px']) !!}
                            <!-- pq eh assim que se cria um campo textarea, neh grassi ? ;) -->
                        </div>

                        <div class='form-group'>
                            {!! Form::label('imagem') !!}
                            {!! Form::file('imagem', null, ['class' => 'form-control-file']) !!}
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
