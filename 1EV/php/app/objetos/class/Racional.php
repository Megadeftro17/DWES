<?php
class Racional
{
    //Atributos

    //private int|string $num;
    //private int|string $den;
    /**
    public function __construct(int $n, int $d){
        // Operacion de indireccion (->)
        $this->num = $n;
        $this->den = $d;
    }
     * */

    //Evita tener que declarar y hacer asignación
    private int $den{
        set{
            $this->den = $value == 0 ? throw new Exception("Valor invalido $this->num/$value") :$value;
        }
    }

    public float $value{
        get => $this->num/$this->den;
    }

    public function __construct(int $num = 1, int $den = 1)
    {
        $this->den = $den;
        if(is_string($num)){
            $datos = explode("/",$num);
            $num = $datos[0];
            $den = $datos[1] ?? 1;
        }

        $this->num = $num;
        $this->den = $den;

    }

    public function __toString() :string{
        return "$this->num/$this->den";
    }
}