<li class="list-group-item list-group-item-light list-group-item-action">
  <a href="{{ route('course', ['category' => $child]) }}" class="stretched-link text-decoration-none">
    {{ $child->name }}
  </a>
</li>
@if ($child->categories)
  <ul class="list-group list-group-flush">
    @foreach ($child->descendants as $child)
      @include('course.child-category', ['child' => $child])
    @endforeach
  </ul>
@endif
