
@extends('layout.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('content')
    <div class="container">

        <div class="w-100 text-center h5">Hello {{ ucwords(strtolower($Card->Owner)) }}!

            <a type="button" class="btn btn-transparent border-secondary rounded-pill position-relative float-end" href="/notes">
                Notes
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  <span id="unreadmessages">{{ $Notes->where('Status', 'Unread')->count(); }}</span>
                  <span class="visually-hidden">unread messages</span>
                </span>
            </a>
        </div>


        <div class="mb-3 mt-4">
            <textarea class="form-control" id="loveNote" rows="10"></textarea>
            <div class="col-12">
                <button class="float-end btn bg-success border  mt-2 rounded-pill text-white" id="submitNote">Send <i class="fa-regular fa-heart "></i></button>
            </div>
        </div>
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



<script>
    $(document).ready(function(){
        function updateUnreadMessagesCount() {
            $.ajax({
                url: '{{ route("unreadmessages_get") }}',
                type: "GET",
                success: function(data) {
                    // Update the content of the span with the received data
                    $("#unreadmessages").text(data);
                },
                error: function(xhr, status, error) {
                    // Handle error if any
                    console.error("Error fetching unread messages count:", error);
                }
            });
        }

        // Call the function initially
        updateUnreadMessagesCount();

        // Set interval to call the function every 5 seconds
        setInterval(updateUnreadMessagesCount, 5000); // 5000 milliseconds = 5 seconds
    });
</script>
