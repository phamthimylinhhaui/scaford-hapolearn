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
                    <input type="text" class="col-7 box-search-text" placeholder="Search...">
                    <button type="submit" class="icon-search"><i class="fas fa-search"></i></button>
                    <input type="submit" class="col-3 col-sm-4 btn-primary box-search-button" value="Tìm kiếm">

                    <div class="attribute-filter active row" id="contentFilter">
                        <div class="attribute-container">
                            <div class="col-12 row attribute-top">
                                <div class="col-lg-4 col-md-5 col-sm-6 course-filter-with">
                                    <label class="col-3 label-filter-with">Lọc theo</label>
                                    <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off" hidden>
                                    <label class="col-3 btn btn-light" for="option1">Mới nhất</label>
                                    <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off" hidden>
                                    <label class="col-3 btn btn-light" for="option2">Cũ nhất</label>
                                </div>
                                <div class="col-2 filter-teacher">
                                   <select class="col-12" name="teacher">
                                       <option selected>Teacher</option>
                                       <option value="1">Teacher A</option>
                                   </select>
                                </div>
                                <div class="col-2">
                                    <select class="col-12">
                                        <option selected>Số người học</option>
                                        <option value="1">50</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                   <select class="col-12">
                                       <option selected>Thời gian học</option>
                                       <option value="1">120h</option>
                                   </select>
                                </div>
                                <div class="col-2">
                                    <select class="col-12">
                                        <option selected>Số bài học</option>
                                        <option value="1">Tăng dần</option>
                                        <option value="2">Giảm dần</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 row attribute-bottom">
                                <div class="col-2 filter-tag">
                                    <select class="col-12">
                                        <option selected>Tags</option>
                                        <option value="1">Tag A</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <select class="col-12">
                                        <option selected>Review</option>
                                        <option value="1">Review A</option>
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
