@extends('students.master')

@section('head')
<link rel="stylesheet" href="/css/students/assignment.css">
@stop

@section('content')
<div class="section-heading">
    <h1 id="heading">Assessment</h1>
    <hr/>
</div>

<div class="main-content">
    <div class="row">
        <div class="col-md-8">
            <?php $course = $assessment->course;?>
            <h2>{{$course->name}}</h2>
            <h4><em>{{$assessment->title}}</em></h4>
        </div>
        <div class="col-md-4">
            <h4><strong>Due Date:</strong> {{$assessment->end_date}}</h4>
            <h4><strong>Time:</strong> {{$assessment->end_date}} </h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h4><strong>Description:</strong></h4>
            <p>
                {{$assessment->description}}
            </p>
        </div>
        <div class="col-md-6">
            <div class="button">
                <div class="btn-group pull-right">
                    <a href="{{{ route('students/download',['filename'=>$assessment->filepath]) }}}" class="btn btn-primary">Download</a>
                    <a class="btn btn-info" href="{{{ route('students/uploadAssignment',['assessment_id'=>$assessment->id]) }}}">upload </a>
                    <button type="button" class="btn btn-success">Send</button>
                    <button type="button" class="btn btn-warning">Add to Queue</button>
                </div>
            </div>
        </div>
    </div>
    <hr/>
</div>

@stop