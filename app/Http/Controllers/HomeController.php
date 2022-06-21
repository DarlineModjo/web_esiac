<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function activite(){
        $user_id = Auth::user()->id;
        $activites = Activite::where('user_id', $user_id)->orderBy('created_at')->get();
        return view('activite')->with("activites", $activites);
    }

    public function store(Request $request){
        $user_id = Auth::user()->id;
        Activite::create([
            "user_id"=>$user_id,
            "name"=>$request->name,
            "description"=> $request->description
            ]
        );

        $activites = Activite::where('user_id', $user_id)->orderBy('created_at')->get();
        return view('activite')->with("activites", $activites);
    }

    public function destroy(){
        //$activite = Activite::find();
        /*if( $activite == Auth::user()->id ){
            $activite->delete();
            $activites = Activite::where('user_id', $user_id)->orderBy('created_at')->get();
            return view('activite')->with("activites", $activites);
        }else{
            return view('activite')->with("error", "Vous ne pouvez supprimer cette tâche");
        }*/

        $user_id = Auth::user()->id;
        $activites = Activite::where('user_id', $user_id)->orderBy('created_at')->get();
        foreach ($activites as $key => $activite) {
            $activite->delete();
        }
        $activites = Activite::where('user_id', $user_id)->orderBy('created_at')->get();
        return view('activite')->with("activites", $activites);
    }

    public function delete($id){
        $activite = Activite::find();
        if( $activite == Auth::user()->id ){
            $activite->delete();
            $activites = Activite::where('user_id', $user_id)->orderBy('created_at')->get();
            return view('activite')->with("activites", $activites);
        }else{
            return view('activite')->with("error", "Vous ne pouvez supprimer cette tâche");
        }
    }
}
