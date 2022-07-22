@extends('layouts.app')

@section('content')
<section class="list-course">
    <div class="container-fluid list-course-container">
        <div class="row col-6 float-left course-search">
            <div class="col-2 course-filter">
                <button class="button-filter" id="jqueryFilterBtn">
                    <i class="fas fa-sliders-h"></i> Filter
                </button>
            </div>

            <div class="col-10 box-search">
                <form>
                    <input type="text" class="box-search-text" placeholder="Search...">
                    <input type="submit" class="btn-primary box-search-button" value="Tìm kiếm">
                </form>
            </div>
        </div>

        <div class="attribute-filter active row" id="contentFilter">
             <form method="get" action="">
                <label>Lọc theo</label>
                <button>Mới nhất</button>
                <button>Cũ nhất</button>
                <input type="radio" value="">teacher
             </form>
        </div>
    </div>
</section>
@endsection
