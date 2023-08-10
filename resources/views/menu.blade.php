<style>
    @import url('https://fonts.googleapis.com/css2?family=Saira+Stencil+One&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,700;1,700&family=Saira+Stencil+One&display=swap');
  </style>
<!DOCTYPE html>
<html>
<head>
    <title>MyWallet</title>
    <!-- Importe o arquivo CSS usando a função asset() -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="tudo">
        <div class="containerMenu">
            <div class="topoMenu">
                <span class="textBemVindo">Olá, {{$user->name}}</span>
            <form id="logout-form" action="{{route('app.logout')}}" method="POST">
            @csrf
            </form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <img src="/images/Vector.png" alt="Saida">   
            </a>
               
            
            </div>
            <div class="registros">
                @if($walletData->count() > 0)
                @foreach ($walletData as $data)
                <div class="linhaRegistros">
                    <div class="esquerda">
                        <span class="data">{{$data->data}}</span>
                        <a href="{{$data->entrada ? route('app.entrada', ['id' => $data->id]) : route('app.saida',['id' => $data->id])}}" class="description">{{$data->description}}</a>
                    </div>
                    <div class="direita">
                        <span class="direitas" style="color: {{$data->entrada ? '#03AC00' : '#C70000'}}">
                            {{$data->valor}}
                        </span> 
    
                        <form id="logout-form{{$data->id}}" action="{{route('app.deletar', ['id' => $data->id])}}" method="POST">
                            @csrf
                            </form>
   
                            <a class="delete" href="#" onclick="event.preventDefault(); document.getElementById('logout-form{{$data->id}}').submit();">X</a>    
                    
                    </div>
                </div>         
                @endforeach
                <div class="bottom">
                    <div class="saldoTotal"><span class="textSaldo">SALDO</span>
                        <span class="valorSaldo" style="color: {{$saldo > 0 ? '#03AC00' : '#C70000'}}">{{$saldo}}</span>
                    </div>
                </div>
                @else
               <div class="textNoRegister">
                Não há registros de
                    entrada ou saída
               </div>
                    @endif
            </div>
                <div class="footerMenu">
                    <div class="adicionar">
                        <a href="{{route('app.entrada' , ['id' => 0])}}"><img class="adicionarImagem" src="/images/mais.png" alt="mais"></a>
                        <span class="textSaida">Nova Entrada</span>
                    </div>
                    <div class="adicionar">
                        <a href="{{route('app.saida', ['id' => 0])}}"><img class="adicionarImagem" src="/images/menos.png" alt="mais"></a>
                        <span class="textSaida"> Nova Saída</span>
                    </div>
                </div>
        </div>
    </div>
    
</body>
</html>

