</body>
<script type="text/javascript">

        $("#show_{{$provider->id}}" ).on( "click", () => {
            let id = {{$provider->id}};
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                url: "{{ url('api/ajax-call') }}",
                data: {id:id},
                dataType: 'json',
                success: (data) => {

                    if(data['status']=='success'){
                        let img = '<img src="'+data['message']+'" />';
                        $('.image').html(img)
                    }else{
                        alert(data['message']);
                    }
                  
                },
                beforeSend: () => {
                    $('#loading').show();
                },
                complete: () => {
                    $('#loading').hide();
                },
                error: (data) => {
                    // console.log(data);
                    alert('Something went wrong to fetch image.');
                }
            });
        });
</script>

</html>
