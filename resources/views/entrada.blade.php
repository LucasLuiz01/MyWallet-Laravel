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
                @if($walletData->count() > 0)
                <span class="textBemVindo">Editar Entrada</span>
                @else
                <span class="textBemVindo">Nova Entrada</span>
                @endif
              <a href="{{route('app.menu')}}"><img class="voltar" src="/images/voltar.png" alt="">
                </a>  
            </div>
         <form action="{{$walletData->count() > 0 ?route('app.edit', ['id' => $walletData[0]->id]):route('app.wallet')}}" method="POST">
            @csrf
            @if($walletData->count() > 0)
           @method('PUT')
            @endif
            <input type="hidden" name="entrada" value='true'>
            <input class="adicionarInput" type="number" placeholder="Valor" name="value" min="1" value="{{isset($walletData[0]->valor) ? $walletData[0]->valor : ''}}">
            <input class="adicionarInput" type="text" placeholder="Descriçao" name="description" value="{{isset($walletData[0]->description) ? $walletData[0]->description : ''}}" >
            @if($walletData->count() > 0)
            <button class="botaoSalvar" type="submit"> Atualizar Entrada</button>
            @else
            <button class="botaoSalvar" type="submit"> Salvar Entrada</button>
            @endif
         </form>
        </div>
    </div>
    
</body>
</html>
