<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
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
        $recipes = DB::table('users')->leftJoin('recipes', 'recipes.author_id', '=', 'users.id')
            ->orderByDesc('recipes.date')->paginate(20);
        return view('recette.edit', compact('recipes'));
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
            'tags'=>'required',
            'author_name'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg|max:5048'
        ]);


        $image = $request->file('image');
        $imageName = time().'_'.str_replace(" ", "_", request('title')).'.'.$image->extension();
        $image->move(public_path('media/images'), $imageName);

        $author_name = request('author_name');
        $author_id = DB::table('users')->where('name',$author_name)->value('id');
        $recipe = new Recipe();
        $recipe->author_id = $author_id;
        $recipe->title = request('title');
        $recipe->content = request('content');
        $recipe->ingredients = request('ingredients');
        $recipe->url = str_replace(" ", "_", request('title'));
        $recipe->tags = request('tags');
        $recipe->image = $imageName;
        $recipe->date = date('Y-m-d H:i:s');
        $recipe->save();
        return redirect(route('create'))->with('successMsg', 'Votre recette a bien été crée');

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
        $recipe = DB::table('recipes')->find($id);
        return view('recette.edit_recette', compact('recipe'));
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
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'ingredients'=>'required',
            'tags'=>'required'
        ]);

        $recipe = Recipe::find($id);
        $recipe->title = request('title');
        $recipe->content = request('content');
        $recipe->ingredients = request('ingredients');
        $recipe->tags = request('tags');
        $recipe->save();
        return redirect(route('edit'))->with('successMsg', 'La recette a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();
        //return redirect(route('create'));
        return redirect(route('edit'))->with('successMsg', 'La recette a bien été suprimée');
    }

    public function addComment(Request $request, $url) {

        $this->validate($request,[
            'author_name'=>'required',
            'comment'=>'required',
        ]);


        $recipe_id = DB::table('recipes')->where('url',$url)->value('id');
        $author_name = request('author_name');
        $comment = new Comment();
        $author_id = DB::table('users')->where('name',$author_name)->value('id');
        $comment->author_id = $author_id;
        $comment->recipe_id = $recipe_id;
        $comment->content = request('comment');
        $comment->date = date('Y-m-d H:i:s');
        $comment->save();

        return redirect(url('/recettes/'.$url));
    }
}
