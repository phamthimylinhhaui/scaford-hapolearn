<?php

namespace App\Services;

use App\Repositories\CourseRepository\CourseRepositoryInterface;

class CourseService
{
    protected $courseRepositoryInterface;

    public function __construct(CourseRepositoryInterface $courseRepositoryInterface)
    {
        $this->courseRepositoryInterface = $courseRepositoryInterface;
    }

    public function testRepository()
    {
        return $this->courseRepositoryInterface->getCourseById(1);
    }
}
