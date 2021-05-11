<h3 class='title'>Related Courses</h3>
<div class="row my-4">
  @if ($relatedCourses->isNotEmpty())
    @foreach ($relatedCourses as $related)
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <img
            src="{{ Storage::exists($related->cover_img) ? asset('storage/' . $related->cover_img) : url($related->cover_img) }}"
            class="card-img-top" width="auto" height="250px" alt="{{ $related->title }}">
          <div class="card-body">
            <h2 class="card-title">{{ $related->title }}</h2>
            <div class="card-text text-truncate text-line-clamp-md">{!! $related->desc !!}</div>
          </div>
          <div class="card-footer">
            <a href="{{ route('course.show', ['course' => $related]) }}" class="btn btn-primary btn-sm">More
              Info</a>
          </div>
        </div>
      </div>
    @endforeach
  @else
    <h2>No related courses found.</h2>
  @endif
</div>
