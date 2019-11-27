<?php

namespace Hcode;

use Rain\Tpl;

class Page{

private $tpl;
private $options=[];
private $defaults=[
    "data"=>[]
];

    public function __construct($opts=array())
    {

    //uni as duas classes, o ultimo terá prioridade se tiver dados
    $this->options= array_merge($this->defaults,$opts);
        

   //echo $_SERVER["SCRIPT_NAME"]."/views/";

    $config= array(
    "tpl_dir"=>$_SERVER["DOCUMENT_ROOT"]."/ecommerce/views/",
    "cacher_dir"=>$_SERVER["DOCUMENT_ROOT"]."/ecommerce/views-cache/",
    "debug"=>false
    );


    Tpl::configure($config);
    $this->tpl= new Tpl;

    $this->setData($this->options["data"]);
        
    $this->tpl->draw("header");

    }
    
    private function setData($data=array()){

        foreach ($data as $key => $value) {
            $this->tpl->assign($key,$value);
        }

    }


    public function setTpl($name,$data=array(),$returnHtml=false){


        $this->setData($data);
        return $this->tpl->draw($name,$returnHtml);
        
    }


    public function __destruct()
    {
      $this->tpl->draw("footer");  
    }
}

?>