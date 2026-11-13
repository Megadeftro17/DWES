<?php
class Racional{
    //Atributos
    private int|string $num;
    private int|string $den;

    public function __construct(int $n, int $d){
        // Operacion de indireccion (->)
        $this->num = $n;
        $this->den = $d;
    }

    //Metodos
}