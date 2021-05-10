@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">

    </div>
    <br>
    <h2>My Saved Courses</h2>
    <hr>
    <div class="row justify-content-center">
      <div class="col-md-12 mb-4">
        @forelse ($courses as $course)
          @include('course-saved.course-card')
        @empty
          <h3>You don't have any courses, browse the courses</h3>
          <a href="{{ route('course') }}" class="btn btn-primary">All Courses</a>
        @endforelse
      </div>
    </div>
    <div class="d-flex justify-content-center">
      {{-- {!! $courses->links() !!} --}}
    </div>
  </div>
@endsection
