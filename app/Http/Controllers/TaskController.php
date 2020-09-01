<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Task;
use App\Member;
class TaskController extends Controller
{
    //
    public function addTask(Request $request,$id)
    {
        $memberId=$request->input("assignee_id");
        if(Member::where([['id', '=', $memberId],])->first()->TeamId==$id){
            $task=new Task;
            $task->Title=$request->input("title");
            $task->TeamId=$id;
            $task->Description=$request->input("description");
            $task->AssignedId=$request->input("assignee_id");
            $task->Status=$request->input("status");
            $task->save();
            return $task;
        }else{
            return response()->json([
                'message' => 'assignee_id should belong to the same team as the task'], 400);
        }
 
        // return "Successful";
    }
    public function getTask(Request $request,$id1,$id2)
    {
        $task=Task::where([
            ['id', '=', $id2],
            ['TeamId', '=', $id1],
        ])->paginate(3);
        return $task;
        // return "Successful";
    }
    public function getTasks(Request $request,$id)
    {
        $task=Task::where([
            ['TeamId', '=', $id],
        ])->paginate(3);
        return $task;
        // return "Successful";
    }
    public function patchTask(Request $request,$id1,$id2)
    {
        $memberId=$request->input("assignee_id");
        if(Member::where([['id', '=', $memberId],])->first()->TeamId==$id1){
            $task=Task::where([
                ['id', '=', $id2],
                ['TeamId', '=', $id1],
            ])->update(['Title' =>$request->input("title"),'Description' => $request->input("description"),'AssignedId' => $request->input("assignee_id"),'Status' => $request->input("status")]);
            return Task::where([
                ['id', '=', $id2],
                ['TeamId', '=', $id1],
            ])->get();
        }else{
            return response()->json([
                'message' => 'assignee_id should belong to the same team as the task'], 400);
        }

        // return "Successful";
    }
    public function memberTasks(Request $request,$id1,$id2)
    {
        $task=Task::where([
            ['AssignedId', '=', $id2],
            ['TeamId', '=', $id1],
        ])->paginate(3);
        return $task;
        // return "Successful";
    }

}
