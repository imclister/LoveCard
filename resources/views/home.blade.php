
@extends('layout.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('content')
    <div class="container">

        <div class="w-100 text-center h5">Hello {{ ucwords(strtolower($Card->Owner)) }}!</div>


        <div class="mb-3 mt-4">
            <textarea class="form-control" id="loveNote" rows="10"></textarea>
            <div class="col-12">
                <button class="float-end btn bg-success border border-secondary mt-2 rounded-pill text-white" id="submitNote">Send <i class="fa-regular fa-heart "></i></button>
            </div>
        </div>
    </div>


    <div class="container">
        <a class="btn btn-danger text-white" href="/messages">
            {{ $Notes->where('Status', 'Unread')->count(); }} Unread Messages
        </a>
    </div>
@endsection



<script>
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $("#submitNote").click(function(){

            var loveNoteValue = $("#loveNote").val();
            var data = { loveNote: loveNoteValue };

            $.ajax({
                url: '{{ route("addnote") }}',
                type: 'POST',
                data: data,
                success: function(response) {
                    if (response.status === 200) {
                        $("#loveNote").val('');
                        alert("Note added successfully!");
                    } else {
                        alert("Failed to add note.");
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    alert("Error: " + error);
                }
            });
        });
    });
</script>
