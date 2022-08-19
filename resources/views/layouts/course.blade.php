<div class="container main">
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-xl-3 g-4">
        @foreach($courses as $course)
        <div class="col">
            <div class="card h-100">
                <div class="card-img">
                    <img src="{{ asset( !empty($course->image) ? $course->image : 'images/logo-html.png') }}" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $course->name }}</h5>
                    <p class="card-text">
                        {{ substr_replace($course->description,'...',230) }}
                    </p>
                    <div class="btn btn-success">
                        <a href="{{ route('courses.show', [$course->id]) }}">{{ __('button.take_this_course') }}</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="container">
    <div class="heading-courses">{{ __('homepage.other_courses') }}</div>
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-xl-3 g-4">
        @foreach($otherCourses as $otherCourse)
        <div class="col">
            <div class="card h-100">
                <div class="card-img">
                    <img src="{{ asset( !empty($otherCourse->image) ? $otherCourse->image : 'images/logo-html.png' ) }}" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $otherCourse->name }}</h5>
                    <p class="card-text">
                        {{ substr_replace($otherCourse->description,'...',230) }}
                    </p>
                    <div class="btn btn-success">
                        <a href="{{ route('courses.show', [$otherCourse->id]) }}">{{ __('button.take_this_course') }}</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="course-footer">
        <a href="{{ route('courses.index') }}" class="btn-link course-text">{{ __('button.all_course') }}</a>
        <i class="fas fa-arrow-right"></i>
    </div>
</div>
