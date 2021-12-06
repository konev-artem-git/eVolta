<?php

namespace Datto\JsonRpc\Http\Examples;

use Datto\JsonRpc\Evaluator as JsonRpcEvaluator;
use Datto\JsonRpc\Exceptions\ArgumentException;
use Datto\JsonRpc\Exceptions\MethodException;

class Evaluator implements JsonRpcEvaluator{
   
   public function evaluate($method, $arguments){
      if ($method != 'log')
         return "Wrong method name";
      
      // write log
      $fp = fopen("admin/access.log", "a");
      if(!$fp) 
          return "Error opening access.log";
      $ret = json_encode($arguments);
      fwrite($fp, $ret.",\n");
      fclose($fp);
      
      return "arguments were logged: $ret";
        
      throw new MethodException();
   }

}