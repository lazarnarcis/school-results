@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">Leave Opinion for <b>{{$student->name}}</b> about grade <b>{{$grade->grade}}</b></h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form action="/store-parent-opinion" method="POST" role="form text-left">
                    <input type="hidden" name="parent_id" value="{{$parent->id}}">
                    <input type="hidden" name="grade_id" value="{{$grade->id}}">
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
                                <label for="school-opinion" class="form-control-label">{{ __('Opinion') }}</label>
                                <div class="@error('school.opinion')border border-danger rounded-3 @enderror">
                                    <textarea class="form-control" type="text" placeholder="Opinion" name="opinion">
</textarea>
                                        @error('opinion')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Leave an Opinion' }}</button>
                    </div>
                </form>

            </div>
    </div>
</div>
@endsection