@extends('layouts.app')

@section('content')
<div class="card" style="width: 18rem;">
    <img src="{{ asset("upload/$drives->file") }}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{ $drives->title }}</h5>
      <p class="card-text">{{ $drives->description }}</p>
      <a href="{{ route('drives.download', $drives->id) }}" class="btn btn-primary">dowenload</a>
    </div>
  </div>
  @endsection