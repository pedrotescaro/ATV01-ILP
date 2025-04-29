<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars(trim($_POST["nome"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $telefone = htmlspecialchars(trim($_POST["telefone"]));
    $data_nascimento = $_POST["data_nascimento"];
    $genero = $_POST["gender"];
    $tipo = $_POST["tipo"];
    $mensagem = htmlspecialchars(trim($_POST["mensagem"]));

    if (!$nome || !$email || !$telefone || !$data_nascimento || !$genero || !$tipo || !$mensagem) {
        die("Por favor, preencha todos os campos obrigatórios.");
    }

    try {
        $db = new PDO('sqlite:database.db');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $db->exec("CREATE TABLE IF NOT EXISTS Inscrito (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nome TEXT NOT NULL,
            email TEXT NOT NULL,
            telefone TEXT NOT NULL,
            data_nascimento TEXT NOT NULL,
            genero TEXT NOT NULL,
            tipo TEXT NOT NULL,
            mensagem TEXT NOT NULL
        )");

        $stmt = $db->prepare("INSERT INTO Inscrito (nome, email, telefone, data_nascimento, genero, tipo, mensagem) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$nome, $email, $telefone, $data_nascimento, $genero, $tipo, $mensagem]);

        echo "<h2>Inscrição realizada com sucesso!</h2>";
        echo "<p>Obrigado, <strong>$nome</strong>. Seus dados foram registrados.</p>";

    } catch (PDOException $e) {
        echo "Erro ao processar sua inscrição: " . $e->getMessage();
    }
} else {
    echo "Método de requisição inválido.";
}
?>
