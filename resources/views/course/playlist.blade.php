<div class="card w-100 h-100">
  <div class="card-header text-center bg-secondary">
    <h4 class="text-primary mb-0">Playlist</h4>
  </div>
  {{-- <div class="bg-dark"> --}}
  <ul class="list-group list-group-flush overflow-auto" style="height:335px; ">
    @if ($videos->count())
      @foreach ($videos as $video_link)
        <li
          class="list-group-item list-group-item-light list-group-item-action {{ Request::get('track') == $video_link->track ? 'active' : '' }}  ">
          <a class="text-decoration-none stretched-link text-truncate" href="?track={{ $video_link->track }}">
            {{ $loop->index + 1 }} - {{ $video_link->title }}</a>
        </li>
      @endforeach
    @endif
    <li class="list-group-item list-group-item-light list-group-item-action">>sample1</li>
    <li class="list-group-item list-group-item-light list-group-item-action">>sample1</li>
    <li class="list-group-item list-group-item-light list-group-item-action">>sample1</li>
  </ul>
  {{-- </div> --}}
</div>
