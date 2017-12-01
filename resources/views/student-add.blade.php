@extends('layout')

@section('content')
<div class="row">
    <div class="col-xs-6 col-xs-offset-3">
        <form action="{{ route('student.add') }}" method="post">
            {{ csrf_field() }}
            <div class="panel panel-default">
                <div class="panel-heading"><h3>New Student <span class="pull-right"><a href="{{ URL::to(route('student.list')) }}" class="btn btn-default">Back</a></span></h3></div>
                <div class="panel-body">
                    
                    <div class="form-group @if($errors->has('firstname')) has-error @endif">
                        <label>First Name</label>
                        <input type="text" name="firstname" class="form-control" value="{{ old('firstname') }}">
                        @if($errors->has('firstname'))
                        <small class="text-block">{{ $errors->first('firstname') }}</small>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('midname')) has-error @endif">
                        <label>Middle Name</label>
                        <input type="text" name="midname" class="form-control" value="{{ old('midname') }}">
                        @if($errors->has('midname'))
                        <small class="text-block">{{ $errors->first('midname') }}</small>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('lastname')) has-error @endif">
                        <label>Last Name</label>
                        <input type="text" name="lastname" class="form-control" value="{{ old('lastname') }}">
                        @if($errors->has('lastname'))
                        <small class="text-block">{{ $errors->first('lastname') }}</small>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('year_level')) has-error @endif">
                        <label>Year Level</label>
                        <select class="form-control" name="year_level">
                            <option value="">Select Year Level</option>
                            <option value="1" @if(old('year_level') == '1') selected @endif>First Year</option>
                            <option value="2" @if(old('year_level') == '2') selected @endif>Second Year</option>
                            <option value="3" @if(old('year_level') == '3') selected @endif>Third Year</option>
                            <option value="4" @if(old('year_level') == '4') selected @endif>Fourth Year</option>
                        </select>
                        @if($errors->has('year_level'))
                        <small class="text-block">{{ $errors->first('year_level') }}</small>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('course_id')) has-error @endif">
                        <label>Course</label>
                        <select class="form-control" name="course_id">
                            <option value="">Select Course</option>
                            @foreach($courses as $course)
                            <option value="{{ $course->id }}" @if(old('course_id') == $course->id) selected @endif>{{ $course->title }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('course_id'))
                        <small class="text-block">{{ $errors->first('course_id') }}</small>
                        @endif
                    </div>
                    
                </div>
                <div class="panel-footer text-right">
                    <button type="submit" class="btn btn-warning">Add Student</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection