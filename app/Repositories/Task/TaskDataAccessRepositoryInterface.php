<?php

namespace App\Repositories\Task;

use Faker\Core\Number;

interface TaskDataAccessRepositoryInterface
{
    public function getAllTask();
    public function getWorkTask();
    public function getCompleteTask();

    public function createNewTask(string $comment);
    public function destroyTask(int $id);

    public function changeStatusTask(int $id);
}
