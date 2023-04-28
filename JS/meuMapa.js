let mapa;
let mostrarDirecao;
let servicoRota = new google.maps.DirectionsService();

function carregarMapa() {
    mostrarDirecao = new google.maps.DirectionsRenderer();

    let ponto = new google.maps.LatLng(38.72797333344735, -9.131174786717906);
    let opcoes = {
        zoom: 15,
        center: ponto,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    
    mapa = new google.maps.Map(document.getElementById("mapa"), opcoes);
    mostrarDirecao.setMap(mapa);

    let marca = new google.maps.Marker({
        position: ponto,
        map: mapa,
        title: "Ms. Doe, Web Developer"
    });
}

function calcularRota() {
    let origem = document.getElementById("origem").value;
    let destino = new google.maps.LatLng(38.72797333344735, -9.131174786717906)
    let opcoes = {
        origin: origem,
        destination: destino,
        travelMode: google.maps.DirectionsTravelMode.DRIVING
    };

    servicoRota.route(opcoes, function(response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            mostrarDirecao.setDirections(response);
        }
    });
}

//localização atual do usuário
window.document.getElementById("localizar").addEventListener("click", function() {
        navigator.geolocation.getCurrentPosition(function(position) {
            let latitude = position.coords.latitude;
            let longitude = position.coords.longitude;

            fetch(`https://maps.googleapis.com/maps/api/geocode/json?latlng=${latitude},${longitude}&key=AIzaSyCNCOLadpkSUUpmJLe0TSB0jc9s69vSw6E`)
                .then(response => response.json())
                .then(data => {
                    let address = data.results[0].formatted_address;
                    document.getElementById("origem").value = address;

                calcularRota();
            });
        });
    });