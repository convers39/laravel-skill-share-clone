@extends('layouts.app')

@section('content')
  <div class="container">
    <br>
    <h2>My Saved Courses <small>({{ auth()->user()->bookmarks->count() }})</small> </h2>
    <br>
    <div class="row justify-content-center">
      <div class="col-md-12">
        <nav class="">
          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-all-tab" data-toggle="tab" href="#nav-all" role="tab"
              aria-controls="nav-all" aria-selected="true"><strong class="text-primary">All Courses</strong></a>
            <a class="nav-item nav-link" id="nav-lists-tab" data-toggle="tab" href="#nav-lists" role="tab"
              aria-controls="nav-lists" aria-selected="false"><strong class="text-primary">My Lists</strong></a>
            <a class="nav-item nav-link" id="nav-history-tab" data-toggle="tab" href="#nav-history" role="tab"
              aria-controls="nav-history" aria-selected="false"><strong class="text-primary">Watch History</strong></a>
          </div>
        </nav>
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-home-tab">
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
          </div>
          <div class="tab-pane fade" id="nav-lists" role="tabpanel" aria-labelledby="nav-profile-tab">
            {{ __('Lists') }}
          </div>
          <div class="tab-pane fade" id="nav-history" role="tabpanel" aria-labelledby="nav-contact-tab">
            {{ __('history') }}
          </div>
        </div>
      </div>
    </div>


    <div class="d-flex justify-content-center">
      {{-- {!! $courses->links() !!} --}}
    </div>
  </div>
@endsection
