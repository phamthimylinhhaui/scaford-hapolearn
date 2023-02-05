<?php

namespace App\Repositories\CourseRepository;

use App\Models\Course;
use App\Repositories\EloquentRepository;

class CourseRepository extends EloquentRepository implements CourseRepositoryInterface
{
    public function getModel()
    {
        return Course::class;
    }

    public function getCourseById($id)
    {
        return $this->model->where('id', $id)->get();
    }

}