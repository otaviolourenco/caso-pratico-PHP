let form = document.getElementById('form-contact');
let nameinp = document.getElementById('nameinp');
let email = document.getElementById('emailinp');
let mobile = document.getElementById('telinp');
let msg = document.getElementById('msg');

//Função para validar nome
nameinp.addEventListener('input', (e) => {
    e.preventDefault();
    checkNameInp();
});

function checkNameInp() {
    let nameinpValue = nameinp.value;

    if (nameinpValue == '') {
        setErrorFor(nameinp, "Por favor, digite o seu nome!");
    } else if (!checkName(nameinpValue)) {
        setErrorFor(nameinp, "Digite o seu nome e apelido.");
    } else {
        setSuccessFor(nameinp);
    }
}; 

function checkName(nameinp) {
    return /^[A-Z][a-z]{2,}(?:[ ][A-Z][a-z]+)*$/i.test(nameinp)
};

//Função para validar e-mail
email.addEventListener('input', (e) => {
    e.preventDefault();
    checkEmailImp();
});

function checkEmailImp() {
    const emailValue = email.value;

    if (emailValue == '') {
        setErrorFor(email, "O email é obrigatório");
    } else if (!checkEmail(emailValue)) {
        setErrorFor(email, "Por favor, insira um email válido");
    }else {
        setSuccessFor(email);
    }
}

function checkEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

//Função para validar telefone
telinp.addEventListener('input', (e) => {
    e.preventDefault();
    checkTelInp();
});

function checkTelInp() {
    let telinpValue = telinp.value;

    if (telinpValue == '') {
        setErrorFor(telinp, "Por favor, digite o seu contacto!");
    } else if (!checkTel(telinpValue)) {
        setErrorFor(telinp, "Certifique-se de que o contacto tem nove dígitos!");
    } else {
        setSuccessFor(telinp);
    }
};

function checkTel(telinp) {
    return /^\d{9}$/.test(telinp)
}

//Função para validar textarea
msg.addEventListener('input', (e) => {
    e.preventDefault();
    checkMsgImp();
});

function checkMsgImp() {
    const msgValue = msg.value;

    if (msgValue == '') {
        setErrorFor(msg, "Por favor, digite a sua mensagem!")
    } else if (!checkMsg(msgValue)) {
        setErrorFor(msg, 'Digite a sua mensagem com mais detalhes.');
    }else {
        setSuccessFor(msg);
    } 
}

function checkMsg() {
    return (form.msg.value.length >= 200);
}

let textArea = document.querySelector('textarea');
textArea.addEventListener('input', function(){
let caraterMin = Number(200);
let digitando = textArea.value.length;
    document.getElementById('counter').innerHTML = (caraterMin - digitando)
    console.log();
});


//function para mostrar o erro
function setErrorFor(input, message) {
    const formControl = input.parentElement;
    const small = formControl.querySelector("small");
    small.innerText = message;
    formControl.className = "form-control error";
}

function setSuccessFor(input) {
    const formControl = input.parentElement;
    formControl.className = "form-control success";
}

function enviarContacto(event) {
    event.preventDefault();
    document.getElementById("form-contact").reset();

    alert("Obrigado pela sua mensagem! Entrarei em contacto o mais breve possível.")
}