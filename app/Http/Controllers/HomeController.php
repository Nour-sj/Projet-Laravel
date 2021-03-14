<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $recipes = DB::table('users')->leftJoin('recipes', 'recipes.author_id', '=', 'users.id')
            ->orderByDesc('recipes.date')->get('*')->forPage(1,3);
        //recipes = \App\Models\Recipe::all()->sortByDesc('date')->forPage(1,3);
        //$author = \App\Models\User::->where('id','=', $recipes->author_id)->first();
        //$author_name= $author->name;
        return view('welcome', compact('recipes'));//, 'author_name'=>$author_name]);
    }
}
