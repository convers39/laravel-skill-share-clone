{{-- course card used in teaching index view --}}

<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-200 position-relative">
  <div class="col-auto d-none d-lg-block">
    <img class="img-responsive " width="300" height="200px"
      src="{{ Storage::exists($course->cover_img) ? asset('storage/' . $course->cover_img) : url($course->cover_img) }}"
      alt alt="{{ $course->title }}">
  </div>
  <div class="col p-4 d-flex flex-column position-static">
    {{-- <strong class="d-inline-block mb-2 text-primary">{{ $course->title }}</strong> --}}
    <h4 class="d-flex justify-content-between align-items-center mb-1">
      <span class="text-primary text-truncate">{{ $course->title }}</span>
      @if ($course->published)
        <span class="badge badge-success">
          <h6 class="mb-0">Published</h6>
        </span>
      @else
        <span class="badge badge-warning">
          <h6 class="mb-0">Draft</h6>
        </span>
      @endif
    </h4>
    <small class="mb-1 text-muted">Updated at {{ $course->updated_at }}</small>
    <div class="card-text mb-auto text-truncate text-line-clamp-sm">{!! $course->desc !!}</div>
    {{-- <a href="#" class="stretched-link">Continue reading</a> --}}
  </div>
  <div class="btn-group align-items-start py-4 px-3">
    <a href="{{ route('teaching.edit', ['course' => $course]) }}"
      class="btn btn-sm btn-outline-secondary text-primary">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square"
        viewBox="0 0 16 16">
        <path
          d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
        <path fill-rule="evenodd"
          d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
      </svg>
    </a>
    <a href="{{ route('teaching.destroy', ['course' => $course]) }}"
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
