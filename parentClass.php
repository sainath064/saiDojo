<?php

class parentClass
{
public $strarra;
   
    public function printItem($string)
    {
        echo $string." Method <br>";
    }
   
    public function printPHP()
    {
        echo "Parent PHP <br>";
    }
}
class Child extends parentClass
{
    public function printItem($string)
    {
        echo $string." Method <br>";
    }
    public function stringfunctions($string)
    {
        $this->strarra['length']=strlen($string);
       $this->strarra['twoParts']=explode(" ",$string);
        $this->strarra['revOrder']=strrev(str_replace(" ","",$string));
        $this->strarra['strSplit']=str_split($string);       
       $this->strarra['strMerge']=array_merge(array('first'=>'sainath'),array('last'=>'reddy'));    
               
              
        return $this->strarra;
    }
   
}
$p = new parentClass();
$c = new Child();
$p->printItem('Parent');
$p->printPHP();      
$c->printItem('Child');
$c->printPHP();    
print_r($c->stringfunctions('Swing Wind'));   



?>






