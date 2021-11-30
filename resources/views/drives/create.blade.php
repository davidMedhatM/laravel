@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="mainContent">
    <form action="{{ route('drives.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">drive title</label>
            <input name="title" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="">drive description</label>
            <input name="description" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for=""> drive file</label>
            <input name="file" type="file" class="form-control">
        </div>
        <button class="btn btn-info">save data</button>
    </form>
</div>
</div>



@endsection