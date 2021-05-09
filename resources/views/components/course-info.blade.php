<div class="pl-3 tab-pane fade" id="course-info" role="tabpanel" aria-labelledby="course-info-tab">
  <h3 class="text-primary mb-2 ml-2">Course Overview</h3>
  <hr>
  <div class="jumbotron mb-0">
    <div class="form-group">
      <label for="course-title">
        <h5>Course Title </h5>
      </label>
      <input type="text" class="form-control" id="course-title" name="title" value="{{ $course->title }}">
    </div>
    <div class="form-group">
      <label for="course-description">
        <h5>Course Description</h5>
      </label>
      <textarea id="course-description" name="desc">{{ $course->desc }}</textarea>
      {{-- <textarea class="ckeditor form-control" name="ckeditor"></textarea> --}}
    </div>
    <div class="form-group">
      <label for="course-category">
        <h5>Course Category</h5>
      </label>
      <select class="custom-select" id="course-category" name="category_id">
        <option disabled selected>Choose a Category</option>
        @foreach ($categories as $category)
          @if ($category->children->count())
            <optgroup label="{{ $category->name }}">
              @foreach ($category->children as $child)
                <option value="{{ $child->id }}" {{ $course->category_id == $child->id ? 'selected' : '' }}>
                  {{ $child->name }}</option>
              @endforeach
            </optgroup>
          @else
            <option value="{{ $category->id }}" {{ $course->category_id == $category->id ? 'selected' : '' }}>
              {{ $category->name }}</option>
          @endif
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="cover-upload">
        <h5>Cover Image</h5>
      </label>
      <input type="file" class="filepond" id="cover-upload" name="coverFile">
    </div>
  </div>
</div>
