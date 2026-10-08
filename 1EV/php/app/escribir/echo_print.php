<?php
    echo "<h1>Hola 1</h1>";
    print "<h1>Hola 2</h1>";
    echo ("<h1>Hola 3</h1>");
    // Echo sin paréntesis permite lista de argumentos
    echo "<h1>Hola 5"," otro texto", "</h1>","ya ahora fin<br />";
    $n = print "Que tal <br />";
    printf("<h1>Hola </h1>");
    $valor = rand(32,126);
    printf("<h1>Valor decimal %d, Hexadecimal %x, Octal %o, Carácter %c, Decimal %.2f   1</h1>"
    ,$valor,$valor,$valor,$valor,$valor);
?>