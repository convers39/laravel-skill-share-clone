@extends('layouts.app')

@push('stylesheets')
  <link href="{{ asset('ckeditor/ckeditor.css') }}" rel="stylesheet">
  <link href="{{ asset('filepond/filepond.css') }}" rel="stylesheet">
  <link href="{{ asset('filepond/filepond-media-preview.css') }}" rel="stylesheet">
  <link href="{{ asset('filepond/filepond-image-preview.css') }}" rel="stylesheet">
  {{-- <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" /> --}}
  {{-- <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"> --}}

@endpush

@push('scripts')
  <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset('filepond/filepond.js') }}"></script>
  <script src="{{ asset('filepond/filepond-media-preview.js') }}"></script>
  <script src="{{ asset('filepond/filepond-image-preview.js') }}"></script>
  <script src="{{ asset('filepond/filepond-file-validate-type.js') }}"></script>
  {{-- <script src="https://unpkg.com/filepond/dist/filepond.js"></script> --}}
  {{-- <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script> --}}
  {{-- <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script> --}}
  {{-- <script
    src="https://cdn.jsdelivr.net/npm/filepond-plugin-media-preview@1.0.7/dist/filepond-plugin-media-preview.min.js">
  </script> --}}
@endpush

@section('modal')
  @include('teaching.video-modal')
@endsection

@section('content')
  <!-- Page Content -->
  <div class="container row justify-content-center mx-auto">
    <div class="row justify-content-between col-md-12 my-4 py-2">
      {{-- <div class="row justify-content-between px-4"> --}}
      <div class="px-1">
        <h2>{{ $course->title }} </h2>
        <input hidden id="course-id" value="{{ $course->id }}" />
        @if (!$course->published)
          <small>This course is saved as <span class="badge badge-pill badge-warning">Draft</span>:<a
              href="{{ route('teaching.show', ['course' => $course]) }}">Preview</a>
          </small>
        @else
          <small>This course is <span class="badge badge-pill badge-success">Published</span>: <a
              href="{{ route('course.show', ['course' => $course, 'slug' => $course->slug]) }}">Check</a></small>
        @endif
      </div>
      <div class="px-1">
        <button type="submit" form="course-form" id="save-draft" class="btn btn-outline-success mx-1">Save
          Change</button>
        @if ($course->published)
          <span class="d-inline-block" data-toggle="tooltip" data-placement="bottom" tabindex="0"
            title="Set course to private">
            <a id="publish" data-toggle="modal" data-target="#publish-modal" data-text="private"
              data-id="{{ $course->id }}" class="btn btn-warning text-white mx-1">Unpublish</a>
          </span>
        @else
          <span class="d-inline-block" data-toggle="tooltip" data-placement="bottom" tabindex="0"
            title="Require at least 1 video">
            <a id="publish" data-toggle="modal" data-target="#publish-modal" data-text="published"
              data-id="{{ $course->id }}"
              class="btn btn-success text-white mx-1 {{ $videos->count() ? '' : 'disabled' }}">Publish</a>
          </span>
        @endif
      </div>
      {{-- </div> --}}
    </div>
    <div class="row col-md-12 my-3 h-100">
      @include('teaching.sidebar')
      <div class="col-md-8 col-lg-9 pr-0">
        <form method="post" id="course-form" action="/teaching/{{ $course->id }}" enctype="multipart/form-data">
          <div class="tab-content flex-fill " id="course-tab-content">
            {{-- TODO: make a component for video upload fieldset --}}
            @method('PUT')
            @csrf
            <div class="pl-3 tab-pane fade show active" id="video-lesson" role="tabpanel"
              aria-labelledby="video-lesson-tab">
              <h3 class="text-primary mb-2 ml-2">Video Lessons</h3>
              <hr>
              <div class="jumbotron mb-0">
                <div class="">
                  <h5>Videos Uploaded ( <small>{{ $videos->count() }}
                      {{ Str::plural('video', $videos->count()) }}</small> )</h5>
                  <div class="my-3 h-50 overflow-auto border border-secondary rounded shadow-sm p-2">
                    <ul class="list-unstyled ">
                      @if ($videos->count())
                        @foreach ($videos as $video)
                          <x-video-card :video="$video" />
                        @endforeach
                      @endif
                    </ul>
                  </div>
                </div>
                <hr>
                <div class="my-2">
                  <label for="video-upload">
                    <h5>New Video</h5>
                  </label>
                  <input type="file" class="filepond" id="video-upload" name="videoFile" multiple>
                  <input type="text" hidden id="video-file-list" name="videoFileList">
                </div>
              </div>
            </div>
            <div class="pl-3 tab-pane fade" id="course-info" role="tabpanel" aria-labelledby="course-info-tab">
              <h3 class="text-primary mb-2 ml-2">Course Overview</h3>
              <hr>
              <div class="jumbotron mb-0">

                <div class="form-group">
                  <label for="course-title">
                    <h5>Course Title </h5>
                  </label>
                  <input type="text" class="form-control" id="course-title" name="title" value="{{ $course->title }}">
                </div>
                <div class="form-group">
                  <label for="course-description">
                    <h5>Course Description</h5>
                  </label>
                  <textarea id="course-description" name="desc">{{ $course->desc }}</textarea>
                  {{-- <textarea class="ckeditor form-control" name="ckeditor"></textarea> --}}
                </div>
                <div class="form-group">
                  <label for="cover-upload">
                    <h5>Cover Image</h5>
                  </label>
                  <input type="file" class="filepond" id="cover-upload" name="coverFile">
                </div>

              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    ClassicEditor
      .create(document.querySelector('#course-description'))
      .catch(error => {
        console.error(error);
      });
    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    })

  </script>
  <script src="{{ asset('js/videoModal.js') }}"></script>
  <script src="{{ asset('js/filepondUpload.js') }}"> </script>
@endsection
