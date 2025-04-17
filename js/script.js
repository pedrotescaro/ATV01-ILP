function handleSubmit(event) {
  event.preventDefault();

  const nome = document.getElementById("nome").value;
  const email = document.getElementById("email").value;
  const telefone = document.getElementById("telefone").value;
  const dataNascimento = document.getElementById("data_nascimento").value;
  const genero = document.querySelector('input[name="gender"]:checked')?.value;
  const tipo = document.getElementById("tipo").value;
  const mensagem = document.getElementById("mensagem").value;

  const resultado = `
    <h3>Dados Enviados:</h3>
    <p><strong>Nome:</strong> ${nome}</p>
    <p><strong>E-mail:</strong> ${email}</p>
    <p><strong>Telefone:</strong> ${telefone}</p>
    <p><strong>Data de Nascimento:</strong> ${dataNascimento}</p>
    <p><strong>Gênero:</strong> ${genero}</p>
    <p><strong>Tipo de Inscrição:</strong> ${tipo}</p>
    <p><strong>Mensagem:</strong> ${mensagem}</p>
  `;

  document.getElementById("resultado").innerHTML = resultado;

  // Opcional: limpar o formulário após exibir os dados
  // event.target.reset();
}