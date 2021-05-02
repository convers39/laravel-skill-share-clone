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

@section('content')

  <!-- Page Content -->
  <div class="container row justify-content-center">
    <div class="col-md-12 my-4 py-2">
      <div class="row justify-content-between px-4">
        <div class="px-2">
          <h2>{{ $course->title }} </h2>
          <input hidden id="course-id" value="{{ $course->id }}" />
          @if (!$course->is_published)
            <small>This course is saved as draft.</small>
          @endif
        </div>
        <div class="px-4">
          <button type="submit" form="course-form" id="save-draft" class="btn btn-outline-success mx-1">Save
            Draft</button>
          <button type="submit" id="publish" class="btn btn-success mx-1">Publish</button>
        </div>
      </div>
    </div>
    <div class="row col-md-12 my-3 h-100">
      @include('layouts.sidebar')
      <div class="col-md-8 col-lg-9">
        <form method="post" id="course-form" action="/teaching/{{ $course->id }}" enctype="multipart/form-data">
          <div class="tab-content flex-fill " id="course-tab-content">
            {{-- TODO: make a component for video upload fieldset --}}
            @method('PUT')
            @csrf
            <div class="px-3 tab-pane fade show active" id="video-lesson" role="tabpanel"
              aria-labelledby="video-lesson-tab">
              <h3 class="text-primary mb-2 ml-2">Video Lessons</h3>
              <hr>
              <div class="jumbotron mb-0">
                <div class="">
                  <h5>Videos Uploaded</h5>
                  <div class="my-3 h-50 overflow-auto border border-secondary rounded shadow-sm p-2">
                    <ul class="list-unstyled ">
                      @for ($i = 0; $i < 2; $i++)
                        @include('components.video-card')
                      @endfor
                    </ul>
                  </div>
                </div>
                <hr>
                <div class="my-2">
                  <label for="video-upload">
                    <h5>New Video</h5>
                  </label>
                  <input type="file" class="filepond" id="video-upload" name="videoFile" multiple>
                </div>
                {{-- <form class="px-3 row justify-content-between align-items-center" action="">
                <div class="form-group">
                  <input type="file" class="form-control-file" id="video-upload" aria-describedby="fileHelp">
                  <small class="form-text text-muted">Upload a video file.</small>
                </div>
                <div>
                  <button type="submit" class="btn btn-primary">Upload</button>
                </div>
              </form> --}}
              </div>
            </div>
            <div class="px-3 tab-pane fade" id="course-info" role="tabpanel" aria-labelledby="course-info-tab">
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
                  {{-- <small class="form-text text-muted">This image will be dispalyed as your course
                  poster.</small> --}}
                </div>

              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- /.container -->
@endsection
@section('scripts')
  <script type="text/javascript">
    ClassicEditor
      .create(document.querySelector('#course-description'))
      .catch(error => {
        console.error(error);
      });

  </script>
  <script src="{{ asset('js/filepondUpload.js') }}"> </script>
@endsection
