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

        return redirect()->back()->with('review', 'show');
    }

    public function update(UpdateReviewRequest $request, $id)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();

        $review = Review::find($id);
        $review->update($data);

        return redirect()->back()->with('review', 'show');
    }
}
