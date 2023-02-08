<!-- Modal -->
<div class="modal fade" id="addCourse" tabindex="-1" role="dialog" aria-labelledby="addCourse" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="" id="formAddCourse">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name: </label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                               maxlength="500">
                        <div id="name" class="form-text">Name of course</div>
                    </div>
{{--                    <div class="mb-3">--}}
{{--                        <label for="price" class="form-label">Price: </label>--}}
{{--                        <input type="number" class="form-control" id="price" name="price">--}}
{{--                    </div>--}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="jsAddCourse">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>