<div class="container feedback">
    <div class="feedback-top">
        <div class="heading-courses">{{ __('homepage.feedback') }}</div>
        <div class="feedback-description">{{ __('homepage.feedback_slogan1') }}<br> {{ __('homepage.feedback_slogan2') }} </div>
    </div>
    <div class="container">
        <div class="slide-show">
            @foreach($feedbacks as $feedback)
            <div class="feedback-item">
                    <div class="feedback-container">
                        <div class="feedback-content">
                            {{ $feedback->content  }}
                        </div>
                    </div>
                    <div class="row user-comment">
                        <img src="{{ asset( !empty($feedback->user->avatar) ? $feedback->user->avatar : 'images/image-user.png') }}" class="user-avatar" alt="...">
                        <div class="feedback-user-info col-8">
                            <div class="user-name">{{ $feedback->user->user_name }}<div>
                            <div class="user-category">{{ $feedback->course->name }}</div>
                            <div class="user-rate">
                               @for($i = 0; $i < $feedback->rate; $i++)
                                <i class="fa-solid fa-star user-star-icon"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
