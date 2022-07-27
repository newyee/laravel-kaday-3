<?php

namespace App\Repositories\Task;

use App\Models\Task;

class TaskDataAccessEQRepository implements TaskDataAccessRepositoryInterface
{
    public function getAllTask()
    {
        return Task::all();
    }

    public function getWorkTask()
    {
        return Task::where('state', 1)->get();
    }

    public function getCompleteTask()
    {
        return Task::where('state', 2)->get();
    }

    public function createNewTask(string $comment)
    {
        Task::create([
            'comment' => $comment,
            'state' => 1
        ]);
    }

    public function destroyTask(int $id)
    {
        $deleteTask = Task::find($id);
        $deleteTask->delete();
    }

    public function changeStatusTask(int $id)
    {
        $updateTask = Task::find($id);
        if($updateTask->state == 1 ){
            $updateTask->state = 2;
        }else{
            $updateTask->state = 1;
        }
        $updateTask->save();
    }


}
