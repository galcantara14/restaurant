@extends('navMenu')
@section('title', 'Cardapio')

@section('head')
  <link rel="sortcut icon" href=/shortLogo.png type="image/png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- CSS -->
  <link href="/css/app.css" rel="stylesheet">
  <link href="/css/root.css" rel="stylesheet">
  <script src="/js/base.js"></script>
 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
 <style>
    body {
      background-color: #703310;
      justify-content: center;
      font-family: 'Arial black', sans-serif;   
      padding-top: 80px; 
          
    }
  
  </style>

@endsection

@section('content')
    @csrf
 
<div class="menu-container">    
  <div class="menu-flyer">
    <h2 class="text-center section-title">CARDAPIO</h2>

    <div>        
      <h4 class="text-center">PRATOS</h4>
      
      @for ($c = 0; $c < sizeof($cardapio['comidas']); $c++)

          <div class="menu-item d-flex justify-content-between align-items-center">
              <div class="me-3 flex-grow-1"> 
                  <div class="item-title">{{$cardapio['comidas'][$c]['nome']}}</div>
                  <div class='item-desc'>{{$cardapio['comidas'][$c]['descricao']}}</div>
              </div>
              <div class="price-circle">R${{number_format($cardapio['comidas'][$c]['preco'],0,",",".")}}</div>
          </div>
      @endfor
        

      <h4 class="text-center">SOBREMESAS</h4> 

      @for ($c = 0; $c < sizeof($cardapio['sobremesas']); $c++)
          <div class="menu-item d-flex justify-content-between">                
              <div class="me-3">
                  <div class="item-title">{{$cardapio['sobremesas'][$c]['nome']}}</div>
                  <div class='item-desc'>{{$cardapio['sobremesas'][$c]['descricao']}}</div>
              </div>
              <div class="price-circle">R${{number_format($cardapio['sobremesas'][$c]['preco'],0,",",".")}}</div>
          </div>
      @endfor
            
  
      <h4 class="text-center">BEBIDAS</h4>

    
      @for ($c = 0; $c < sizeof($cardapio['bebidas']); $c++)
          <div class="menu-item d-flex justify-content-between">                
              <div class="me-3">
                  <div class="item-title">{{$cardapio['bebidas'][$c]['nome']}}</div>
                  <div class='item-desc'>{{$cardapio['bebidas'][$c]['descricao']}}</div>
              </div>
              <div class="price-circle">R${{number_format($cardapio['bebidas'][$c]['preco'],0,",",".")}}</div>
              
          </div>        
      @endfor

      <div class="text-center contact mt-5">
          <p>📞 DELIVERY: (12) 3456-7890</p>
          <p>📍 Rua Alegre, 123 - Cidade Brasileira</p>
      </div>
    </div>  
  </div>
</div>