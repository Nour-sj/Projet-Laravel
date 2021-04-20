<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $recipes = DB::table('users')->leftJoin('recipes', 'recipes.author_id', '=', 'users.id')
            ->orderByDesc('recipes.date')->get('*')->forPage(1,3);
        return view('welcome', compact('recipes'));
    }
}
