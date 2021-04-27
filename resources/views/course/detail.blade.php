@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 mb-4">
        <div class="card">
          <div class="card-header">{{ __('Detail') }}</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            <h2>This is detail page for No.{{ $course->id }} {{ $course->title }}</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
