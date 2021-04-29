@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 mb-4">
        <div class="card">
          <div class="card-header">{{ __('My Teaching Courses') }}</div>

          <div class="card-body">

          </div>
        </div>
      </div>

    </div>
    <div class="row justify-content-center">
      <div class="col-md-10 mb-4 card-columns">
        @forelse ($courses as $course)
          @include('components.course-card')
          {{-- TODO: figure out how to handle component without same name with model --}}
          {{-- <x-course-card :course="$course" /> --}}
        @empty
          <h3>You don't have any courses, click to create a new one</h3>
          <a href="{{ route('teaching.create') }}" class="btn btn-primary">New Course</a>
        @endforelse
      </div>
      <div>
        {{ $courses->links() }}
      </div>
    </div>
  </div>
@endsection
