@extends('layouts.app')

@section('content')
<div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('courses.home') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">{{ __('courses.course_detail') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('courses.show', $course->id) }}">{{ __('courses.all_course') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('lesson_show.lessons_detail') }}</li>
        </ol>
    </nav>
</div>

<div>
    <div class="container-fluid course-show row" id="lessonTab">
        <div class="col-lg-8 col-xl-8 col-md-11 col-sm-11 col-xs-11 course-show-left">
            <div class="col-12 course-image">
                <img src="{{ asset($lesson->image) }}" alt="hình ảnh" class="">
            </div>

            <div class="col-12 lesson-progress">
                @if(auth()->check() && $course->isJoined())
                    <div class="description-title">{{ __('lesson_show.progress') }}</div>
                    <div class="progress-value">
                        <progress max="{{ $lesson->total_program }}" value="{{ $lesson->total_learned_program }}" class="col-10"></progress>
                        <span>{{ $lesson->total_learned_program == 0 ? 0 : number_format($lesson->total_learned_program * 100 / $lesson->total_program, 2) }} %</span>
                    </div>
                @endif
            </div>
            <div class="col-12 show-tab">
                <div class="col-12">
                    <ul class="tabs" >
                        <li class="btn btn-link" data-toggle="collapse" data-target=".collapseDescription" aria-expanded="true" aria-controls="collapseDescription">
                            {{ __('lesson_show.description') }}
                        </li>

                        <li class="btn btn-link collapsed" data-toggle="collapse" data-target=".collapseDocument" aria-expanded="false" aria-controls="collapseDocument">
                            {{ __('lesson_show.program') }}
                        </li>
                    </ul>
                </div>

                <div class="col-12">
                    <div class="tab-lesson collapse collapseDescription {{ (session('program') || (isset($_REQUEST['page']))) ? '' : 'show'  }}" data-parent="#lessonTab">
                        <div class="col-12 description">
                            <div class="lesson-detail">
                                <div class="lesson-description-title">{{ __('lesson_show.description_lesson') }}</div>
                                <div class="lesson-content">
                                    {{ $lesson->description }}
                                </div>
                            </div>
                            <div class="lesson-detail">
                                <div class="lesson-description-title">{{ __('lesson_show.requirement') }}</div>
                                <div class="lesson-content">
                                    {{ $lesson->requirement }}
                                </div>
                            </div>
                            <div class="lesson-tag">
                                <span class="lesson-description-title">{{ __('course_show.tags') }} </span>
                                @foreach($tags as $tag)
                                <button class="btn bg-light btn-tag"><a href="{{ route('tags.show', [$tag->id]) }}">{{ $tag->name }}</a></button>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="tab-teacher collapse collapseDocument @if (session('program') || (isset($_REQUEST['page'])) )  {{ "show" }} @endif" data-parent="#lessonTab">
                        <div class="program-detail">
                            <div class="lesson-detail">
                                <div class="program-title lesson-description-title">{{ __('lesson_show.program') }}</div>
                                <ul class="list-group list-group-flush">
                                    @foreach($programs as $program)
                                            <li class="list-group-item">
                                                @if($program->type == '.doc')
                                                    <div class="number-order"><i class="fa-solid fa-file-word"></i></div>
                                                    <div class="col-2 lesson-name">Word</div>
                                                @elseif($program->type == '.pdf')
                                                    <div class="number-order"><i class="fa-solid fa-file-pdf"></i></div>
                                                    <div class="col-2 lesson-name">PDF</div>
                                                @else
                                                    <div class="number-order"><i class="fa-solid fa-file-video"></i></div>
                                                    <div class="col-2 lesson-name">Video</div>
                                                @endif
                                                <div class="col-6 lesson-name">{{ $program->name }}</div>
                                                    <div class="btn-learn" data-id="{{ $program->id }}">
                                                        <form id="reload" method="POST" action="{{ route('user_program.store') }}" target="_blank">
                                                            @csrf
                                                            <input type="hidden" name="program_id" value="{{  $program->id }}">
                                                            @if($program->isCompleteProgram())
                                                                <button type="submit" class="col-12 btn btn-primary" id="learn" target="_blank">{{ __('Đã học') }}</button>
                                                            @else
                                                                <button type="submit" class="btn-main btn-complete" id="learn" target="_blank">{{ __('Vào học') }}</button>
                                                            @endif
                                                        </form>
                                                </div>
                                            </li>
                                    @endforeach
                                        {{ $programs->links() }}
                                    @if(!$programs->count())
                                        <li class="list-group-item">{{ __('lesson_show.no_found_program') }}</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-xl-4 col-md-11 col-sm-11 col-xs-11 course-show-right">
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
