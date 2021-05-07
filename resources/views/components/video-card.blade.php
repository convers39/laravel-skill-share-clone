<li>
  {{-- <div class="card mb-3">
    <div class="row g-0">
      <div class="col-md-4">
        <div class="embed-responsive embed-responsive-16by9">
          <video id="{{ 'video' . $video->id }}" class="embed-responsive-item" controls preload="auto"
            poster="{{ asset('media/thumbnail/bunny.jpeg') }}">
            <source src="{{ Storage::exists($video->url) ? asset('storage/' . $video->url) : url($video->url) }}"
              type="video/mp4">
          </video>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <div class="card-title mb-1 text-muted">{{ $video->title }}</div>
          <p class="card-text mb-auto">{{ $video->summary ?? 'This is a summary on the video.' }}</p>
        </div>
           <a href="#" class="stretched-link mt-2 mr-2">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash"
        viewBox="0 0 16 16">
        <path
          d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
        <path fill-rule="evenodd"
          d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
      </svg>
    </a
      </div>
    </div>
  </div> --}}
  <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-3 shadow-sm h-md-250 position-relative">
    <div class="col-auto d-lg-block">
      <div class="embed-responsive embed-responsive-16by9">
        <video id="{{ 'video' . $video->id }}" class="embed-responsive-item" controls preload="auto"
          poster="{{ asset('media/thumbnail/bunny.jpeg') }}">
          <source src="{{ Storage::exists($video->url) ? asset('storage/' . $video->url) : url($video->url) }}"
            type="video/mp4">
        </video>
      </div>
    </div>
    <div class="col px-3 py-2 d-flex flex-column position-static">
      <div class="mb-1 text-primary">{{ $video->title }}</div>
      <p class="card-text mb-auto text-muted">{{ $video->summary ?? 'This is a summary on the video.' }}</p>
    </div>
    <a href="#" class="mt-2 mr-2" data-toggle="modal" data-target="#video-update-modal" data-id="{{ $video->id }}"
      data-title="{{ $video->title }}" data-track="{{ $video->track }}" data-summary="{{ $video->summary }}"
      data-thumbnail="{{ $video->thumbnail }}">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen"
        viewBox="0 0 16 16">
        <path
          d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
      </svg>
    </a>
    <a href="#" class="mt-2 mr-2" data-toggle="modal" data-target="#video-delete-modal" data-id="{{ $video->id }}"
      data-delete=" {{ $video->title }}">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash"
        viewBox="0 0 16 16">
        <path
          d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
        <path fill-rule="evenodd"
          d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
      </svg>
    </a>
  </div>
</li>
