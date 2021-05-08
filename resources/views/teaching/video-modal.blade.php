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
<div class="modal fade" id="publish-modal" tabindex="-1" role="dialog" aria-labelledby="publish-modal-label"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="publish-modal-label">Publish Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="publish-form" action="" method="post">
          @method('PATCH')
          @csrf
          <h5>This course will be <span id="publish-form-text"></span></h5>
          <div id="video-delete-data" class="text-primary"></div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" form="publish-form" class="btn btn-success">Continue</button>
      </div>
    </div>
  </div>
</div>
