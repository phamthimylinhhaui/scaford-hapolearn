@extends('layouts.app')

@section('content')
<section class="list-course container-fluid">
    <div class=" row list-course-container">
        <div class="course-filter">
            <button class="button-filter" id="jqueryFilterBtn">
                <i class="fas fa-sliders-h"></i> Filter
            </button>
        </div>

        <div class="row col-6 float-left course-search">
            <div class="col-12 box-search">
                <form method="GET" action="{{ route('courses.index') }}">
                    <input type="text" class="col-7 box-search-text" placeholder="Search..." name="course_name"
                           value="{{ isset( $data['course_name'] ) ? $data['course_name'] : '' }}">
                    <button type="submit" class="icon-search"><i class="fas fa-search"></i></button>
                    <input type="submit" class="col-3 col-sm-4 btn-primary box-search-button" name="submit" value="Tìm kiếm">

                    <div class="attribute-filter active row" id="contentFilter">
                        <div class="attribute-container">
                            <div class="col-12 row attribute-top">
                                <div class="form-group col-lg-4 col-md-5 col-sm-6 course-filter-with">
                                    <label class="col-3 label-filter-with">Lọc theo</label>
                                    <input type="radio" class="btn-check" name="course_create" id="option1" autocomplete="off" value="newest"
                                        @if (isset($data['course_create']) && $data['course_create'] == 'newest'|| empty($data['course_create'])) checked @endif  >
                                    <label class="col-3 btn btn-light" for="option1" >Mới nhất</label>
                                    <input type="radio" class="btn-check" name="course_create" id="option2" autocomplete="off" value="oldest"
                                        @if (isset($data['course_create']) && $data['course_create'] == 'oldest') checked @endif>
                                    <label class="col-3 btn btn-light" for="option2">Cũ nhất</label>
                                </div>

                                <div class="form-group col-2 filter-teacher">
                                   <select class="form-control col-12 select2-enable" name="teacher_id">
                                       <option value="">Teacher</option>
                                       @foreach($teachers as $teacher)
                                           <option value="{{ $teacher->id }}" @if (isset($data['teacher_id']) && $data['teacher_id'] == $teacher->id) selected @endif>
                                               {{ $teacher->user_name }}</option>
                                       @endforeach
                                   </select>
                                </div>
                                <div class="form-group col-2">
                                    <select class="form-control select2-enable col-12" name="order_by_learner">
                                        <option value="" selected>Số người học</option>
                                        <option value="asc" @if (isset($data['order_by_learner']) && $data['order_by_learner'] == 'asc') selected @endif>Tăng dần</option>
                                        <option value="desc" @if (isset($data['order_by_learner']) && $data['order_by_learner'] == 'desc') selected @endif>Giảm dần</option>
                                    </select>
                                </div>
                                <div class="form-group col-2">
                                   <select class="form-control select2-enable col-12" name="order_by_time">
                                       <option selected value="" >Thời gian học</option>
                                       <option value="asc" @if (isset($data['order_by_time']) && $data['order_by_time'] == 'asc') selected @endif>Tăng dần</option>
                                       <option value="desc" @if (isset($data['order_by_time']) && $data['order_by_time'] == 'desc') selected @endif>Giảm dần</option>
                                   </select>
                                </div>
                                <div class="form-group col-2">
                                    <select class="form-control select2-enable col-12" name="order_by_lesson">
                                        <option selected value="">Số bài học</option>
                                        <option value="asc" @if (isset($data['order_by_lesson']) && $data['order_by_lesson'] == 'asc') selected @endif>Tăng dần</option>
                                        <option value="desc" @if (isset($data['order_by_lesson']) && $data['order_by_lesson'] == 'desc') selected @endif>Giảm dần</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 row attribute-bottom">
                                <div class="form-group col-2 filter-tag">
                                    <select class="form-control select2-enable col-12" name="tags[]" multiple>
                                        <option selected disabled>Tags</option>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}" @if (isset($data['tags']) && in_array($tag->id, $data['tags'])) selected @endif >
                                                {{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-2">
                                    <select class="form-control select2-enable col-12" name="reviews">
                                        <option selected value="">Review</option>
                                        <option value="asc" @if (isset($data['reviews']) && $data['reviews'] == 'asc') selected @endif>Tăng dần</option>
                                        <option value="desc" @if (isset($data['reviews']) && $data['reviews'] == 'desc') selected @endif>Giảm dần</option>
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
                                    <button class="btn-main course-card-button"><a href="#">More</a></button>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-4 footer-course-item">
                                        <div class="list-title">learners</div>
                                        <div class="list-data">{{ number_format($course->learners) }}</div>
                                    </div>
                                    <div class="col-4 footer-course-item">
                                        <div class="list-title">lessons</div>
                                        <div class="list-data">{{ number_format($course->total_lessons) }}</div>
                                    </div>
                                    <div class="col-4 footer-course-item">
                                        <div class="list-title">times</div>
                                        <div class="list-data">{{ number_format($course->total_times) }} (h)</div>
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
