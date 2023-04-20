<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Storage;
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

    public function novo(): Renderable
    {
        return view('novo', [
            'post' => new Postagem(),
        ]);
    }

    public function edit(int $id): Renderable
    {
        return view('novo', [
            'post' => Postagem::findOrFail($id),
        ]);
    }

    public function save(Request $request)
    {
        $post = $request->id
            ? $this->update($request->id, $request)
            : $this->create($request);

        $post->save();

        return $this->jsonResponse($post);
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
        $post = Postagem::find($id);

        if ($post) {
            $this->pruneFiles($post->imagem);
            $post->delete();
        }

        return response()->json([]);
    }

    protected function create(Request $request): Postagem
    {
        $request->validate([
            'imagem' => 'required|mimes:png,gif,jpg,jpeg|max:2048',
        ]);

        $post = new Postagem();

        $post->titulo = $request->titulo;
        $post->descricao = $request->descricao;
        $post->imagem = $request->file('imagem')->store('posts', 'public');
        $post->ativa = Postagem::NAO_PUBLICADO;

        return $post;
    }

    protected function update(int $postId, Request $request): Postagem
    {
        $request->validate([
            'imagem' => 'mimes:png,gif,jpg,jpeg|max:2048',
        ]);

        $post = Postagem::findOrFail($postId);

        $post->titulo = $request->titulo;
        $post->descricao = $request->descricao;

        if ($request->hasFile('imagem')) {
            $this->pruneFiles($post->imagem);
            $post->imagem = $request->file('imagem')->store('posts', 'public');
        }

        return $post;
    }

    protected function pruneFiles(string $filename): void
    {
        Storage::delete('public/' . $filename);
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
