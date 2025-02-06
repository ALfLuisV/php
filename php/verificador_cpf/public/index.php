<?php
function cpf_verifier($cpf)
{
    $valid = null;

    if (strlen($cpf) == 11) {

        $digito_verificador = '';
        $sum = 0;
        $multiplicador_inicial = 10;


        for ($i = 0; $i < strlen($cpf) - 2; $i++) {
            $sum += $cpf[$i] * $multiplicador_inicial;
            $multiplicador_inicial--;
        }

        

        if($sum % 11 < 2){

            $digito_verificador = 0;

        } else {

            $digito_verificador = 11 - ($sum % 11);

        }

        $sum = 0;

        $novo_numero_a_ser_multiplicado = strval(substr($cpf, 0, -2)) . $digito_verificador;

        $multiplicador_inicial = 11;

        for ($i = 0; $i < strlen($novo_numero_a_ser_multiplicado); $i++) {
            // echo $novo_numero_a_ser_multiplicado[$i] . " x " . $multiplicador_inicial . " + ";
            $sum += $novo_numero_a_ser_multiplicado[$i] * $multiplicador_inicial;
            $multiplicador_inicial--;
        }

        $digito_verificador = $sum % 11;

        if($sum % 11 < 2){

            $digito_verificador = 0;

        } else {

            $digito_verificador = 11 - ($sum % 11);
            
        };


        $cpf_a_verificar = $novo_numero_a_ser_multiplicado . $digito_verificador;

        if($cpf == $cpf_a_verificar){
            echo 'valido';
        } else {
            echo 'invalido';
        }

    } else {
        echo "invalido";
    }
}


cpf_verifier("23908247091")


?>