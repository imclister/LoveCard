
@extends('layout.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('content')
    <div class="container">
        <button class="btn btn-success">Hello! {{ $Card->Owner}}</button>


        <div class="mb-3 mt-4">
            <textarea class="form-control" id="loveNote" rows="3"></textarea>
            <button class="btn btn-success mt-2" id="submitNote">Submit</button>
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
