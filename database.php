<?php include('connect_database.php'); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Histórico de Contas</title>
</head>

<body>
    <div class="menu">
        <a href="calculator.php">Calculadora</a>
        <a href="database.php">Histórico de Contas</a>
    </div>
    <div class="database">
        <h2>Histórico de Contas</h2>
        <table>
            <tr>
                <th>Conta</th>
                <th>Resultado</th>
                <th>Data e Hora</th>
            </tr>
            <?php
            $result = $conn->query("SELECT conta, resultado, data_hora FROM contas ORDER BY data_hora DESC");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['conta']}</td>
                        <td>{$row['resultado']}</td>
                        <td>{$row['data_hora']}</td>
                      </tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>