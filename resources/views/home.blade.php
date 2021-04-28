@extends('layouts.app')

@section('content')
  <div class="container">
    @include('layouts.carousel')
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
          @include('components.course-card')
          {{-- TODO: figure out how to handle component without same name with model --}}
          {{-- <x-course-card :course="$course" /> --}}
        @endforeach
      </div>
    </div>
  </div>
@endsection
