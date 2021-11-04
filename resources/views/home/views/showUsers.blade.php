<section class="table">
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Role</th>
            <th>Email</th>
            <th>Verified</th>
            <th>Edit</th>
            <th>Delete</th>
            <th><button class="btn btn-warning mb-2 btn-add">Create New User</button></th>
        </tr>
        @foreach($data as $d)
            <tr>
                <td>{{$d['id']}}</td>
                <td>{{$d['name']}}</td>
                <td>{{$d['role']}}</td>
                <td>{{$d['email']}}</td>
                <td>@if($d['email_verified_at']) Yes @else No @endif</td>
                <td><button class="btn btn-success mb-2 btn-edit" id="{{$d['id']}}"data-password="{{$d['password']}}" data-name="{{$d['name']}}" data-role="{{$d['role']}}" data-email="{{$d['email']}}" data-verified="{{$d['email_verified_at']}}">Edit</button></td>
                <td><button class="btn btn-danger mb-2 btn-delete" id="{{$d['id']}}">Delete</button></td>
            </tr>
        @endforeach
    </table>
</section>
<script>
    $(".btn-add").on('click',function(){
        $(".create-new-user").css('display','block')
        $(".hide-new-user-div").on('click',function(){
            $(".create-new-user").css('display','none')
        })
    })
    $( function() {
        $( "#create-new-user" ).draggable();
    } );
</script>
<section class="create-new-user" id="create-new-user">
<div class="hide-new-user-div">X</div>
    <div class="forms">
        <h4>Create new User</h4>
        {!! Form::open(['method'=>"Post",'url'=>route('user.add')]) !!}
            @csrf
            <input type="text" name="name" id="name" class="form-control inputs-add mb-3" placeholder="Name">
            <input type="email" name="email" id="email" class="form-control inputs-add mb-3" placeholder="E-mail">
            <input type="password" name="password" id="password" class="form-control inputs-add mb-3" placeholder="Password">
            {!! Form::select('role',['default'=>'Select Role',1=>"User",2=>"Admin"],null,array("class"=>"form-control inputs-add")) !!}
            {!! Form::select('verified',['default'=>'Verified?',1=>"Yes",2=>"No"],null,array("class"=>"form-control inputs-add mt-3")) !!}
            <input type="submit" class="btn btn-success mt-3 btn-add-user" value="Dodaj">
        {!! Form::close() !!}
    </div>
</section>
<script>
    $('.btn-delete').on('click',function(){
        $.ajax({
            type:"DELETE",
            url:  '{{route("user.delete", "")}}'+'/'+$(this).attr('id'),
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
<section class="edit-user" id="edit-user">
    <div class="hide-edit-user-div">X</div>
    <div class="forms">
        <h4 class="edit-header"></h4>
        {!! Form::open(['method'=>'POST','id'=>'edit-form-open']) !!}
        @csrf
        <input type="text" name="name" id="edit-name" class="form-control inputs-add mb-3" placeholder="Name">
        <input type="email" name="email" id="edit-email" class="form-control inputs-add mb-3" placeholder="E-mail">
        <input type="password" name="password" id="edit-password" class="form-control inputs-add mb-3" placeholder="Password">
        {!! Form::select('role',['default'=>'Select Role',1=>"User",2=>"Admin"],null,array("class"=>"form-control inputs-add",'id'=>'role')) !!}
        {!! Form::select('verified',['default'=>'Verified?',1=>"Yes",2=>"No"],null,array("class"=>"form-control inputs-add mt-3",'id'=>'verified')) !!}
        <input type="submit" class="btn btn-warning mt-3 btn-edit-user" value="Edytuj">
        {!! Form::close() !!}
    </div>
</section>
<script>
    $(".btn-edit").on('click',function(){
        $("#edit-form-open").prop('action','{{route("user.edit", "")}}'+'/'+$(this).attr('id'))
        $('.edit-header').text("Edit User: "+$(this).attr('data-name'))
        $('#edit-name').val($(this).attr('data-name'))
        $('#edit-email').val($(this).attr('data-email'))
        $('#edit-password').val($(this).attr('data-password'))
        $('#edit-name').val($(this).attr('data-name'))
        $('#role').val($(this).attr('data-role'))
        if($(this).attr('data-verified')){
            $('#verified').val(1)
        }
        else{
            $('#verified').val(2)
        }
        $(".edit-user").css('display','block')
        $(".hide-edit-user-div").on('click',function(){
            $(".edit-user").css('display','none')
        })
    })
    $( function() {
        $( "#edit-user" ).draggable();
    } );
</script>
