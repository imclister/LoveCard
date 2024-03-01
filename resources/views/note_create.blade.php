<form action="/note" method="POST">
    @csrf

    <input type="text" class="form-control mt-2" name="name" placeholder="name">
    <input type="text" class="form-control mt-2" name="code" placeholder="code">
    <input type="number" class="form-control mt-2" name="lettercount" placeholder="No. of Letters">

    <button class="btn btn-success text-white form-control mt-2">Submit</button>
</form>



<form action="{{ route('createcard') }}" method="POST">
    @csrf

    <input type="text" class="form-control mt-2" name="male_name" placeholder="Boyfriend">
    <input type="text" class="form-control mt-2" name="female_name" placeholder="Girlfriend">

    <input type="text" class="form-control mt-2" name="male_nickname" placeholder="Boyfriend's Nickname">
    <input type="text" class="form-control mt-2" name="female_nickname" placeholder="Girlfriend's Nickname">

    <button class="btn btn-success text-white form-control mt-2">Submit</button>
</form>

