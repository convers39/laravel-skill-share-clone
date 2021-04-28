@extends('layouts.app')

@section('content')

  <!-- Page Content -->
  <div class="container row mx-auto justify-content-center">

    <div class="row justify-content-between col-md-12 mt-3 mb-5 py-2">
      <div class="px-4">

        <h2>Course name</h2>
      </div>
      <div class="px-4">
        <button type="submit" class="btn btn-outline-success mx-1">Save Draft</button>
        <button type="submit" class="btn btn-success mx-1">Publish</button>
      </div>


    </div>
    <div class="row col-md-12 my-3">
      @include('layouts.sidebar')
      <div class="col-md-8 col-lg-9">
        {{-- TODO: make a component for video upload fieldset --}}
        <div class="p-3">
          <h2>this is field for upload video</h2>
          <fieldset class="my-3">
            <ul>
              <li>Video 1</li>
              <li>Video 2</li>
              <li>Video 3</li>
            </ul>
          </fieldset>
          <form class="px-4 row justify-content-between align-items-center" action="">
            <div class="form-group">
              <label for="exampleInputFile">New Video</label>
              <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
              <small id="fileHelp" class="form-text text-muted">Upload a video file.</small>
            </div>
            <div>
              <button type="submit" class="btn btn-primary">Upload</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container -->
@endsection
