@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">

    </div>
    <br>
    <h2>My Teaching Courses</h2>
    <hr>
    <div class="row justify-content-center">
      <div class="col-md-12 mb-4">
        @forelse ($courses as $course)
          @include('components.course-card-teaching')
          {{-- TODO: figure out how to handle component without same name with model --}}
          {{-- <x-course-card :course="$course" /> --}}
        @empty
          <h3>You don't have any courses, click to create a new one</h3>
          <a href="{{ route('teaching.create') }}" class="btn btn-primary">New Course</a>
        @endforelse
      </div>
    </div>
    <div class="d-flex justify-content-center">
      {!! $courses->links() !!}
    </div>
  </div>
@endsection
