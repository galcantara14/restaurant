@extends('navMenu')
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php    
            
            date_default_timezone_set('America/Sao_Paulo');
        ?>
			
        <title>Restaurant</title>        
		<link rel="sortcut icon" href=/shortLogo2.png type="image/png" />
        <!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <!-- CSS -->
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/root.css" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap Select -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">

        <!-- Swiper (se realmente usar) -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

        <!-- JS -->
        <!-- jQuery SEMPRE primeiro -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Bootstrap Select -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

        <!-- Swiper -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <!-- Seus scripts -->
        <script src="/js/base.js"></script>   

        <!-- Flatpickr CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

        <!-- Flatpickr JS -->
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


        <style>
            
       
        </style>
        @yield('head')
    </head>
    <body class="body-welcome">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="pizza.jpg" class="img-fluid" />
                </div>
                <div class="swiper-slide">
                    <img src="lasanha.png" class="img-fluid" />
                </div>
                <div class="swiper-slide">
                    <img src="frango.png" class="img-fluid" />
                </div>
            </div>

            <!-- Botões de navegação -->
            <div class="swiper-button-next" ></div>
            <div class="swiper-button-prev"></div>

            <!-- Paginação -->
            <div class="swiper-pagination"></div>
        </div>
        <!-- Seção Nossa História -->
        <div class="history">
            <div class="row">
                <div class="text-center">
                    <h1 class="text-white">Nossa História</h1>
                    <div class="history-text">                    
                        <p>
                        Tudo começou com uma panela no fogo e uma paixão pela comida feita com alma.
                        </p>

                        <p>
                        Em uma pequena cozinha no interior, entre risos, ingredientes frescos e receitas de família passadas de geração em geração, nasceu o sonho de criar um lugar onde cada refeição fosse um abraço em forma de sabor. Assim surgiu mais do que um restaurante, um refúgio para quem ama comer bem e se sentir em casa.
                        </p>

                        <p>
                        Desde o primeiro dia, nossa missão foi clara: unir ingredientes de qualidade, técnicas tradicionais e um toque de criatividade. Acreditamos que cada prato conta uma história, e por isso, preparamos tudo com cuidado, como se fosse para os nossos.
                        </p>

                        <p>
                        Aqui, cada detalhe importa. Do molho feito na hora à massa artesanal, das carnes bem temperadas às sobremesas de infância, tudo é pensado para proporcionar uma experiência completa — que começa no aroma e termina com aquele gostinho de “quero mais”.
                        </p>

                        <p>
                        Seja bem-vindo. Sinta-se à vontade, escolha sua mesa favorita e aproveite o melhor da nossa cozinha.
                        </p>

                        <p>
                        Porque comer bem é, antes de tudo, um ato de carinho.
                        </p>
                    </div>

                    <div class='col-md-6 offset-md-3 mt-4'>
                        <button type="button" class="btn-outline-secondary reserva-btn"  data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                        Faça sua Reserva
                        </button>
                    </div>

                    <!-- Modal para reservas de mesa -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Reservar</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="reservaForm" method="POST" action="{{ route('reserva') }}">
                                @csrf
                                <div class="modal-body">
                                    <div style='color: #fff;'>
                                        <label> Nome </label>
                                        <input type="text" maxlength="300" name="nomeReserva" id="nomeReserva" class="form-control" style="width: 100%; background-color:transparent;" required>
                                        <label> Telefone </label>
                                        <input type="tel" name="phone" id="phone" class="form-control" style="width: 100%; background-color:transparent;" required>
                                        <label> Email </label>
                                        <input type="email" name="emailReserva" id="emailReserva" class="form-control" style="width: 100%; background-color:transparent;" required>
                                        <label> Data </label>
                                        <input type="text" name="datepicker" id="datepicker" class="form-control" style="width: 100%; background-color:transparent;" required>
                                        <label> Número de Pessoas </label>
                                        <input type="number" name="numPessoasReserva" id="numPessoasReserva" class="form-control" style="width: 100%; background-color:transparent;" min='1' max='10' required>                                
                                    </div>
                                </div>
                                <div class="modal-header">
                                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal" style='background-color: #bf5106; color: #fff;'>Fechar</button>
                                    <button type="submit" class="btn btn-outline-dark" style='background-color: #bf5106; color: #fff;'> Reservar</button>
                                    <div id="reservaMessage" class="mt-2" style='background-color: #bf5106;'></div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    

                    <!-- formulario de contato -->
                    <div class="contact-form mt-5 mb-5">
                        <h2 class="text-white">Entre em Contato</h2>
                        <form action="{{ route('contato') }}" method="post" >
                             @csrf
                            <div class="mb-3">
                                <label for="nome" class="form-label text-white">Nome:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label text-white">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="mensagem" class="form-label text-white">Mensagem:</label>
                                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-outline-dark" style='background-color: #bf5106; color: #fff;'>Enviar</button>
                        </form>
                        <div id="responseMessage" class="mt-3"></div>
                    </div>

                    <!--
                     <!-- seção de comentários 
                    <div id="comments-container">
                        <h2>Avaliações</h2>
                        <div id="comment-form">
                            <input type="text" id="comment-name" placeholder="Seu nome">
                            <textarea id="comment-text" placeholder="Seu comentário"></textarea>
                            <button id="post-comment" style="border-radius:8px; background-color: #cc8758; color: #fff;">Comentar</button>
                        </div>
                        <div id="comment-list">
                            <!-- Comentários serão adicionados aqui pelo JavaScript -
                        </div>
                    </div>-->
                </div>
            </div>
        </div>      



    <!-- Inicialização -->
    <script>
    const swiper = new Swiper(".mySwiper", {
        loop: true,
        autoplay: {
        delay: 5000,
        },
        pagination: {
        el: ".swiper-pagination",
        clickable: true,
        },
        navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
        },
    });

    const input = document.getElementById('numPessoasReserva');
        input.addEventListener('input', function() {
        if (this.value > 10) this.value = 10;
        if (this.value < 1) this.value = 1;
    });

    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })

    window.addEventListener('load', () => {
        const phoneInput = document.querySelector('#phone');
        phoneInput.addEventListener('keydown', disallowNonNumericInput);
        phoneInput.addEventListener('keyup', formatToPhone);
    });

    const disallowNonNumericInput = (evt) => {
        if (evt.ctrlKey) { return; }
        if (evt.key.length > 1) { return; }
        if (/[0-9.]/.test(evt.key)) { return; }
        evt.preventDefault();
    }

    const formatToPhone = (evt) => {
        const digits = evt.target.value.replace(/\D/g,'').substring(0,11);
        const areaCode = digits.substring(0,2);
        const prefix = digits.substring(2,7);
        const suffix = digits.substring(7,11);

        if(digits.length > 6) {evt.target.value = `(${areaCode}) ${prefix} - ${suffix}`;}
        else if(digits.length > 3) {evt.target.value = `(${areaCode}) ${prefix}`;}
        else if(digits.length > 0) {evt.target.value = `(${areaCode}`;}
    };

    // Configuração do Flatpickr
    flatpickr("#datepicker", {
        minDate: "today",
        maxDate: new Date().fp_incr(30), // permite reservas até 1 mês no futuro
        dateFormat: "Y-m-d",
    });


    document.getElementById('reservaForm').addEventListener('submit', function(e){
    e.preventDefault();

        let form = e.target;
        let formData = new FormData(form);
        let token = document.querySelector('input[name="_token"]').value;
        let messageDiv = document.getElementById('reservaMessage');

        // Limpa a mensagem anterior
        messageDiv.innerHTML = ''; 

        fetch("{{ route('reserva') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": token
            },
            body: formData
        })
        .then(response => {
            if (response.ok || response.status === 422) {
                return response.json();
            } else {
                return response.text().then(text => {
                    throw new Error('Erro na requisição! O servidor retornou uma página de erro inesperada.');
                });
            }
        })
        .then(data => {
            if(data.success){
                messageDiv.innerHTML = `<div class="alert alert-success">${data.message}</div>`;
                form.reset();
            } else {
                if(data.errors){
                    let errorsHtml = '<ul>';
                    for(const key in data.errors){
                        data.errors[key].forEach(errorMsg => {
                            errorsHtml += `<li>${errorMsg}</li>`;
                        });
                    }
                    errorsHtml += '</ul>';
                    messageDiv.innerHTML = `<div class="alert alert-danger"><strong>Erro de validação:</strong>${errorsHtml}</div>`;
                } else {
                    messageDiv.innerHTML = `<div class="alert alert-danger">${data.message}</div>`;
                }
            }
        })
        .catch(error => {
            console.error('Falha na comunicação:', error);
            messageDiv.innerHTML = `<div class="alert alert-danger"><strong>Erro:</strong> ${error.message}</div>`;
        });
    });

    // JavaScript para a seção de comentários
    document.getElementById('post-comment').addEventListener('click', function() {
        const nameInput = document.getElementById('comment-name');
        const textInput = document.getElementById('comment-text');
        const commentList = document.getElementById('comment-list');

        const userName = nameInput.value;
        const userComment = textInput.value;

        if (userName && userComment) {
            const newComment = document.createElement('div');
            newComment.classList.add('comment');
            newComment.innerHTML = `<strong>${userName}:</strong> ${userComment}`;
            commentList.prepend(newComment); // Adiciona no topo da lista

            nameInput.value = ''; // Limpa o campo de nome
            textInput.value = ''; // Limpa o campo de texto
        } else {
            alert('Por favor, preencha seu nome e comentário.');
        }
    });

    //formulário de contato
    document.getElementById("contactForm").addEventListener("submit", async function(e) {
        e.preventDefault(); // não deixa recarregar a página

        let form = e.target;
        let formData = new FormData(form);

        try {
            let response = await fetch(form.action, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": form.querySelector('input[name="_token"]').value
                },
                body: formData
            });

            let data = await response.json();

            let msgDiv = document.getElementById("responseMessage");
            if (data.success) {
                msgDiv.innerHTML = `<div class="alert alert-success">${data.message}</div>`;
                form.reset(); // limpa o formulário
            } else {
                msgDiv.innerHTML = `<div class="alert alert-danger">${data.message}</div>`;
            }

        } catch (error) {
            document.getElementById("responseMessage").innerHTML =
                `<div class="alert alert-danger">Erro inesperado. Tente novamente.</div>`;
            console.error(error);
        }
    });

    </script>

    </body>
</html>
