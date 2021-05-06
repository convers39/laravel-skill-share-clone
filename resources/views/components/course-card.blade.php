{{-- @props(['course' => $course]) --}}
<div class="{{ $columns == 2 ? 'col-md-6' : 'col-md-4' }} mb-5">
  <div class="card h-100">
    <img
      src="{{ Storage::exists($course->cover_img) ? asset('storage/' . $course->cover_img) : url($course->cover_img) }}"
      class="card-img-top" width="auto" height="250px" alt="{{ $course->title }}">
    <div class="card-body">
      <h5 class="card-title">{{ $course->title }}</h5>
      <p class="card-text text-truncate text-line-clamp-md">{{ $course->desc }} </p>
      <a href="{{ route('course.show', ['course' => $course, 'slug' => $course->slug]) }}" class="btn btn-primary">
        Detail</a>
    </div>
  </div>
</div>
