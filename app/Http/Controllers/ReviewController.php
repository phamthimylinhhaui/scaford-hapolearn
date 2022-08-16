<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\Course;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(StoreReviewRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();

        Review::create($data);

        return redirect()->back()->with('review', 'show')->with('success', __('course_show.success_store_review'));
    }

    public function update(UpdateReviewRequest $request, $id)
    {
        $review = Review::find($id);

        if (!$review->isMyReview()) {
            return redirect()->back()->with('review', 'show')->with('error', __('course_show.cannot_update_review'));
        }

        $data = $request->all();
        $data['user_id'] = auth()->id();
        $review->update($data);

        return redirect()->back()->with('review', 'show')->with('success', __('course_show.success_update_review'));
    }
}
