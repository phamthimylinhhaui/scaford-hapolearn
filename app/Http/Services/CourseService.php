<?php

namespace App\Http\Services;

use App\Repositories\CourseRepository\CourseRepositoryInterface;
use Illuminate\Support\Facades\Log;

class CourseService
{
    protected $courseRepository;

    /**
     * @param CourseRepositoryInterface $courseRepository
     */
    public function __construct(
        CourseRepositoryInterface $courseRepository
    ) {
        $this->courseRepository = $courseRepository;
    }

    public function addCourse($data)
    {
        try {
            $this->courseRepository->create($data);
            return [
                'status' => 200,
                'message' => __('create.success')
            ];
        } catch (\Exception $e) {
            Log::warning('add course error: ' . $e);

            return [
                'status' => 500,
                'message' => $e->getMessage(),
            ];
        }
    }
}
