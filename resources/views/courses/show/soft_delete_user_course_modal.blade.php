<div class="modal fade" id="endCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('button.message_delete') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user_course.destroy', [$course->id]) }}" method="POST">
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
