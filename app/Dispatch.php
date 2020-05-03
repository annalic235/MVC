<?php
namespace app;

use src\classes\classRoutes;

class Dispatch extends classRoutes{

    #Atributos
    private $Method;
    private $Param=[];
    private $Obj;

    protected function getMethod() {return $this->Method; }
    public function setMethod($Method) { $this->Method = $Method; }
    protected function getParam($Param) {return $this->$Param; }
    public function setParam($Param) { $this->Param = $Param; }
    #Método Contrutor
    public function __construct(){
        self:: addcontroller();
    }

    #Método de adição de controller 
    private function addcontroller()
    {
        $RotaController=$this->getRota();
        $NameS= "app\controller\{$RotaController}";
        this-> Obj= new $NameS;
        
        if(isset($this->parseUrl()[1])){
            self:: addMethod();
        }
    }

    #Método de adição de método do controller
    private function addMethod()
    {
        if(method_exists($this->Obj, $this->parseUrl()[1]))
            $this->setMethod("$this->parseUrl() [1]");
            self::addParam();
            call_user_func_array([$this->Obj, $this->getMethod()], $this->getParam());
    }

    #Método de adição de parâmetros do controller
    private function addParam()
    {
        $ContArray=count($this->parseUrl());

        if($ContArray > 2){
            foreach($this->parseUrl() as $Key => $Value){
                if($Key > 1){
                    $this->setParam($this->Param += [$Key => $Value]);
                }
            }
            var_dump($this->getParam());
        }
    }
}