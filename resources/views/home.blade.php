@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 mb-4">
        <div class="card">
          <div class="card-header">{{ __('Home') }}</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            @auth
              {{ __('You are logged in!') }}
            @endauth
            @guest
              {{ __('You are logged out!') }}
            @endguest
          </div>
        </div>
      </div>

    </div>
    <div class="row justify-content-center">
      <div class="col-md-10 mb-4 card-columns">
        @foreach ($courses as $course)
          <div class="card">
            <img src="{{ $course->cover_img }}" class="card-img-top" alt="{{ $course->title }}">
            <div class="card-body">
              <h5 class="card-title">{{ $course->title }}</h5>
              <p class="card-text">{{ $course->desc }} </p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
