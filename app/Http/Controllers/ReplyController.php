<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReplyRequest;
use App\Http\Requests\UpdateReplyRequest;
use App\Models\Reply;

class ReplyController extends Controller
{
    public function store(StoreReplyRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();

        Reply::create($data);

        return redirect()->back()->with('review', 'show')->with('success', __('course_show.success_store_reply'));
    }

    public function update(UpdateReplyRequest $request, $id)
    {
        $reply = Reply::find($id);

        if (!$reply->isMyReply()) {
            return redirect()->back()->with('error', __('course_show.cannot_update_reply'));
        }

        $data = $request->all();
        $data['user_id'] = auth()->id();

        $reply->update($data);

        return redirect()->back()->with('review', 'show')->with('success', __('course_show.success_update_reply'));
    }

    public function destroy($id)
    {
        Reply::destroy($id);

        return redirect()->back()->with('review', 'show')->with('success', __('course_show.success_delete_reply'));
    }
}
