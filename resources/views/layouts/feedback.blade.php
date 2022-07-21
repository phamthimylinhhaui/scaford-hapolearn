<div class="container feedback">
    <div class="feedback-top">
        <div class="heading-courses">Feedback</div>
        <div class="feedback-description">What other students turned professionals have to say about us<br>
            after learning with us and reaching their goals
        </div>
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
                        <img src="{{ asset(($feedback->user)->avatar) }}" class="user-avatar" alt="...">
                        <div class="feedback-user-info col-8">
                            <div class="user-name">{{ ($feedback->user)->user_name }}<div>
                            <div class="user-category">{{ ($feedback->course)->name }}</div>
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
