<section class="table">
    <table>
        <tr>
            <th>Id</th>
            <th>Short Url</th>
            <th>Full Url</th>
            <th>Expired Date</th>
            <th>Delete</th>
        </tr>
        @foreach($data as $d)
            <tr>
                <td>{{$d['id']}}</td>
                <td>{{$d['url']}}</td>
                <td>{{$d['user_url']}}</td>
                <td>{{$d['exp_time']}}</td>
                <td><button class="btn btn-danger mb-2 btn-delete" id="{{$d['url']}}">Delete</button></td>
            </tr>
        @endforeach
    </table>
</section>
<script>
    $(".btn-delete").on('click',function(){
        $.ajax({
            type:"DELETE",
            url:  '{{route("url.delete", "")}}'+'/'+$(this).attr('id'),
            data: $(this).attr('id'),
            success:function(data){
                window.location.reload();
            },
            error:function(data){
                alert("Błąd!")
            }
        })
    })
</script>
