{{-- course card used in teaching index view --}}

<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-200 position-relative">
  <div class="col-auto d-none d-lg-block">
    <img class="img-responsive " width="300" height="200px"
      src="{{ Storage::exists($course->cover_img) ? asset('storage/' . $course->cover_img) : url($course->cover_img) }}"
      alt alt="{{ $course->title }}">
  </div>
  <div class="col p-4 d-flex flex-column position-static justify-content-between">
    {{-- <strong class="d-inline-block mb-2 text-primary">{{ $course->title }}</strong> --}}
    <div class="mb-1">
      <h4 class="text-primary text-truncate"><a
          href="{{ route('course.show', ['course' => $course]) }}">{{ $course->title }}</a></h4>
      <h6 class="text-muted">Teached by {{ $course->user->name }} </h6>

    </div>
    {{-- <div class="card-text mb-auto text-truncate text-line-clamp-sm">{!! $course->desc !!}</div> --}}

    <div class="d-flex justify-content-between align-items-center ">
      <p>Category:<a class="text-decoration-none" href="{{ route('course', ['category' => $course->category]) }}">
          {{ $course->category->name }}</a></p>
      <p>{{ $course->bookmarks->count() }} {{ Str::plural('student', $course->bookmarks->count()) }}</p>
      <p><small class="mb-1 text-muted">Latest updated on {{ $course->updated_at->format('Y/m/d') }}</small></p>
    </div>
  </div>
  <div class="btn-group align-items-start py-4 px-3">
    <a href="#" class="btn btn-sm btn-outline-secondary text-primary">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list"
        viewBox="0 0 16 16">
        <path
          d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
        <path
          d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
      </svg>
    </a>
    <a href="{{ route('bookmark.toggle', ['course' => $course]) }}"
      class="btn btn-sm btn-outline-secondary text-danger">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash"
        viewBox="0 0 16 16">
        <path
          d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
        <path fill-rule="evenodd"
          d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
      </svg>
    </a>
  </div>

</div>
