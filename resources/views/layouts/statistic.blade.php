<div class="container-fluid statistic-banner">
    <div class="statistic-container">
        <div class="banner-statistic-title">Become a member of our<br>
            growing community!
        </div>
        <a href="{{ route('courses.index') }}" class="statistic-btn">
            {{ __('button.start_learning_now') }}
        </a>
    </div>
</div>
<div class="container statistic">
    <div class="heading-statistic">{{ __('homepage.statistic') }}</div>
    <div class="row row-cols-1 row-cols-sm-3 row-cols-md-3 row-cols-xl-3 g-4">
        <div class="col">
            <div class="h-100 list-item">
                <div class="list-title">{{ __('homepage.course') }}</div>
                <div class="list-data">{{ $totalCourse }}</div>
            </div>
        </div>
        <div class="col">
            <div class="h-100 list-item">
                <div class="list-title">{{ __('homepage.lessons') }}</div>
                <div class="list-data">{{ $totalLesson }}</div>
            </div>
        </div>
        <div class="col">
            <div class="h-100 list-item">
                <div class="list-title">{{ __('homepage.learners') }}</div>
                <div class="list-data">{{ $totalLearner }}</div>
            </div>
        </div>
    </div>
</div>
