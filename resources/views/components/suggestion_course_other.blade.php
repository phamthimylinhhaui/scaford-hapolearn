<div class="name-course-other">
    <ul class="list-group list-group-flush">
        <li class="course-other-info">{{ __('course_show.other_course') }}</li>

        @foreach($otherCourses as $index => $otherCourse)
        <li class="list-group-item other-course-item">
            <div class="number-order">{{ $index + 1 }}.</div>
            <div class="col-11 course-other-name">{{ $otherCourse->name }}</div>
        </li>
        @endforeach
    </ul>
</div>
