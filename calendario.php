<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="_css/cad_evento.css">
  <title>Cadastro de Eventos</title>
</head>

<body>

  <div class="login-box">
    <h2>Cadastro de Eventos</h2>
    <form action="salvar_evento.php" method="POST">
  <div class="user-box">
    <input type="text" name="nome_evento" required="">
    <label>Nome</label>
  </div>
  <div class="user-box">
    <input type="date" name="data_evento" required="">
    <label>Data</label>
  </div>
  <div class="user-box">
    <input type="time" name="horario_evento" required="">
    <label>Horário</label>
  </div>
  <button type="submit" class="login-button">Salvar</button>
</form>

    <a href="index.php" class="back-button">Voltar </a>
    <a href="calender.php" class="back-button">Ir para o Calendário</a>
  </div>
</body>

</html>