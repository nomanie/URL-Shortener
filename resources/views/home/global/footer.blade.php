<footer>
    <div class="row">
        <div class="col-sm-3  mt-5 ml-2">
            <a href="">Piotr Skwarek </a>, all rights reserved!
        </div>
        <div class="col-sm-3 mt-2">
            <div class="row">
                <div class="col-sm-3 text-center">
                    Kontakt
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="https://www.facebook.pl/piotr.skwarek.12"><i class="fa fa-facebook-square"></i> Facebook</a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="https://www.github.com/nomanie"><i class="fa fa-github"></i> Github</a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <i class="fa fa-envelope"></i> skwapiotr@gmail.com
                </div>
            </div>
        </div><div style="margin-top: 2%;">
            Created in
        </div>
        <div class="col-sm-1" style="color:white;margin-top:20px;">
            <img src="{{asset('assets/images/LaravelLogo.png')}}" width="50">
            <img src="{{asset('assets/images/Bootstrap_logo.svg')}}" width="50">
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-2 mt-5 time" style="color:white;">

        </div>
    </div>
</footer>
<script>
        setInterval(function(){
        var date = new Date();
        var day = date.getDate()
        if(day <10){
        day = "0"+day
    }
        var month = date.getMonth()
        if(month <10){
        month = "0"+month
    }
        var year = date.getFullYear()
        var hour = date.getHours()
        if(hour <10){
        hour = "0"+hour
    }
        var minutes = date.getMinutes()
        if(minutes <10){
        minutes = "0"+minutes
    }
        var seconds = date.getSeconds()
        if(seconds <10){
        seconds = "0"+seconds
    }
        var full_date = day+"-"+month+"-"+year + " " + hour+":"+minutes+":"+seconds
        $(".time").text(full_date)
    })
</script>
