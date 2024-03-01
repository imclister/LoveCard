
@extends('layout.app')


@section('content')

    <div class="container">
        @foreach ($Notes as $created_at => $note)
            <div class="rounded bg-light text-dark mt-2 p-2 w-100">
                <p class="h6">{{ $note }}</p>
            </div>
        @endforeach
    </div>

@endsection
