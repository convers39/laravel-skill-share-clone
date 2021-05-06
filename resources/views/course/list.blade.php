@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
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
          <div class="list-group list-group-flush">
            <li class="list-group-item list-group-item-light list-group-item-action">
              <a href="#" class="stretched-link text-decoration-none">Cate1</a>
            </li>
            <li class="list-group-item list-group-item-light list-group-item-action">
              <a href="#" class="stretched-link text-decoration-none">Cate2</a>
            </li>
            <li class="list-group-item list-group-item-light list-group-item-action">
              <a href="#" class="stretched-link text-decoration-none">Cate3</a>
            </li>
            <li class="list-group-item list-group-item-light list-group-item-action">
              <a href="#" class="stretched-link text-decoration-none">Cate4</a>
            </li>
          </div>
        </div>
      </div>
      <div class="col col-md-9">
        <br>
        <h2>Courses</h2>
        <hr>
        <div class="row justify-content-center mb-4 ">
          @foreach ($courses as $course)
            <x-course-card :course="$course" :columns="4" />
          @endforeach
        </div>
        <div class="d-flex justify-content-center">
          {!! $courses->links() !!}
        </div>
      </div>
    </div>

  </div>
@endsection
