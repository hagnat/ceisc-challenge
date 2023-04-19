<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postagem;

class PostsController extends Controller
{
    /**
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function novo()
    {
        return view('novo');
    }

    public function publish(int $id)
    {
        $post = Postagem::findOrFail($id);

        $post->publish()->save();

        return $this->jsonResponse($post);
    }

    public function unpublish(int $id)
    {
        $post = Postagem::findOrFail($id);

        $post->unpublish()->save();

        return $this->jsonResponse($post);
    }

    public function remove(int $id)
    {
        Postagem::destroy($id);

        return response()->json([]);
    }

    protected function jsonResponse(Postagem $post)
    {
        return response()->json([
            'id' => $post->id,
            'titulo' => $post->titulo,
            'descricao' => $post->descricao,
            'imagem' => $post->imagem,
            'ativa' => $post->ativa,
        ]);
    }
}
