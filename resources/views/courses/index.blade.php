@extends('layouts.app')

@section('content')
<section class="list-course container-fluid">
    <div class=" row list-course-container">
        <div class="course-filter">
            <button class="button-filter" id="jqueryFilterBtn">
                <i class="fas fa-sliders-h"></i> {{ __('courses.filter') }}
            </button>
        </div>

        <div class="row col-6 float-left course-search">
            <div class="col-12 box-search">
                <form method="GET" action="{{ route('courses.index') }}">
                    <input type="text" class="col-7 box-search-text" placeholder="{{ __('courses.search') }}..." name="keyword"
                           value="{{ isset( $data['keyword'] ) ? $data['keyword'] : '' }}">
                    <span  class="icon-search"></span>
                    <button type="submit" class="col-3 col-sm-4 btn-primary box-search-button">{{ __('courses.search') }}</button>

                    <div class="attribute-filter {{ empty($data) ? 'active' : '' }} row" id="contentFilter">
                        <div class="attribute-container">
                            <div class="col-12 row attribute-top">
                                <div class="form-group col-lg-4 col-md-5 col-sm-6 course-filter-with">
                                    <span class="col-3 label-filter-with">{{ __('courses.filter_with') }}</span>

                                    <input type="radio" class="btn-check" name="created_time" id="newest" autocomplete="off" value="{{ config('config.newest') }}"
                                        @if (isset($data['created_time']) && $data['created_time'] == config('config.newest')|| empty($data['created_time'])) checked @endif  hidden>
                                    <label class="col-3 btn new" for="newest" >{{ __('courses.newest') }}</label>

                                    <input type="radio" class="btn-check" name="created_time" id="oldest" autocomplete="off" value="{{ config('config.oldest') }}"
                                        @if (isset($data['created_time']) && $data['created_time'] == config('config.oldest')) checked @endif hidden>
                                    <label class="col-3 btn old" for="oldest">{{ __('courses.oldest') }}</label>
                                </div>

                                <div class="form-group col-2 filter-teacher">
                                   <select class="form-control col-12 select2-enable" name="teachers[]" multiple>
                                       <option selected disabled>{{ __('courses.teacher') }}</option>
                                       @foreach($teachers as $teacher)
                                           <option value="{{ $teacher->id }}" @if (isset($data['teachers']) && in_array($teacher->id, $data['teachers'])) selected @endif>
                                               {{ $teacher->user_name }}</option>
                                       @endforeach
                                   </select>
                                </div>
                                <div class="form-group col-2">
                                    <select class="form-control select2-enable col-12" name="learner">
                                        <option value="" selected disabled>{{ __('courses.learners') }}</option>
                                        <option value="{{ config('config.asc') }}" @if (isset($data['learner']) && $data['learner'] == config('config.asc')) selected @endif>{{ __('courses.asc') }}</option>
                                        <option value="{{ config('config.desc') }}" @if (isset($data['learner']) && $data['learner'] == config('config.desc')) selected @endif>{{ __('courses.desc') }}</option>
                                    </select>
                                </div>
                                <div class="form-group col-2">
                                   <select class="form-control select2-enable col-12" name="time">
                                       <option selected value="" disabled>{{ __('courses.time') }}</option>
                                       <option value="{{ config('config.asc') }}" @if (isset($data['time']) && $data['time'] == config('config.asc')) selected @endif>{{ __('courses.asc') }}</option>
                                       <option value="{{ config('config.desc') }}" @if (isset($data['time']) && $data['time'] == config('config.desc')) selected @endif>{{ __('courses.desc') }}</option>
                                   </select>
                                </div>
                                <div class="form-group col-2">
                                    <select class="form-control select2-enable col-12" name="lesson">
                                        <option selected value="" disabled>{{ __('courses.lessons') }}</option>
                                        <option value="{{ config('config.asc') }}" @if (isset($data['lesson']) && $data['lesson'] == config('config.asc')) selected @endif>{{ __('courses.asc') }}</option>
                                        <option value="{{ config('config.desc') }}" @if (isset($data['lesson']) && $data['lesson'] == config('config.desc')) selected @endif>{{ __('courses.desc') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 row attribute-bottom">
                                <div class="form-group col-2 filter-tag">
                                    <select class="form-control select2-enable col-12" name="tags[]" multiple>
                                        <option selected disabled>{{ __('courses.tags') }}</option>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}" @if (isset($data['tags']) && in_array($tag->id, $data['tags'])) selected @endif >
                                                {{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-2">
                                    <select class="form-control select2-enable col-12" name="rate">
                                        <option selected value="" disabled>{{ __('courses.reviews') }}</option>
                                        <option value="{{ config('config.asc') }}" @if (isset($data['rate']) && $data['rate'] == config('config.asc')) selected @endif>{{ __('courses.asc') }}</option>
                                        <option value="{{ config('config.desc') }}" @if (isset($data['rate']) && $data['rate'] == config('config.desc')) selected @endif>{{ __('courses.desc') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="list-course-card">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                @foreach($courses as $course)
                    <div class="col">
                        <div class="card card-list-course">
                            <div class="row list-course-main">
                                <img src="{{ asset($course->image) }}" class="col-3 list-course-image" alt="...">
                                <div class="col-8 card-body">
                                    <h5 class="course-card-title text-left">{{ $course->name }}</h5>
                                    <p class="card-text text-left">{{ $course->description }}</p>
                                    <button class="btn-main course-card-button"><a href="{{ route('courses.show', $course->id) }}">{{ __('button.more') }}</a></button>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-4 footer-course-item">
                                        <div class="list-title">{{ __('courses.learners') }}</div>
                                        <div class="list-data">{{ number_format($course->learners) }}</div>
                                    </div>
                                    <div class="col-4 footer-course-item">
                                        <div class="list-title">{{ __('courses.lessons') }}</div>
                                        <div class="list-data">{{ number_format($course->total_lessons) }}</div>
                                    </div>
                                    <div class="col-4 footer-course-item">
                                        <div class="list-title">{{ __('courses.time') }}</div>
                                        <div class="list-data">{{ number_format(($course->total_times)/config('config.convert_hours'), 0, ',', ' ') }} (h)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{ $courses->withQueryString()->links() }}
    </div>
    @if(count($courses) == 0)
        <h2 class="align-content-center">No result found</h2>
    @endif
</section>
@endsection
