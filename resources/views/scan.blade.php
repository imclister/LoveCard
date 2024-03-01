

@extends('layout.app')

<style>

.centered-form {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

</style>

@section('content')
    <div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-3 centered-form">
            <form action="{{ route('scan') }}" method="POST">
                @csrf
                <h5 class="mb-3 text-center" style="display: block; text-align: center;">Introducing a bespoke creation, tailored to commemorate your love story.</h5>
                <input type="text" class="form-control mt-2" name="hash" placeholder="Hash" autocomplete="off">
                <button class="btn btn-success text-white form-control mt-2">Submit</button>
            </form>
          </div>
        </div>
    </div>
@endsection
