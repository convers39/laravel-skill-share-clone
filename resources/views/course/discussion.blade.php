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
    <div class="comment-container">
      @if ($course->comments->count())
        @include('course.comment', ['comments'=>$course->comments])
      @else
        <h3>No comments on this course.</h3>
      @endif
    </div>
    {{-- /Comment List --}}
  </div>
</div>
