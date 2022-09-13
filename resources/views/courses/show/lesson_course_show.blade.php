<div class="row search-show-course">
    <form action="{{ route('courses.show', [$course->id]) }}" method="GET" class="col-6">
        <input type="text" class="col-7 box-search-lesson" placeholder="{{ __('button.search') }}..."
            name="lesson_name">
        <span class="icon-search"></span>
        <button type="submit" class="col-3 col-sm-4 btn-primary">{{ __('button.search') }}</button>
    </form>

    @if(auth()->check() && $course->isDeleted())
    <form action="{{ route('user_course.update', [$course->id]) }}" method="POST">
        @csrf
        {{ method_field('PUT') }}
        <input type="hidden" name="course_id" value="{{ $course->id }}"
            class="form-control @error('course_id') is-invalid @enderror">
        @error('course_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <button type="submit" class="btn-main btn-join-course">{{ __('button.rejoin') }}</button>
    </form>
    @elseif(auth()->check() && $course->isJoined())
    <button class="btn-danger btn-destroy" data-toggle="modal"
        data-target="#endCourse">{{ __('button.close_course') }}</button>
    @include('courses.show.soft_delete_user_course_modal')
    @else
    <form id="reload" action="{{ route('user_course.store') }}" method="POST">
        @csrf
        <input type="hidden" name="course_id" value="{{ $course->id }}"
            class="form-control @error('course_id') is-invalid @enderror">
        @error('course_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <button type="submit" class="btn-main btn-join-course">{{ __('button.join_course') }}</button>
    </form>
    @endif
</div>
<div class="lesson-show-course">
    <ul class="list-group list-group-flush">
        @foreach($lessons as $index => $lesson)
        <li class="list-group-item">
            <div class="number-order">
                {{ ($lessons->currentPage() - 1) * config('courses.paginate_course_show_lesson') + ($index +1) }}
                .</div>
            <div class="col-9 lesson-name">{{ $lesson->name }}</div>
            <div class="col-3 btn-learn">
                @if(auth()->check() && $lesson->status_completed_lesson)
                <button class="btn-main btn-primary float-right"><a class="text-white font-text-button"
                        href="{{ route('lessons.show', [$lesson->id]) }}">{{ __('Hoàn thành') }}</a></button>
                @elseif($lesson->isLearnedLesson())
                <button class="btn-main link-learn-lesson float-right"><a class="text-white font-text-button"
                        href="{{ route('lessons.show', [$lesson->id]) }}">{{ __('Đang học') }}</a></button>
                @else
                <form action="{{ route('user_lesson.store') }}" method="POST" class="float-right">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $course->id }}"
                        class="form-control @error('course_id') is-invalid @enderror">
                    @error('course_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input type="hidden" name="lesson_id" value="{{ $lesson->id }}"
                        class="form-control @error('lesson_id') is-invalid @enderror">
                    @error('lesson_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <button class="btn-main link-learn-lesson text-white font-text-button"
                        type="submit">{{ __('button.learn') }}</button>
                </form>
                @endif
            </div>
        </li>
        @endforeach

        @if(count($lessons) == 0)
        <li class="list-group-item">{{ __('course_show.not_found_lesson') }}</li>
        @endif
    </ul>

    {{ $lessons->links() }}
</div>