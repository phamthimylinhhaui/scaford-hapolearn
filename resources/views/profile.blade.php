@extends('layouts.app')

@section('content')
    <div class="container-fluid row profile">
        <div class="col-lg-4 col-xl-4 col-sm-12 col-md-12 col-xs-12 list-group list-group-flush profile-left">
            <div class="list-group-item profile-avatar">
                <img id="avatar" src="{{ empty(auth()->user()->avatar) ? asset('images/image-user.png') : asset(auth()->user()->avatar) }}" class="col-lg-8 col-xl-8 col-sm-4 col-md-4 col-xs-4 image-avatar">
                <label for="input-avatar" class="lable-avatar"><i class="fa-solid fa-camera"></i></label>
                <div class="profile-name">{{ empty(auth()->user()->full_name) ? auth()->user()->user_name : auth()->user()->full_name}}</div>
                <div class="profile-email">{{ auth()->user()->email }}</div>
            </div>
            <div class="list-group-item">
                <span class="profile-birthday">
                    <i class="fa-solid fa-cake-candles"></i>
                    {{ date( 'd-m-Y', strtotime(auth()->user()->date_of_birth)) }}
                </span>
            </div>
            <div class="list-group-item">
                <span class="profile-birthday">
                   <i class="fa-solid fa-phone"></i>
                    {{ auth()->user()->phone }}
                </span>
            </div>
            <div class="list-group-item">
                <span class="profile-address">
                    <i class="fa-solid fa-house-chimney"></i>
                    {{ auth()->user()->address }}
                </span>
            </div>
            <div class="list-group-item">
                <span class="profile-description">
                  {{ auth()->user()->about_me }}
                </span>
            </div>
        </div>

        <div class=" col-lg-8 col-xl-8 col-sm-12 col-md-12 col-xs-12 profile-right">
            <div class="profile-my-course">
                <div class="title">{{ __('profile.my_courses') }}</div>
                <div class="row row-cols-7 row-cols-xs-5 col-9 col-xs-11 course-joined row">
                    @foreach($myCourses as $myCourse)
                    <div class="course-item">
                        <img src="{{ empty($myCourse->image) ? asset('images/image-user.png') : asset($myCourse->image) }}" class="course-joined-item">
                        <div class="course-joined-text">{{ $myCourse->name }}</div>
                    </div>
                    @endforeach
                    <div class="course-item">
                        <div class="course-joined-add"><a href="{{ route('courses.index') }}"><i class="fa-solid fa-plus"></i></a></div>
                        <div class="course-joined-text">{{ __('profile.add_course') }}</div>
                    </div>
                </div>
            </div>

            <div class="edit-profile">
                <div class="title-edit-profile">{{ __('profile.edit_profile') }}</div>
                <form class="row" method="POST" action="{{ route('profile.update', [auth()->id()]) }}" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <input type="file" style="display: none;" id="input-avatar" name="image" class="form-control  @error('image') is-invalid @enderror">
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class=" col-lg-6 col-xl-6 col-sm-11 col-md-11 col-xs-11 form-profile-left">
                        <div class="form-group">
                            <label for="full_name" class="col-md-12 col-form-label text-md-left">{{ __('attribute.full_name') }}</label>
                            <div class="col-md-12">
                                <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" required autocomplete="name" autofocus>
                                @error('full_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="full_name" class="col-md-12 col-form-label text-md-left">{{ __('attribute.birthday') }}</label>
                            <div class="col-md-12">
                                <input id="date-of-birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" autocomplete="date_of_birth" autofocus>
                                @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="col-md-12 col-form-label text-md-left">{{ __('attribute.address') }}</label>
                            <div class="col-md-12">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address" autofocus>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-xl-6 col-sm-11 col-md-11 col-xs-11 form-profile-right">
                        <div class="form-group">
                            <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('attribute.email') }}</label>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="full_name" class="col-md-12 col-form-label text-md-left">{{ __('attribute.phone') }}</label>
                            <div class="col-md-12">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone" autofocus>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="col-md-12 col-form-label text-md-left">{{ __('attribute.about_me') }}</label>
                            <div class="col-md-12">
                                <textarea id="about_me" class="form-control @error('about_me') is-invalid @enderror" name="about_me" value="{{ old('about_me') }}" autocomplete="about_me" autofocus></textarea>
                                @error('about_me')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary float-right btn-main">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
