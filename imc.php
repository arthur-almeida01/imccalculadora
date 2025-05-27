<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Calculadora de IMC</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.2);
      width: 350px;
      text-align: center;
    }

    h1 {
      margin-bottom: 20px;
      color: #333;
    }

    input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 16px;
    }

    button {
      background-color: #28a745;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 8px;
      width: 100%;
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background-color: #218838;
    }

    .resultado {
      margin-top: 20px;
      font-size: 18px;
      color: #333;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>Calculadora de IMC</h1>
    <form method="post">
      <input type="number" name="peso" placeholder="Peso (kg)" step="0.1" required>
      <input type="number" name="altura" placeholder="Altura (m)" step="0.01" required>
      <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $peso = floatval($_POST["peso"]);
        $altura = floatval($_POST["altura"]);

        if ($altura > 0) {
            $imc = $peso / ($altura * $altura);
            $imc = round($imc, 2);

            echo "<div class='resultado'>";
            echo "Seu IMC é: <strong>$imc</strong><br>";

            if ($imc < 18.5) {
                echo "Classificação: Abaixo do peso";
            } elseif ($imc < 24.9) {
                echo "Classificação: Peso normal";
            } elseif ($imc < 29.9) {
                echo "Classificação: Sobrepeso";
            } elseif ($imc < 34.9) {
                echo "Classificação: Obesidade grau I";
            } elseif ($imc < 39.9) {
                echo "Classificação: Obesidade grau II";
            } else {
                echo "Classificação: Obesidade grau III";
            }

            echo "</div>";
        } else {
            echo "<div class='resultado'>Altura inválida!</div>";
        }
    }
    ?>
  </div>

</body>
</html>
