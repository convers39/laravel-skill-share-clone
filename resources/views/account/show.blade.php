@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">{{ __('Profile') }}</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            <form method="post">
              @csrf
              <div class="form-group mb-4 row">
                <label class="col-form-label col-sm-3" for="nickname">Nickname</label>
                <div class="col-sm-9">
                  <input type="text" id="nickname" name="nickname" class="form-control"
                    value="{{ $profile->nickname ?? '' }}" />
                </div>
              </div>
              <div class="row justify-content-between">
                <div class="form-group col-md-6 mb-4 row">
                  <label class="col-form-label col-sm-6" for="gender">Gender</label>
                  <div class="col-sm-6">
                    <select class="form-control" aria-label="gender" id="gender" name="gender">
                      <option disabled {{ $profile->gender ?: 'selected' }}>Select Gender</option>
                      <option value="male" {{ $profile->gender == 'male' ?? 'selected' }}>Male</option>
                      <option value="female" {{ $profile->gender == 'female' ?? 'selected' }}>Female</option>
                      <option value="others" {{ $profile->gender == 'others' ?? 'selected' }}>Others</option>
                    </select>
                  </div>
                </div>
                <div class="form-group col-md-6 row mb-4">
                  <label class="col-form-label col-sm-6" for="age">Age</label>
                  <div class="col-sm-6">
                    <select class="form-control" aria-label="age" id="age" name="age">
                      <option selected value="{{ $profile->age }}">{{ $profile->age ?? 'Age' }}</option>
                      @for ($i = 1; $i < 120; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                      @endfor
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group mb-4 row">
                <label class="col-form-label col-sm-3" for="city">City</label>
                <div class="col-sm-9">
                  <input type="text" id="city" name="city" class="form-control"
                    value="{{ $profile->city ?? 'I live in...' }}" />
                </div>
              </div>

              <div class="form-outline mb-4">
                <label class="form-label" for="about_me">About Me</label>
                <textarea class="form-control" id="about_me" name="about_me"
                  rows="4">{{ $profile->about_me ?? 'Write something...' }}</textarea>
              </div>

              {{-- <div class="form-check d-flex justify-content-center mb-4">
                <input class="form-check-input me-2" type="checkbox" value="" id="form4Example4" checked />
                <label class="form-check-label" for="form4Example4">
                  Send me a copy of this message
                </label>
              </div> --}}

              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block mb-4">Save Change</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
