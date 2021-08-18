<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return Task::all();
    }

    public function create(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'max:1000',
            'status' => 'required|max:1'
        ]);
        
        if(!($request->input('status') === "0" || $request->input('status') === "1")){
            return $validated
                    ->errors()
                    ->add('status', 'Status is able only 0 or 1 (0 is not concluded and 1 is concluded)');
        }elseif($validated->fails()){
            return $validated
                    ->errors()
                    ->all();   
        }else{
            return Task::create($request->all());
        }
    }

    public function show($id)
    {
        return Task::find($id);
    }

    public function update($id, Request $request)
    {
        $task = Task::find($id);

        $validated = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'max:1000',
            'status' => 'required|max:1'
        ]);

        if(!$task){
            return $validated
                    ->errors()
                    ->add('Task', "No task found with the ID: {$id}");              
        }elseif(!($request->input('status') === "0" || $request->input('status') === "1")){
            return $validated
                    ->errors()
                    ->add('status', 'Status is able only 0 or 1 (0 is not concluded and 1 is concluded)');
        }elseif($validated->fails()){
            return $validated
                    ->errors()
                    ->all();   
        }else{
            $task->fill($request->all());
            $task->save();
            return $task;
        }
    }

    public function destroy($id)
    {
        $task = Task::find($id);

        if ($task) {
            $task->delete();
        }else {
            return response()->json('No found');
        }

        return $task;
    }
}