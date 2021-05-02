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
      <div class="mb-1 text-muted">{{ $video->title }}</div>
      <p class="card-text mb-auto">{{ $video->summary ?? 'This is a summary on the video.' }}</p>
    </div>
    <a href="#" class="mt-2 mr-2">
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
