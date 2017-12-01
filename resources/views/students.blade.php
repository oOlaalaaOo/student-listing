@extends('layout')

@section('content')
<div class="row">
    <div class="col-xs-8 col-xs-offset-2">
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Student Listing <span class="pull-right"><a href="{{ URL::to(route('student.add.view')) }}" class="btn btn-warning">New Student</a></span></h3>
                
            </div>
            <div class="panel-body">
                <br />
                <table class="table table-striped table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student Name</th>
                            <th>Year Level</th>
                            <th>Course</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($students) > 0)
                        @foreach($students as $student)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $student->firstname . ' ' . $student->midname . ' ' . $student->lastname }}</td>
                            <td>{{ $student->year_level }}</td>
                            <td>{{ $student->course->title }}</td>
                            <td>
                                <a href="{{ route('student.update') . '/' . $student->id }}" class="btn btn-link btn-sm">Update</a> | <button type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#delete_student{{ $student->id }}">Delete</button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="delete_student{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Action: Delete</h4>
                                      </div>
                                      
                                      <div class="modal-body">
                                        Do you sure?
                                      </div>
                                      <div class="modal-footer">
                                        <form action="{{ route('student.delete') }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="student_id" value="{{ $student->id }}" />
                                        <button type="submit" class="btn btn-danger">Confirm Delete</button>
                                        </form>
                                      </div>
                                      
                                    </div>
                                  </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td class="text-center" colspan="5">No Result</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection