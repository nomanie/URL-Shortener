<section>
<div class="mt-5 text-center">
    <div class="generate-div">
        <h1 >Generate Shorten URL</h1>
        {!! Form::text("url",null,array("class"=>"form-control url","placeholder"=>"Paste Your URL")) !!}
        {!! Form::select("time",array("1"=>"1 Dzień","3"=>"3 Dni","7"=>"7 Dni"),1,array("class"=>"form-control select-time mx-auto mt-2")) !!}
        <button type="submit" class="btn btn-success mt-2 generate-btn">Generate</button>
    </div>
    <div class="new-url" style="opacity:0">
        <h1 class="mt-4">Your New URL</h1>
        {!! Form::text("url",null,array("class"=>"form-control new-url-input mx-auto","placeholder"=>"Your new URL","disabled"=>"disabled")) !!}
        <button class="btn btn-success mt-2 new-btn">Copy</button>
        <button class="btn btn-danger mt-2 new-btn">Delete URL</button>
    </div>

</div>
</section>
<script>
    $(".generate-btn").on('click',function(){

        $(".generate-div").css("display","none")
        $(".new-url").animate({
            opacity:1,
        },3000)
    })
</script>
