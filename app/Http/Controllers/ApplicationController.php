<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$applications = Application::all();
		//$users = User::where('name', 'Admin')->get();
		
		return $applications;//[0]->name;
		
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
            'id_application' => 'required',
			'id_user' => 'required',
			'id_article' => 'required',
			'message' => 'required',
			'a_date' => 'required',
			'active' => 'required'
        ]);

        $applications = User::create($request->all());

        return response()->json($applications, 201);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::find($id);
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
        $application = Application::find($id);
		$application->id_application = $request->input('id_application');
		$application->id_user = $request->input('id_user');
		$application->id_article = $request->input('id_article');
		$application->message = $request->input('message');
		$application->a_date = $request->input('a_date');
		$application->active = $request->input('active');
		$application->save();
		
		return response()->json($application);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $application = Application::find($id);
		$application->active = 0;
		$application->a_date = time();
		$application->save();
		
		return response()->json("Bewerbung erfolgreich gelöscht");
    }
}
