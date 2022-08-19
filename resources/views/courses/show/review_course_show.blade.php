<div class="review-top">
    <div class="review-title">{{ $course->count_review }} {{ __('course_show.review') }}</div>
    <div class="row review-avg">
        <div class="col-4 review-avg-left">
            <div id="rateCourseValue" class="review-number">{{ number_format($course->rate, 1) }}</div>
            <div class="stars">
                <div id="rateCourse"></div>
            </div>
            <div class="review-course-count">{{ $course->count_review }} {{ __('course_show.rating') }}</div>
        </div>

        <div class="col-7 review-avg-right">
            <div class="row">
                <div class="col-3">5 {{ __('course_show.stars') }} </div>
                <div class="col-7 percent-total"><div class="percent" style="width: {{ $numberOfStars['five_star'] <> 0 ? $numberOfStars['five_star'] * 100 / $course->count_review : 0 }}%;"></div></div>
                <div class="col-2">{{ $numberOfStars['five_star'] }} </div>
            </div>

            <div class="row">
                <div class="col-3">4 {{ __('course_show.stars') }} </div>
                <div class="col-7 percent-total"><div class="percent" style="width: {{ $numberOfStars['four_star'] <> 0 ? $numberOfStars['four_star'] * 100 / $course->count_review : 0 }}%;"></div></div>
                <div class="col-2">{{ $numberOfStars['four_star'] }}</div>
            </div>

            <div class="row">
                <div class="col-3">3 {{ __('course_show.stars') }} </div>
                <div class="col-7 percent-total"><div class="percent" style="width: {{ $numberOfStars['three_star'] <> 0 ? $numberOfStars['three_star'] * 100 / $course->count_review : 0 }}%;"></div></div>
                <div class="col-2">{{ $numberOfStars['three_star'] }}</div>
            </div>

            <div class="row">
                <div class="col-3">2 {{ __('course_show.stars') }} </div>
                <div class="col-7 percent-total"><div class="percent" style="width: {{ $numberOfStars['two_star'] <> 0 ? $numberOfStars['two_star'] * 100 / $course->count_review : 0 }}%;"></div></div>
                <div class="col-2">{{ $numberOfStars['two_star'] }}</div>
            </div>

            <div class="row">
                <div class="col-3">1 {{ __('course_show.stars') }} </div>
                <div class="col-7 percent-total"><div class="percent" style="width: {{ $numberOfStars['one_star'] <> 0 ? $numberOfStars['one_star'] * 100 / $course->count_review : 0 }}%;"></div></div>
                <div class="col-2">{{ $numberOfStars['one_star'] }}</div>
            </div>
        </div>
    </div>
</div>

