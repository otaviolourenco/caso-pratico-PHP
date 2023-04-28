$(document).ready(function () {
  $("a").click(function () {
    $("#conteudo").fadeToggle();
  });
  //Efeito botão animado
  $(".btn-animation").hover(
    function () {
      $(".btn-animation").removeClass("btn-animated");
    },
    function () {
      $(".btn-animation").addClass("btn-animated");
    }
  );

  //Galeria do portifolio
  $(".image-popup-vertical-fit").magnificPopup({
    type: "image",
    closeOnContentClick: true,
    mainClass: "mfp-img-mobile",
    image: {
      verticalFit: true,
    },
  });

  //Filtro galeria
  $("#todas").click(function () {
    $(".1").show();
    $(".2").show();
    $(".3").show();
  });

  $("#landing").click(function () {
    $(".1").show();
    $(".2").hide();
    $(".3").hide();
  });

  $("#porti").click(function () {
    $(".2").show();
    $(".1").hide();
    $(".3").hide();
  });

  $("#commerce").click(function () {
    $(".3").show();
    $(".2").hide();
    $(".1").hide();
  });

  //Mostrar noticia completa
  $(".mostrarNews").click(function (event) {
    event.preventDefault();
    $(".resumo").removeClass("visivel").addClass("invisivel");
    $(".completo").removeClass("invisivel").addClass("visivel");
    $(".esconderNews").removeClass("invisivel").addClass("visivel");
    $(".mostrarNews").removeClass("visivel").addClass("invisivel");
  });

  $(".esconderNews").click(function (event) {
    event.preventDefault();
    $(".resumo").removeClass("invisivel").addClass("visivel");
    $(".completo").removeClass("visivel").addClass("invisivel");
    $(".esconderNews").removeClass("visivel").addClass("invisivel");
    $(".mostrarNews").removeClass("invisivel").addClass("visivel");
  });
});

//Efeito fade-in nos elementos
function reveal() {
  let reveals = document.querySelectorAll(".reveal");

  reveals.forEach((reveal) => {
    let windowHeight = window.innerHeight;
    let elementTop = reveal.getBoundingClientRect().top;
    let elementVisible = 100;

    if (elementTop < windowHeight - elementVisible) {
      reveal.classList.add("active");
    } else {
      reveal.classList.remove("active");
    }
  });
}
window.addEventListener("scroll", reveal);
