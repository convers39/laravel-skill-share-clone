@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      @include('course.category')
      <div class="col col-md-9">
        <br>
        <h2>Courses</h2>
        <hr>
        <div class="row justify-content-center mb-4 ">
          @foreach ($courses as $course)
            <x-course-card :course="$course" :columns="4" />
          @endforeach
        </div>
        <div class="d-flex justify-content-center">
          {!! $courses->links() !!}
        </div>
      </div>
    </div>

  </div>
@endsection
