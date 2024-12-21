@extends('layouts.user_type.auth')

@section('content')

<div>
    <!-- <div class="alert alert-secondary mx-4" role="alert">
        <span class="text-white">
            <strong>Add, Edit, Delete features are not functional!</strong> This is a
            <strong>PRO</strong> feature! Click <strong>
            <a href="https://www.creative-tim.com/live/soft-ui-dashboard-pro-laravel" target="_blank" class="text-white">here</a></strong>
            to see the PRO product!
        </span>
    </div> -->

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
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
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Teachers</h5>
                        </div>
                        @if(auth()->user()->account_type == "admin")
                        <a href="{{route('new-teacher')}}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; New Teacher</a>
                        @endif
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th> 
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Subject
                                    </th> 
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Email
                                    </th> 
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Creation Date
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $teacher)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{$teacher->id}}</p>
                                    </td> 
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$teacher->name}}</p>
                                    </td> 
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{isset($teacher->school_subject) ? $teacher->school_subject->subject : ""}}</p>
                                    </td> 
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$teacher->email}}</p>
                                    </td> 
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{$teacher->created_at}}</span>
                                    </td>
                                    <td class="text-center">
                                    @if(auth()->user()->account_type == "admin")
                                    <a href="{{route('delete-teacher', ['teacher_id' => $teacher->id])}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete teacher">
                                    <span style="color: red;"><span>
                                            <i class="cursor-pointer fas fa-trash text-secondary" style="color: red !important;"></i>
                                        </span>Delete Teacher</span>
                                    </a>
                                    @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection