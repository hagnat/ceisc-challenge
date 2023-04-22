@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Postagens</div>

                <button type="button" class="btn btn-labeled btn-success col-2 m-2"
                    onclick="window.location='{{ route('admin.posts.new') }}'">
                    + Nova
                </button>

                <div class="card-body">
                    <table width="100%">
                        <colgroup>
                            <col width="50%">
                            <col width="10%">
                            <col width="40%">
                        </colgroup>

                        <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Ativo</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($postagens as $postagem)
                                <tr>
                                    <th>
                                        {{ $postagem->titulo }}
                                    </th>

                                    <td class='published'>
                                        @if ($postagem->published())
                                            Ativo
                                        @else
                                            Inativo
                                        @endif
                                    </td>

                                    <td class="text-right">
                                        <ul class='list-inline'>
                                            <li class="list-inline-item">
                                                <a href="{{ route('admin.posts.edit', ['id' => $postagem->id]) }}"
                                                    class="btn btn-sm btn-primary">
                                                    Editar
                                                </a>
                                            </li>

                                            <li class="list-inline-item {{ $postagem->published() ? '' : 'd-none' }}">
                                                <a href="{{ route('admin.posts.unpublish', ['id' => $postagem->id]) }}"
                                                    class="btn btn-sm btn-warning publish">
                                                    Despublicar
                                                </a>
                                            </li>

                                            <li class="list-inline-item {{ $postagem->published() ? 'd-none' : '' }}">
                                                <a href="{{ route('admin.posts.publish', ['id' => $postagem->id]) }}"
                                                    class="btn btn-sm btn-info publish">
                                                    Publicar
                                                </a>
                                            </li>

                                            <li class="list-inline-item">
                                                <a href="{{ route('admin.posts.remove', ['id' => $postagem->id]) }}"
                                                    class="btn btn-sm btn-danger">
                                                    Remover
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan=5>
                                        <em>Nenhuma postagem encontrada.</em>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.publish').click(function(){
            let button = $(this);
            let post = button.parents('TR');
            $.ajax({
                url: button.attr('href'),
                success: function(result) {
                    console.log(result);
                    $('.publish').parent('li').toggleClass('d-none');

                    let ativo = result.ativa == 'S' ? 'Ativo' : 'Inativo';
                    post.find('.published').text(ativo);
                }
            })
            return false;
        });
    });
</script>
@endsection
