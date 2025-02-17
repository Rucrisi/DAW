<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <?php
        $resultado = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["calc"])) {
                $calculo = $_POST["calc"];

                if ($calculo) {
                    $resultado = eval("return $calculo;");
                    }
                } else {
                    $resultado = "ERROR";
                }
            }
    ?>

    <div class="calculadora">
        <form method="POST">
            <input type="text" id="output" name="calc" value="<?= htmlspecialchars($resultado); ?>" readonly>
            <div class="botones">
                <button type="button" onclick="agregarValor('7')">7</button>
                <button type="button" onclick="agregarValor('8')">8</button>
                <button type="button" onclick="agregarValor('9')">9</button>
                <button type="button" onclick="agregarValor('+')">+</button>
                </div>
                <div class="botones">
                <button type="button" onclick="agregarValor('4')">4</button>
                <button type="button" onclick="agregarValor('5')">5</button>
                <button type="button" onclick="agregarValor('6')">6</button>
                <button type="button" onclick="agregarValor('-')">-</button>
                </div>
                <div class="botones">
                <button type="button" onclick="agregarValor('1')">1</button>
                <button type="button" onclick="agregarValor('2')">2</button>
                <button type="button" onclick="agregarValor('3')">3</button>
                <button type="button" onclick="agregarValor('*')">*</button>
                </div>
                <div class="botones">
                <button type="button" onclick="agregarValor('0')">0</button>
                <button type="submit">=</button>
                <button id="reset" type="button" onclick="resetear()">Rst</button>
                <button type="button" onclick="agregarValor('/')">/</button>
                </div>
            </div>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>
