<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$users = User::all();
		//$users = User::where('name', 'Admin')->get();
		
		return $users;//[0]->name;
		
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
            'name' => 'required',
			'email' => 'required|email|unique:users',
			'profile_picture' => 'obligatory',
			'password' => 'required',
			'birthday' => 'required',
			'steam_name' => 'obligatory',
			'newsletter' => 'obligatory',
			'status' => 'required',
			'r_date' => 'required',
			'active' => 'required'
        ]);

        $users = User::create($request->all());

        return response()->json($users, 201);
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
        $user = User::find($id);
		$user->name = $request->input('name');
		$user->email = $request->input('email');
		$user->profile_picture = $request->input('profile_picture');
		$user->password = $request->input('password');
		$user->birthday = $request->input('birthday');
		$user->steam_name = $request->input('steam_name');
		$user->newsletter = $request->input('newsletter');
		$user->status = $request->input('status');
		$user->r_date = time();
		$user->active = 1;
		$user->save();
		
		return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = User::find($id);
		$user->active = 0;
		$user->r_date = time();
		$user->save();
		
		return response()->json("Benutzer erfolgreich gelöscht");
    }
}
