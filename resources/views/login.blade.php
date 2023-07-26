@extends('base')

@section('content')
<div class="box">
    <div class="titulo">
        <span class="tituloSpan">MyWallet</span>
    </div>
    <div class="formulario">
        <form action="{{route('app.login')}}" method="POST">
            @csrf
            <input type="email" placeholder="Email" name="email">
            @if($errors->has('email'))
            <div class="error-message">{{ $errors->first('email') }}</div>
        @endif
            <input class="input" type="password" placeholder="Password" name="password" >
            @if($errors->has('password'))
            <div class="error-message">{{ $errors->first('password') }}</div>
        @endif
            <button type="submit"><span class="textoButton">Entrar
                </span></button>
        </form>
        <a class="linkCadastro" href="{{route('app.cadastro')}}">Primeira vez? Cadastre-se!</a>
    </div>
</div>
    
@endsection