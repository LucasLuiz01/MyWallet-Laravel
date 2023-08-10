@extends('base')

@section('content')
<div class="box">
    <div class="titulo">
        <span class="tituloSpan">MyWallet</span>
    </div>
    <div class="formulario">
        <form action="{{route('app.cadastro')}}" method="POST">
            @csrf
            <input type="string" placeholder="Nome" name="name">
            @if($errors->has('name'))
            <div class="error-message">{{ $errors->first('name') }}</div>
        @endif
            <input type="email" placeholder="Email" name="email">
            @if($errors->has('email'))
            <div class="error-message">{{ $errors->first('email') }}</div>
        @endif
            <input class="input" type="password" placeholder="Password" name="password" >
            @if($errors->has('password'))
            <div class="error-message">{{ $errors->first('password') }}</div>
        @endif
            <input class="input" type="password" placeholder="Confirm Password" name="confirmPassword" >
          
            @if($errors->has('confirmPassword'))
            <div class="error-message">{{ $errors->first('confirmPassword') }}</div>
        @endif 
         <button type="submit"><span class="textoButton">Cadastrar
                </span></button>
        </form>
        <a class="linkCadastro" href="{{route('app.login')}}">Já tem uma conta? Entre agora!</a>
        
    </div>
</div>
    
@endsection
