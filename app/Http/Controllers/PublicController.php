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
        return view('public', [
            'postagens' => ModelPostagem::where('ativa', 'S'),
        ]);
    }

    public function postagem($id)
    {
        return view('public_post', [
            'postagem' => ModelPostagem::find($id),
        ]);
    }
}
