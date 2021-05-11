{{-- Comment and Reply form Unit --}}
@foreach ($comments as $comment)
  <div class="comment mb-2 row">
    <div class="comment-avatar col-md-1 col-sm-2 text-center pr-1">
      <a href=""><img class="mx-auto rounded-circle img-fluid"
          src="http://demos.themes.guide/bodeo/assets/images/users/w102.jpg" alt="avatar"></a>
    </div>
    <div class="comment-content col-md-11 col-sm-10">
      <h6 class="small comment-meta"><a href="#">{{ $comment->user->name }}</a> {{ $comment->updated_at }}</h6>
      <div class="comment-body">
        <p>
          {{ $comment->content }}
          <br>
          <a class="text-right small" data-toggle="collapse" href="#comment-reply-{{ $comment->id }}" role="button"
            aria-expanded="false" aria-controls="comment-reply-{{ $comment->id }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-reply"
              viewBox="0 0 16 16">
              <path
                d="M6.598 5.013a.144.144 0 0 1 .202.134V6.3a.5.5 0 0 0 .5.5c.667 0 2.013.005 3.3.822.984.624 1.99 1.76 2.595 3.876-1.02-.983-2.185-1.516-3.205-1.799a8.74 8.74 0 0 0-1.921-.306 7.404 7.404 0 0 0-.798.008h-.013l-.005.001h-.001L7.3 9.9l-.05-.498a.5.5 0 0 0-.45.498v1.153c0 .108-.11.176-.202.134L2.614 8.254a.503.503 0 0 0-.042-.028.147.147 0 0 1 0-.252.499.499 0 0 0 .042-.028l3.984-2.933zM7.8 10.386c.068 0 .143.003.223.006.434.02 1.034.086 1.7.271 1.326.368 2.896 1.202 3.94 3.08a.5.5 0 0 0 .933-.305c-.464-3.71-1.886-5.662-3.46-6.66-1.245-.79-2.527-.942-3.336-.971v-.66a1.144 1.144 0 0 0-1.767-.96l-3.994 2.94a1.147 1.147 0 0 0 0 1.946l3.994 2.94a1.144 1.144 0 0 0 1.767-.96v-.667z" />
            </svg>
            <span>Reply</span>
          </a>
          @auth
            @if ($comment->user->is(auth()->user()))
              <a class="pl-2 text-right small" href="" id="edit-{{ $comment->id }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen"
                  viewBox="0 0 16 16">
                  <path
                    d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                </svg>
                <span>Edit</span>
              </a>
            @endif
          @endauth
        </p>
      </div>
    </div>
    <div class="col-md-11 offset-md-1 col-sm-10 offset-sm-2">
      <div class="collapse" id="comment-reply-{{ $comment->id }}">
        <div class="d-flex flex-row align-items-start">
          <img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
          <form id="reply-comment-form-{{ $comment->id }}" class="w-100" method="post"
            action="{{ route('comment.store', ['course' => $course]) }}">
            @csrf
            <textarea rows="3" name="content" class="form-control ml-1 shadow-none textarea h-100"
              placeholder="Add reply..."></textarea>
            <input hidden type="text" name="parent_id" value="{{ $comment->id }}">
          </form>
        </div>
        <div class="mt-2 text-right">
          <button form="reply-comment-form-{{ $comment->id }}" class="btn btn-primary btn-sm shadow-none"
            type="submit">Reply</button>
          <button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button" data-toggle="collapse"
            data-target="#comment-reply-{{ $comment->id }}" aria-expanded="false"
            aria-controls="comment-reply-{{ $comment->id }}">Cancel</button>
        </div>
      </div>
      @include('course.comment', ['comments'=>$comment->replies])
    </div>
  </div>
@endforeach
{{-- /Comment and Reply form Unit --}}
