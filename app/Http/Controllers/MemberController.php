<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Task;
class MemberController extends Controller
{
    //
    public function addMember(Request $request,$id)
    {   
        $email=$request->input("email");
        if ( Member::where([['email', '=', $email],])->get()->count()>0) {
            return response()->json([
            'message' => 'Email already associated with a team member'], 400);
          } else {
            $member=new Member;
            $member->TeamId=$id;
            $member->name=$request->input("name");
            $member->email=$email;
            $member->save();
            return $member;
          }

    }

    public function deleteMember(Request $request,$id1,$id2)
    {
        if (Task::where([
            ['AssignedId', '=', $id2],
            ['TeamId', '=', $id1],
        ])->get()->count()>0){
            return response()->json([
                'message' => 'Member cannot be deleted, please reassign all tasks from this member to someone else before trying again'], 400);
        } else{
        Member::where([
            ['id', '=', $id2],
            ['TeamId', '=', $id1],
        ])->delete();
        }

    }

}
