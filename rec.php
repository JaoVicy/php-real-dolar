<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Resultado:</h1>
    </header>
    <main>
        <?php
            // Desafio 002: Crie um script em PHP que retorne a cotação do dólar atual. Utilize a API do Banco Central para obter os dados.
            $start = date("m-d-Y", strtotime("-13 days"));
            $end = date("m-d-Y");

            $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\''. $start .'\'&@dataFinalCotacao=\''. $end .'\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';

            $data = json_decode(file_get_contents($url), true);

            $cote = $data['value'][0]['cotacaoCompra'];

            //echo "Cotação do dólar: R$ " . $cote;
            $value = $_POST["value"];

            $dolar = $value / $cote;

            echo"<p>Seus $value reais equivalem a $dolar dólares.</p>";
        ?>
    </main>
</body>
</html>