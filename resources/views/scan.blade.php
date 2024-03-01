<form action="{{ route('scan') }}" method="POST">
    @csrf
    <input type="text" class="form-control mt-2" name="hash" placeholder="hash">
    <button class="btn btn-success text-white form-control mt-2">Submit</button>
</form>

