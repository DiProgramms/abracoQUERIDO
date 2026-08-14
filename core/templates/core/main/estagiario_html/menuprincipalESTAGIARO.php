<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../projetoAmigoCSS.css" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"  
            crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" 
            crossorigin="anonymous">

        <title>Menu Principal</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width device-width, initial-scale=1.0">

        <script src="../abracoQuerido/modulos_php/consultas.php"></script>

        <script src="../abracoQuerido/modulos_js/relogio.js"></script>
        <script src="../abracoQuerido/modulos_js/aviso.js"></script>
        <script src="../abracoQuerido/modulos_js/notificacoes.js"></script>
        <script src="../abracoQuerido/modulos_js/usuarios_js/msgSUPERVISOR.js"></script>
        <script src="../abracoQuerido/modulos_js/usuarios_js/mensagem_motivacional.js"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
    crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" 
    crossorigin="anonymous"></script>
    </head>
    <body>
        <div id ="aviso" class="aviso"></div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <?php
                session_start();
                if(isset($_SESSION['nomeUsuario'])){
                    $nomeUsuario = $_SESSION['nomeUsuario'];
                    echo "Bem   -Vindo, " . $nomeUsuario;
                    }
                ?>
                <span id="notificacoes">
                    <i class=" fa fa-bell"></i>
                    <span class="num-notificacoes"></span>
                </span>
                <div class=" collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="./perfilESTAGIARIO.php">Perfil</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link">Comunidades</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" id="navbarDropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Amigos</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="../abracoQuerido/sistemaAMIGOS.html">Lista de Amigos</a>
                                    <a class="dropdown-item" href="#">Pedidos de Amizade</a>
                                    <a class="dropdown-item" href="#">Bloqueados</a>
                                 </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./trabalhoESTAGIARIO.html">Trabalho</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../index.html">Sair</a>
                            </li>
                        </ul>
                </div>
                    <div class="navbar-clock">
                        <span id="data"></span>
                        <span id="relogio"></span>
                    </div>
            </div>
        </nav>

        <div class="d-flex flex-row align-items-center justify-content-center corPADRAO" style="height: 100vh; margin:auto">
            <div class="col">
                <div class="card" style="width: 25rem; height: 35rem;">
                    <div class="card-body">
                        <h5 class="card-title">Mensagem do Dia</h5>
                        <hr>
                        <p class="card-text">Pense na vida como um jogo de video game, é apenas umas fase dificil
                            tudo irá melhor depois dela, e sempre há uma recompensa no final dela.</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card" style="width: 25rem; height: 35rem;">
                    <div class="card-body">
                        <h5 class="card-title">Mensagem do Professor</h5>
                        <hr>
                        <p> Aqui sempre haverá uma mensagem de algo que seu professor queira dizer a você.</p>
                        <hr>
                        <ul id="lista-mensagens">

                        </ul>
                        <hr>
                        <a href="#" class="card-link">Chat com o Professor</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card" style="width: 25rem; height: 35rem;">
                    <div class="card-body">
                        <h5 class="card-title">Ultimas avaliações</h5>
                        <hr>
                        <p>Nao há avaliações disponiveis!</p>
                        <a href="#" class="card-link"> Mostrar Todas</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>