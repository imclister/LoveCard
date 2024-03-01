
@extends('layout.app')

@section('content')
    <div class="container">
        <form action="{{ route('addpassword') }}" method="POST">
            @csrf
            <input type="text" class="form-control mt-2" name="password" placeholder="New password">
            <input type="text" class="form-control mt-2" name="confirmpassword" placeholder="Confirm password">
            <button class="btn btn-success text-white form-control mt-2">Submit</button>
        </form>
    </div>
@endsection
