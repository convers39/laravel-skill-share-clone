@extends('layouts.app')

@section('content')
  <!-- Page Content -->
  <div class="container">

    <!-- Heading Row -->
    <div class="row align-items-center my-4">
      <div class="col-lg-8">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/AbCTlemwZ1k"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
        </div>
        {{-- <img class="img-fluid rounded mb-4 mb-lg-0" src="http://placehold.it/900x400" alt=""> --}}
      </div>
      <!-- /.col-lg-8 -->
      <div class="col-lg-4">
        <h1 class="font-weight-light">Playlist</h1>
        <p>Placeholder for playlists.</p>
        <a class="btn btn-primary" href="#">Call to Action!</a>

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
              {{ $course->desc }}
            </div>
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam.
            Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure
            adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet
            duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit
            sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis
            occaecat ex.
          </div>
          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam.
            Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure
            adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet
            duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit
            sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis
            occaecat ex.
          </div>
          <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
            Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam.
            Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure
            adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet
            duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit
            sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis
            occaecat ex.
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
        <div class="row mb-3 justify-content-center bg-light">

          {{-- <h2>
            This area for teacher information
          </h2> --}}
          {{-- <div class="row profile">
            <div class="col-md-3"> --}}
          <div class="profile-sidebar">
            <!-- SIDEBAR USERPIC -->
            <div class="profile-userpic my-2">
              <img width="100" height="100" src="{{ url('/img/avatar.jpg') }}" class="img-responsive rounded-circle"
                alt="Avatar">
            </div>
            <!-- END SIDEBAR USERPIC -->
            <!-- SIDEBAR USER TITLE -->
            <div class="profile-usertitle">
              <div class="profile-usertitle-name">
                {{ $course->user->name }}
              </div>
              <div class="profile-usertitle-job">
                Developer
              </div>
            </div>
            <!-- END SIDEBAR USER TITLE -->
            <!-- SIDEBAR BUTTONS -->
            {{-- <div class="profile-userbuttons">
              <button type="button" class="btn btn-success btn-sm">Follow</button>
              <button type="button" class="btn btn-danger btn-sm">Message</button>
            </div> --}}
            <!-- END SIDEBAR BUTTONS -->
            <!-- SIDEBAR MENU -->
            {{-- <div class="profile-usermenu mb-2">
              <ul class="nav">
                <li class="active">
                  <a href="#">
                    <i class="glyphicon glyphicon-home"></i>
                    Overview </a>
                </li>
                <li>
                  <a href="#">
                    <i class="glyphicon glyphicon-user"></i>
                    Account Settings </a>
                </li>
                <li>
                  <a href="#" target="_blank">
                    <i class="glyphicon glyphicon-ok"></i>
                    Tasks </a>
                </li>
                <li>
                  <a href="#">
                    <i class="glyphicon glyphicon-flag"></i>
                    Help </a>
                </li>
              </ul>
            </div> --}}
            <div class="profile-content my-2">
              About the teacher
            </div>
            <!-- END MENU -->
          </div>
        </div>
      </div>
      {{-- </div>
      </div> --}}
    </div>
    {{-- <!-- Call to Action Well -->
    <div class="card text-white bg-secondary my-5 py-4 text-center">
      <div class="card-body">
        <p class="text-white m-0">This call to action card is a great place to showcase some important information or
          display a clever tagline!</p>
      </div>
    </div> --}}
    <!-- Content Row -->
    <h2 class='title'>Related Courses</h2>
    <div class="row my-4">
      @if ($relatedCourses->isNotEmpty())

        @foreach ($relatedCourses as $related)
          <div class="col-md-4 mb-5">
            <div class="card h-100">
              <div class="card-body">
                <h2 class="card-title">{{ $related->title }}</h2>
                <p class="card-text">{{ $related->desc }}</p>
              </div>
              <div class="card-footer">
                <a href="{{ route('course.show', ['course' => $related, 'slug' => $related->slug]) }}"
                  class="btn btn-primary btn-sm">More Info</a>
              </div>
            </div>
          </div>
        @endforeach
      @else
        <h2>No related courses found.</h2>
      @endif
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
@endsection
