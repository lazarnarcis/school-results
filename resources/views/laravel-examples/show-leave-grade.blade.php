@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">Leave School Grade for <b>{{$student->name}}</b></h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form action="/store-grade" method="POST" role="form text-left">
                    <input type="hidden" name="student_id" value="{{$student->id}}">
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
                                <label for="school-name" class="form-control-label">{{ __('Grade') }}</label>
                                <div class="@error('school.grade')border border-danger rounded-3 @enderror">
                                    <select class="form-control" name="grade">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    @error('grade')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="school-reason" class="form-control-label">{{ __('Reason') }}</label>
                                <div class="@error('school.reason')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="Reason" name="reason">
                                        @error('reason')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        @if(auth()->user()->account_type == "teacher")
                        <input type="hidden" name="teacher" value="{{auth()->user()->external_user_id}}">
                        @else
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-teacher" class="form-control-label">{{ __('Teacher') }}</label>
                                <div class="@error('teacher')border border-danger rounded-3 @enderror">
                                    <select class="form-control" id="user-teacher" name="teacher">
                                        <option value="">Select Teacher</option>
                                        @if(count($teachers))
                                            @foreach($teachers as $ts)
                                                <option value="{{$ts->id}}">{{$ts->name}}</option>
                                            @endforeach
                                        @endif
                                        @error('teacher')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </select>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Create New Grade' }}</button>
                    </div>
                </form>

            </div>
    </div>
</div>
@endsection