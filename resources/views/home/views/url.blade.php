<section>
    <div class="urls-div">
        <a href="{{$url[0]['user_url']}}" >
            <button class="btn btn-success">Przejdź do strony</button>
        </a><br><br><br>
        <a href="{{$url[0]['user_url']}}" target="_blank">
            <button class="btn btn-primary">Otwórz stronę w nowej karcie</button>
        </a>
        <br><br>
        <h1>Ten link wygaśnie: {{$url[0]['exp_time']}}</h1>
    </div>
</section>
