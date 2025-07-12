<?php

namespace Controller;
use Exception;
use LDAP\Result;
use Model\Imcs;
class ImcController
{
    private $imcsModel;

    public function __construct()
    {
        $this->imcsModel = new Imcs();
    }

    public function calculateImc()
    {
        try {
            $result = [];
            if (isset($weight) or isset($height)) {
                if ($weight > 0 and $height > 0) {
                    $imc = round($weight / ($height * $height), 2);
                    $result['imc'] = $imc;
                    switch (true) {

                    }
                    $result["BMirange"] = match (true) {
                        $imc < 18.5 => "Baixo Peso",
                        $imc >= 18.5 and $imc < 25 => "Peso normal",
                        $imc >= 25 and $imc < 30 => "Sobrepeso",
                        $imc >= 30 and $imc < 35 => "Obesidade grau 1",
                        $imc >= 35 and $imc < 40 => "Obesidade grau 2",
                        default => "Obesidade grau 3"
                    };
                } else {
                    $result['BMIrange'] = "O peso e altura devem conter valores positivos.";
                }
            } else {
                    $result['BMIrange'] = "O peso e altura devem ser informados.";
            }
            return $result;
        } catch (Exception $error) {
            echo "Erro ao calcular IMC: " . $error->getMessage();
            return false;
        }
    }
    public function saveIMC($weight, $height, $IMCresult){
        return $this->imcsModel->createImc($weight, $height, $IMCresult);
    }
}

?>