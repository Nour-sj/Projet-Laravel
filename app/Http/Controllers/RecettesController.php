<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecettesController extends Controller
{
    public function index(){
        $url = null;
        $recipes = DB::table('users')->leftJoin('recipes', 'recipes.author_id', '=', 'users.id')
            ->orderByDesc('recipes.date')->paginate(5);
        return view('recettes', compact('recipes', 'url'));
    }

    public function show($url) {
        $recipe = \App\Models\Recipe::where('url', $url)->first();
        $author_id = $recipe->author_id;
        $author = \App\Models\User::where('id', $author_id)->first();
        return view('recettes', compact('recipe','author', 'url'));
    }
}
