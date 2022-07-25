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
                <form>
                    <input type="text" class="col-7 box-search-text" placeholder="Search..." name="course_name">
                    <button type="submit" class="icon-search"><i class="fas fa-search"></i></button>
                    <input type="submit" class="col-3 col-sm-4 btn-primary box-search-button" value="Tìm kiếm">

                    <div class="attribute-filter active row" id="contentFilter">
                        <div class="attribute-container">
                            <div class="col-12 row attribute-top">
                                <div class="col-lg-4 col-md-5 col-sm-6 course-filter-with">
                                    <label class="col-3 label-filter-with">Lọc theo</label>
                                    <input type="radio" class="btn-check" name="course_create" id="option1" autocomplete="off" hidden>
                                    <label class="col-3 btn btn-light" for="option1">Mới nhất</label>
                                    <input type="radio" class="btn-check" name="course_create" id="option2" autocomplete="off" hidden>
                                    <label class="col-3 btn btn-light" for="option2">Cũ nhất</label>
                                </div>
                                <div class="col-2 filter-teacher">
                                   <select class="col-12" name="teacher_name">
                                       <option selected>Teacher</option>
                                       @foreach($teachers as $teacher)
                                           <option value="{{ $teacher->id }}">{{ $teacher->user_name }}</option>
                                       @endforeach
                                   </select>
                                </div>
                                <div class="col-2">
                                    <select class="col-12" name="learners">
                                        <option selected>Số người học</option>
                                        <option value="1">0</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="200">200</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                   <select class="col-12">
                                       <option selected name="time">Thời gian học (h)</option>
                                       <option value="120">120</option>
                                       <option value="200">200</option>
                                       <option value="250">250</option>
                                       <option value="300">300</option>
                                       <option value="500">500</option>
                                   </select>
                                </div>
                                <div class="col-2">
                                    <select class="col-12" name="order_by_lesson">
                                        <option selected>Số bài học</option>
                                        <option value="1">Tăng dần</option>
                                        <option value="2">Giảm dần</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 row attribute-bottom">
                                <div class="col-2 filter-tag">
                                    <select class="col-12" name="tag_name">
                                        <option selected>Tags</option>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2">
                                    <select class="col-12" name="review">
                                        <option selected>Review (star)</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
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
                <div class="col">
                    <div class="card card-list-course">
                        <div class="row list-course-main">
                            <img src="{{ asset('images/logo-html.png') }}" class="col-3 list-course-image" alt="...">
                            <div class="col-8 card-body">
                                <h5 class="course-card-title text-left">HTML Fundamentals</h5>
                                <p class="card-text text-left">Practice during lessons, practice between lessons, practice whenever you can.
                                    Master the task, then reinforce and test your knowledge with fun, hands-on exercises and interactive quizzes.
                                </p>
                                <button class="btn-main course-card-button">More</button>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-4 footer-course-item">
                                    <div class="list-title">learners</div>
                                    <div class="list-data">1,586</div>
                                </div>
                                <div class="col-4 footer-course-item">
                                    <div class="list-title">lessons</div>
                                    <div class="list-data">1,586</div>
                                </div>
                                <div class="col-4 footer-course-item">
                                    <div class="list-title">times</div>
                                    <div class="list-data">1,586 (h)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-list-course">
                        <div class="row list-course-main">
                            <img src="{{ asset('images/logo-html.png') }}" class="col-3 list-course-image" alt="...">
                            <div class="col-8 card-body">
                                <h5 class="course-card-title text-left">HTML Fundamentals</h5>
                                <p class="card-text text-left">Practice during lessons, practice between lessons, practice whenever you can.
                                    Master the task, then reinforce and test your knowledge with fun, hands-on exercises and interactive quizzes.
                                </p>
                                <button class="btn-main course-card-button">More</button>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-4 footer-course-item">
                                    <div class="list-title">learners</div>
                                    <div class="list-data">1,586</div>
                                </div>
                                <div class="col-4 footer-course-item">
                                    <div class="list-title">lessons</div>
                                    <div class="list-data">1,586</div>
                                </div>
                                <div class="col-4 footer-course-item">
                                    <div class="list-title">times</div>
                                    <div class="list-data">1,586 (h)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-list-course">
                        <div class="row list-course-main">
                            <img src="{{ asset('images/logo-html.png') }}" class="col-3 list-course-image" alt="...">
                            <div class="col-8 card-body">
                                <h5 class="course-card-title text-left">HTML Fundamentals</h5>
                                <p class="card-text text-left">Practice during lessons, practice between lessons, practice whenever you can.
                                    Master the task, then reinforce and test your knowledge with fun, hands-on exercises and interactive quizzes.
                                </p>
                                <button class="btn-main course-card-button">More</button>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-4 footer-course-item">
                                    <div class="list-title">learners</div>
                                    <div class="list-data">1,586</div>
                                </div>
                                <div class="col-4 footer-course-item">
                                    <div class="list-title">lessons</div>
                                    <div class="list-data">1,586</div>
                                </div>
                                <div class="col-4 footer-course-item">
                                    <div class="list-title">times</div>
                                    <div class="list-data">1,586 (h)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
