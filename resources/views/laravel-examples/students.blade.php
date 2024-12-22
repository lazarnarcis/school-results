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
                            <h5 class="mb-0">Students</h5>
                        </div>
                        @if(auth()->user()->account_type == "admin")
                        <a href="{{route('new-student')}}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; New Student</a>
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
                                        Annual Average
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        View Grades
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Email
                                    </th> 
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Creation Date
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Absences
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        View Absences
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Leave Absence
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Delete
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{$student->id}}</p>
                                    </td> 
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$student->name}}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$student->annual_average}} <i class='{{$student->annual_average > 5 ? " fa-solid fa-face-smile " : "fa-solid fa-face-sad-tear"}}'></i></p>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{url('grades', ['student_id' => $student->id])}}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="View Grades">
                                            <i class="fas fa-eye text-secondary"></i> View Grades
                                        </a> 
                                    </td>
                                    <td class="text-center">
                                    @if(auth()->user()->account_type == "admin" || auth()->user()->account_type == "teacher")
                                        <a href="{{route('show-leave-grade', ['student_id' => $student->id])}}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Leave a School Grade">
                                            <i class="fas fa-user-edit text-secondary"></i> Leave a School Grade
                                        </a> 
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$student->email}}</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{$student->created_at}}</span>
                                    </td>
                                    
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{$student->absences}}</p>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{url('absences', ['student_id' => $student->id])}}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="View Absences">
                                            <i class="fas fa-eye text-secondary"></i> View Absences
                                        </a> 
                                    </td>
                                    <td class="text-center">
                                    @if(auth()->user()->account_type == "admin" || auth()->user()->account_type == "teacher")
                                        <a href="{{route('show-leave-absence', ['student_id' => $student->id])}}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Leave Absence">
                                            <i class="fas fa-user-edit text-secondary"></i> Leave absence
                                        </a> 
                                        @endif
                                    </td>
                                    <td class="text-center">
                                    @if(auth()->user()->account_type == "admin")
                                        <a href="{{ route('delete-student', $student->id) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Delete Student">
                                            <span style="color: red;"><span>
                                            <i class="cursor-pointer fas fa-trash text-secondary" style="color: red !important;"></i>
                                        </span>Delete Student
                                                
                                            </span>
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