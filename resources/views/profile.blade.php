@extends('layouts.app')

@section('content')
    <div class="container-fluid row profile">
        <div class="col-4 list-group list-group-flush profile-left">
            <div class="list-group-item profile-avatar">
                <img id="avatar" src="{{ asset('images/image-user.png') }}" class="col-9 image-avatar">
                <label for="input-avatar" class="lable-avatar"><i class="fa-solid fa-camera"></i></label>
                <div class="profile-name">Võ Hoài Nam</div>
                <div class="profile-email">hoainamvo@gmail.com</div>
            </div>
            <div class="list-group-item">
                <span class="profile-birthday">
                    <i class="fa-solid fa-cake-candles"></i>
                    10/10/2998
                </span>
            </div>
            <div class="list-group-item">
                <span class="profile-birthday">
                   <i class="fa-solid fa-phone"></i>
                    03456214659
                </span>
            </div>
            <div class="list-group-item">
                <span class="profile-address">
                    <i class="fa-solid fa-house-chimney"></i>
                    Cau Giay, Ha Noi
                </span>
            </div>
            <div class="list-group-item">
                <span class="profile-description">
                   Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim.
                    Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum.
                    Nam nulla ippsumipsum, them venenatis
                </span>
            </div>
        </div>

        <div class=" col-8 profile-right">
            <div class="profile-my-course">
                <div class="title">My courses</div>
                <div class="col-9 course-joined row">
                    <div class="course-item">
                        <img src="{{ asset('images/image-user.png') }}" class="course-joined-item">
                        <div class="course-joined-text">HTML</div>
                    </div>
                    <div class="course-item">
                        <img src="{{ asset('images/image-user.png') }}" class="course-joined-item">
                        <div class="course-joined-text">HTML</div>
                    </div>
                    <div class="course-item">
                        <img src="{{ asset('images/image-user.png') }}" class="course-joined-item">
                        <div class="course-joined-text">HTML</div>
                    </div>
                    <div class="course-item">
                        <img src="{{ asset('images/image-user.png') }}" class="course-joined-item">
                        <div class="course-joined-text">HTML</div>
                    </div>
                    <div class="course-item">
                        <img src="{{ asset('images/image-user.png') }}" class="course-joined-item">
                        <div class="course-joined-text">HTML</div>
                    </div>
                    <div class="course-item">
                        <div class="course-joined-add"><a href="{{ route('courses.index') }}"><i class="fa-solid fa-plus"></i></a></div>
                        <div class="course-joined-text">HTML</div>
                    </div>
                </div>
            </div>

            <div class="edit-profile">
                <div class="title-edit-profile">Edit profile</div>
                <form class="row" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <input type="file" style="display: none;" id="input-avatar" name="avatar">
                    <div class=" col-6 form-profile-left">
                        <div class="form-group">
                            <label for="full_name" class="col-md-12 col-form-label text-md-left">Name</label>
                            <div class="col-md-12">
                                <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" required autocomplete="full_name" autofocus>
                                @error('full_name')
                                <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="full_name" class="col-md-12 col-form-label text-md-left">Date of birthday</label>
                            <div class="col-md-12">
                                <input id="date-of-birth" type="date" class="form-control @error('date-of-birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date-of-birth') }}" required autocomplete="date-of-birth" autofocus>
                                @error('date-of-birth')
                                <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="col-md-12 col-form-label text-md-left">Address</label>
                            <div class="col-md-12">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-6 form-profile-right">
                        <div class="form-group">
                            <label for="email" class="col-md-12 col-form-label text-md-left">Email</label>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="full_name" class="col-md-12 col-form-label text-md-left">Phone</label>
                            <div class="col-md-12">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="col-md-12 col-form-label text-md-left">About me</label>
                            <div class="col-md-12">
                                <textarea id="about_me" class="form-control @error('about_me') is-invalid @enderror" name="about_me" required autocomplete="about_me" autofocus></textarea>
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