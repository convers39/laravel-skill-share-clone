@extends('layouts.app')

@section('content')
  <!-- Page Content -->
  <div class="container">
    <!-- Heading Row -->
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
      <!-- /.col-lg-8 -->
      <div class="col-lg-4 px-0">
        <div class="card w-100 h-100">
          <div class="card-header text-center bg-secondary">
            <h4 class="text-primary mb-0">Playlist</h4>
          </div>
          {{-- <div class="bg-dark"> --}}
          <ul class="list-group list-group-flush overflow-auto" style="height:335px; ">
            @if ($videos->count())
              @foreach ($videos as $video_link)
                <li
                  class="list-group-item list-group-item-light list-group-item-action {{ Request::get('track') == $video_link->id ? 'active' : '' }}  ">
                  <a class="text-decoration-none stretched-link text-truncate" href="?track={{ $video_link->id }}">
                    #{{ $loop->index + 1 }} - {{ $video_link->title }}</a>
                </li>
              @endforeach
            @endif
          </ul>
          {{-- </div> --}}
        </div>

      </div>
      <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->

    {{-- tab area --}}
    <div class="row my-4">
      <div class="col-lg-8 ">
        <nav>
          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
              aria-controls="nav-home" aria-selected="true">About</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
              aria-controls="nav-profile" aria-selected="false">Review</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
              aria-controls="nav-contact" aria-selected="false">Discussion</a>
            <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab"
              aria-controls="nav-about" aria-selected="false">Resources</a>
          </div>
        </nav>
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div>
              {!! $course->desc !!}
            </div>
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            {{ __('Reviews') }}
          </div>
          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            {{ __('Discussion') }}
          </div>
          <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
            {{ __('Resources') }}
          </div>
        </div>

      </div>
      <div class="col-lg-4 text-center">
        <div class="row mb-3">
          <div class="col-md-6 p-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark"
              viewBox="0 0 16 16">
              <path
                d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
            </svg>
            <span>Save</span>
          </div>
          <div class="col-md-6 p-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share"
              viewBox="0 0 16 16">
              <path
                d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z" />
            </svg>
            <span>Share</span>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="card w-100 px-3 shadow-sm border-light">
            <div class="pt-3 text-center">
              <img width="100" height="100" src="{{ asset('media/img/avatar.jpg') }}"
                class="img-responsive rounded-circle" alt="Avatar">
            </div>
            <div class="card-body text-center">
              <p class="card-text">{{ $course->user->name }}</p>
              <p class="card-text">About the teacher</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group col d-flex justify-content-center">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Profile</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Follow</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- </div>
      </div> --}}
    </div>
    <!-- Content Row -->
    <br>
    <hr>
    <h3 class='title'>Related Courses</h3>
    <div class="row my-4">

      <h2>No related courses found.</h2>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
@endsection

@section('scripts')

@endsection
