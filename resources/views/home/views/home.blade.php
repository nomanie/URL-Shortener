<section>

<div class="mt-5 text-center">
    <div class="generate-div">
        <h1 >Generate Shorten URL</h1>
        {!! Form::text("url",null,array("class"=>"form-control url-form","placeholder"=>"Paste Your URL")) !!}
        {!! Form::select("time",array(1=>"1 Dzień",3=>"3 Dni",7=>"7 Dni"),1,array("class"=>"form-control select-time mx-auto mt-2")) !!}
        <button type="submit" class="btn btn-success mt-2 generate-btn">Generate</button>
    </div>
    <div class="new-url" style="opacity:0">
        <h1 class="mt-4">Your New URL</h1>
        {!! Form::text("new-url",null,array("class"=>"form-control new-url-input mx-auto","placeholder"=>"Your new URL","disabled"=>"disabled")) !!}
        <button class="btn btn-success mt-2 new-btn copy-btn">Copy</button>
        <button class="btn btn-danger mt-2 new-btn delete-btn">Delete URL</button><br>
        <button class="btn btn-primary mt-2 new-btn go-btn">Go to this URL</button>
    </div>

</div>
</section>
<script>

    $(".generate-btn").on('click',function(){
        //
        function isValidUrl(_string) {
            let url_string;
            try {
                url_string = new URL(_string);
            } catch (_) {
                return false;
            }
            return url_string.protocol === "http:" || url_string.protocol === "https:" ;
        }
        //url checker
        //generate url
        if(isValidUrl($(".url-form").val())){
            url = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < 5; i++ ) {
                url += characters.charAt(Math.floor(Math.random() *
                    charactersLength));
            }
            user_url = $(".url-form").val();
            time = $(".select-time").val();
            data = {url,user_url,time}
            //end generate url
            $.ajax({
                type:"POST",
                url:  '{{route("url.generate")}}',
                data: data,
                success:function(data){
                    $(".new-url-input").val(window.location.href +"url/"+url)
                    $(".generate-div").css("display","none")
                    $(".new-url").animate({
                        opacity:1,
                    },3000)
                },
                error:function(data){
                    alert("Błąd!")
                }
            })
        }
        else{
            alert("Error! This is not valid url! Please insert url with http(s)://")
        }

    })
    $(".delete-btn").on('click',function(){
        $.ajax({
            type:"DELETE",
            url:  '{{route("url.delete", "")}}'+'/'+url,
            data: url,
            success:function(data){
                $(".url-form").val("")
                $(".new-url-input").val("")
                $(".generate-div").css("display","block")
                $(".new-url").animate({
                    opacity:0,
                },1)
            },
            error:function(data){
                alert("Błąd!")
            }
        })
    })
    $(".copy-btn").on('click',function(){
        navigator.clipboard.writeText($(".new-url-input").val());
        $(this).text("Copied!")
        $(this).prop("disabled","disabled")
    })
    $(".go-btn").on('click',function(){
        window.location.href = $(".new-url-input").val()
    })
</script>
