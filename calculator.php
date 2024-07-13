<?php include('connect_database.php'); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Calculadora</title>
</head>

<body>
    <div class="menu">
        <a href="calculator.php">Calculadora</a>
        <a href="database.php">Histórico de Contas</a>
    </div>
    <div class="container">
        <div class="calculator">
            <form method="post">
                <input type="text" name="display" id="display" readonly>
                <div class="buttons">
                    <button type="button" onclick="appendNumber('1')">1</button>
                    <button type="button" onclick="appendNumber('2')">2</button>
                    <button type="button" onclick="appendNumber('3')">3</button>
                    <button type="button" onclick="appendOperator('+')">+</button>
                    <button type="button" onclick="appendNumber('4')">4</button>
                    <button type="button" onclick="appendNumber('5')">5</button>
                    <button type="button" onclick="appendNumber('6')">6</button>
                    <button type="button" onclick="appendOperator('-')">-</button>
                    <button type="button" onclick="appendNumber('7')">7</button>
                    <button type="button" onclick="appendNumber('8')">8</button>
                    <button type="button" onclick="appendNumber('9')">9</button>
                    <button type="button" onclick="appendOperator('*')">*</button>
                    <button type="button" onclick="appendNumber('0')">0</button>
                    <button type="button" onclick="appendOperator('/')">/</button>
                    <button type="button" onclick="appendOperator('%')">%</button>
                    <button type="button" onclick="sqrt()">√</button>
                    <button type="submit" name="calculate">=</button>
                    <button type="button" onclick="clearDisplay()">C</button>
                </div>
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['calculate'])) {
                $expression = $_POST['display'];
                $result = eval("return $expression;");
                echo "<script>document.getElementById('display').value = '$result';</script>";

                $stmt = $conn->prepare("INSERT INTO contas (conta, resultado, data, hora) VALUES (?, ?, NOW(), NOW())");
                $stmt->bind_param("ss", $expression, $result);
                $stmt->execute();
                $stmt->close();
            }
            ?>
        </div>
        <div class="rule-of-three">
            <form method="post" id="ruleOfThreeForm">
                <h2>Calculadora de Regra de 3</h2>
                <div class="row">
                    <label for="a">Valor A:</label>
                    <input type="number" id="a" name="a" step="any" required>
                    <label for="b">Valor B:</label>
                    <input type="number" id="b" name="b" step="any" required>
                </div>
                <div class="row">
                    <label for="c">Valor C:</label>
                    <input type="number" id="c" name="c" step="any" required>
                    <label for="d">Valor D:</label>
                    <input type="text" id="d" name="d" readonly>
                </div>
                <button type="submit" name="calculateRuleOfThree">Calcular</button>
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['calculateRuleOfThree'])) {
                $a = $_POST['a'];
                $b = $_POST['b'];
                $c = $_POST['c'];
                $d = ($b * $c) / $a;
                echo "<script>document.getElementById('d').value = '$d';</script>";

                $stmt = $conn->prepare("INSERT INTO contas (conta, resultado, data, hora) VALUES (?, ?, NOW(), NOW())");
                $expression = "$a / $b = $c / $d";
                $stmt->bind_param("ss", $expression, $d);
                $stmt->execute();
                $stmt->close();
            }
            ?>
        </div>
    </div>
    <script>
    function appendNumber(number) {
        document.getElementById('display').value += number;
    }

    function appendOperator(operator) {
        document.getElementById('display').value += operator;
    }

    function sqrt() {
        document.getElementById('display').value = Math.sqrt(eval(document.getElementById('display').value));
    }

    function clearDisplay() {
        document.getElementById('display').value = '';
    }
    </script>
</body>

</html>