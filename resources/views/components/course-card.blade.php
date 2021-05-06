{{-- @props(['course' => $course]) --}}
<div class="col-md-{{ $columns }} mb-5">
  <div class="card h-100">
    <img
      src="{{ Storage::exists($course->cover_img) ? asset('storage/' . $course->cover_img) : url($course->cover_img) }}"
      class="card-img-top" width="auto" height="250px" alt="{{ $course->title }}">
    <div class="card-body">
      <h5 class="card-title">{{ $course->title }}</h5>
      <div class="card-text text-truncate text-line-clamp-md mb-3">{!! $course->desc !!} </div>
      <a href="{{ route('course.show', ['course' => $course, 'slug' => $course->slug]) }}" class="btn btn-primary">
        View Detail</a>
    </div>
  </div>
</div>
