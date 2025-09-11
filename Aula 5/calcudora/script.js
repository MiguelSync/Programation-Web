let valorAtual = "";
let valorAnterior = "";
let operacao = null;

function atualizarDisplay(valor) {
  let campo = document.getElementById("resultado");

  campo.textContent = valor;

  // Regras de cor
  if (!isNaN(valor)) {
    valor = parseFloat(valor);
    if (valor < 0) {
      campo.style.backgroundColor = "red";
      campo.style.color = "white";
    } else if (valor > 0) {
      campo.style.backgroundColor = "green";
      campo.style.color = "white";
    } else {
      campo.style.backgroundColor = "gray";
      campo.style.color = "white";
    }
  } else {
    campo.style.backgroundColor = "#1c1c1c";
    campo.style.color = "white";
  }
}

function digitar(num) {
  valorAtual += num;
  atualizarDisplay(valorAtual);
}

function definirOperacao(op) {
  if (valorAtual === "") return;
  if (valorAnterior !== "") calcular();
  operacao = op;
  valorAnterior = valorAtual;
  valorAtual = "";
}

function calcular() {
  if (valorAtual === "" || valorAnterior === "") return;

  let n1 = parseFloat(valorAnterior);
  let n2 = parseFloat(valorAtual);
  let res;

  switch (operacao) {
    case "+": res = n1 + n2; break;
    case "-": res = n1 - n2; break;
    case "*": res = n1 * n2; break;
    case "/": res = n2 !== 0 ? n1 / n2 : "Erro"; break;
  }

  valorAtual = res.toString();
  operacao = null;
  valorAnterior = "";

  atualizarDisplay(valorAtual);
}

function limpar() {
  valorAtual = "";
  valorAnterior = "";
  operacao = null;
  atualizarDisplay("0");
}

function inverter() {
  if (valorAtual !== "") {
    valorAtual = (parseFloat(valorAtual) * -1).toString();
    atualizarDisplay(valorAtual);
  }
}

function porcentagem() {
  if (valorAtual !== "") {
    valorAtual = (parseFloat(valorAtual) / 100).toString();
    atualizarDisplay(valorAtual);
  }
}
