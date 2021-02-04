<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$article = Article::all();
		//$users = User::where('name', 'Admin')->get();
		
		return $article;//[0]->name;
		
		/*if (count($users) > 1) {
			foreach ($users as $user) {
				echo "<section>".$user->name."</section>";
			}
		}*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		 $this->validate($request, [
            'id_article' => 'required',
			'id_category' => 'required',
			'name_de' => 'required',
			'name_ed' => 'required',
			'price' => 'required',
			'release_date' => 'obligatory',
			'description_de' => 'required',
			'description_en' => 'required',
			'availability' => 'required',
			'pictures' => 'required',
			'game_language' => 'obligatory',
			'audio_language' => 'obligatory',
			'video_link' => 'obligatory',
			'teaser_de' => 'required',
			'teaser_en' => 'required',
			'features_de' => 'obligatory',
			'features_en' => 'obligatory',
			'age_rating' => 'obligatory',
			'content_rating' => 'obligatory',
			'system_requirements' => 'obligatory',
			'c_date' => 'required',
			'active' => 'required'
        ]);

        $article = Article::create($request->all());

        return response()->json($article, 201);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Article::find($id);
	}
	
	 public function paste($id)
    {
        return Article::find($id);
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
        $article = Article::find($id);
		$article->id_article = $request->input('id_article');
		$article->id_category = $request->input('id_category');
		$article->name_de = $request->input('name_de');
		$article->name_en = $request->input('name_en');
		$article->price = $request->input('price');
		$article->release_date = $request->input('release_date');
		$article->description_de = $request->input('description_de');
		$article->description_en = $request->input('description_en');
		$article->availability = $request->input('availability');
		$article->pictures = $request->input('pictures');
		$article->game_language = $request->input('game_language');
		$article->video_link = $request->input('video_link');
		$article->teaser_de = $request->input('teaser_de');
		$article->teaser_en = $request->input('teaser_en');
		$article->features_de = $request->input('features_de');
		$article->features_en = $request->input('features_en');
		$article->age_rating = $request->input('age_rating');
		$article->content_rating = $request->input('content_rating');
		$article->system_requirements = $request->input('system_requirements');
		$article->c_date = time();
		$article->active = 1;
		$article->save();
		
		return response()->json($article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $article = Article::find($id);
		$article->active = 0;
		$article->r_date = time();
		$article->save();
		
		return response()->json("Produkt erfolgreich gelöscht");
    }
}
