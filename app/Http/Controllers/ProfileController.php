<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function getProfiles($id_user)
    {
        $user = User::find($id_user);
        return $user->Profiles;
        
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profile = new Profile();

        $profile->name = $request->name;

        $profile->user_id = $request->user_id;

        
        if ($request->hasFile('image')) {
        $fileName = $request->image->getClientOriginalName();
        $path = $request->file('image')->move(public_path("/"),$fileName);
        $profile->image = $fileName;
        }
        
        $profile->save();
            
        return $profile;
        
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $profile = Profile::find($id);

        $profile->name = $request->name;

        $profile->user_id = $request->user_id;

        
        if ($request->hasFile('image')) {
        $fileName = $request->image->getClientOriginalName();
        $path = $request->file('image')->move(public_path("/"),$fileName);
        $profile->image = $fileName;
        }
        
        $profile->save();

        return $profile;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Profile::find($id);
        $profile->delete();
        return response()->json(["message","the profile ".$id." has been deleted"]);
    }
}
