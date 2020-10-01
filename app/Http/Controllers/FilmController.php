<?php

namespace App\Http\Controllers;

use App\Film;
use App\Profile;
use Illuminate\Http\Request;

class FilmController extends Controller
{
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
        $test = Film::all()->where("profile_id",$request->profile_id)->where("film_id",$request->film_id);

        if(count($test) == 0){
            $film = new Film();
            $film->profile_id = $request->profile_id;
            $film->film_id = $request->film_id;

            $film->save();
            return response()->json(["film"=>$film,"status"=>"added"]);  
        }else{

            $ToDel = Film::where(["profile_id" => $request->profile_id , "film_id" => $request->film_id]);
            $ToDel->delete();
            return response()->json(["film"=>$ToDel,"status"=>"deleted"]);  

        }
 
    }
    public function getAllFilmsFromProFile($profile_id){
        $profile = Profile::find($profile_id);

        return response()->json(["films"=>$profile->films]);
        
    }

}