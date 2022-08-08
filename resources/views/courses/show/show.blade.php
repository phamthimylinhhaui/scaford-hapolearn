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

<div>
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

                <div class="col-12" id="accordion">
                    <div class="collapse collapseLesson @if (!isset($_REQUEST['tab']) || (isset($_REQUEST['tab']) && $_REQUEST['tab'] == "lesson")) {{ 'show' }} @endif" data-parent="#accordion">
                        @include('courses.show.lesson_course_show')
                    </div>

                    <div class="collapse collapseTeacher @if (session('teacher'))  {{ session('teacher') }} @endif" data-parent="#accordion">
                        @include('courses.show.teacher_course_show')
                    </div>

{{--                    {{dd($_REQUEST['tab'])}}--}}

                    <div class="collapse collapseReview @if (session('review') || (isset($_REQUEST['tab']) && $_REQUEST['tab'] == "review"))  {{ "show" }} @endif" data-parent="#accordion">
                        @include('courses.show.review_course_show')
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4 course-show-right collapse @if (!session('review'))  {{ 'show' }} @endif collapseLesson" data-parent="#accordion">
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

        <div class="col-4 course-show-right collapse @if (session('teacher'))  {{ session('teacher') }} @endif collapseTeacher" data-parent="#accordion">
            <div class="col-12 description">
                @include('courses.show.description_course_show')
            </div>
            <div class="col-12 show-info-other">
                @include('courses.show.statistic_course_show')
            </div>
        </div>

        <div class="col-4 course-show-right collapse @if (session('review'))  {{ session('review') }} @endif collapseReview" data-parent="#accordion">
            <div class="col-12 show-info-other">
                @include('courses.show.statistic_course_show')
            </div>
            <div class="col-12 show-info-other">
                @include('components.suggestion_course_other')
            </div>
        </div>
    </div>
</div>
@endsection