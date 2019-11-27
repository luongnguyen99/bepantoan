
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$("#search").keyup(function() {
    
    var key = $('#search').val();
    $.ajax({
        url:"{{ route("master.search") }}",
        method:"GET",
        data:{key:key},
        success:function(data){
            console.log(data);
        }
    });
});
