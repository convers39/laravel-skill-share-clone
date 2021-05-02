{{-- @props(['course' => $course]) --}}
<div>
  <div class="card">
    <img
      src="{{ Storage::exists($course->cover_img) ? asset('storage/' . $course->cover_img) : url($course->cover_img) }}"
      class="card-img-top" alt="{{ $course->title }}">
    <div class="card-body">
      <h5 class="card-title">{{ $course->title }}</h5>
      <p class="card-text">{{ $course->desc }} </p>
      <a href="{{ route('course.show', ['course' => $course, 'slug' => $course->slug]) }}" class="btn btn-primary">Go
        somewhere</a>
    </div>
  </div>
</div>
