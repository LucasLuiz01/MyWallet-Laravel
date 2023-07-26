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
                <span class="textBemVindo">Nova Saída</span>
                <a href="{{route('app.menu')}}"><img class="voltar" src="/images/voltar.png" alt="">
                </a>  
            </div>
         <form action="{{route('app.wallet')}}" method="POST">
            @csrf
            <input type="hidden" name="entrada" value='false'>
            <input class="adicionarInput" type="number" placeholder="Valor" name="value" min="1">
            <input class="adicionarInput" type="text" placeholder="Descriçao" name="description" >
            <button class="botaoSalvar" type="submit"> Salvar Entrada</button>
         </form>
        </div>
    </div>
    
</body>
</html>
