
@extends('welcome')
@section('header')
    @include('home/global/header')
@endsection
@section('main')

<section>
    <div class="row justify-content-center mt-5" >
        <div class="col-sm-4" style="text-align: center;">
            <div class="card login-card">
                <div class="card-header">Login</div>
                <div class="card-body mx-auto">
                    <form method="POST" action="{{route('login')}}">
                        @csrf
                        <input id="email" type="email" class="form-control inputs mb-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-mail " required autocomplete="email" autofocus>
                        <input id="password" type="password" class="form-control inputs mb-3 @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                        <input type="submit" id="submit-btn" value="Login" class="btn btn-dark mt-3">
                    </form>
                    <a href="{{route('register')}}"><button class="btn btn-primary mt-2">Register</button></a>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
@section('footer')
    @include('home/global/footer')
@endsection
