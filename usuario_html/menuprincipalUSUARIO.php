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

        <script src="../modulos_php/consultas.php"></script>

        <script src="../modulos_js/relogio.js"></script>
        <script src="../modulos_js/aviso.js"></script>
        <script src="../modulos_js/notificacoes.js"></script>
        <script src="../modulos_js/usuarios_js/carrega_consultas.js"></script>
        <script src="../modulos_js/usuarios_js/mensagem_motivacional.js"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
    crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" 
    crossorigin="anonymous"></script>
    </head>
    <body class>
        <div id ="aviso" class="aviso"></div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <?php
                session_start();
                if(isset($_SESSION['nomeUsuario'])){
                    $nomeUsuario = $_SESSION['nomeUsuario'];
                    echo "Bem-Vindo, " . $nomeUsuario;
                    }
                ?>
                
                <span id="notificacoes">
                    <i class=" fa fa-bell"></i>
                    <span class="num-notificacoes"></span>
                </span>
                    <div class=" collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="./perfilUSUARIO.php">Perfil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">Comunidades</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./consultaPSICOLOGOS.html">Piscologos</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle"href="#" role="button" id="navbarDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">Amigos</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="../sistemaAMIGOS.html">Lista de Amigos</a></li>
                                    <li><a class="dropdown-item" href="#">Pedidos de Amizade</a></li>
                                    <li><a class="dropdown-item" href="#">Bloqueados</a></li>
                                </ul>
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
                    <div class= "modal d-none" tabindex="-1" role="dialog" id="avisoModal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Aviso de Consulta</h5>
                                    <button type ="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>  
                                </div>
                                <div class="modal-body">
                                    <p id="avisoTexto">Sua consulta é em 15min</p>
                                </div>
                            </div> 
                        </div>
                    </div>
            </div>
        </nav>

        <div class="d-flex flex-row align-items-center justify-content-center corPADRAO" style="height: 100vh; margin:auto">
            <div class="col">
                <div class="card" style="width: 25rem; height: 35rem;" style="margin-left:20px;">
                    <div class="card-body">
                        <h5 class="card-title">Mensagem do Dia</h5>
                        <hr>
                        <p class="card-text">Pense na vida como um jogo de video game, é apenas umas fase dificil
                            tudo irá melhor depois dela, e sempre há uma recompensa no final dela.
                        </p>
                        <a hrf="#" class="card-link">Mensagens anterior</a>
                        <a hrf="#" class="card-link">Ultimas 5 mensagens</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 25rem; height: 35rem;">
                    <div class="card-body">
                        <h5 class="card-title">Desabafo</h5>
                        <hr>
                        <p> Quer Desabafar com alguém? Temos pessoas aqui que estão sempe dispostas
                         a ouvir e dar  conselhos, e te ajudar no que for possivel!</p>
                        <a href="../chatMENSAGEM.html" class="card-link">Ouvido Amigo</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card" style="width: 25rem; height: 35rem;">
                    <div class="card-body">
                        <h5 class="card-title">Ultimas 5 consultas</h5>
                        <hr>
                        <ul id="ultimas-consultas">

                        </ul>
                        <a href="#" class="card-link"> Mostrar Todas</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>