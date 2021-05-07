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
  <div class="modal fade" id="video-update-modal" tabindex="-1" role="dialog" aria-labelledby="video-update-modal-label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="video-update-modal-label">Edit Video Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="video-update-form" action="" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
              <label for="video-modal-title" class="col-form-label">Title:</label>
              <input type="text" class="form-control" id="video-modal-title" name="title">
            </div>
            <div class="form-group">
              <label for="video-modal-track" class="col-form-label">Track No.:</label>
              <input type="number" class="form-control" id="video-modal-track" name="track" min="1" max="100">
            </div>
            <div class="form-group">
              <label for="video-modal-summary" class="col-form-label">Summary:</label>
              <textarea class="form-control" id="video-modal-summary" name="summary"></textarea>
            </div>
            {{-- <div class="form-group">
              <label for="video-modal-thumbnail" class="col-form-label">Thumbnail:</label>
              <input type="file" class="form-control" id="video-modal-thumbnail">
            </div> --}}
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button form="video-update-form" type="submit" class="btn btn-primary" id="video-modal-save">Save</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="video-delete-modal" tabindex="-1" role="dialog" aria-labelledby="video-delete-modal-label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="video-delete-modal-label">Delete Video</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="video-delete-form" action="" method="post">
            @method('DELETE')
            @csrf
            <h5>This video will be deleted!</h5>
            <div id="video-delete-data" class="text-primary"></div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" form="video-delete-form" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content')
  <!-- Page Content -->
  <div class="container row justify-content-center mx-auto">
    <div class="row justify-content-between col-md-12 my-4 py-2">
      {{-- <div class="row justify-content-between px-4"> --}}
      <div class="px-1">
        <h2>{{ $course->title }} </h2>
        <input hidden id="course-id" value="{{ $course->id }}" />
        @if (!$course->is_published)
          <small>This course is saved as draft.</small>
        @endif
      </div>
      <div class="px-1">
        <button type="submit" form="course-form" id="save-draft" class="btn btn-outline-success mx-1">Save
          Draft</button>
        <button type="submit" id="publish" class="btn btn-success mx-1">Publish</button>
      </div>
      {{-- </div> --}}
    </div>
    <div class="row col-md-12 my-3 h-100">
      @include('layouts.sidebar')
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
                          @include('components.video-card')
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

  </script>
  <script type="text/javascript">
    $(function() {
      $('#video-update-modal').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)

        let id = button.data('id')
        $('#video-update-form').attr('action', `/videos/${id}`)

        let title = button.data('title')
        let track = button.data('track')
        let summary = button.data('summary')

        const videoModal = $(this)
        videoModal.find('#video-modal-title').val(title)
        videoModal.find('#video-modal-track').val(track)
        videoModal.find('#video-modal-summary').val(summary)
      })


      $('#video-delete-modal').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget)

        let id = button.data('id')
        $('#video-delete-form').attr('action', `/videos/${id}`)


        let title = button.data('delete')
        const deleteModal = $(this)
        deleteModal.find('#video-delete-data').text(title)
      })
    })

  </script>
  <script src="{{ asset('js/filepondUpload.js') }}"> </script>
@endsection