<div class="review-main" id="accordionReview">
    <div class="dropdown option-show">
        <div class="dropdown-toggle" id="dropdownShowReview" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ __('course_show.show_all') }}
        </div>
        <div class="dropdown-menu" aria-labelledby="dropdownShowReview">
            <span class="dropdown-item show btn btn-link" data-toggle="collapse" data-target="#showReviewDefault" aria-expanded="true">
            {{ __('course_show.show') }}
            </span>
            <span class="dropdown-item btn btn-link collapsed" data-toggle="collapse" data-target="#showReviewDefault" aria-expanded="false">
            {{ __('course_show.hidden') }}
            </span>
        </div>
    </div>

    <div id="showReviewDefault" class="collapse show" data-parent="#accordionReview">
        <div class="rate">
            @if($reviews->count() > 0)
            <div class="user-thread">

                @foreach ($reviews as $review)
                <div class="col-12 thread-container">
                    <div class="row thread-user-info">
                        <div class="col-1 image">
                            <img src="{{ !empty($review->user) ? asset($review->user['avatar']) : asset('images/image-user.png') }}" class="user-avatar">
                        </div>
                        <div class="col-2 name">{{ !empty($review->user) ? $review->user['user_name'] : 'no name' }}</div>
                        <div class="col-3 stars">
                            @for($i = 0; $i < $review->rate; $i++)
                            <i class="fa-solid fa-star"></i>
                            @endfor
                        </div>
                        <div class="col-2 created">{{ empty($review->updated_at) ? $review->created_at : $review->updated_at }}</div>
                        <div class="col-2 btn-link btn-reply" data-toggle="collapse" data-target=".reply{{ $review->id }}" aria-expanded="true" aria-controls="reply">{{ __('button.reply') }}</div>
                        @if(auth()->check() && $review->isMyReview())
                            <div class="col-2 btn-link btn-reply" data-toggle="collapse" data-target=".update{{ $review->id }}" aria-expanded="true" aria-controls="reply">{{ __('button.edit') }}</div>
                        @endif
                    </div>
                    <div class="thread-user-comment">{{ $review->content }}</div>

                    <div  class="col-12 update-rate collapse update{{ $review->id }}" id="showEdit">
                        <form action="{{ route('reviews.update', [$review->id]) }}" method="POST">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <input type="hidden" name="course_id" value="{{ $course->id }}" id="course_id" class="form-control @error('course_id') is-invalid @enderror">
                                <label>{{ __('course_show.update_message') }}</label>
                                <textarea class="form-control @error('content') is-invalid @enderror"  required autocomplete="content" autofocus name="content">@if(!empty($review->content)) {{ $review->content }} @endif</textarea>
                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="check-stars">
                                    <span>{{ __('course_show.vote') }}</span>
                                    <input class="star star-5" id="star-5" type="radio" name="rate" value="5" @if($review->rate == 5) {{ 'checked' }} @endif/>
                                    <label class="star star-5" for="star-5"></label>
                                    <input class="star star-4" id="star-4" type="radio" name="rate" value="4" @if($review->rate == 4) {{ 'checked' }} @endif/>
                                    <label class="star star-4" for="star-4"></label>
                                    <input class="star star-3" id="star-3" type="radio" name="rate" value="3" @if($review->rate == 3) {{ 'checked' }} @endif/>
                                    <label class="star star-3" for="star-3"></label>
                                    <input class="star star-2" id="star-2" type="radio" name="rate" value="2" @if($review->rate == 2) {{ 'checked' }} @endif/>
                                    <label class="star star-2" for="star-2"></label>
                                    <input class="star star-1" id="star-1" type="radio" name="rate" value="1" @if($review->rate == 1) {{ 'checked' }} @endif/>
                                    <label class="star star-1" for="star-1"></label>
                                    <span>{{ __('course_show.stars_again') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="submitUpdateReview" class="btn btn-primary btn-main float-right">{{ __('button.update') }}</button>
                            </div>
                        </form>
                    </div>
                {{-- List reply--}}
                    <div>
                        @if($review->replies->count() > 0)
                            @foreach($review->replies as $reply)
                            <div class="display-rep-other">
                                <div class="row thread-user-info">
                                    <div class="col-1 image">
                                        <img src="{{ !empty($reply->user) ? asset($reply->user['avatar']) : asset('images/image-user.png') }}" class="user-avatar">
                                    </div>
                                    <div class="col-3 name">{{ $reply->user['user_name'] }}</div>
                                    <div class="col-4 created">{{ $reply->user['created_at'] }}</div>
                                    @if(auth()->check() && $reply->isMyReply())
                                        <div class="col-2 btn-link btn-reply" data-toggle="collapse" data-target="#update{{ $reply->id }}" aria-expanded="true" aria-controls="reply">{{ __('button.edit') }}</div>
                                        <div  class="col-2 text-danger" data-toggle="modal" data-target="#deleteReply">{{ __('button.delete') }}</div>
                                        @include('courses.show.delete_reply_modal')
                                    @endif
                                </div>
                                <div class="thread-user-comment">{{ $reply->content }}</div>
                                {{-- update reply--}}
                                <div class="col-12 update-rate collapse" id="update{{ $reply->id }}">
                                    <form class="form-border" action="{{ route('replies.update', [$reply->id]) }}" method="POST">
                                        @csrf
                                        {{ method_field('PUT') }}
                                        <input type="hidden" name="review_id" value="{{ $review->id }}">
                                        <div class="form-group">
                                            <label>{{ __('course_show.update_reply') }}</label>
                                            <textarea class="form-control" name="content">@if(!empty($reply->content)) {{ $reply->content }} @endif</textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-main float-right">{{ __('button.update') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <h6>{{ __('course_show.not_found_reply') }}</h6>
                        @endif

                        {{-- Create reply--}}
                        <div class="rep-content reply collapse reply{{ $review->id }}">
                            <form class="form-border" method="POST" action="{{ route('replies.store') }}">
                                @csrf
                                <input type="hidden" name="review_id" value="{{ $review->id }}">
                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                <div class="form-group">
                                    <label>{{ __('course_show.comment') }}</label>
                                    <textarea class="form-control" name="content" id="content" class="form-control @error('content') is-invalid @enderror"  required autocomplete="content" autofocus> </textarea>
                                    @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary right"><i class="fa-solid fa-paper-plane"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach

                {{ $reviews->links() }}
            </div>
            @else
            <div class="user-thread">{{ __('course_show.not_found_review') }}</div>
            @endif
        </div>
    </div>

</div>

@if (!$course->isReview())
<div class="review-bottom">
    <div class="review-bottom-title">{{ __('course_show.leave_review') }}</div>
    <div class="add-rate">
        <form  action="{{ route('reviews.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="hidden" name="course_id" value="{{ $course->id }}" id="course_id" class="form-control @error('course_id') is-invalid @enderror">
                <label>{{ __('course_show.message') }}</label>
                <textarea class="form-control" name="content" id="content" class="form-control @error('content') is-invalid @enderror"> </textarea>
                @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <div class="check-stars">
                    <span>{{ __('course_show.vote') }}</span>
                    <input class="star star2-5" id="star2-5" type="radio"name="rate" value="5"/>
                    <label class="star star2-5" for="star2-5"></label>
                    <input class="star star2-4" id="star2-4" type="radio"name="rate" value="4"/>
                    <label class="star star2-4" for="star2-4"></label>
                    <input class="star star2-3" id="star2-3" type="radio"name="rate" value="3"/>
                    <label class="star star2-3" for="star2-3"></label>
                    <input class="star star2-2" id="star2-2" type="radio"name="rate" value="2"/>
                    <label class="star star2-2" for="star2-2"></label>
                    <input class="star star2-1" id="star2-1" type="radio"name="rate" value="1"/>
                    <label class="star star2-1" for="star2-1"></label>
                    <span>{{ __('course_show.stars') }}</span>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-main float-right">{{ __('button.send') }}</button>
            </div>
        </form>
    </div>
</div>
@endif
