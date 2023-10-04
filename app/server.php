<?php
    $cpf = $_POST['cpf'];
    $nomeCompleto = $_POST['nomeCompleto'];
    $dataNasc = $_POST['dataNasc'];
    $cep = $_POST['cep'];
    $lagradouro = $_POST['lagradouro'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $computador = $_POST['computador'];
    $celular = $_POST['celular'];
    $notebook = $_POST['notebook'];
    $salario = $_POST['salario'];

    date_default_timezone_set('America/Argentina/Buenos_Aires'); // Set fuso horário
    $dataHoje = date('d/m/Y H:i');

    // Calcula idade atual a partir da data fornecida
    $dataNasc = new DateTime($dataNasc);
    $idade = $dataNasc->diff(new DateTime( date('Y-m-d')));
    $idade = $idade->format('%Y');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SBAT - SISTEMA DE SOLICITAÇÃO DE BOLSA AUXÍLIO-TECNOLOGIA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="../frontend/assets/css/style.css">
</head>
<body>
    <section>
        <div id="corpo" class="container p-4">
            <h1 id="titulo" class='text-center mb-4'>SBAT - SISTEMA DE SOLICITAÇÃO DE BOLSA AUXÍLIO-TECNOLOGIA</h1>

            <div class="p-4">
                <?php
                    print("<p><strong>CPF: </strong>${cpf}</p>");
                    print("<p><strong>Nome completo: </strong>${nomeCompleto}</p>");
                    print("<p><strong>Data e hora: </strong>${dataHoje}</p>");

                    print("<p><strong>Status: </strong>");

                    if ($idade < 18 || $salario > 3000):
                        print("Você não tem direito a nenhum item.</p>");
                
                    elseif ($idade > 65 && $salario < 3000):
                        print("Você tem direito a 1 smartphone.</p>");
                
                    elseif ($salario < 1000):
                        print("Você tem direito a 1 notebook e 1 smartphone.</p>");
                
                    elseif ($computador=='nao' && $celular=='nao' && $notebook=='nao'):
                        print("Você tem direito a 1 notebook.</p>");

                    else :
                        print("Você não tem direito a nenhum item.</p>");
                
                    endif;
                ?>
            </div>

            <p class="text-center mt-4"><strong>Leve este comprovante, um documento com foto, e procure o almoxarifado para retirada.</strong></p>

            <div class="text-center mt-4">
                <button id="btnImprimir" class="my-button">Imprimir</button>
            </div>
        </div>
    </section>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    $('#btnImprimir').click(function(){
        document.getElementById('titulo').setAttribute('hidden', '');
        document.getElementById('btnImprimir').setAttribute('hidden', '');

        window.print();

        document.getElementById('titulo').removeAttribute('hidden');
        document.getElementById('btnImprimir').removeAttribute('hidden');
    })
</script>

</html>