@extends('layouts.app')
<!-- Styles -->
<link href="{{ asset('css/ckeditor.css') }}" rel="stylesheet">
@section('content')

  <!-- Page Content -->
  <div class="container row justify-content-center">
    <div class="col-md-12 my-4 py-2">
      <div class="row justify-content-between px-4">
        <div class="px-2">
          <h2>{{ $course->title }}</h2>
          @if (!$course->is_published)
            <small>This course is saved as draft.</small>
          @endif
        </div>
        <div class="px-4">
          <button type="submit" class="btn btn-outline-success mx-1">Save Draft</button>
          <button type="submit" class="btn btn-success mx-1">Publish</button>
        </div>
      </div>
    </div>
    <div class="row col-md-12 my-3">
      @include('layouts.sidebar')
      <div class="col-md-8 col-lg-9 tab-content flex-fill h-100" id="course-tab-content">
        {{-- TODO: make a component for video upload fieldset --}}
        <div class="px-3 tab-pane fade show active" id="video-lesson" role="tabpanel" aria-labelledby="video-lesson-tab">
          <h3 class="text-primary mb-2 ml-2">Video Lessons</h3>
          <hr>
          <div class="jumbotron mb-0">
            <div>
              <h5>Videos Uploaded</h5>
              <fieldset class="my-3 h-50 border border-secondary rounded shadow-sm p-2">
                <ul class="list-unstyled">
                  @for ($i = 0; $i < 2; $i++)

                    @include('components.video-card')
                  @endfor
                </ul>
              </fieldset>
            </div>
            <hr>
            <div>
              <h5>New Video</h5>
              <form class="px-3 row justify-content-between align-items-center" action="">
                <div class="form-group">
                  <label for="video-upload">
                  </label>
                  <input type="file" class="form-control-file" id="video-upload" aria-describedby="fileHelp">
                  <small id="fileHelp" class="form-text text-muted">Upload a video file.</small>
                </div>
                <div>
                  <button type="submit" class="btn btn-primary">Upload</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="px-3 tab-pane fade" id="course-info" role="tabpanel" aria-labelledby="course-info-tab">
          <h3 class="text-primary mb-2 ml-2">Course Overview</h3>
          <hr>
          <div class="jumbotron mb-0">
            <form method="post" action="" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="course-title">
                  <h5>Course Title </h5>
                </label>
                <input type="text" class="form-control" id="course-title" value="{{ $course->title }}">
              </div>
              <div class="form-group">
                <label for="course-description">
                  <h5>Course Description</h5>
                </label>
                <div id="course-description">{{ $course->desc }}</div>
                {{-- <textarea class="ckeditor form-control" name="ckeditor"></textarea> --}}
              </div>
              <div class="form-group">
                <label for="course-cover">
                  <h5>Cover Image</h5>
                </label>
                <input type="file" class="form-control-file" id="course-cover" aria-describedby="fileHelp">
                <small id="fileHelp" class="form-text text-muted">This image will be dispalyed as your course
                  poster.</small>

              </div>
              {{-- <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div> --}}
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- /.container -->


  {{-- @section('script') --}}
  <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
  {{-- <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script> --}}
  <script type="text/javascript">
    ClassicEditor
      .create(document.querySelector('#course-description'))
      .catch(error => {
        console.error(error);
      });

  </script>
  {{-- @endsection --}}

@endsection
