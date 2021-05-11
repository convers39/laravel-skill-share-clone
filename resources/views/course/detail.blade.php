@extends('layouts.app')

@section('content')
  <!-- Page Content -->
  <div class="container">
    <!-- Video Row -->
    <div class="row my-4">
      <div class="col-lg-8 h-100">
        @if ($currentVideo)
          <x-video :video="$currentVideo" />
        @else
          <div class="embed-responsive embed-responsive-16by9">
            <video id="{{ __('sample-video') }}" poster="{{ asset('media/thumbnail/bunny.jpeg') }}"
              class="embed-responsive-item" controls preload="auto">
              <source src="{{ asset('media/video/test.mp4') }}" type="video/mp4">
            </video>
          </div>
        @endif
      </div>
      <!-- Playlist -->
      <div class="col-lg-4 pl-0">
        @include('course.playlist')
      </div>
      <!-- /.playlist -->
    </div>
    <!-- /.Video row -->

    {{-- tab area --}}
    <div class="row justfy-content-center my-4">
      <div class="col-lg-8">
        <nav>
          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab"
              aria-controls="nav-about" aria-selected="true">About</a>
            <a class="nav-item nav-link" id="nav-review-tab" data-toggle="tab" href="#nav-review" role="tab"
              aria-controls="nav-review" aria-selected="false">Review</a>
            <a class="nav-item nav-link" id="nav-discussion-tab" data-toggle="tab" href="#nav-discussion" role="tab"
              aria-controls="nav-discussion" aria-selected="false">Discussion</a>
            <a class="nav-item nav-link" id="nav-resources-tab" data-toggle="tab" href="#nav-resources" role="tab"
              aria-controls="nav-resources" aria-selected="false">Resources</a>
          </div>
        </nav>
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
            <div>
              {!! $course->desc !!}
            </div>
          </div>
          <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab">
            {{ __('Reviews') }}
          </div>
          <div class="tab-pane fade" id="nav-discussion" role="tabpanel" aria-labelledby="nav-discussion-tab">
            @include('course.discussion')
          </div>
          <div class="tab-pane fade" id="nav-resources" role="tabpanel" aria-labelledby="nav-about-tab">
            {{ __('Resources') }}
          </div>
        </div>
      </div>
      <div class="col-lg-4 pl-0 text-center">
        {{-- Bookmark course --}}
        <div class="row mb-3">
          <div class="col-md-6 p-2 ">
            @include('course.bookmark')
          </div>
          <div class="col-md-6 p-2">
            <button class="btn btn-link text-decoration-none">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share"
                viewBox="0 0 16 16">
                <path
                  d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z" />
              </svg>
              <span>Share</span>
            </button>
          </div>
        </div>
        <div class="row justify-content-center">
          @include('course.teacher-profile')
        </div>
      </div>
      {{-- </div>
      </div> --}}
    </div>
    <!-- Content Row -->
    <br>
    <hr>
    @include('course.related-course')
    <!-- /.row -->

  </div>
  <!-- /.container -->
@endsection

@section('scripts')

@endsection
