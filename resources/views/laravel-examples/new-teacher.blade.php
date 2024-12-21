@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('New Teacher') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form action="/create-new-teacher" method="POST" role="form text-left">
                    @csrf
                    @if($errors->any())
                        <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                            <span class="alert-text text-white">
                            {{$errors->first()}}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                            <span class="alert-text text-white">
                            {{ session('success') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="teacher-name" class="form-control-label">{{ __('Name') }}</label>
                                <div class="@error('teacher.name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Teacher Name" name="name">
                                        @error('name')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-subject" class="form-control-label">{{ __('Subject') }}</label>
                                <div class="@error('subject')border border-danger rounded-3 @enderror">
                                    <select class="form-control" id="user-subject" name="subject">
                                        <option value="">Select Subject</option>
                                        @if(count($school_subjects))
                                            @foreach($school_subjects as $ss)
                                                <option value="{{$ss->id}}">{{$ss->subject}}</option>
                                            @endforeach
                                        @endif
                                        @error('subject')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="teacher-email" class="form-control-label">{{ __('Email') }}</label>
                                <div class="@error('teacher.email')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Teacher Email" name="email">
                                        @error('email')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="teacher-password" class="form-control-label">{{ __('Password') }}</label>
                                <div class="@error('teacher.password')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="password" placeholder="Teacher Password" name="password">
                                        @error('password')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Create New Teacher' }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection