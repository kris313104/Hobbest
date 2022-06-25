@extends('layouts.adminLayout.admin_design')
@section('content')

<div class="container-fluid" style="margin-top: 100px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user['id'] }}">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $user['name'] }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $user['email'] }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gender"
                                class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
                            <div class="col-md-6">

                                <div class="input-group mb-3" id="gender">

                                    <select class="form-select" id="gender" name="gender">

                                        @php
                                            if($user['gender'] == 'male'){
                                                echo '<option value="male">Male</option>
                                                <option value="female">Female</option>';
                                            } else {
                                                echo '<option value="female">Female</option>
                                                <option value="male">Male</option>';
                                            }
                                        @endphp
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="pref_gender"
                                class="col-md-4 col-form-label text-md-end">{{ __('Preferable gender') }}</label>
                            <div class="col-md-6">

                                <div class="input-group mb-3" id="pref_gender">

                                    <select class="form-select" id="pref_gender" name="pref_gender">
                                        @php
                                        if($user['gender'] == 'male'){
                                            echo '<option value="female">Female</option>
                                            <option value="male">Male</option>';

                                        } else {
                                            echo '<option value="male">Male</option>
                                            <option value="female">Female</option>';
                                        }
                                    @endphp
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description"
                                class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" style="height: auto;" type="text"
                                    class="form-control text-wrap @error('description') is-invalid @enderror"
                                    name="description" value="{{ $user['description'] }}" required
                                    autocomplete="description" autofocus>{{$user['description']}}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
