@extends('layouts.app')

@section('content')
<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">All course</a></li>
            <li class="breadcrumb-item active" aria-current="page">Course detail</li>
        </ol>
    </nav>
</div>

<section>
    <div class="container-fluid course-show row" id="accordion">
        <div class="col-8 course-show-left">
            <div class="col-12 course-image">
                <img src="{{ asset($course->image) }}" alt="hình ảnh" class="">
            </div>

            <div class="col-12 show-tab">
                <div class="col-12">
                    <ul class="tabs" >
                        <li class="btn btn-link" data-toggle="collapse" data-target=".collapseLesson" aria-expanded="true" aria-controls="collapseLesson">
                            Lessons
                        </li>

                        <li class="btn btn-link collapsed" data-toggle="collapse" data-target=".collapseTeacher" aria-expanded="false" aria-controls="collapseTeacher">
                            Teacher
                        </li>

                        <li class="btn btn-link collapsed" data-toggle="collapse" data-target=".collapseReview" aria-expanded="false" aria-controls="collapseReview">
                            Review
                        </li>
                    </ul>
                </div>

                <div class="col-12">
                    <div class="collapse show collapseLesson" data-parent="#accordion">
                        <div class="row search-show-course">
                            <form action="{{ route('courses.show', [$course->id]) }}" method="GET" class="col-6">
                                <input type="text" class="col-7 box-search-lesson" placeholder="Search..." name="lesson_name">
                                <span class="icon-search"><i class="fas fa-search"></i></span>
                                <button type="submit" class="col-3 col-sm-4 btn-primary">Tìm kiếm</button>
                            </form>

                            @if($checkFinishCourse)
                                <button class="btn btn-primary" disabled>Đã hoàn thành</button>
                            @elseif($checkJoined)
                                <button class="btn-danger btn-destroy" data-toggle="modal" data-target="#endCourse">Kết thúc khóa học</button>
                                @include('courses.show.sotfdelete_user_course_modal')
                            @else
                                <form action="{{ route('user_course.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="course_id" value="{{ $course->id }}" class="form-control @error('course_id') is-invalid @enderror">
                                <button type="submit" class="btn-main btn-join-course">Tham gia khoá học</button>
                            </form>
                            @endif
                        </div>
                        <div class="lesson-show-course">
                            <ul class="list-group list-group-flush">
                                @foreach($lessons as $index => $lesson)
                                    <li class="list-group-item">
                                        <div class="number-order">{{ $index +1 }}.</div>
                                        <div class="col-10 lesson-name">{{ $lesson->name }}</div>
                                        <div class="btn-learn"><button class="btn-main"><a href="{{ route('lessons.show', [$lesson->id]) }}" class="link-learn-lesson">Learn</a></button></div>
                                    </li>
                                @endforeach

                                @if(count($lessons) == 0)
                                    <li class="list-group-item">Chưa có bài học nào</li>
                                @endif
                            </ul>

                            {{ $lessons->withQueryString()->links() }}
                        </div>
                    </div>

                    <div class="collapse collapseTeacher"  data-parent="#accordion">
                        <div class="teacher-container">
                            <div class="title-main-teacher">Main Teacher</div>
                            @foreach($teachers as $teacher)
                            <div class="teacher-content">
                                <div class="row teacher-info">
                                    <div class="col-2 ">
                                        <img src="{{ empty($teacher->avatar) ? asset('images/icon-teacher-avatar.png') : asset($teacher->avatar)}}" alt="avatar" class="avatar">
                                    </div>
                                    <div class="col-3 details">
                                        <div class="name">{{ $teacher->user_name }}</div>
                                        <div class="exp">{{ $teacher->exp }} year teacher</div>
                                        <div class="row contact">
                                            <a href="{{ empty($teacher->link_google) ? '#' : $teacher->link_google }}"><i class="fab fa-google-plus-g"></i></a>
                                            <a href="{{ empty($teacher->link_facebook) ? '#' : $teacher->link_facebook }}"><i class="fa-brands fa-facebook-f"></i></a>
                                            <a href="{{ empty($teacher->link_slack) ? '#' : $teacher->link_slack }}"><i class="fa-brands fa-slack"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="teacher-description">
                                    {{ $teacher->about_me }}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="collapse collapseReview" data-parent="#accordion">
                        @include('courses.show.review_course_show')
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 course-show-right collapse show collapseLesson" data-parent="#accordion">
            <div class="col-12 description">
                @include('courses.show.description_course_show')
            </div>
            <div class="col-12 show-info-other">
                @include('courses.show.statistic_course_show')
            </div>
            <div class="col-12 show-info-other">
                @include('components.suggestion_course_other')
            </div>
        </div>

        <div class="col-4 course-show-right collapse collapseTeacher" data-parent="#accordion">
            <div class="col-12 description">
                @include('courses.show.description_course_show')
            </div>
            <div class="col-12 show-info-other">
                @include('courses.show.statistic_course_show')
            </div>
        </div>

        <div class="col-4 course-show-right collapse collapseReview" data-parent="#accordion">
            <div class="col-12 show-info-other">
                @include('courses.show.statistic_course_show')
            </div>
            <div class="col-12 show-info-other">
                @include('components.suggestion_course_other')
            </div>
        </div>
    </div>
</section>
@endsection