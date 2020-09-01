<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
class TeamController extends Controller
{
    //
    public function index(Request $request)
    {
        $team=new Team;
        $team->name=$request->input('name');
        $team->save();
        return $team;
        // return "successful";
    }
    public function getTeam(Request $request,$id)
    {
        $users = Team::find($id);
        return $users;
    }
}
