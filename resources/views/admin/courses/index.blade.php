@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <div class="row course-header">
            <div class="col col-6">
                <h2>List courses</h2>
            </div>
            <div class="col col-6">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCourse">
                    Add course
                </button>
            </div>
        </div>

        <div class="row course-table">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
                </tbody>
            </table>
        </div>

       @include('admin.courses.modal.add')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      let url = @json(route('admin.courses.store'));
      const formAddCourse = $('#formAddCourse');
      let formDataCourse = new FormData(formAddCourse[0])

      $(document).ready(function () {
        $('#name').on('change', function () {
          formDataCourse.set('name', $(this).val())
        });

        // $('#price').on('change', function () {
        //   formDataCourse.set('price', $(this).val())
        // });

        $('#description').on('change', function () {
          formDataCourse.set('description', $(this).val())
        });

        $('#jsAddCourse').on('click', function(e) {
          e.preventDefault();

          $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: formDataCourse,
            processData: false,
            contentType: false,
            success: data => {
              formAddCourse.delete('name');
              // formAddCourse.delete('price');
              formAddCourse.delete('description');

              $('#name').val('');
              // $('#price').val('');
              $('#description').val('');
            },
            error: err => {

            }
          });
        });

      });
    </script>
@endsection