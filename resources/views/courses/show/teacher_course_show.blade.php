<div class="teacher-container">
    <div class="title-main-teacher">{{ __('course_show.main_teacher') }}</div>
    @if($teachers->count() >0 )
        @foreach($teachers as $teacher)
            <div class="teacher-content">
                <div class="row teacher-info">
                    <div class="col-2 ">
                        <img src="{{ empty($teacher->avatar) ? asset('images/icon-teacher-avatar.png') : asset($teacher->avatar)}}" alt="avatar" class="avatar">
                    </div>
                    <div class="col-3 details">
                        <div class="name">{{ $teacher->user_name }}</div>
                        <div class="exp">{{ $teacher->exp }} {{ __('course_show.years_teacher') }}</div>
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
    @else
        <h1> {{ __('course_show.not_found_teacher') }}</h1>
    @endif
</div>
