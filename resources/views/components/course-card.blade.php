{{-- @props(['course' => $course]) --}}
<div>
  <div class="card">
    <img src="{{ $course->cover_img }}" class="card-img-top" alt="{{ $course->title }}">
    <div class="card-body">
      <h5 class="card-title">{{ $course->title }}</h5>
      <p class="card-text">{{ $course->desc }} </p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
</div>
