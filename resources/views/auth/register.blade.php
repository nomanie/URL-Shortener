
@extends('welcome')
@section('header')
    @include('home/global/header')
@endsection
@section('main')

    <section>
        <a href="{{route('login')}}"><button class="btn btn-primary" style="position:absolute;left:60%;top:9%;z-index: 2;">Login</button></a>
        <div class="row justify-content-center mt-5" >
            <div class="col-sm-4" style="text-align: center;">
                <div class="card login-card">
                    <div class="card-header"><div class="col-sm-10">Register</div>    </div>
                    <div class="card-body mx-auto">
                    <form method="POST" action="{{route('register')}}">
                        @csrf
                        <input id="name" type="text" placeholder="Name" class="form-control mb-3 inputs @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <input id="email" type="email" placeholder="E-mail" class="form-control mb-3 inputs @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        <input id="password" type="password" placeholder="Password" class="form-control inputs mb-3 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control inputs mb-3" name="password_confirmation" required autocomplete="new-password">
                        <input type="submit" id="submit-btn" value="Register" class="btn btn-dark mt-3">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('footer')
    @include('home/global/footer')
@endsection
