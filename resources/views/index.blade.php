@extends('main')

@section('content')
    <div>
        Search for a pet
        <form method="GET" action="">
            ID: <input name="pet_id" type="text" style="width: 100px;" required/><br/>
            <button type="submit">Search</button>
        </form>

        @isset($response)
            {{ $response }}
        @endisset
        @isset($search)
            <div>
                <p>
                    Pet ID: 
                    @isset($search->id)
                        {{ $search->id }}</p>
                    @endisset
                </p>
                <p>
                        Pet Name: 
                        @isset($search->name)
                            {{ $search->name }}
                        @endisset
                </p>
                <p>
                    Pet Category: 
                    @isset($search->category->name)
                        {{ $search->category->name }}
                    @endisset
                </p>
                <p>
                    @isset($search->tags)
                        Pet Tags: 
                        @foreach ($search->tags as $tag)
                            {{ $tag->name }},
                        @endforeach
                    @endisset
                </p>
                
                <p>
                    Pet photos (urls):
                    @isset($search->photos)
                        @foreach ($search->photos as $photo)
                            {{ $photo }},
                        @endforeach
                    @endisset
                </p>
                <p>
                    Status:
                    @isset($search->status)
                        {{ $search->status }}
                    @endisset
                </p>
            </div>
        @endisset
    </div>
@endsection