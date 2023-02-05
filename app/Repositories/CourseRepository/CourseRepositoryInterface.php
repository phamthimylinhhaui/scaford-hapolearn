<?php

namespace App\Repositories\CourseRepository;

use App\Repositories\RepositoryInterface;

interface CourseRepositoryInterface extends RepositoryInterface
{
    public function getCourseById(int $id);

}