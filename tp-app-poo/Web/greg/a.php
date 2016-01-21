<?php
namespace a{
    function maFonction($y)
    {
        return $y;
    }
}
namespace {
    use a;

    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    
    class maClasse {}
    
    const MA_CONSTANTE = TRUE;
    
    echo MA_CONSTANTE;
    $a = new maClasse;
    var_dump($a);
    $y = 3;
    echo \a\maFonction($y);
}
namespace r {
    echo MA_CONSTANTE;
    $a = new \maClasse;
    var_dump(maClasse::class);
    var_dump($a);
    $y = 3;
    echo \a\maFonction($y);
}
namespace Greg\app\db {
    const A = 'A';
    function explode($a, $b)
    {
        echo $a + $b;
    }

}
namespace Greg\app {
    db\explode(10, 3);
    var_dump(explode('a', '1a2a3'));
    \Greg\app\db\explode(100, 300);
}
