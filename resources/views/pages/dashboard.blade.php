@extends('layouts.app')


@section('content')
<div class="container">
<h1>Dashboard</h1>
    
<h2>this is dashboard</h2>



 <div class="container">
  
   

  @forelse ($todos as $todo)
   
    <p>Title: {{ $todo->title }}</p> 
    <p>Description: {{ $todo->description }}</p> 
    <p>Level: {{ $todo->level }}</p>
    <p>Username: {{ $todo->user->name }}</p>

    <a href="/delete/{{$todo->id}}">Delete</a> <br>
    {{-- <a href="/edit/{{$todo->id}}"></a> --}}
    <a href="/complete/{{$todo->id}}"><p>{{ $todo->status ? 'Incomplete' : 'Completed' }}</p></a> <br>

    <hr>
    @empty
    <p>No todos for this user</p>
    @endforelse

</div> 
@endsection