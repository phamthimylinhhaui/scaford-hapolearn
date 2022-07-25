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
                        {{ $course->description }}
                    </p>
                    <div class="btn btn-success">
                        <a href="#">take this course</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="container">
    <div class="heading-courses">Other courses</div>
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
                        {{ $otherCourse->description }}
                    </p>
                    <div class="btn btn-success">
                        <a href="#">take this course</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="course-footer">
        <span class="course-text">View all our course</span>
        <i class="fas fa-arrow-right"></i>
    </div>
</div>
