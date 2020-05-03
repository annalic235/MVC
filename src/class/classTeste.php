<?php 
namespace Classes;

use Classes;

class classTeste extends classIntegracao{

    public function __construct()
    {
        echo" Class Teste Funcionando ";
        echo"<br><br><br>";
        echo $this->Integrar();
    }
}