<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SolarTech</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/logoProjetoSolarTechSemTexto.svg') }}" rel="icon">


    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- dataTable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="{{ route('home') }}">
                    <img src="{{ asset('assets/img/logoProjetoSolarTechSemTexto preto.svg') }}"
                        alt="Logo SolarTech Preto" class="img-fluid">
                    SolarTech
                </a></h1>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="{{ route('home') }}">Home</a></li>

                    @if (Auth::check() && Auth::user()->name !== null)
                        <li class="dropdown">
                            <a href="#"><span>{{ Auth::user()->name }}</span> <i
                                    class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a onclick='$("#PerfilModal").modal("show")'>Atualizar Dados</a></li>
                            </ul>
                        </li>
                    @else
                        <li><a class="nav-link scrollto " id="login" href="{{ route('login.google') }}">Login</a>
                        </li>
                    @endif

                    @if (auth()->check() && auth()->user()->cep == null)
                        <li id="atualizarDados"><a data-bs-toggle="modal" data-bs-target="#cepModal"
                                class="btn">Atualizar CPF</a></li>
                    @endif
                    @if (auth()->check())
                        <li><a data-bs-toggle="modal" data-bs-target="#comprasModal" class="btn">Minhas Compras</a> 
                        </li>
                 
                   <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout<i class="bi bi-box-arrow-right"></i></a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endif
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header>

    <!-- End Header -->

    <!-- ======= Hero Section ======= -->

    <section id="hero" class="clearfix">
        @if (session('error'))
            <div class="alert alert-danger" id="error">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success" id="success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container d-flex h-100">
            <div class="row justify-content-center align-self-center" data-aos="fade-up">
                <div class="col-lg-6 intro-info order-lg-first order-last" data-aos="zoom-in" data-aos-delay="100">
                    <h2>Transformando o Sol <br>em Energia para o Seu <span>Lar!</span></h2>
                    <div>
                        <a href="#pricing" class="btn-get-started scrollto" dusk="gs">Adquira Já</a>
                    </div>
                </div>

                <div class="col-lg-5 intro-img order-lg-last order-first" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('assets/img/logoProjetoSolarTech.png') }}" alt="Logo SolarTech"
                        class="img-fluid">
                </div>
            </div>

        </div>
    </section>
    <!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">

            <div class="container" data-aos="fade-up">
                <div class="row">

                    <div class="col-lg-5 col-md-6">
                        <div class="about-img" data-aos="fade-right" data-aos-delay="100">
                            <img src="assets/img/about-img.jpg" alt="">
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-6">
                        <div class="about-content" data-aos="fade-left" data-aos-delay="100">
                            <h2>Quem Somos?</h2>
                            <h3>Somos a SolarTech, uma empresa apaixonada por tornar a energia solar acessível a todos.
                                Acreditamos que a sustentabilidade e a independência energética não são luxos, mas
                                direitos de todos os lares.</h3>
                            <p>Nossa jornada começou com a visão de um futuro mais limpo e econômico, onde cada casa
                                pudesse gerar sua própria eletricidade a partir do sol. Desde então, dedicamos nossos
                                esforços a criar soluções personalizadas de energia solar que se encaixam nas
                                necessidades de nossos clientes.</p>
                            <p>Nossa equipe é composta por especialistas em energia solar altamente qualificados,
                                comprometidos em fornecer os sistemas mais eficientes e confiáveis. Cada projeto que
                                empreendemos é tratado com cuidado e atenção aos detalhes, garantindo que sua transição
                                para a energia solar seja tranquila e econômica.</p>
                            <ul>
                                <li><i class="bi bi-check-circle"></i> Especialistas altamente qualificados em energia
                                    solar</li>
                                <li><i class="bi bi-check-circle"></i> Sistemas de energia solar adaptados às
                                    necessidades específicas de cada cliente.</li>
                                <li><i class="bi bi-check-circle"></i> Dedicados a promover um futuro mais limpo e
                                    sustentável por meio da energia solar</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </section>


        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container-fluid" data-aos="fade-up">

                <header class="section-header">
                    <h3>Porque nos escolher?</h3>
                    <p>Na SolarTech, oferecemos muito mais do que apenas sistemas de energia solar. Oferecemos a você a
                        oportunidade de fazer parte de um futuro mais sustentável e econômico.</p>
                </header>

                <div class="row">

                    <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
                        <div class="why-us-img">
                            <img src="assets/img/why-us.jpg" alt="" class="img-fluid">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="why-us-content">
                            <div class="features clearfix" data-aos="fade-up" data-aos-delay="100">
                                <i class="bi bi-bookmarks" style="color: #f058dc;"></i>
                                <h4>Experiência e Conhecimento</h4>
                                <p>Nossa equipe é composta por especialistas em energia solar altamente experientes,
                                    prontos para criar a solução perfeita para suas necessidades específicas.</p>
                            </div>

                            <div class="features clearfix" data-aos="fade-up" data-aos-delay="200">
                                <i class="bi bi-box-seam" style="color: #ffb774;"></i>
                                <h4>Parceria de Longo Prazo</h4>
                                <p>Quando você escolhe a SolarEnergia, está escolhendo uma parceria duradoura. Estamos
                                    comprometidos em acompanhá-lo em sua jornada de energia solar e a contribuir para
                                    seu sucesso contínuo.</p>
                            </div>

                            <div class="features clearfix" data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-card-checklist" style="color: #589af1;"></i>
                                <h4>Transparência e Educação</h4>
                                <p>Queremos que você compreenda completamente o funcionamento de seu sistema solar e os
                                    benefícios que ele oferece. Estamos aqui para responder a todas as suas perguntas e
                                    ajudá-lo a tomar decisões informadas.</p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>


        </section>


        <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing section-bg wow fadeInUp">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h3>Preços</h3>
                </header>
                <div class="row flex-items-xs-middle flex-items-xs-center" dusk='pricingSection'>

                    <!-- Basic Plan  -->
                    <div class="col-xs-12 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="card" id="escolherPlanoBasico">
                            <div class="card-header">
                                <h3><span class="currency">R$</span>3.300<span class="period"></span></h3>
                            </div>
                            <div class="card-block">
                                <h4 class="card-title">
                                    Pacote Básico
                                </h4>
                                <ul class="list-group">
                                    <li class="list-group-item" id="cudeburra">3 Painéis Solares (Módulos
                                        Fotovoltaicos)</li>
                                </ul>
                                @if (auth()->check() && auth()->user()->cep == null)
                                    <a data-bs-toggle="modal" data-bs-target="#cepModal" id="CompraBasico"
                                        class="btn">Escolher
                                        Plano</a>
                                @else
                                    <a data-bs-toggle="modal" data-bs-target="#basicPlanModal" id="CompraBasico"
                                        class="btn" dusk='escolherPlanoBasico'>Escolher Plano</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- End Basic Plan  -->

                    <!-- Regular Plan  -->
                    <div class="col-xs-12 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                        <div class="card">
                            <div class="card-header">
                                <h3><span class="currency">R$</span>6.600<span class="period"></span></h3>
                            </div>
                            <div class="card-block">
                                <h4 class="card-title">
                                    Pacote Médio
                                </h4>
                                <ul class="list-group">
                                    <li class="list-group-item">6 Painéis Solares (Módulos Fotovoltaicos)</li>
                                </ul>
                                @if (auth()->check() && auth()->user()->cep == null)
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#cepModal"
                                        class="btn">Escolher Plano</a>
                                @else
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#regularPlanModal"
                                        class="btn">Escolher Plano</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- End Regular Plan  -->

                    <!-- Premium Plan  -->
                    <div class="col-xs-12 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                        <div class="card">
                            <div class="card-header">
                                <h3><span class="currency">R$</span>9.900<span class="period"></span></h3>
                            </div>
                            <div class="card-block">
                                <h4 class="card-title">
                                    Pacote Premium
                                </h4>
                                <ul class="list-group">
                                    <li class="list-group-item">9 Painéis Solares (Módulos Fotovoltaicos)</li>
                                </ul>
                                @if (auth()->check() && auth()->user()->cep == null)
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#cepModal"
                                        class="btn">Escolher Plano</a>
                                @else
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#premiunPlanModal"
                                        class="btn">Escolher Plano</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- end Premium Plan  -->

                    <!-- custom Plan  -->
                    <div class="col-xs-12 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                        <div class="card">
                            <div class="card-header">
                                <h3><span class="currency">R$</span>x.xxx<span class="period"></span></h3>
                            </div>
                            <div class="card-block">
                                <h4 class="card-title">
                                    Pacote Personalizado
                                </h4>
                                <ul class="list-group">
                                    <li class="list-group-item">X Painéis Solares (Módulos Fotovoltaicos)</li>
                                </ul>
                                @if (auth()->check() && auth()->user()->cep == null)
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#cepModal"
                                        class="btn">Escolher Plano</a>
                                @else
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#customPlanModal"
                                        class="btn">Escolher Plano</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- end custom Plan  -->

                    <!------------------- MODALS ------------------->
                    <!-- verificar de tem cep -->
                    @if (auth()->check() && auth()->user()->cep == null)
                        <div class="modal fade" id="cepModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Conteúdo do modal vai aqui -->
                                        <section id="economy">
                                            <h1>Nos Informe Seu Cep e Cpf</h1>
                                            <form id="cepModalForm" method="post" action="{{ route('saveCep') }}">
                                                @csrf
                                                <label for="cepUsuario"> Cep: </label>
                                                <input type="text" id="cepUsuario" name="cepUsuario" required>
                                                <br>
                                                <label for="cepUsuario"> Cpf: </label>
                                                <input type="text" id="cpfUsuario" name="cpfUsuario" required>
                                                <button type="submit" id="confirmaDados">Confirmar</button>
                                            </form>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- verificar de tem cep -->

                    <!-- tabela de minhas compras -->
                    @if (auth()->check())
                        <div class="modal fade bd-example-modal-lg" id="comprasModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Conteúdo do modal vai aqui -->
                                        <section id="economy">
                                            <h1>Minhas Compras</h1>
                                            <table id="tableMinhasCompras">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Pacote Escolhido</th>
                                                        <th>Quatidade de Placas</th>
                                                        <th>Valor</th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (isset($vendas))
                                                        @foreach ($vendas as $item)
                                                            <tr>
                                                                <th>{{ $item['id'] }}</th>
                                                                <th>{{ $item['nomePacote'] }}</th>
                                                                <th>{{ $item['quantidadePlacas'] }}</th>
                                                                <th>R$
                                                                    {{ number_format($item['valorFinal'], 2, ',', '.') }}
                                                                </th>
                                                                <th><button class="btn btn-success"
                                                                        onclick="buscarFatura({{ $item['id'] }})">Gerar
                                                                        Fatura</button></th>
                                                                <th><button class="btn btn-danger"
                                                                        onclick="deletarCompra({{ $item['id'] }})">Deletar
                                                                        Compra</button></th>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- tabela de minhas compras -->

                    <!-- basic Modal -->
                    <div class="modal fade" id="basicPlanModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Finalizar Compra</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Conteúdo do modal vai aqui -->
                                    <section id="economy">
                                        <h1>Plano Basico</h1>
                                        <h2>Confirme Seus Dados e Finalize Sua Compra</h2>

                                        <form id="basicModalForm" method="post"
                                            action="{{ route('finalizarCompra') }}">
                                            @csrf
                                            <label for="planoEscolhido"> Plano Escolhido: </label>
                                            <input type="text" id="planoEscolhido" name="planoEscolhido"
                                                value="{{ $pacotes[0]->nomePacote }}" readonly>
                                            @if (auth()->check() && isset(Auth::user()->id))
                                                <input type="hidden" name="id_usuario"
                                                    value="{{ Auth::user()->id }}">
                                            @endif
                                            <br>

                                            <label for="quantidade"> Quantidade de placas: </label>
                                            <input type="number" id="quantidade" name="quantidade"
                                                value="{{ $pacotes[0]->quantidadePlacas }}" readonly>

                                            <br>

                                            <label for="valorFinal"> Valor Final: </label>
                                            <input type="number" id="valorFinal" name="valorFinal"
                                                value="{{ $pacotes[0]->valorFinal }}" readonly>

                                            <br>

                                            <label for="logradouro"> logradouro </label>
                                            @if (Auth::check() && Auth::user()->name !== null)
                                                <input type="text" id="logradouro" name="logradouro"
                                                    value="{{ Auth::user()->logradouro }}" required>
                                            @else
                                                <input type="text" id="logradouro" name="logradouro"
                                                    value="" required>
                                            @endif

                                            <br>

                                            <label for="numero_casa"> numero da casa </label>
                                            @if (Auth::check() && Auth::user()->name !== null)
                                                <input type="number" id="numero_casa" name="numero_casa"
                                                    value="{{ Auth::user()->numero_casa }}" required>
                                            @else
                                                <input type="number" id="numero_casa" name="numero_casa"
                                                    value="" required>
                                            @endif

                                            <br>

                                            <label for="bairro"> bairro </label>
                                            @if (Auth::check() && Auth::user()->name !== null)
                                                <input type="text" id="bairro" name="bairro"
                                                    value = "{{ Auth::user()->bairro }}" required>
                                            @else
                                                <input type="text" id="bairro" name="bairro" value = ""
                                                    required>
                                            @endif

                                            <br>

                                            <label for="cidade"> cidade </label>
                                            @if (Auth::check() && Auth::user()->name !== null)
                                                <input type="text" id="cidade" name="cidade"
                                                    value="{{ Auth::user()->cidade }}" required>
                                            @else
                                                <input type="text" id="cidade" name="cidade" value=""
                                                    required>
                                            @endif

                                            <br>

                                            <label for="estado"> estado </label>
                                            @if (Auth::check() && Auth::user()->name !== null)
                                                <input type="text" id="estado" name="estado"
                                                    value="{{ Auth::user()->estado }}" required>
                                            @else
                                                <input type="text" id="estado" name="estado" value=""
                                                    required>
                                            @endif

                                            <br>

                                            <button type="submit" dusk='finalizarCompraBasico'
                                                id="finalizarCompraBasico">Finalizar
                                                Compra</button>
                                        </form>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end basic Modal -->

                    <!-- regular Modal -->
                    <div class="modal fade" id="regularPlanModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Finalizar Compra</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Conteúdo do modal vai aqui -->
                                    <section id="economy">
                                        <h1>Plano Médio</h1>
                                        <h2>Confirme Seus Dados e Finalize Sua Compra</h2>
                                        <form id="regularModalForm" method="post"
                                            action="{{ route('finalizarCompra') }}">
                                            @csrf
                                            <label for="planoEscolhido"> Plano Escolhido: </label>
                                            <input type="text" id="planoEscolhido" name="planoEscolhido"
                                                value="{{ $pacotes[1]->nomePacote }}" readonly>
                                            @if (auth()->check() && isset(Auth::user()->id))
                                                <input type="hidden" name="id_usuario"
                                                    value="{{ Auth::user()->id }}">
                                            @endif
                                            <br>

                                            <label for="quantidade"> Quantidade de placas: </label>
                                            <input type="number" id="quantidade" name="quantidade"
                                                value="{{ $pacotes[1]->quantidadePlacas }}" readonly>

                                            <br>

                                            <label for="valorFinal"> Valor Final: </label>
                                            <input type="number" id="valorFinal" name="valorFinal"
                                                value="{{ $pacotes[1]->valorFinal }}" readonly>

                                            <br>

                                            
                                            <label for="logradouro"> logradouro </label>
                                            @if (Auth::check() && Auth::user()->name !== null)
                                                <input type="text" id="logradouro" name="logradouro"
                                                    value="{{ Auth::user()->logradouro }}" required>
                                            @else
                                                <input type="text" id="logradouro" name="logradouro"
                                                    value="" required>
                                            @endif

                                            <br>

                                            <label for="numero_casa"> numero da casa </label>
                                            @if (Auth::check() && Auth::user()->name !== null)
                                                <input type="number" id="numero_casa" name="numero_casa"
                                                    value="{{ Auth::user()->numero_casa }}" required>
                                            @else
                                                <input type="number" id="numero_casa" name="numero_casa"
                                                    value="" required>
                                            @endif

                                            <br>

                                            <label for="bairro"> bairro </label>
                                            @if (Auth::check() && Auth::user()->name !== null)
                                                <input type="text" id="bairro" name="bairro"
                                                    value = "{{ Auth::user()->bairro }}" required>
                                            @else
                                                <input type="text" id="bairro" name="bairro" value = ""
                                                    required>
                                            @endif

                                            <br>

                                            <label for="cidade"> cidade </label>
                                            @if (Auth::check() && Auth::user()->name !== null)
                                                <input type="text" id="cidade" name="cidade"
                                                    value="{{ Auth::user()->cidade }}" required>
                                            @else
                                                <input type="text" id="cidade" name="cidade" value=""
                                                    required>
                                            @endif

                                            <br>

                                            <label for="estado"> estado </label>
                                            @if (Auth::check() && Auth::user()->name !== null)
                                                <input type="text" id="estado" name="estado"
                                                    value="{{ Auth::user()->estado }}" required>
                                            @else
                                                <input type="text" id="estado" name="estado" value=""
                                                    required>
                                            @endif

                                            <br>


                                            <button type="submit" data-bs-dismiss="modal"
                                                aria-label="Close">Finalizar Compra</button>
                                        </form>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end regular Modal -->

                    <!-- premiun Modal -->
                    <div class="modal fade" id="premiunPlanModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Finalizar Compra</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Conteúdo do modal vai aqui -->
                                    <section id="economy">
                                        <h1>Plano Premiun</h1>
                                        <h2>Confirme Seus Dados e Finalize Sua Compra</h2>

                                        <form id="premiunModalForm" method="post"
                                            action="{{ route('finalizarCompra') }}">
                                            @csrf
                                            <label for="planoEscolhido"> Plano Escolhido: </label>
                                            <input type="text" id="planoEscolhido" name="planoEscolhido"
                                                value="{{ $pacotes[2]->nomePacote }}" readonly>
                                            @if (auth()->check() && isset(Auth::user()->id))
                                                <input type="hidden" name="id_usuario"
                                                    value="{{ Auth::user()->id }}">
                                            @endif
                                            <br>

                                            <label for="quantidade"> Quantidade de placas: </label>
                                            <input type="number" id="quantidade" name="quantidade"
                                                value="{{ $pacotes[2]->quantidadePlacas }}" readonly>

                                            <br>

                                            <label for="valorFinal"> Valor Final: </label>
                                            <input type="number" id="valorFinal" name="valorFinal"
                                                value="{{ $pacotes[2]->valorFinal }}" readonly>

                                            <br>

                                            

                                            <label for="logradouro"> logradouro </label>
                                            @if (Auth::check() && Auth::user()->name !== null)
                                                <input type="text" id="logradouro" name="logradouro"
                                                    value="{{ Auth::user()->logradouro }}" required>
                                            @else
                                                <input type="text" id="logradouro" name="logradouro"
                                                    value="" required>
                                            @endif

                                            
                                            <br>

                                            <label for="numero_casa"> numero da casa </label>
                                            @if (Auth::check() && Auth::user()->name !== null)
                                                <input type="number" id="numero_casa" name="numero_casa"
                                                    value="{{ Auth::user()->numero_casa }}" required>
                                            @else
                                                <input type="number" id="numero_casa" name="numero_casa"
                                                    value="" required>
                                            @endif

                                            <br>

                                            <label for="bairro"> bairro </label>
                                            @if (Auth::check() && Auth::user()->name !== null)
                                                <input type="text" id="bairro" name="bairro"
                                                    value = "{{ Auth::user()->bairro }}" required>
                                            @else
                                                <input type="text" id="bairro" name="bairro" value = ""
                                                    required>
                                            @endif

                                            <br>

                                            <label for="cidade"> cidade </label>
                                            @if (Auth::check() && Auth::user()->name !== null)
                                                <input type="text" id="cidade" name="cidade"
                                                    value="{{ Auth::user()->cidade }}" required>
                                            @else
                                                <input type="text" id="cidade" name="cidade" value=""
                                                    required>
                                            @endif

                                            <br>

                                            <label for="estado"> estado </label>
                                            @if (Auth::check() && Auth::user()->name !== null)
                                                <input type="text" id="estado" name="estado"
                                                    value="{{ Auth::user()->estado }}" required>
                                            @else
                                                <input type="text" id="estado" name="estado" value=""
                                                    required>
                                            @endif

                                            <br>


                                            <button type="submit" data-bs-dismiss="modal"
                                                aria-label="Close">Finalizar Compra</button>
                                        </form>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end premiun Modal -->

                    <!-- custom Plam Modal -->
                    <div class="modal fade" id="customPlanModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Finalizar Compra</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Conteúdo do modal vai aqui -->
                                    <section id="economy">
                                        <h1>Plano Personalizado</h1>
                                        <h2>Monte Seu Plano Personalizado</h2>

                                        <form id="customPlanModalForm">

                                            <label for="pacotesCustom">
                                                Escolha seu Pacote Base
                                                <br>
                                                <span class="subtitulo">(a base do pacote ira definir a qualidade dos
                                                    demais itens)</span>
                                            </label>
                                            <select id="pacotesCustom" name="pacotesCustom">
                                                @foreach ($pacotes as $pacote)
                                                    <option value="{{ $pacote->quantidadePlacas }}">
                                                        {{ $pacote->nomePacote }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <br>

                                            <label for="quantidadeCustom">
                                                Quantidade de placas:
                                                <br>
                                                <span class="subtitulo">(Informe o Numero de Placas Desejadas Para o
                                                    Pacote)</span>
                                            </label>
                                            <input type="number" id="quantidadeCustom" name="quantidadeCustom"
                                                required>

                                            <br>

                                            <button type="submit">Montar Pacote</button>
                                        </form>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end custom Plam Modal -->

                    <!-- finalizar compra custom plan modal -->
                    <div class="modal fade" id="finalCustomPlanModal" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Finalizar Compra</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Conteúdo do modal vai aqui -->
                                    <section id="economy">
                                        <h1>Plano Personalizado</h1>
                                        <h2>Confirme Seus Dados e Finalize Sua Compra</h2>

                                        <form id="customPlanModalForm" method="post"
                                            action="{{ route('finalizarCompra') }}">
                                            @csrf
                                            <label for="pacoteEscohido">
                                                Pacote Base Escolhido :
                                                <br>
                                                <span class="subtitulo">(a base do pacote ira definir a qualidade dos
                                                    demais itens)</span>
                                            </label>
                                            <input type="text" id="pacoteEscohido" name="pacoteEscohido" readonly>

                                            @if (auth()->check() && isset(Auth::user()->id))
                                                <input type="hidden" name="id_usuario"
                                                    value="{{ Auth::user()->id }}">
                                            @endif

                                            <input type="hidden" name="nome" value="personalizado">

                                            <br>

                                            <label for="quantidadeEscolhida">
                                                Quantidade de placas Escolhida :
                                                <br>
                                                <span class="subtitulo">(Informe o Numero de Placas Desejadas Para o
                                                    Pacote)</span>
                                            </label>
                                            <input type="number" id="quantidadeEscolhida" name="quantidadeEscolhida"
                                                readonly>

                                            <br>

                                            

                                            <label for="logradouro"> logradouro </label>
                                            @if (Auth::check() && Auth::user()->name !== null)
                                                <input type="text" id="logradouro" name="logradouro"
                                                    value="{{ Auth::user()->logradouro }}" required>
                                            @else
                                                <input type="text" id="logradouro" name="logradouro"
                                                    value="" required>
                                            @endif

                                            <br>

                                            <label for="numero_casa"> numero da casa </label>
                                            @if (Auth::check() && Auth::user()->name !== null)
                                                <input type="number" id="numero_casa" name="numero_casa"
                                                    value="{{ Auth::user()->numero_casa }}" required>
                                            @else
                                                <input type="number" id="numero_casa" name="numero_casa"
                                                    value="" required>
                                            @endif

                                            <br>

                                            <label for="bairro"> bairro </label>
                                            @if (Auth::check() && Auth::user()->name !== null)
                                                <input type="text" id="bairro" name="bairro"
                                                    value = "{{ Auth::user()->bairro }}" required>
                                            @else
                                                <input type="text" id="bairro" name="bairro" value = ""
                                                    required>
                                            @endif

                                            <br>

                                            <label for="cidade"> cidade </label>
                                            @if (Auth::check() && Auth::user()->name !== null)
                                                <input type="text" id="cidade" name="cidade"
                                                    value="{{ Auth::user()->cidade }}" required>
                                            @else
                                                <input type="text" id="cidade" name="cidade" value=""
                                                    required>
                                            @endif

                                            <br>

                                            <label for="estado"> estado </label>
                                            @if (Auth::check() && Auth::user()->name !== null)
                                                <input type="text" id="estado" name="estado"
                                                    value="{{ Auth::user()->estado }}" required>
                                            @else
                                                <input type="text" id="estado" name="estado" value=""
                                                    required>
                                            @endif

                                            <br>

                                            <button type="submit">Finalizar Compra</button>
                                        </form>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end finalizar compra custom plan modal -->

                    <!-- tabela de minhas compras -->

                    <div class="modal fade" id="faturaModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Conteúdo do modal vai aqui -->
                                    <section id="economy">
                                        <h1>Fatura</h1>
                                        <table id="tableFatura" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Status Pagamento</th>
                                                    <th>Valor</th>
                                                    <th>Opção</th>
                                                </tr>
                                            </thead>
                                            <tbody id='tableFaturaBody'>

                                            </tbody>
                                        </table>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- tabela de minhas compras -->

                    <!-- perfil do usuario -->
                    @if (Auth::check())
                        <div class="modal fade" id="PerfilModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Conteúdo do modal vai aqui -->
                                        <section id="economy">
                                            <h1>Atualizar Dados</h1>
                                            <h1>Olá, {{ auth()->user()->name }} !</h1>
                                            <form id="cepModalForm" method="post" action="{{ route('saveCep') }}">
                                                @csrf
                                                <label for="cepUsuario"> Cep: </label>
                                                <input type="text" id="cepUsuario" name="cepUsuario" required>
                                                <br>
                                                <label for="cepUsuario"> Cpf: </label>
                                                <input type="text" id="cpfUsuario" name="cpfUsuario" required>
                                                <button type="submit">Confirmar</button>
                                            </form>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- perfil do usuario -->


                    <!------------------- END MODALS ------------------->

                </div>
            </div>

        </section>
        <!-- ======= End Pricing Section ======= -->

        <!-- ======= Budget Section ======= -->
        <section id="budget" dusk="BudgetSection">
            <h1>Orçamento</h1>
            <h2>Faça aqui seu orçamento</h2>

            <form id="budget-form" method="POST">
                @csrf
                <label for="valorPacote">Escolha Seu Pacote:</label>
                <select id="valorPacote" name="valorPacote">
                    @foreach ($pacotes as $pacote)
                        <option value="{{ $pacote->valorFinal }}">{{ $pacote->nomePacote }}</option>
                    @endforeach
                </select>
                <br>
                <label for="quantidadeAdicionalPlaca">
                    Quantidade de placas adicionais:
                    <br>
                    <span class="subtitulo">(Informe o Numero de Placas Adicionais Desejadas)</span>
                </label>
                <input type="number" id="quantidadeAdicionalPlaca" name="quantidadeAdicionalPlaca" required>
                <br>
                <button type="submit" dusk="enviarBudget">Enviar</button>
                <br />
                <span type="number" id="resultado" dusk="resultado" name="resultado" readonly></span>
            </form>
        </section>
        <!-- ======= End Budget Section ======= -->

        <!-- ======= economy Section ======= -->
        <section id="economy" dusk="EconomySection">
            <h1>Economia / Simulação</h1>
            <h2>Calcule aqui o melhor plano e a quantidade de placas adicionais para atender a sua demanda</h2>

            <form id="economy-form">
                <label for="quantidadePlacas">Escolha o pacote:</label>
                <select id="quantidadePlacas" name="quantidadePlacas">
                    @foreach ($pacotes as $pacote)
                        <option value="{{ $pacote->quantidadePlacas }}">{{ $pacote->nomePacote }}</option>
                    @endforeach
                </select>

                <br>
                <label for="quantidadeAdicional">
                    Quantidade de placas adicionais:
                    <br>
                    <span class="subtitulo">(Caso adquira mais placas além das que vêm no pacote)</span>
                </label>
                <input type="number" id="quantidadeAdicional" name="quantidadeAdicional" required>

                <br>
                <label for="consumoMedio">
                    Consumo Medio(kWh):
                    <br>
                    <span class="subtitulo">(Informe o consumo médio da sua residência.)</span>
                </label>
                <input type="number" id="consumoMedio" name="consumoMedio" required>

                <br>
                <button type="submit" dusk="enviarEconomy">Enviar</button>
                <br>
                <span id="economyOutput"></span>
            </form>
        </section>
        <!-- ======= End economy Section ======= -->

        <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h3>Perguntas Frequentes</h3>

                </header>

                <ul class="faq-list" data-aso="fade-up" data-aos-delay="100">

                    <li>
                        <div data-bs-toggle="collapse" class="collapsed question" href="#faq1"> Como funciona a
                            instalação de energia solar em minha residência?<i
                                class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                        </div>
                        <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Nossa equipe de especialistas em energia solar fará uma avaliação completa de sua
                                residência para determinar o melhor local para a instalação dos painéis solares. Em
                                seguida, instalaremos os painéis, o inversor e todos os componentes necessários para
                                garantir um sistema eficiente. Após a instalação, você estará gerando sua própria
                                eletricidade limpa a partir da luz do sol.
                            </p>
                        </div>
                    </li>

                    <li>
                        <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Quais são os
                            benefícios de adotar energia solar? <i class="bi bi-chevron-down icon-show"></i><i
                                class="bi bi-chevron-up icon-close"></i></div>
                        <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                A energia solar oferece diversos benefícios, incluindo a redução significativa nas
                                contas de eletricidade, a redução da pegada de carbono, o aumento do valor da
                                propriedade e a independência em relação às oscilações nas tarifas de energia elétrica.
                            </p>
                        </div>
                    </li>

                    <li>
                        <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Quanto tempo dura a
                            vida útil dos painéis solares? <i class="bi bi-chevron-down icon-show"></i><i
                                class="bi bi-chevron-up icon-close"></i></div>
                        <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Os painéis solares têm uma vida útil média de 25 a 30 anos. Ao longo desse período, eles
                                geralmente mantêm uma alta eficiência na geração de energia.
                            </p>
                        </div>
                    </li>

                    <li>
                        <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Os painéis solares
                            requerem manutenção regular?<i class="bi bi-chevron-down icon-show"></i><i
                                class="bi bi-chevron-up icon-close"></i></div>
                        <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                A manutenção de sistemas solares é mínima. Recomendamos a limpeza ocasional dos painéis
                                para remover poeira e sujeira, bem como inspeções regulares para garantir que todos os
                                componentes estejam funcionando corretamente. Oferecemos serviços de manutenção para
                                garantir o desempenho ideal do seu sistema.
                            </p>
                        </div>
                    </li>

                    <li>
                        <div data-bs-toggle="collapse" href="#faq5" class="collapsed question"> É possível
                            armazenar energia solar para uso noturno ou em dias nublados? <i
                                class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                        </div>
                        <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Sim, é possível adicionar um sistema de armazenamento de bateria ao seu sistema solar
                                para armazenar o excesso de energia gerada durante o dia para uso à noite ou em momentos
                                de pouca luz solar.
                            </p>
                        </div>
                    </li>

                    <li>
                        <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Qual é o prazo
                            típico de retorno do investimento (ROI) ao adotar energia solar?<i
                                class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                        </div>
                        <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                O prazo de ROI varia dependendo do tamanho do sistema, das tarifas de energia elétrica
                                locais e dos incentivos fiscais disponíveis. Em média, muitos clientes veem um retorno
                                de investimento em 5 a 7 anos, mas isso pode ser mais curto com incentivos fiscais e
                                subsídios locais.
                            </p>
                        </div>
                    </li>

                </ul>

            </div>
        </section>
        <!-- ======= End F.A.Q Section ======= -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="section-bg">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong>SolarTech</strong>. All Rights Reserved
            </div>
        </div>
    </footer>
    <!-- End  Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        let table = new DataTable('#tableMinhasCompras');
        //let table = new DataTable('#tableMinhasCompras');
    </script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/home.js"></script>

</body>

</html>
