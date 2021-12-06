<?php

namespace Datto\JsonRpc\Http\Examples;

use Datto\JsonRpc\Evaluator as JsonRpcEvaluator;
use Datto\JsonRpc\Exceptions\ArgumentException;
use Datto\JsonRpc\Exceptions\MethodException;

class Evaluator implements JsonRpcEvaluator{

   public function evaluate($method, $arguments){
    var_dump($method);
    var_dump($arguments); return;
      list($a, $b) = $arguments;
      echo "arguments = $a, $b";
      
      switch($method){
        
         case 'add':
            if (!is_int($a) || !is_int($b)) 
                throw new ArgumentException();
           return $a + $b;
       
         case 'log':
        // вариант: пишем в лог типа access.log Потом разберемся
                
        return "Data were logged";//: $a, $b <br>";
                        
      }
/*      
        if ($method === 'add'){ 
//            return self::add($arguments);
            list($a, $b) = $arguments;
            if (!is_int($a) || !is_int($b)) 
                throw new ArgumentException();
           return $a + $b;
        }
*/        
        throw new MethodException();
    }

    private static function add($arguments){
        list($a, $b) = $arguments;

        if (!is_int($a) || !is_int($b)) 
            throw new ArgumentException();

//     return Math::add($a, $b);
       return $a + $b;
    }
}
