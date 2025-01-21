@extends('main')

@section('content')
    <div>
        Delete a pet
        <form method="POST" action="{{ route('destroy') }}">
            @csrf
            @method('DELETE')
            ID: <input name="id" type="text" style="width: 100px;" required/><br/>
            <button type="submit">Search</button>
        </form>

        @isset($response)
            {{ $response }}
        @endisset
    </div>
@endsection