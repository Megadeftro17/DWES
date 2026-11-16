<?php

class OperacionReal
{
    private int|string $op1;
    private int $op2;
    private string $operador;

    public function __construct(int|string $op1, int|null $op2 = null, string|null $operador = null)
    {
        if (is_string($op1)) {
            // 1. Usamos $this-> para llamar al método de la clase
            $this->operador = $this->get_operador($op1);

            // 2. Usamos strpos() para saber en qué índice está el operador (en "5+7" es la posición 1)
            $posOperador = strpos($op1, $this->operador);

            // 3. Cortamos desde el inicio (0) hasta la posición del operador, y convertimos a (int)
            $this->op1 = (int)substr($op1, 0, $posOperador);

            // 4. Cortamos desde la posición siguiente al operador (+ 1) hasta el final
            $this->op2 = (int)substr($op1, $posOperador + 1);
        } else {
            $this->op1 = $op1;
            $this->op2 = $op2;
            $this->operador = $operador;
        }
    }

    public function get_operador(string $operacion)
    {
        // Usamos !== false porque si el operador estuviera en la posición 0, strpos devolvería 0 (que PHP evalúa como false)
        if (strpos($operacion, "+") !== false)
            return '+';
        if (strpos($operacion, "-") !== false)
            return '-';
        if (strpos($operacion, "/") !== false)
            return '/';
        if (strpos($operacion, "*") !== false)
            return '*';
    }

    public function __toString(): string
    {
        // 1 + 1
        return "$this->op1 $this->operador $this->op2";
    }
}