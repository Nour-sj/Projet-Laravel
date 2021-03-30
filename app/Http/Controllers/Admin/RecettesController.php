<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RecettesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url = null;
        $recipes = DB::table('recipes')->orderByDesc('date')
            ->paginate(3);
        return view('recettes', compact('recipes', 'url'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recette.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $this->validate($request,[
            'title'=>'required',
            'ingredients'=>'required',
            'content'=>'required',
                'status'=>'required',
        ]);

        $recette = new Recipe();
        $recette->title = $request->title;
        $recette->ingredients = $request->ingredients;
        //print_r(request('content'));die;
        $recette->content =request('content');
        //$recette->content="gbjugbjif";
        $recette->url=str_replace(' ', '_',  $recette->title);
        $recette->tags=request('tags');
        $recette->date = date('Y-m-d H:i:s');
        $auteur= $request->author_name;
        $resultat = DB::table('users')->where('name', $auteur)->value('id');
        $recette->author_id=$resultat;
        $recette->status = $request->status;

        $recette->save();
        return redirect(route('store'))->with('successMsg', 'Votre recette a bien été créée');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {
        return view('recette.show', compact('recette'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
