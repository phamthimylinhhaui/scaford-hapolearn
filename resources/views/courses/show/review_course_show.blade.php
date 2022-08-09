<div class="review-top">
    <div class="review-title">{{ $course->count_review }} Reviews</div>
    <div class="row review-avg">
        <div class="col-4 review-avg-left">
            <div class="review-number">{{ round($course->rate) }}</div>
            <div class="stars">
                @for($i = 0 ; $i < round($course->rate); $i++)
                <i class="fa-solid fa-star"></i>
                @endfor
            </div>
            <div class="review-course-count">{{ $course->count_review }} Ratings</div>
        </div>

        <div class="col-7 review-avg-right">
            <div class="row">
                <div class="col-3">5 stars </div>
                <div class="col-7 percent-total"><div class="percent" style="width: {{ $countStar['five_star'] <> 0 ? $countStar['five_star'] * 100 / $course->count_review : 0 }}%;"></div></div>
                <div class="col-2">{{ $countStar['five_star'] }} </div>
            </div>

            <div class="row">
                <div class="col-3">4 stars </div>
                <div class="col-7 percent-total"><div class="percent" style="width: {{ $countStar['four_star'] <> 0 ? $countStar['four_star'] * 100 / $course->count_review : 0 }}%;"></div></div>
                <div class="col-2">{{ $countStar['four_star'] }}</div>
            </div>

            <div class="row">
                <div class="col-3">3 stars </div>
                <div class="col-7 percent-total"><div class="percent" style="width: {{ $countStar['three_star'] <> 0 ? $countStar['three_star'] * 100 / $course->count_review : 0 }}%;"></div></div>
                <div class="col-2">{{ $countStar['three_star'] }}</div>
            </div>

            <div class="row">
                <div class="col-3">2 stars </div>
                <div class="col-7 percent-total"><div class="percent" style="width: {{ $countStar['two_star'] <> 0 ? $countStar['two_star'] * 100 / $course->count_review : 0 }}%;"></div></div>
                <div class="col-2">{{ $countStar['two_star'] }}</div>
            </div>

            <div class="row">
                <div class="col-3">1 stars </div>
                <div class="col-7 percent-total"><div class="percent" style="width: {{ $countStar['one_star'] <> 0 ? $countStar['one_star'] * 100 / $course->count_review : 0 }}%;"></div></div>
                <div class="col-2">{{ $countStar['one_star'] }}</div>
            </div>
        </div>
    </div>
</div>

<div class="review-main" id="accordionReview">
    <div class="dropdown option-show">
        <div class="dropdown-toggle" id="dropdownShowReview" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Show all reviews
        </div>
        <div class="dropdown-menu" aria-labelledby="dropdownShowReview">
            <span class="dropdown-item show btn btn-link" data-toggle="collapse" data-target="#showReviewDefault" aria-expanded="true" aria-controls="showReviewDefault">
                Show default
            </span>
            <span class="dropdown-item btn btn-link collapsed" data-toggle="collapse" data-target="#showAllReview" aria-expanded="false" aria-controls="showAllReview">
                Show all
            </span>
        </div>
    </div>

    <div id="showReviewDefault" class="collapse show" data-parent="#accordionReview">
        <div class="rate">
            @if($reviews->count() > 0)
            <div class="user-thread">

{{--                <button id="checkchovui">click</button>--}}
                @foreach ($reviews->take(2) as $review)
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
                        <div class="col-4 created">{{ empty($review->updated_at) ? $review->created_at : $review->updated_at }}</div>
                        <div class="col-1 btn-link btn-reply" data-toggle="collapse" data-target=".reply{{ $review->id }}" aria-expanded="true" aria-controls="reply">reply</div>
                        @if(auth()->check() && $review->user['id'] == auth()->id())
                            <div class="col-1 btn-link btn-reply" data-toggle="collapse" data-target=".update{{ $review->id }}" aria-expanded="true" aria-controls="reply">edit</div>
                        @endif
                    </div>
                    <div class="thread-user-comment">{{ $review->content }}</div>
                {{-- Form update review --}}
                    <div  class="col-12 update-rate collapse update{{ $review->id }}" id="showEdit">
                        <form action="{{ route('reviews.update', [$review->id]) }}" method="POST">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <input type="hidden" name="course_id" value="{{ $course->id }}" id="course_id" class="form-control @error('course_id') is-invalid @enderror">
                                <label>update message</label>
                                <textarea class="form-control @error('content') is-invalid @enderror"  required autocomplete="content" autofocus name="content">@if(!empty($review->content)) {{ $review->content }} @endif</textarea>
                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="check-stars">
                                    <span>Vote</span>
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
                                    <span>Stars again</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="submitUpdateReview" class="btn btn-primary btn-main float-right">Update</button>
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
                                    @if(auth()->check() && $reply->user['id'] == auth()->id())
                                        <div class="col-1 btn-link btn-reply" data-toggle="collapse" data-target="#update{{ $reply->id }}" aria-expanded="true" aria-controls="reply">edit</div>
                                    @endif
                                </div>
                                <div class="thread-user-comment">{{ $reply->content }}</div>
                                {{-- Update reply--}}
                                <div class="col-12 update-rate collapse" id="update{{ $reply->id }}">
                                    <form class="form-border" action="{{ route('replies.update', [$reply->id]) }}" method="POST">
                                        @csrf
                                        {{ method_field('PUT') }}
                                        <input type="hidden" name="review_id" value="{{ $review->id }}">
                                        <div class="form-group">
                                            <label>update reply</label>
                                            <textarea class="form-control" name="content">@if(!empty($reply->content)) {{ $reply->content }} @endif</textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-main float-right">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <h5>Chưa có phản hồi nào cho đánh giá này!</h5>
                        @endif

                        {{-- Create reply--}}
                        <div class="rep-content reply collapse reply{{ $review->id }}">
                            <form class="form-border" method="POST" action="{{ route('replies.store') }}">
                                @csrf
                                <input type="hidden" name="review_id" value="{{ $review->id }}">
                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                <div class="form-group">
                                    <label>Comment</label>
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
                {{ $reviews->appends(['review' => $reviews->currentPage()])->links() }}
            </div>
            @else
            <div class="user-thread">Chưa có đánh giá nào!</div>
            @endif
        </div>
    </div>

</div>

@if (!$course->isReview())
<div class="review-bottom">
    <div class="review-bottom-title">Leave a Review</div>
    <div class="add-rate">
        <form  action="{{ route('reviews.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="hidden" name="course_id" value="{{ $course->id }}" id="course_id" class="form-control @error('course_id') is-invalid @enderror">
                <label>message</label>
                <textarea class="form-control" name="content" id="content" class="form-control @error('content') is-invalid @enderror"> </textarea>
                @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <div class="check-stars">
                    <span>Vote</span>
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
                    <span>Stars</span>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-main float-right">Send</button>
            </div>
        </form>
    </div>
</div>
@endif
