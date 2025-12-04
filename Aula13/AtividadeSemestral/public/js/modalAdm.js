function validarLogin() {
  const userId = document.getElementById("userId").value.trim();
  const senha = document.getElementById("password").value.trim();
  const msg = document.getElementById("mensagem");

  const userCorreto = "1234";
  const senhaCorreta = "admin";


  if (userId === userCorreto && senha === senhaCorreta) {
    msg.style.color = "green";
    msg.textContent = "Login realizado com sucesso!";

    setTimeout(() => {
    window.location.href = "dashboard.html";
    }, 1500);
    } else {
    if (userId.length !== 4 || isNaN(userId)) {
        msg.style.color = "red";
        msg.textContent = "O ID deve conter 4 dígitos numéricos.";
        return;
    }  else {
        msg.style.color = "red";
        msg.textContent = "Usuário ou senha incorretos.";
    } 
    
  }
}

function onClickModalAdm() {
  document.getElementById("modal-fundo").style.display = "flex";
}

function fecharModal() {
  document.getElementById("modal-fundo").style.display = "none";
  document.getElementById("mensagem").textContent = "";
  document.getElementById("userId").value = "";
  document.getElementById("password").value = "";
}
