<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
        $recipe = DB::table('recipes')->where('url', $url)->first();
        $author_id = $recipe->author_id;
        $author = DB::table('users')->where('id', $author_id)->first();

        $comments_users = DB::table('users')->Join('comments', 'comments.author_id', '=', 'users.id')
            ->orderByDesc('comments.date');
        $nbComments = $comments_users->count();
        return view('recettes', compact('recipe','comments_users', 'nbComments','author', 'url'));
    }
}
