@extends('main')

@section('content')
    <div>
        Edit a pet
        <form method="POST" action="{{ route('update') }}">
            @csrf
            @method('PUT')
            Pet ID: <input name="id" type="text" style="width: 100px;" required/><br/>
            Pet Name: <input name="name" type="text" style="width: 100px;" required/><br/>
            Category ID: <input name="category_id" type="text" style="width: 100px;"/><br/>
            Category Name: <input name="category_name" type="text" style="width: 100px;"/><br/>
            Status: <input name="status" type="text" style="width: 100px;" required/><br/>
            <button type="submit">Search</button>
        </form>

        @isset($response)
            {{ $response }}
        @endisset
    </div>
@endsection