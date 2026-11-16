<?php


class Racional
{
    private int $den{
        set => $value ==0? throw new Exception ("Valor inválido $this->num/$value"):$value;
    }
    //private int $den{
    //        set { $this->den= $value ==0? throw new Exception ("Valor inválido $this->num/$value"):$value;}
    //        }
    public  float $value {
        get => $this->num/$this->den;
    }
    private int $num;

    public function __construct( int|string|null $num=1,   int|null $den=1)
    {
        $this->den = $den;

        if (is_string($num)) {
            $datos = explode("/", $num);
            $num = $datos[0];
            $den = $datos[1] ?? 1;
        }
        $this->num = $num;
        $this->den = $den;


    }

    public function __toString(): string
    {
        return "$this->num/$this->den";
        // TODO: Implement __toString() method.
    }

    public function __call(string $name, array $args): int|string{
        $args = print_r($args, true);
        echo "Se ha invocado el método $name con argumentos $args";
        return 1;
    }


    public function sumar(Racional $op1):Racional
    {
        $num = $this->num*$op1->den+$this->den*$op1->num;
        $den = $this->den*$op1->den;

        return new Racional($num,$den);
    }

    public function restar(Racional $op1):Racional
    {
        $num = $this->num*$op1->den - $this->den*$op1->num;
        $den = $this->den*$op1->den;

        return new Racional($num,$den);
    }
    public function multiplicar(Racional $op1):Racional
    {
        $num = $this->num*$op1->num;
        $den = $this->den*$op1->den;

        return new Racional($num,$den);
    }


    public function dividir(Racional $op1):Racional
    {
        $num = $this->num*$op1->den;
        $den = $this->den*$op1->num;

        return new Racional($num,$den);
    }

}