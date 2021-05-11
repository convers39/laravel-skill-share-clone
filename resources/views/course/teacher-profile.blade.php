<div class="card px-3 shadow-sm border-light">
  <div class="pt-3 text-center">
    <img width="100" height="100" src="{{ asset('media/img/avatar.jpg') }}" class="img-responsive rounded-circle"
      alt="Avatar">
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
