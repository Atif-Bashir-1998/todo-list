@extends('layouts.app')


@section('content')
<div class="container">
<h1>New Todo</h1>

<h2>here you will create new Todo</h2>


 {{-- Discussion template   --}}
    
 <form action="/new_todo" method="POST">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Title</label>
      <input type="text" class="form-control" name="title" value="{{ old('title') }} ">
      <span class="text-danger">@error('email'){{ $message }} @enderror</span>

    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Description</label>
      <input type="text" class="form-control" name="description" value="{{ old('description') }}">
      <span class="text-danger">@error('password'){{ $message }} @enderror</span>
    </div>

    <div class="form-group">
    <label for="levels">Choose Level:</label>
    <select name="level" class="form-control" >
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
    </select>
  </div>

    {{-- <div class="form-group">
      <label for="exampleInputPassword1">Level</label>
      <input type="text" class="form-control" name="level" value="{{ old('level') }}">
      <span class="text-danger">@error('password'){{ $message }} @enderror</span>
    </div> --}}

      {{-- <div class="form-group">
        <label for="exampleInputPassword1">Deadline</label>
        <input type="text" class="form-control" name="deadline" value="{{ old('deadline') }}">
        <span class="text-danger">@error('password'){{ $message }} @enderror</span>
      </div> --}}
   
    <button type="submit" class="btn btn-primary">{{__('profile.Submit')}}</button>
  </form>

</div> 
@endsection