@extends('layouts.app')

@section('content')
  <div class="container">
    @include('layouts.carousel')
    <div class="row justify-content-center">
    </div>
    <br>
    <h2>Featured Courses</h2>
    <hr>
    <div class="row justify-content-center mb-4 ">
      @foreach ($courses as $course)
        <x-course-card :course="$course" :columns="4" />
      @endforeach
    </div>
  </div>
@endsection
