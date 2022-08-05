<div class="review-top">
    <div class="review-title">05 Review</div>
    <div class="row review-avg">
        <div class="col-4 review-avg-left">
            <div class="review-number">5</div>
            <div class="stars">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </div>
            <div class="review-course-count">2 Ratings</div>
        </div>

        <div class="col-7 review-avg-right">
            <div class="row">
                <div class="col-3">5 stars </div>
                <div class="col-7 percent-total"><div class="percent" style="width: 50%;"></div></div>
                <div class="col-2">2 </div>
            </div>

            <div class="row">
                <div class="col-3">4 stars </div>
                <div class="col-7 percent-total"><div class="percent" style="width: 40%;"></div></div>
                <div class="col-2">2 </div>
            </div>

            <div class="row">
                <div class="col-3">3 stars </div>
                <div class="col-7 percent-total"><div class="percent" style="width: 30%;"></div></div>
                <div class="col-2">2 </div>
            </div>

            <div class="row">
                <div class="col-3">2 stars </div>
                <div class="col-7 percent-total"><div class="percent" style="width: 20%;"></div></div>
                <div class="col-2">2 </div>
            </div>

            <div class="row">
                <div class="col-3">1 stars </div>
                <div class="col-7 percent-total"><div class="percent" style="width: 10%;"></div></div>
                <div class="col-2">2 </div>
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
            <div class="user-thread">
                <div class="thread-container">
                    <div class="row thread-user-info">
                        <div class="col-1 image">
                            <img src="{{ asset('images/image-user.png') }}" class="user-avatar">
                        </div>
                        <div class="col-3 name">Nam Hoàng Anh</div>
                        <div class="col-3 stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="col-4 created">August 4, 2020 at 1:30 pm</div>
                        <div class="btn-link btn-reply" data-toggle="collapse" data-target="#reply" aria-expanded="true" aria-controls="reply">reply</div>
                    </div>
                    <div class="thread-user-comment">
                        Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim.
                        Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum.
                        Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque. Pellentesque tristique
                    </div>
                </div>

                <div id="reply" class="reply collapse">
                    <div class="display-rep-other">
                        <div class="row thread-user-info">
                            <div class="col-1 image">
                                <img src="{{ asset('images/image-user.png') }}" class="user-avatar">
                            </div>
                            <div class="col-3 name">Nga Nguyen</div>
                            <div class="col-4 created">August 4, 2020 at 1:30 pm</div>
                        </div>
                        <div class="thread-user-comment">
                            Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim.
                            Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum.
                            Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque. Pellentesque tristique
                        </div>
                    </div>
                    <div class="display-rep-other">
                        <div class="row thread-user-info">
                            <div class="col-1 image">
                                <img src="{{ asset('images/image-user.png') }}" class="user-avatar">
                            </div>
                            <div class="col-3 name">Nga Nguyen</div>
                            <div class="col-4 created">August 4, 2020 at 1:30 pm</div>
                        </div>
                        <div class="thread-user-comment">
                            Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim.
                            Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum.
                            Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque. Pellentesque tristique
                        </div>
                    </div>

                    <div class="rep-content">
                        <form>
                            <div class="form-group">
                                <label>Comment</label>
                                <textarea class="form-control" name="message"> </textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary right"><i class="fa-solid fa-paper-plane"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="showAllReview" class="collapse collapseTeacher"  data-parent="#accordionReview">
        <div class="rate">
            <div class="user-thread">
                <div class="thread-container">
                    <div class="row thread-user-info">
                        <div class="col-1 image">
                            <img src="{{ asset('images/image-user.png') }}" class="user-avatar">
                        </div>
                        <div class="col-3 name">Nam Hoàng Anh</div>
                        <div class="col-3 stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="col-4 created">August 4, 2020 at 1:30 pm</div>
                        <div class="btn-link btn-reply" data-toggle="collapse" data-target="#reply" aria-expanded="true" aria-controls="reply">reply</div>
                    </div>
                    <div class="thread-user-comment">
                        Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim.
                        Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum.
                        Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque. Pellentesque tristique
                    </div>
                </div>

                <div id="reply" class="reply collapse">
                    <div class="display-rep-other">
                        <div class="row thread-user-info">
                            <div class="col-1 image">
                                <img src="{{ asset('images/image-user.png') }}" class="user-avatar">
                            </div>
                            <div class="col-3 name">Nga Nguyen</div>
                            <div class="col-4 created">August 4, 2020 at 1:30 pm</div>
                        </div>
                        <div class="thread-user-comment">
                            Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim.
                            Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum.
                            Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque. Pellentesque tristique
                        </div>
                    </div>
                    <div class="display-rep-other">
                        <div class="row thread-user-info">
                            <div class="col-1 image">
                                <img src="{{ asset('images/image-user.png') }}" class="user-avatar">
                            </div>
                            <div class="col-3 name">Nga Nguyen</div>
                            <div class="col-4 created">August 4, 2020 at 1:30 pm</div>
                        </div>
                        <div class="thread-user-comment">
                            Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim.
                            Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum.
                            Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque. Pellentesque tristique
                        </div>
                    </div>

                    <div class="rep-content">
                        <form>
                            <div class="form-group">
                                <label>Comment</label>
                                <textarea class="form-control" name="message"> </textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary right"><i class="fa-solid fa-paper-plane"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="rate">
            <div class="user-thread">
                <div class="thread-container">
                    <div class="row thread-user-info">
                        <div class="col-1 image">
                            <img src="{{ asset('images/image-user.png') }}" class="user-avatar">
                        </div>
                        <div class="col-3 name">Nam Hoàng Anh</div>
                        <div class="col-3 stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="col-4 created">August 4, 2020 at 1:30 pm</div>
                        <div class="btn-link btn-reply" data-toggle="collapse" data-target="#reply" aria-expanded="true" aria-controls="reply">reply</div>
                    </div>
                    <div class="thread-user-comment">
                        Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim.
                        Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum.
                        Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque. Pellentesque tristique
                    </div>
                </div>

                <div id="reply" class="reply collapse">
                    <div class="display-rep-other">
                        <div class="row thread-user-info">
                            <div class="col-1 image">
                                <img src="{{ asset('images/image-user.png') }}" class="user-avatar">
                            </div>
                            <div class="col-3 name">Nga Nguyen</div>
                            <div class="col-4 created">August 4, 2020 at 1:30 pm</div>
                        </div>
                        <div class="thread-user-comment">
                            Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim.
                            Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum.
                            Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque. Pellentesque tristique
                        </div>
                    </div>
                    <div class="display-rep-other">
                        <div class="row thread-user-info">
                            <div class="col-1 image">
                                <img src="{{ asset('images/image-user.png') }}" class="user-avatar">
                            </div>
                            <div class="col-3 name">Nga Nguyen</div>
                            <div class="col-4 created">August 4, 2020 at 1:30 pm</div>
                        </div>
                        <div class="thread-user-comment">
                            Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim.
                            Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum.
                            Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque. Pellentesque tristique
                        </div>
                    </div>

                    <div class="rep-content">
                        <form>
                            <div class="form-group">
                                <label>Comment</label>
                                <textarea class="form-control" name="message"> </textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary right"><i class="fa-solid fa-paper-plane"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="rate">
            <div class="user-thread">
                <div class="thread-container">
                    <div class="row thread-user-info">
                        <div class="col-1 image">
                            <img src="{{ asset('images/image-user.png') }}" class="user-avatar">
                        </div>
                        <div class="col-3 name">Nam Hoàng Anh</div>
                        <div class="col-3 stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="col-4 created">August 4, 2020 at 1:30 pm</div>
                        <div class="btn-link btn-reply" data-toggle="collapse" data-target="#reply" aria-expanded="true" aria-controls="reply">reply</div>
                    </div>
                    <div class="thread-user-comment">
                        Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim.
                        Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum.
                        Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque. Pellentesque tristique
                    </div>
                </div>

                <div id="reply" class="reply collapse">
                    <div class="display-rep-other">
                        <div class="row thread-user-info">
                            <div class="col-1 image">
                                <img src="{{ asset('images/image-user.png') }}" class="user-avatar">
                            </div>
                            <div class="col-3 name">Nga Nguyen</div>
                            <div class="col-4 created">August 4, 2020 at 1:30 pm</div>
                        </div>
                        <div class="thread-user-comment">
                            Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim.
                            Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum.
                            Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque. Pellentesque tristique
                        </div>
                    </div>
                    <div class="display-rep-other">
                        <div class="row thread-user-info">
                            <div class="col-1 image">
                                <img src="{{ asset('images/image-user.png') }}" class="user-avatar">
                            </div>
                            <div class="col-3 name">Nga Nguyen</div>
                            <div class="col-4 created">August 4, 2020 at 1:30 pm</div>
                        </div>
                        <div class="thread-user-comment">
                            Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim.
                            Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum.
                            Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque. Pellentesque tristique
                        </div>
                    </div>

                    <div class="rep-content">
                        <form>
                            <div class="form-group">
                                <label>Comment</label>
                                <textarea class="form-control" name="message"> </textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary right"><i class="fa-solid fa-paper-plane"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="review-bottom">
    <div class="review-bottom-title">Leave a Review</div>
    <div class="add-rate">
        <form >
            <div class="form-group">
                <label>message</label>
                <textarea class="form-control" name="message"> </textarea>
            </div>
            <div class="form-group">
                <div class="check-stars">
                    <span>Vote</span>
                    <input class="star star-5" id="star-5" type="radio"name="star"/>
                    <label class="star star-5" for="star-5"></label>
                    <input class="star star-4" id="star-4" type="radio"name="star"/>
                    <label class="star star-4" for="star-4"></label>
                    <input class="star star-3" id="star-3" type="radio"name="star"/>
                    <label class="star star-3" for="star-3"></label>
                    <input class="star star-2" id="star-2" type="radio"name="star"/>
                    <label class="star star-2" for="star-2"></label>
                    <input class="star star-1" id="star-1" type="radio"name="star"/>
                    <label class="star star-1" for="star-1"></label>
                    <span>Stars</span>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-main float-right">Send</button>
            </div>
        </form>
    </div>
</div>