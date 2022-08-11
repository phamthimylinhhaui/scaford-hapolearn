<div class="row search-show-course">
    <form action="{{ route('courses.show', [$course->id]) }}" method="GET" class="col-6">
        <input type="text" class="col-7 box-search-lesson" placeholder="Search..." name="lesson_name">
        <span class="icon-search"></span>
        <button type="submit" class="col-3 col-sm-4 btn-primary">Tìm kiếm</button>
    </form>

    @if(auth()->check() && $course->isDeleted())
        <button class="btn btn-primary" disabled>Đã hoàn thành</button>
    @elseif(auth()->check() && $course->isJoined())
        <button class="btn-danger btn-destroy" data-toggle="modal" data-target="#endCourse">Kết thúc khóa học</button>
        @include('courses.show.soft_delete_user_course_modal')
    @else
        <form action="{{ route('user_course.store') }}" method="POST">
            @csrf
            <input type="hidden" name="course_id" value="{{ $course->id }}" class="form-control @error('course_id') is-invalid @enderror">
            @error('course_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <button type="submit" class="btn-main btn-join-course">Tham gia khoá học</button>

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
                <div class="col-10 lesson-name">{{ $lesson->name }}</div>
                <div class="btn-learn"><button class="btn-main"><a href="{{ route('lessons.show', [$lesson->id]) }}" class="link-learn-lesson">Learn</a></button></div>
            </li>
        @endforeach

        @if(count($lessons) == 0)
            <li class="list-group-item">Chưa có bài học nào</li>
        @endif
    </ul>

    {{ $lessons->links() }}
</div>
