<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "autopeca"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}


$sql = "SELECT id, nome_evento, data_evento, horario_evento FROM eventos";
$result = $conn->query($sql);

$events = [];


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $events[] = [
            'id' => $row['id'],
            'title' => $row['nome_evento'],
            'start' => $row['data_evento'] . 'T' . $row['horario_evento'] 
        ];
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html lang='pt-br'>
  <head>
    <meta charset='utf-8' />
    <link rel="stylesheet" href="css/calendar.css">

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          events: <?php echo json_encode($events); ?>
        });
        calendar.render();
      });

    </script>
  </head>
  <body>
    <div class="login-box">
      <a href="calendario.php" class="back-button">Voltar </a>
    </div>
    <div id='calendar'></div>

  </body>
</html>