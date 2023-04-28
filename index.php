<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Este é um site com os projetos e informações do web developer Martin Doe" />
  <meta name="author" content="Otávio Lourenço" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

  <link rel="stylesheet" href="CSS/main.css" />
  <link rel="stylesheet" href="CSS/effects.css" />
  <link rel="stylesheet" href="CSS/magnific-popup.css" />
  <link rel="icon" type="image/png" sizes="32x32" href="favicon.png" />

  <script src="https://kit.fontawesome.com/c6aa19193c.js" crossorigin="anonymous"></script>
  <script src="JS/dinamicpag.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNCOLadpkSUUpmJLe0TSB0jc9s69vSw6E&callback=carregarMapa"></script>

  <title>Martin Doe - Portifólio</title>
</head>

<body onload="carregarMapa()">
  <!--Inicio nav-->
  <nav id="navbar">
    <input type="checkbox" id="nav-toggle" />
    <div class="logo">
      <a href="#" style="text-decoration: none; color: azure; font-weight: 400">MartinDoe</a>
    </div>
    <ul class="links">
      <li><a href="#">Início</a></li>
      <li><a href="#sobre">Sobre</a></li>
      <li><a href="#portifolio">Portifólio</a></li>
      <li><a href="#contacto">Contacto</a></li>

      <?php
      session_start();

      if (isset($_SESSION['user_id'])) {
        echo '<a href="content/portal.php" target="_blank"><button class="btn-login"><i class="fa-solid fa-house-user"></i>
          Àrea pessoal
        </button></a>';
      } else {
        echo '<a href="content/login.php"><button class="btn-login">
          <i class="fa-solid fa-user"></i>Entrar
        </button></a>';
      }
      ?>
    </ul>
    <label for="nav-toggle" class="icon-burger">
      <div class="line"></div>
      <div class="line"></div>
      <div class="line"></div>
    </label>
  </nav>

  <!--header-->
  <div class="container-fluid full-window">
    <div class="container p-5">
      <div class="col-md d-flex justify-content-center">
        <img src="image/man6.jpg" alt="imagem header" class="img-fluid" id="img-header" />
      </div>
      <div class="col-sm p-5 text-center">
        <h1 style="font-weight: bolder">
          Hello world! <br />Eu sou o
          <span style="font-family: glitch, sans-serif; font-size: 5rem">Martin Doe</span>
        </h1>
        <h2 class="pb-5">Web Designer, graphic designer & UI/UX designer</h2>

        <div class="col-md">
          <a href="#portifolio"><button class="my-white-btn mx-3 mb-5">Portifólio</button></a>

          <a href="#pop-form" class="popup-with-form"><button class="my-btn btn-animation btn-animated mx-3">
              Pedir orçamento
            </button></a>
        </div>
      </div>
      <div class="col-md mt-3">
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <a href="#sobre"><lottie-player src="https://lottie.host/16a0d5e2-7e83-4d53-9115-23f8932c657f/0twJufeMap.json" background="transparent" speed="1" style="height: 5rem" loop autoplay></lottie-player></a>
      </div>
    </div>
  </div>

  <!--background-->
  <ul class="background">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
  </ul>

  <!--Sobre-->
  <div class="container-fluid bg-light full-window">
    <div id="sobre" class="py-5"></div>
    <div class="container">
      <div class="row text-center reveal">
        <div class="col-sm mt-5">
          <p class="text-center">
            <span class="bg-titulo px-2">Conheça um pouco</span>
          </p>
          <h2 class="titulo-h2">Mais sobre mim</h2>
          <nav id="navContent">
            <ul class="dinLinks">
              <li><a href="#sobre-mim">Quem sou</a></li>
              <li><a href="#curriculo">Currículo</a></li>
              <li><a href="#habilidade">Habilidades</a></li>
            </ul>
          </nav>
        </div>
      </div>

      <div id="dinContent">
        <div class="row reveal">
          <div class="col-sm-7 p-5">
            <h2 class="title-h2 mb-5">Hey, me chamo Martin Doe,</h2>
            <p class="pb-2">
              um designer multidisciplinar especializado em web design, design
              gráfico e design de interface/experiência do usuário. Eu sou
              capaz de transformar suas ideias em projetos incríveis e
              atraentes. Possuo experiência em diversas tecnologias e
              plataformas, incluindo HTML, CSS, JavaScript, PHP e WordPress.
              Me especializei em criar websites personalizados e responsivos
              que oferecem uma excelente experiência ao usuário. Além disso,
              também ofereço serviços de SEO e manutenção para garantir que
              seu site esteja sempre funcionando corretamente. Se você está
              procurando por um desenvolvedor web confiável e experiente,
              entre em contacto e saiba mais sobre como
              <strong>posso ajudar a elevar sua presença online.</strong>"
            </p>
            <div id="social" class="pb-5">
              <a href="#"><i class="fa-brands fa-github"></i></a>
              <a href="#"><i class="fa-brands fa-linkedin"></i></a>
              <a href="#"><i class="fa-brands fa-square-instagram"></i></a>
              <a href="#"><i class="fa-brands fa-square-behance"></i></a>
              <a href="mailto:email@example.com"><i class="fa-solid fa-envelope"></i></a>
            </div>
            <a href="#contacto" class="my-btn">Entrar em contacto</a>
          </div>
          <div class="col-md-5 reveal d-flex align-items-center">
            <div class="pb-5 d-flex justify-content-center position-relative">
              <div class="border-pic">
                <img src="image/man.png" class="img-fluid" alt="Foto do Martin Doe" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--CTA-->
  <div class="container-fluid flex-column p-5">
    <div class="row reveal d-flex justify-content-center">
      <div class="col-md-9 text-center px-5">
        <h2 class="title-h2">Vamos desenvolver junto!</h2>
        <p>
          Solicite um orçamento e dê o primeiro passo para ter um site
          profissional e moderno! Não perca mais tempo, solicite já o seu
          projeto e tenha a certeza de que está investindo em sua presença
          digital.
        </p>
        <br />
        <a href="#pop-form" class="popup-with-form"><button class="my-btn btn-animation btn-animated">
            Peça um orçamento
          </button></a>
      </div>
    </div>
  </div>

  <!--Feed RSS-->
  <div class="container-fluid bg-light full-window p-5 reveal">
    <div class="row reveal">
      <div class="col-md text-center mt-5">
        <p class="text-center">
          <span class="bg-titulo px-3">Notícias</span>
        </p>
        <h2 class="titulo-h2" style="padding-bottom: 4rem">
          Mantenha-se atualizado
        </h2>
      </div>
    </div>
    <div class="row d-flex justify-content-center reveal">
      <div class="col-sm-10">
        <div class="p-5 border-top border-start border-3" id="news" style="height: 70vh; overflow: scroll">
          <!--Noticias aqui-->
          <?php
          //Conexão com o banco de dados
          include('content/db_connect.php');

          //Consultar a tabela "noticias"
          $sql = "SELECT * FROM noticias ORDER BY data_post DESC LIMIT 5";
          $result = mysqli_query($conn, $sql);

          //Exibindo as informações em uma div com id "news"
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              $resumo = substr($row["conteudo"], 0, 100) . '...';

              echo "<h2>" . $row["titulo"] . "</h2>";
              echo "<p class='resumo visivel'>" . $resumo . "</p>";
              echo "<p class='completo invisivel'>" . $row["conteudo"] . "</p>";
              echo "<a href='' class='mostrarNews visivel'>Ver mais</a>";
              echo "<a href='' class='esconderNews invisivel'>Ver menos</a>";
              echo "<h4>" . $row["autor"] . "</h4>";
              echo "<h5>" . $row["data_post"] . "</h5>";
              echo "<hr>";
            }
          } else {
            echo "Não há notícias para exibir";
          }


          //Fechar conexão com o banco de dados
          mysqli_close($conn);
          ?>
        </div>
      </div>


    </div>
  </div>

  <!--Portifolio-->
  <div class="container-fluid">
    <div id="portifolio" class="py-5"></div>
    <div class="row reveal">
      <div class="col-md text-center mt-5">
        <p class="text-center">
          <span class="bg-white-titulo px-3">Portifólio</span>
        </p>
        <h2 class="titulo-h2" style="padding-bottom: 4rem">
          Alguns projetos
        </h2>
      </div>
    </div>

    <div class="row d-flex justify-content-center">
      <div class="col-md-10 text-center">
        <nav id="nav-galeria" class="pb-4">
          <button type="button" id="todas" class="my-btn m-2">Todas</button>
          <button type="button" id="landing" class="my-btn m-2">
            Landing Page
          </button>
          <button type="button" id="porti" class="my-btn m-2">
            Portifólio
          </button>
          <button type="button" id="commerce" class="my-btn m-2">
            E-commerce
          </button>
        </nav>
        <!--Galeria-->
        <div class="d-flex flex-row flex-wrap justify-content-center">
          <?php
          include('content/db_connect.php');

          $sql = "SELECT * FROM projetos";
          $result = mysqli_query($conn, $sql);

          if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

              if (!empty($row['foto_proj'])) {
                $imgCaminho = $row['foto_proj'];

                // Adiciona o botão para abrir o modal
                echo "<button type='button' class='btn m-3 " . $row['tipo_proj'] . "' data-bs-toggle='modal' data-bs-target='#projetoModal" . $row['projeto_ID'] . "'>";
                echo "<img src='content" . $imgCaminho . "' height='450'> <br>";
                echo "</button>";

                // Cria o modal com as informações do projeto
                echo "<div class='modal ' id='projetoModal" . $row['projeto_ID'] . "' tabindex='-1' aria-labelledby='projetoModalLabel" . $row['projeto_ID'] . "' aria-hidden='true'>";
                echo "<div class='modal-dialog'>";
                echo "<div class='modal-content'>";
                echo "<div class='modal-header'>";
                echo "<h5 class='modal-title' id='projetoModalLabel" . $row['projeto_ID'] . "'></h5>";
                echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
                echo "</div>";
                echo "<div class='modal-body'>";
                echo "<h3><strong>Descrição: </strong></h3>" . $row["info_proj"] . '<br>';
                echo "<h3><strong>Tecnologias utilizadas: </strong></h3>" . $row["tecnologia_proj"] . '<br>';
                echo "<h3><strong>Data do projeto: </strong></h3>" . $row["data_proj"] . '<br>';
                echo "</div>";
                echo "<div class='modal-footer'>";
                echo "<button type='button' class='btn my-btn' data-bs-dismiss='modal'>Fechar</button>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
              }
            }
          } else {
            echo "0 resultados";
          }

          $conn->close();
          ?>
        </div>
      </div>
    </div>
  </div>
  <!--Modal com info do projecto-->
  <div class="container ">
    <div class="row">

    </div>
  </div>



  <!--Contacto-->
  <div class="container full-window">
    <div id="contacto" class="py-5"></div>
    <div class="row reveal">
      <div class="col-md-7 p-5 text-center">
        <p><span class="bg-white-titulo px-3">FAQ</span></p>
        <h2 class="titulo-h2 pb-5">Perguntas frequentes</h2>

        <div class="accordion shadow-accordion reveal" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button style="font-size: 2rem" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Qual é o prazo para o desenvolvimento do site?
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>
                  O prazo para o desenvolvimento do site será estabelecido em
                  conjunto com o cliente, levando em consideração as
                  necessidades e objetivos do projeto. O lançamento do site é
                  um passo importante para o sucesso da empresa, de forma ágil
                  e eficiente para garantir que o site seja lançado dentro do
                  prazo estabelecido. Além disso, mantenho o cliente informado
                  sobre o progresso do projeto ao longo do desenvolvimento.
                </p>
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button style="font-size: 2rem" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Como o desenvolvedor irá lidar com problemas técnicos que
                possam surgir?
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>
                  Ofereço suporte e garantia pós-lançamento, para garantir que
                  você possa contar comigo caso surjam problemas ou dúvidas.
                  Trabalho para garantir que o site esteja funcionando
                  corretamente e atendendo às necessidades do projecto.
                </p>
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button style="font-size: 2rem" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Como o desenvolvedor irá garantir otimização de SEO?
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>
                  Busco otimizar o site para SEO, garantindo que ele alcance
                  uma boa posição nos mecanismos de busca e atraia tráfego
                  orgânico. Isso inclui a otimização do conteúdo e do código,
                  bem como a implementação de técnicas de SEO para garantir
                  que o site seja indexado corretamente pelos mecanismos de
                  busca. Além disso, procuro estar sempre atualizado sobre as
                  últimas tendências e algoritmos dos mecanismos de busca para
                  garantir que o site esteja sempre otimizado.
                </p>
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button style="font-size: 2rem" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                Qual a localização do escritório?
              </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="collapseFour" data-bs-parent="#accordionExample">
              <div class="accordion-body p-3">
                Digite o local: <input id="origem" type="text" value="" />
                <input class="my-btn mb-3 py-3" type="button" value="Procurar" onclick="calcularRota()" />
                <br />
                Ou use a sua
                <input class="my-btn mb-4 p-3" type="button" id="localizar" value="Localização atual" /><br />
                <div id="mapa" style="position: relative; width: 100%; height: 30rem"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-5 p-5 reveal">
        <p class="text-center">
          <span class="bg-white-titulo px-3">Mensagem</span>
        </p>
        <h2 class="titulo-h2 text-center pb-5">Entre em contacto</h2>

        <form method="post" name="form-contact" onsubmit="enviarContacto(event)" id="form-contact" class="form reveal">
          <div class="form-control">
            <label for="nameinp">Nome</label>
            <input type="text" id="nameinp" placeholder="Digite o seu nome" required />
            <i class="fa-solid fa-circle-exclamation"></i>
            <i class="fa-solid fa-circle-check"></i>
            <small>Mensagem de erro</small>
          </div>

          <div class="form-control">
            <label for="emailinp">Email</label>
            <input type="text" id="emailinp" placeholder="Digite o seu email" required />
            <i class="fa-solid fa-circle-exclamation"></i>
            <i class="fa-solid fa-circle-check"></i>
            <small>Mensagem de erro</small>
          </div>

          <div class="form-control">
            <label for="telinp">Contacto</label>
            <input type="tel" id="telinp" placeholder="999-999-999" required />
            <i class="fa-solid fa-circle-exclamation"></i>
            <i class="fa-solid fa-circle-check"></i>
            <small>Mensagem de erro</small>
          </div>

          <div class="form-control">
            <label for="msg">Mensagem</label>
            <textarea name="msg" id="msg" cols="20" rows="5" placeholder="Digite a sua mensagem" required></textarea>
            <div><span id="counter">200</span><span>/200</span></div>

            <i class="fa-solid fa-circle-exclamation"></i>
            <i class="fa-solid fa-circle-check"></i>
            <small>Mensagem de erro</small>
          </div>
          <div class="form-control py-0">
            <button type="submit" class="my-btn">Enviar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!--Pop-up Form-->
  <div class="d-flex justify-content-center mfp-hide white-popup-block pt-4">
    <form method="post" onsubmit="enviarDados(event)" id="pop-form" onchange="calcularValorFinal()">
      <label for="nome">Nome:</label>
      <input type="text" id="nome" required /><br />

      <label for="apelido">Apelido:</label>
      <input type="text" id="apelido" required /><br />

      <label for="tel">Telemóvel:</label>
      <input type="tel" id="tel" placeholder="999-999-999" pattern="[0-9]{3}[0-9]{3}[0-9]{3}" required /><br />
      <label for="opcoes">Tipo de página web:</label>
      <select name="opcoes" id="opcoes" onchange="calcularValorFinal()">
        <option value="0">Selecione uma opção</option>
        <option value="100">Landing page - €100</option>
        <option value="150">Blog - €150</option>
        <option value="200">Portal - €200</option>
        <option value="300">Loja online - €300</option>
      </select>
      <label for="prazo">Prazo de entrega (em meses):</label>
      <input type="number" name="prazo" id="prazo" min="1" style="width: 15rem" />

      <h3>Marque os separadores desejados</h3>
      <input type="checkbox" id="sobre-inp" value="400" />
      <label for="sobre-inp">Quem somos |</label>

      <input type="checkbox" id="local-inp" value="400" />
      <label for="local-inp">Onde estamos</label> <br />

      <input type="checkbox" id="galeria-inp" value="400" />
      <label for="galeria-inp">Galeria de fotografias |</label>

      <input type="checkbox" id="ecom-inp" value="400" />
      <label for="ecom-inp">eCommerce</label><br />

      <input type="checkbox" id="gest-inp" value="100" />
      <label for="gest-inp">Gestão interna |</label>

      <input type="checkbox" name="noticias" id="noti-inp" value="400" />
      <label for="noti-inp">Notícias |</label>

      <input type="checkbox" id="social-inp" value="400" />
      <label for="social-inp">Redes sociais</label><br />

      <h2 style="font-weight: 600">Orçamento estimado</h2>
      <input type="text" name="valor" id="valor-total" placeholder="€0" disabled /><br />

      <p style="font-size: 1.4rem">
        (É um valor meramente indicativo, pode sofrer alterações.)
      </p>

      <button class="my-btn text-center mt-3" type="submit">Enviar</button>
    </form>
  </div>

  <!--footer-->
  <div class="container-fluid d-flex align-items-center" style="background-color: var(--black); color: azure; height: 7rem">
    <div class="col-md-6">
      <h4>Copyright &copy; 2022. All Rights Reserved</h4>
    </div>
    <div class="col-md-6 text-end px-4">
      <h4>Criado por Otávio Lourenço</h4>
    </div>
  </div>

  <!--Scripts-->
  <script src="JS/jquery.js"></script>
  <script src="JS/jquery.magnific-popup.min.js"></script>
  <script src="JS/dinamicPag.js"></script>
  <script src="JS/formOrcamento.js"></script>
  <script src="JS/effects.js"></script>
  <script src="JS/formContact.js"></script>
  <script src="JS/meuMapa.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>