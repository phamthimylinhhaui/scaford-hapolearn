@extends('layouts.app')

@section('content')
    <section class="banner">
        <div class="container-banner">
            <div class="content">
                <div class="content-item">{{ __('homepage.learn_anytime_anywhere') }}</div>
                <div class="content-title"><span>{{ __('homepage.at_hapoLearning') }}</span>
                    <img src="{{ asset('images/hapo.png') }}" alt="icon-hapo">!
                </div>
                <div class="content-description ">interactive lessons, "on-the-go"<br> practice, peer support</div>
                <div class="content-btn"><a href="{{ route('courses.index') }}" class="btn-start">{{ __('button.start_learning_now') }}</a></div>
            </div>
        </div>
        <div class="effect-banner"></div>

        <div class="container-display">
            <div class="message-display">
                <div class="content active modal-header" id="contentMessage">
                    <div class="content-detail">
                        <img src="{{ asset('images/hapo.png') }}" alt="message-icon" class="message-icon">
                        <span>HapoLearn</span>
                        <button type="button" class="jquery-message-btn close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="message-content">HapoLearn xin chào bạn.<br>
                            Bạn có cần chúng tôi hỗ trợ gì không?
                        </div>
                        <button type="button" class="message-btn-login btn btn-primary" data-dismiss="modal">
                            <a class="message-link" href="#">
                                <i class="fa-brands fa-facebook-messenger"></i>
                                Đăng nhập vào Messenger
                            </a>
                        </button>
                        <a class="chat" href="#">Chat với HapoLearn trong Messenger</a>
                    </div>
                </div>
                <button class="btn btn-primary jquery-message-btn"><i class="fa-brands fa-facebook-messenger"></i></button>
            </div>
        </div>
    </section>
    @include('layouts.course')

    @include('layouts.why_hapolearn')

    @include('layouts.feedback')

    @include('layouts.statistic')
@endsection
