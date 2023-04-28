document.addEventListener("DOMContentLoaded", function () {
  let links = document.querySelectorAll(".dinLinks a");

  for (let i = 0; i < links.length; i++) {
    links[i].addEventListener("click", function (event) {
      event.preventDefault();
      let id = this.getAttribute("href").substring(1);

      let xhr = new XMLHttpRequest();

      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          let dinContent = document.getElementById("dinContent");
          dinContent.innerHTML = xhr.responseText;
        }
      };

      xhr.open("GET", "content/" + id + ".html", true);
      xhr.send();
    });
  }
});

// função para carregar conteúdo dinamicamente com AJAX
function loadContent(url) {
  var xmlhttp;

  // cria um objeto XMLHttpRequest
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xmlhttp = new XMLHttpRequest();
  } else {
    // code for old IE browsers
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }

  // função que será executada quando a resposta for recebida
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // atualiza o conteúdo da div container
      document.getElementById("painelDeInfo").innerHTML = this.responseText;
    }
  };

  // faz a requisição para o servidor
  xmlhttp.open("GET", url, true);
  xmlhttp.send();
}
