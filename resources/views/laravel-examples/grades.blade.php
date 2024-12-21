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
                            <h5 class="mb-0">Grades</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Grade
                                    </th> 
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Reason
                                    </th> 
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Parent Opinion
                                    </th> 
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Subject
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Student
                                    </th> 
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Teacher
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
                                @foreach ($grades as $grade)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{$grade->grade}}</p>
                                    </td>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{$grade->reason}}</p>
                                    </td> 
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{$grade->parent_opinion}}</p>
                                    </td>  
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{isset($grade->subject) ? $grade->subject->subject : ""}}</p>
                                    </td> 
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{isset($grade->student) ? $grade->student->name : ""}}</span>
                                    </td>
                                    <td class="text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{isset($grade->teacher) ? $grade->teacher->name : ""}}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{$grade->created_at}}</span>
                                    </td>
                                    <td class="text-center">
                                    @if(auth()->user()->account_type == "admin" || auth()->user()->account_type == "teacher")
                                        
                                        <a href="{{route('delete-grade', ['grade_id' => $grade->id])}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete grade">
                                        <span style="color: red;"><span>
                                            <i class="cursor-pointer fas fa-trash text-secondary" style="color: red !important;"></i>
                                        </span>Delete Grade</span>
                                        </a>
                                        @endif
                                        
                                        @if(auth()->user()->account_type == "parent")
                                        
                                        <a href="{{route('show-leave-opinion', ['grade_id' => $grade->id, 'parent_id' => auth()->user()->external_user_id])}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Leave an opinion">
                                        <i class="fas fa-user-edit text-secondary"></i> Leave an opinion
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