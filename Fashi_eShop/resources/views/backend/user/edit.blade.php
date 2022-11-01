@extends('backend.layouts.master')
@section('title', 'Sửa User')
@section('content')
    <!-- Main -->
    <div class="app-main__inner">

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">

                        @include('backend.components.notification')

                        <form method="post" action="/admin/user/{{ $user->id }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @error('avatar')
                                <div class="alert alert-warning" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="position-relative row form-group">
                                <label for="image" class="col-md-3 text-md-right col-form-label">Avatar</label>
                                <div class="col-md-9 col-xl-8">
                                    <img style="height: 200px; cursor: pointer;" class="thumbnail rounded-circle"
                                        data-toggle="tooltip" title="Click to change the image" data-placement="bottom"
                                        src="frontend/img/user/{{ $user->avatar ?? 'default-avatar.jpg' }}" alt="Avatar">
                                    <input name="image" type="file" onchange="changeImg(this)"
                                        class="image form-control-file" style="display: none;" value="">
                                    <input type="hidden" name="image_old" value="{{ $user->avatar }}">
                                    <small class="form-text text-muted">
                                        Click on the image to change (required)
                                    </small>
                                </div>
                            </div>
                            @error('name')
                                <div class="alert alert-warning" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="position-relative row form-group">
                                <label for="name" class="col-md-3 text-md-right col-form-label">Name</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="name" id="name" placeholder="Name" type="text"
                                        class="form-control" value="{{ $user->name }}">
                                </div>
                            </div>
                            @error('email')
                                <div class="alert alert-warning" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="position-relative row form-group">
                                <label for="email" class="col-md-3 text-md-right col-form-label">Email</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="email" id="email" placeholder="Email" type="email"
                                        class="form-control" value="{{ $user->email }}">
                                </div>
                            </div>
                            @error('password')
                                <div class="alert alert-warning" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="position-relative row form-group">
                                <label for="password" class="col-md-3 text-md-right col-form-label">Password</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="password" id="password" placeholder="Password" type="password"
                                        class="form-control" value="">
                                </div>
                            </div>
                            @error('password_confirmation')
                                <div class="alert alert-warning" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="position-relative row form-group">
                                <label for="password_confirmation" class="col-md-3 text-md-right col-form-label">Confirm
                                    Password</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="password_confirmation" id="password_confirmation"
                                        placeholder="Confirm Password" type="password" class="form-control" value="">
                                </div>
                            </div>

                            {{-- <div class="position-relative row form-group">
                                <label for="company_name" class="col-md-3 text-md-right col-form-label">
                                    Company Name
                                </label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="company_name" id="company_name" placeholder="Company Name" type="text"
                                        class="form-control" value="{{ $user->company_name }}">
                                </div>
                            </div> --}}

                            {{-- <div class="position-relative row form-group">
                                <label for="country" class="col-md-3 text-md-right col-form-label">Country</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="country" id="country" placeholder="Country" type="text"
                                        class="form-control" value="{{ $user->country }}">
                                </div>
                            </div> --}}
                            @error('street_address')
                                <div class="alert alert-warning" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="position-relative row form-group">
                                <label for="street_address" class="col-md-3 text-md-right col-form-label">
                                    Street Address
                                </label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="street_address" id="street_address" placeholder="Street Address"
                                        type="text" class="form-control" value="{{ $user->street_address }}">
                                </div>
                            </div>

                            {{-- <div class="position-relative row form-group">
                                <label for="postcode_zip" class="col-md-3 text-md-right col-form-label">
                                    Postcode Zip
                                </label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="postcode_zip" id="postcode_zip" placeholder="Postcode Zip"
                                        type="text" class="form-control" value="{{ $user->postcode_zip }}">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="town_city" class="col-md-3 text-md-right col-form-label">
                                    Town City
                                </label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="town_city" id="town_city" placeholder="Town City" type="text"
                                        class="form-control" value="{{ $user->town_city }}">
                                </div>
                            </div> --}}
                            @error('phone')
                                <div class="alert alert-warning" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="position-relative row form-group">
                                <label for="phone" class="col-md-3 text-md-right col-form-label">Phone</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="phone" id="phone" placeholder="Phone" type="text"
                                        class="form-control" value="{{ $user->phone }}">
                                </div>
                            </div>
                            @error('level')
                                <div class="alert alert-warning" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="position-relative row form-group">
                                <label for="level" class="col-md-3 text-md-right col-form-label">Level</label>
                                <div class="col-md-9 col-xl-8">
                                    <select name="level" id="level" class="form-control">
                                        <option value="">-- Level --</option>
                                        @foreach (\App\Utilities\Constant::$user_status as $key => $value)
                                            <option value={{ $key }}
                                                {{ $user->level == $key ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <a href="./admin/user" class="border-0 btn btn-outline-danger mr-1">
                                        <span class="btn-icon-wrapper pr-1 opacity-8">
                                            <i class="fa fa-times fa-w-20"></i>
                                        </span>
                                        <span>Cancel</span>
                                    </a>

                                    <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                                        <span class="btn-icon-wrapper pr-2 opacity-8">
                                            <i class="fa fa-download fa-w-20"></i>
                                        </span>
                                        <span>Save</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection
