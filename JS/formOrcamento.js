$(document).ready(function() {
	$('.popup-with-form').magnificPopup({
		type: 'inline',
		preloader: false,
		focus: '#nome',

		callbacks: {
			beforeOpen: function() {
				if($(window).width() < 700) {
					this.st.focus = false;
				} else {
					this.st.focus = '#nome';
				}
			}
		}
	});
});

function calcularValorFinal() {
    const select = document.getElementById("opcoes");
    const checkboxes = document.querySelectorAll("input[type=checkbox]");
    const valorTotalInput = document.querySelector("#valor-total");
    const prazo = document.getElementById("prazo").value;

    document.querySelector("#opcoes").addEventListener("change", calcularValorFinal);
    document.querySelectorAll("input[type=checkbox]").forEach(checkbox => {
      checkbox.addEventListener("change", calcularValorFinal);
    });
  
    let valorTotal = 0;
    valorTotal += Number(select.value);

    let desconto = 0;
    if (prazo == 2) {
      desconto = 0.05;
    } else if (prazo == 3) {
      desconto = 0.1;
    } else if (prazo >= 4) {
      desconto = 0.2;
    }
  
    checkboxes.forEach(checkbox => {
      if (checkbox.checked) {
        valorTotal += Number(checkbox.value);
      }
    });

    valorTotalInput.value = "€" + (valorTotal * (1 - desconto)).toFixed(2);
  }
  
function enviarDados(event) {
    event.preventDefault();
    document.getElementById("pop-form").reset();

    alert("O seu pedido foi encaminhado. Entrarei em contacto o mais breve possível!")
}