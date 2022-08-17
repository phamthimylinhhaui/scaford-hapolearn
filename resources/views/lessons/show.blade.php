@extends('layouts.app')

@section('content')
<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">all course</a></li>
            <li class="breadcrumb-item"><a href="{{ route('courses.show', $course->id) }}">course detail</a></li>
            <li class="breadcrumb-item active" aria-current="page">lessons detail</li>
        </ol>
    </nav>
</div>

<div>
    <div class="container-fluid course-show row" id="lessonTab">
        <div class="col-8 course-show-left">
            <div class="col-12 course-image">
                <img src="{{ asset($lesson->image) }}" alt="hình ảnh" class="">
            </div>

            <div class="col-12 lesson-progress">
                @if(auth()->check() && $course->isJoined())
                    <div class="description-title">Progress</div>
                    <div class="progress-value">
                        <progress max="{{ $lesson->total_program }}" value="{{ $programLearns }}" class="col-10"></progress>
                        <span>{{ empty($lesson->total_program) ? '0' : number_format($programLearns *100 / $lesson->total_program, 2) }} %</span>
                    </div>
                @endif
            </div>
            <div class="col-12 show-tab">
                <div class="col-12">
                    <ul class="tabs" >
                        <li class="btn btn-link" data-toggle="collapse" data-target=".collapseDescription" aria-expanded="true" aria-controls="collapseDescription">
                           Description
                        </li>

                        <li class="btn btn-link collapsed" data-toggle="collapse" data-target=".collapseDocument" aria-expanded="false" aria-controls="collapseDocument">
                            Program
                        </li>
                    </ul>
                </div>

                <div class="col-12">
                    <div class="tab-lesson collapse collapseDescription {{ (session('program') || (isset($_REQUEST['page']))) ? '' : 'show'  }}" data-parent="#lessonTab">
                        <div class="col-12 description">
                            <div class="lesson-detail">
                                <div class="lesson-description-title">Description lesson</div>
                                <div class="lesson-content">
                                    {{ $lesson->description }}
                                </div>
                            </div>
                            <div class="lesson-detail">
                                <div class="lesson-description-title">Requirement</div>
                                <div class="lesson-content">
                                    {{ $lesson->requirement }}
                                </div>
                            </div>
                            <div class="lesson-tag">
                                <span class="lesson-description-title">Tag </span>
                                @foreach($tags as $tag)
                                <button class="btn bg-light btn-tag"><a href="{{ route('tags.show', [$tag->id]) }}">{{ $tag->name }}</a></button>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="tab-teacher collapse collapseDocument @if (session('program') || (isset($_REQUEST['page'])) )  {{ "show" }} @endif" data-parent="#lessonTab">
                        <div class="program-detail">
                            <div class="lesson-detail">
                                <div class="program-title lesson-description-title">Program</div>
                                <ul class="list-group list-group-flush">
                                    @foreach($programs as $program)
                                            <li class="list-group-item">
                                                @if($program->type == '.doc')
                                                    <div class="number-order"><i class="fa-solid fa-file-word"></i></div>
                                                    <div class="col-2 lesson-name">Lesson</div>
                                                @elseif($program->type == '.pdf')
                                                    <div class="number-order"><i class="fa-solid fa-file-pdf"></i></div>
                                                    <div class="col-2 lesson-name">PDF</div>
                                                @else
                                                    <div class="number-order"><i class="fa-solid fa-file-video"></i></div>
                                                    <div class="col-2 lesson-name">Video</div>
                                                @endif
                                                <div class="col-6 lesson-name">{{ $program->name }}</div>
                                                    @if(auth()->check() && $course->isJoined())
                                                        <a href="{{ $program->path }}" class="btn-main" target="_blank">Learn</a>
                                                    @endif
                                                    <div class="btn-learn">
                                                    @if(!$program->isCompleted())
                                                        <form method="POST" action="{{ route('user_program.store') }}">
                                                            @csrf
                                                            <input type="hidden" name="program_id" value="{{  $program->id }}">
                                                            <button type="submit" class="btn-main link-learn-lesson" id="learn" target="_blank">Complete</button>
                                                        </form>
                                                    @else
                                                        <button class="btn btn-primary learn" disabled>Đã hoàn thành</button>
                                                    @endif
                                                </div>
                                            </li>
                                    @endforeach
                                        {{ $programs->links() }}
                                    @if(!$programs->count())
                                        <li class="list-group-item">Chưa có tài liệu nào cho bài học này!</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4 course-show-right">
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
