<div class="embed-responsive embed-responsive-16by9">
  <video id="{{ $video->id }}" class="embed-responsive-item" controls preload="auto">
    <source src="{{ Storage::exists($video->url) ? asset('storage/' . $video->url) : url($video->url) }}"
      type="video/mp4">
  </video>
  {{-- <canvas id="canvas"></canvas>
      <img src="" alt="" id="thumbnail_img"> --}}
</div>
