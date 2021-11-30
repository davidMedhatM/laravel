@extends('layouts.app')

@section('content')
<div class="container">
    @if (Session::has('done'))
    <div class="alert alert-success">
    {{ Session::get('done') }}
    </div>
    @endif
    <table class="table table-dark">
        <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
          
                @foreach ( $drives as $item )
                <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>
                    <a href="{{ route('drives.show', $item->id) }}" class="text-info"><i class="far fa-eye" style="font-size: 20px"></i></a>    
                    <a href="{{ route('drives.edit', $item->id) }}" class="text-primary"><i class="far fa-edit" style="font-size: 20px"></i></a>    
                    <a href="{{ route('drives.destroy', $item->id) }}" class="text-danger"><i class="fas fa-trash" style="font-size: 20px"></i></a>    
                </td> 
            </tr>
                @endforeach
            
        </tbody>
    </table>
    {{-- {{ $drives->links() }} --}}

</div>



@endsection