<?php

class AnalisadorSemantico {
    private $tokens;
    private $tam;
    private $tabela_simbolos;

    public function __construct(array $tokens) {
        $this->tokens = $tokens;
        $this->tabela_simbolos = [];
        $this->tam = count($tokens);
    }

    public function analisar() {
        $semant = '';
        $varinicializada= [];
        $j = 0;
        for($i = 0; $i < $this->tam; $i++){
            if($this->tokens[$i] == "int" || $this->tokens[$i] == "char"){
                $varinicializada[$j] = $this->tokens[$i+1];
                $j++;
            }
        }
            
        $arrayUnico = [];
        $erro = false;
        foreach ($varinicializada as $var) {
              if (!in_array($var, $arrayUnico)) {
                $arrayUnico[] = $var;
              } else {
                $erro = true;         
                break;
              }
        }
        if($erro){
            $semant.="var ".$var." ja iniciada, erro semantico.";
        }else
        $semant.="Sem erros na semântica da entrada.";

        return $semant;
    }

    public function analisar2() {
        $semant = '';
        $varinicializada= [];
        $j = 0;
        for($i = 0; $i < $this->tam; $i++){
            if($this->tokens[$i] == "int" || $this->tokens[$i] == "char"){
                $varinicializada[$j] = $this->tokens[$i+1];
                $j++;
            }
        }
 
        $arrayUnico = [];
        $erro = false;
        foreach ($varinicializada as $var) {
              if (!in_array($var, $arrayUnico)) {
                $arrayUnico[] = $var;
              } else {
                $erro = true;
          
                break;
              }
        }
        if($erro){
            $semant.="var ".$var." ja iniciada, erro semantico.";
        }else
        $semant.="Sem erros na semântica da entrada.";

        return $semant;
    }
}
?>