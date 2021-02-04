<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$reviews = Review::all();
		//$users = User::where('name', 'Admin')->get();
		
		return $reviews;//[0]->name;
		
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
            'id_review' => 'required',
			'id_user' => 'required',
			'id_article' => 'required',
			'rating' => 'required',
			'review' => 'required',
			'language' => 'required',
			'c_date' => 'required',
			'active' => 'required'
        ]);

        $reviews = Review::create($request->all());

        return response()->json($reviews, 201);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Review::find($id);
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
        $review = Review::find($id);
		$review->id_review = $request->input('id_review');
		$review->id_user = $request->input('id_user');
		$review->id_article = $request->input('id_article');
		$review->rating = $request->input('rating');
		$review->review = $request->input('review');
		$review->language = $request->input('language');
		$review->c_date = $request->input('c_date');
		$review->save();
		
		return response()->json($review);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $review = Review::find($id);
		$review->active = 0;
		$review->c_date = time();
		$review->save();
		
		return response()->json("Bewertung erfolgreich gelöscht");
    }
}
