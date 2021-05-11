<div class="row">
  <div class="comments col-md-12" id="comments">
    {{-- New Comment Form --}}
    <div class="d-flex flex-row add-comment-section mt-4 mb-4">
      <div class="col-12">
        <div class="d-flex flex-row align-items-start">
          <img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
          <form id="new-comment-form" class="w-100" method="post"
            action="{{ route('comment.store', ['course' => $course]) }}">
            @csrf
            <textarea rows="3" name="content" class="form-control ml-1 shadow-none textarea h-100"
              placeholder="Add comments..."></textarea>
          </form>
        </div>
        <div class="mt-2 text-right">
          <button form="new-comment-form" class="btn btn-primary btn-sm shadow-none" type="submit">Post</button>
          <button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button">Cancel</button>
        </div>
      </div>
    </div>
    {{-- /New Comment Form --}}
    <hr>

    {{-- Comment List --}}
    <div class="row pt-2">
      <div class="col-12">
        <h3 class="mb-4 font-weight-light">Comments</h3>
      </div>
    </div>
    @if ($course->comments->count())
      @include('course.comment', ['comments'=>$course->comments])
    @else
      <h3>No comments on this course.</h3>
    @endif
    {{-- /Comment List --}}
  </div>

  {{-- example --}}
  <!-- comment -->
  {{-- <div class="comment mb-2 row">
    <div class="comment-avatar col-md-1 col-sm-2 text-center pr-1">
      <a href="">
        <img class="mx-auto rounded-circle img-fluid" src="http://demos.themes.guide/bodeo/assets/images/users/m103.jpg"
          alt="avatar">
      </a>
    </div>
    <div class="comment-content col-md-11 col-sm-10">
      <h6 class="small comment-meta"><a href="#">admin</a> Today, 2:38</h6>
      <div class="comment-body">
        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod <a href>http://wwwwww.com</a>
          tempoua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
          <br>
          <a href="" class="text-right small"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
              fill="currentColor" class="bi bi-reply" viewBox="0 0 16 16">
              <path
                d="M6.598 5.013a.144.144 0 0 1 .202.134V6.3a.5.5 0 0 0 .5.5c.667 0 2.013.005 3.3.822.984.624 1.99 1.76 2.595 3.876-1.02-.983-2.185-1.516-3.205-1.799a8.74 8.74 0 0 0-1.921-.306 7.404 7.404 0 0 0-.798.008h-.013l-.005.001h-.001L7.3 9.9l-.05-.498a.5.5 0 0 0-.45.498v1.153c0 .108-.11.176-.202.134L2.614 8.254a.503.503 0 0 0-.042-.028.147.147 0 0 1 0-.252.499.499 0 0 0 .042-.028l3.984-2.933zM7.8 10.386c.068 0 .143.003.223.006.434.02 1.034.086 1.7.271 1.326.368 2.896 1.202 3.94 3.08a.5.5 0 0 0 .933-.305c-.464-3.71-1.886-5.662-3.46-6.66-1.245-.79-2.527-.942-3.336-.971v-.66a1.144 1.144 0 0 0-1.767-.96l-3.994 2.94a1.147 1.147 0 0 0 0 1.946l3.994 2.94a1.144 1.144 0 0 0 1.767-.96v-.667z" />
            </svg> <span>Reply</span></a>
        </p>
      </div>
    </div>
    <!-- reply is indented -->
    <div class="comment-reply col-md-11 offset-md-1 col-sm-10 offset-sm-2">
      <div class="row">
        <div class="comment-avatar col-md-1 col-sm-2 text-center pr-1">
          <a href=""><img class="mx-auto rounded-circle img-fluid"
              src="http://demos.themes.guide/bodeo/assets/images/users/m101.jpg" alt="avatar"></a>
        </div>
        <div class="comment-content col-md-11 col-sm-10 col-12">
          <h6 class="small comment-meta"><a href="#">phildownney</a> Today, 12:31</h6>
          <div class="comment-body">
            <p>Really?? Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
              aliqua. Ut enim ad minim veniam, quis nostrud exercitat. <br>
              <a href="" class="text-right small"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                  fill="currentColor" class="bi bi-reply" viewBox="0 0 16 16">
                  <path
                    d="M6.598 5.013a.144.144 0 0 1 .202.134V6.3a.5.5 0 0 0 .5.5c.667 0 2.013.005 3.3.822.984.624 1.99 1.76 2.595 3.876-1.02-.983-2.185-1.516-3.205-1.799a8.74 8.74 0 0 0-1.921-.306 7.404 7.404 0 0 0-.798.008h-.013l-.005.001h-.001L7.3 9.9l-.05-.498a.5.5 0 0 0-.45.498v1.153c0 .108-.11.176-.202.134L2.614 8.254a.503.503 0 0 0-.042-.028.147.147 0 0 1 0-.252.499.499 0 0 0 .042-.028l3.984-2.933zM7.8 10.386c.068 0 .143.003.223.006.434.02 1.034.086 1.7.271 1.326.368 2.896 1.202 3.94 3.08a.5.5 0 0 0 .933-.305c-.464-3.71-1.886-5.662-3.46-6.66-1.245-.79-2.527-.942-3.336-.971v-.66a1.144 1.144 0 0 0-1.767-.96l-3.994 2.94a1.147 1.147 0 0 0 0 1.946l3.994 2.94a1.144 1.144 0 0 0 1.767-.96v-.667z" />
                </svg> <span>Reply</span></a>

            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- /reply is indented -->
  </div> --}}
  <!-- /comment -->
</div>
