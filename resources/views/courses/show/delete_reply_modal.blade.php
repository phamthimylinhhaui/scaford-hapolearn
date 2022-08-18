<div class="modal fade" id="deleteReply" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">{{ __('button.message_delete') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('replies.destroy', [$reply->id ]) }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('button.no') }}</button>
                        <button type="submit" class="btn btn-danger btn-yes-delete">{{ __('button.yes') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
