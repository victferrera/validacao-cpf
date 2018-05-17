<?php

class Validacao
{
    private $numeroCPF;
    private $calculo;
    private $calculo2;
    private $passo1;
    private $passo2;
    private $erro;
    private $sucesso;

    public function __construct()
    {

    }

    public function validarCpf($numeroCpf)

    {
        $cpfArray = $this->numeroCPF = str_split($numeroCpf);

        $x = 0;
        $y = 10;

        while($x < 10 && $y > 1)
        {
            $this->calculo += $cpfArray[$x] * $y;
            $x++;
            $y--;
        }

        $comparacao1 = ($this->calculo * 10) % 11;

        $x = 0;
        $y = 11;

        if($comparacao1 == $cpfArray[9])
        {
            $this->passo1 = true;

            while($x < 11 && $y > 1)
                {
                    $this->calculo2 += $cpfArray[$x] * $y;
                    $x++;
                    $y--;
                }
            
            $comparacao2 = ($this->calculo2 * 10) % 11;
            
            if($comparacao2 == $cpfArray[10])
            {
                $this->passo2 = true;
                return $this->sucesso = "CPF válido";

            }
            else
            {
                $this->passo2 = false;
                return $this->erro = "CPF inválido";
            }
        }

        else
        {
            $this->passo1 = false;
            return $this->erro = "CPF inválido";
        }

    }

}

$cpf = new Validacao;
$validacao = $cpf->validarCpf("31774765276");
echo $validacao;