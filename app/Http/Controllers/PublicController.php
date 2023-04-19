<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postagem as ModelPostagem;

class PublicController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = ModelPostagem::where('ativa', 'S')
                              ->orderBy('created_at', 'desc')
                              ->take(10)
                              ->get();

        return view('public', [
            'postagens' => $posts,
        ]);
    }

    public function postagem($id)
    {
        return view('public_post', [
            'postagem' => ModelPostagem::find($id),
        ]);
    }
}
