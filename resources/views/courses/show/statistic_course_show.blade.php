<div class="key-info">
    <ul class="list-group list-group-flush">
        <li class="list-group-item key-item">
            <div class="col-6 key-name"><i class="fas fa-users"></i> {{ __('course_show.learners') }}</div>
            <div class="col-6 key-data">: {{ number_format($course->learners) }}</div>
        </li>
        <li class="list-group-item key-item">
            <div class="col-6 key-name"><i class="fas fa-list-alt"></i> {{ __('course_show.lessons') }}</div>
            <div class="col-6 key-data">: {{ number_format($course->total_lessons) }}</div>
        </li>
        <li class="list-group-item key-item">
            <div class="col-6 key-name"><i class="fa-solid fa-clock"></i> {{ __('course_show.times') }}</div>
            <div class="col-6 key-data">: {{ number_format(($course->total_times)/config('config.convert_hours'), 0, ',', ' ') }} {{ __('course_show.hours') }}</div>
        </li>
        <li class="list-group-item key-item">
            <div class="col-6 key-name"><i class="fa-solid fa-key"></i> {{ __('course_show.tags') }}</div>
            <div class="col-6 key-data">:
                @foreach($tags as $tag)
                    <a href="{{ route('tags.show', [$tag->id]) }}">#{{ $tag->name }}</a>
                @endforeach
            </div>
        </li>
        <li class="list-group-item key-item">
            <div class="col-6 key-name"><i class="fa-solid fa-money-bill-1"></i> {{ __('course_show.price') }}</div>
            <div class="col-6 key-data">: {{ ($course->price == 0) ? 'Free' : number_format($course->price).'$' }}</div>
        </li>
        @if(auth()->check() && $course->isDeleted())
            <li class="list-group-item key-item">
                <button class="btn btn-primary btn-finish" disabled>{{ __('button.completed') }}</button>
            </li>
        @elseif(auth()->check() && $course->isJoined())
            <li class="list-group-item key-item">
                <button class="btn-danger btn-destroy btn-finish" data-toggle="modal" data-target="#endCourse">{{ __('button.close_course') }}</button>
                @include('courses.show.soft_delete_user_course_modal')
            </li>
        @else
            <li class="list-group-item key-item">
                <form action="{{ route('user_course.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $course->id }}" class="form-control @error('course_id') is-invalid @enderror">
                    @error('course_id')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                    <button type="submit" class="btn-main btn-join-course btn-finish text-white">{{ __('button.join_course') }}</button>
                </form>
            </li>
        @endif
    </ul>
</div>
