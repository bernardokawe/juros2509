<html>
    <head>
        <meta charset="UTF-8">
        <title>Calculadora Completa</title>
    </head>
    <body style="background-color: #d3f566ff;">

        <h1>Calculadora Simples</h1>
        <form method="GET" action="">
            <label for="num1">Número 1:</label><br>
            <input type="text" name="n1"><br>
            <label for="num2">Número 2:</label><br>
            <input type="text" name="n2"><br>
            <input type="submit" value="Calcular">
            <fieldset style="margin-right: 1000px;">
                <legend>Operações Matemáticas</legend>
                <input type="radio" name="op" value="soma" checked> Soma<br>
                <input type="radio" name="op" value="subtracao"> Subtração<br>
                <input type="radio" name="op" value="multiplicacao"> Multiplicação<br>
                <input type="radio" name="op" value="divisao"> Divisão<br>
                <input type="radio" name="op" value="exponenciacao"> Exponenciação<br>
                <input type="radio" name="op" value="modulo"> Módulo<br>
            </fieldset>

            <fieldset style="margin-right: 1000px;">
                <legend>Juros Simples</legend>
                <input type="radio" name="op" value="juros"> Calcular Juros (J)<br>
                <input type="radio" name="op" value="capital"> Calcular Capital (C)<br>
                <input type="radio" name="op" value="taxa"> Calcular Taxa (i)%<br>
                <input type="radio" name="op" value="prazo"> Calcular Prazo (n)<br>
            </fieldset>

            <fieldset style="margin-right: 1000px;">
                <legend>Conversor de Temperatura</legend>
                <input type="radio" name="op" value="c2f"> Celsius → Fahrenheit<br>
                <input type="radio" name="op" value="f2c"> Fahrenheit → Celsius<br>
            </fieldset>
        </form>
        
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (isset($_GET['n1']) && isset($_GET['n2']) && is_numeric($_GET['n1']) && is_numeric($_GET['n2'])) {
                $n1 = $_GET['n1'];
                $n2 = $_GET['n2'];

                
                function soma($n1, $n2) { return $n1 + $n2; }
                function subtracao($n1, $n2) { return $n1 - $n2; }
                function multiplicacao($n1, $n2) { return $n1 * $n2; }
                function divisao($n1, $n2) { return ($n2 == 0) ? "Erro: Divisão por zero!" : $n1 / $n2; }
                function exponenciacao($n1, $n2) { return pow($n1, $n2); }
                function modulo($n1, $n2) { return $n1 % $n2; }

                
                function calcularJuros($c, $i, $n) { return $c * ($i / 100) * $n; }
                function calcularCapital($j, $i, $n) { return $j / (($i / 100) * $n); }
                function calcularTaxa($j, $c, $n) { return ($j / ($c * $n)) * 100; }
                function calcularPrazo($j, $c, $i) { return $j / ($c * ($i / 100)); }

                
                function celsiusParaFahrenheit($c) { return ($c * 9/5) + 32; }
                function fahrenheitParaCelsius($f) { return ($f - 32) * 5/9; }

                $op = $_GET['op'];

                if ($op == 'soma') {
                    echo "<h2>Resultado: $n1 + $n2 = " . soma($n1, $n2) . "</h2>";
                } elseif ($op == 'subtracao') {
                    echo "<h2>Resultado: $n1 - $n2 = " . subtracao($n1, $n2) . "</h2>";
                } elseif ($op == 'multiplicacao') {
                    echo "<h2>Resultado: $n1 × $n2 = " . multiplicacao($n1, $n2) . "</h2>";
                } elseif ($op == 'divisao') {
                    echo "<h2>Resultado: $n1 ÷ $n2 = " . divisao($n1, $n2) . "</h2>";
                } elseif ($op == 'exponenciacao') {
                    echo "<h2>Resultado: $n1 ** $n2 = " . exponenciacao($n1, $n2) . "</h2>";
                } elseif ($op == 'modulo') {
                    echo "<h2>Resultado: $n1 % $n2 = " . modulo($n1, $n2) . "</h2>"; 
                } elseif ($op == 'juros') {
                    echo "<h2>Resultado: J = C × i × n = " . calcularJuros($n1, $n2, 1) . " (aqui n=1 por padrão)</h2>";
                } elseif ($op == 'capital') {
                    echo "<h2>Resultado: C = " . calcularCapital($n1, $n2, 1) . " (aqui n=1 por padrão)</h2>";
                } elseif ($op == 'taxa') {
                    echo "<h2>Resultado: i = " . calcularTaxa($n1, $n2, 1) . "% (aqui n=1 por padrão)</h2>";
                } elseif ($op == 'prazo') {
                    echo "<h2>Resultado: n = " . calcularPrazo($n1, $n2, 1) . " (aqui i=1 por padrão)</h2>";
                } elseif ($op == 'c2f') {
                    echo "<h2>Resultado: $n1 °C = " . celsiusParaFahrenheit($n1) . " °F</h2>";
                } elseif ($op == 'f2c') {
                    echo "<h2>Resultado: $n1 °F = " . fahrenheitParaCelsius($n1) . " °C</h2>";
                }

            } else {
                echo "<h2>Por favor, insira números válidos.</h2>";
            }
        }
        ?>
    </body>
</html>
