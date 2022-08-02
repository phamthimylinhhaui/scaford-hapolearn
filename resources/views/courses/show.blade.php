@extends('layouts.app')

@section('content')
<section>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Library</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
    </nav>
</section>
<section>
    <div class="container-fluid course-show row">
        <div class="col-8 course-show-left">
            <div class="col-12 course-image">
                <img src="{{ asset('images/logo-html.png') }}" alt="hình ảnh" class="">
            </div>

            <div class="col-12 show-tab">
                <div class="col-12">
                    <ul class="tabs">
                        <li class="tab-link " data-tab="tab_lesson">Lessons</li>
                        <li class="tab-link " data-tab="tab_teacher">Teachers</li>
                        <li class="tab-link current" data-tab="tab_review">Reviews</li>
                    </ul>
                </div>

                <div class="col-12">
                    <div id="tab_lesson" class="tab-content">
                        <div class="row search-show-course">
                            <form action="" method="" class="col-6">
                                <input type="text" class="col-7 box-search-lesson" placeholder="Search...">
                                <span class="icon-search"><i class="fas fa-search"></i></span>
                                <button type="submit" class="col-3 col-sm-4 btn-primary">Tìm kiếm</button>
                            </form>
                            <button class="btn-main btn-join-course"><a href="#" class="">Tham gia khoá học</a></button>
                        </div>
                        <div class="lesson-show-course">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="number-order">1. </div>
                                    <div class="col-10 lesson-name">Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit.</div>
                                    <div class="btn-learn"><button class="btn-main"><a href="#"
                                                class="link-learn-lesson">Learn</a></button></div>
                                </li>
                                <li class="list-group-item">
                                    <div class="number-order">1. </div>
                                    <div class="col-10 lesson-name">Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit.</div>
                                    <div class="btn-learn"><button class="btn-main"><a href="#"
                                                class="link-learn-lesson">Learn</a></button></div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div id="tab_teacher" class="tab-content">
                        <div class="teacher-container">
                            <div class="title-main-teacher">Main Teacher</div>
                            <div class="teacher-content">
                                <div class="row teacher-info">
                                    <div class="col-2 avatar">
                                        <img src="{{asset('images/icon-teacher-avatar.png')}}" alt="avatar">
                                    </div>
                                    <div class="col-3 details">
                                        <div class="name">Lưu Trung Nghĩa</div>
                                        <div class="exp">second year teacher</div>
                                        <div class="row contact">
                                            <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                            <a href="#"><i class="fa-brands fa-slack"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="teacher-description">
                                    Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim. Sed
                                    quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat
                                    rutrum. Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque.
                                    Pellentesque tristique
                                </div>
                            </div>
                            <div class="teacher-content">
                                <div class="row teacher-info">
                                    <div class="col-2 avatar">
                                        <img src="{{asset('images/icon-teacher-avatar.png')}}" alt="avatar">
                                    </div>
                                    <div class="col-3 details">
                                        <div class="name">Lưu Trung Nghĩa</div>
                                        <div class="exp">second year teacher</div>
                                        <div class="row contact">
                                            <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                            <a href="#"><i class="fa-brands fa-slack"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="teacher-description">
                                    Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim. Sed
                                    quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat
                                    rutrum. Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque.
                                    Pellentesque tristique
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="tab_review" class="tab-content current">
                        <div>
                            here are review!
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4 course-show-right">
            <div class="col-12 description">
                <div class="description-title">Description course</div>
                <div class="description-content">
                    <span class="description-content-item">Vivamus volutpat eros pulvinar velit laoreet, sit amet
                        egestas erat dignissim. Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit
                        amet urna feugiat rutrum. Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis
                        neque. Pellentesque tristique fringilla tempus. Vivamus bibendum nibh in dolor pharetra, a
                        euismod nulla dignissim. Aenean viverra tincidunt nibh, in imperdiet nunc. Suspendisse eu ante
                        pretium, consectetur leo at, congue quam. Nullam hendrerit porta ante vitae tristique.</span>
                </div>
            </div>

            <div class="col-12 show-info-other">
                <div class="key-info">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item key-item">
                            <div class="col-6 key-name"><i class="fas fa-users"></i> Learners</div>
                            <div class="col-6 key-data">: 500</div>
                        </li>
                        <li class="list-group-item key-item">
                            <div class="col-6 key-name"><i class="fas fa-list-alt"></i> Lessons</div>
                            <div class="col-6 key-data">: 100 lesson</div>
                        </li>
                        <li class="list-group-item key-item">
                            <div class="col-6 key-name"><i class="fa-solid fa-clock"></i> Times</div>
                            <div class="col-6 key-data">: 80 hours</div>
                        </li>
                        <li class="list-group-item key-item">
                            <div class="col-6 key-name"><i class="fa-solid fa-key"></i> Tags</div>
                            <div class="col-6 key-data">:
                                <a href="#">#learn</a>
                                <a href="#">#code</a>
                            </div>
                        </li>
                        <li class="list-group-item key-item">
                            <div class="col-6 key-name"><i class="fa-solid fa-money-bill-1"></i> Price</div>
                            <div class="col-6 key-data">: Free</div>
                        </li>
                    </ul>
                </div>

                <div class="name-course-other">
                    <ul class="list-group list-group-flush">
                        <li class="course-other-info">Other Course</li>

                        <li class="list-group-item other-course-item">
                            <div class="number-order">1. </div>
                            <div class="col-11 course-other-name">Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit.</div>
                        </li>
                        <li class="list-group-item other-course-item">
                            <div class="number-order">1. </div>
                            <div class="col-11 course-other-name">Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit.</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="message">
        {{--        <h1 class="content active" id="contentTest">Hello! This is toggle show/hide content!</h1>--}}
        {{--        <button class="btn btn-primary"id="tab_le2sson">Click Me!</button>--}}

    </div>
</section>
@endsection