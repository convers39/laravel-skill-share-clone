<div class="col col-md-3">
  <br>
  <div class="list-group-item  list-group-item-action border-light">
    <a href="#" class="stretched-link text-decoration-none">
      <strong class="text-primary">All Courses</strong>
    </a>
  </div>
  <div class="list-group-item list-group-item-action border-light">
    <a href="#" class="stretched-link text-decoration-none">
      <strong class="text-primary">Recommended</strong>
    </a>
  </div>
  <hr>
  <div class="bg-light">
    <ul class="list-group list-group-flush">
      @foreach ($categories as $category)
        <li
          class="list-group-item list-group-item-{{ $category->children->count() ? 'dark' : 'light' }} list-group-item-action">
          <a href="#" class="stretched-link text-decoration-none">
            {{ $category->name }}
          </a>
        </li>
        <ul class="list-group list-group-flush">
          @foreach ($category->descendants as $child)
            @include('course.child-category', ['child' => $child])
          @endforeach
        </ul>
      @endforeach

    </ul>
  </div>
</div>
