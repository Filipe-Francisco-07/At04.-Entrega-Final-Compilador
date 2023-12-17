<?php

require_once('SLR.php');
require_once('AnalisadorSemantico.php');

$sigma = array('a','b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y','z');
$num = array(0,1,2,3,4,5,6,7,8,9);
$tokens = [];

$delta = array('q0'=>array('a'=>'q3', 'b'=>'q3', 'c'=>'q67', 'd'=>'q3', 'e'=>'q3','f'=> 'q33', 'g'=>'q3', 'h'=>'q3','i'=>'q1', 'j'=>'q3', 'k'=>'q3', 'l'=>'q3', 'm'=>'q3', 'n'=>'q3', 'o'=>'q3', 'p'=>'q28', 'q'=>'q3', 'r'=>'q3', 's'=>'q3', 't'=>'q3', 'u'=>'q3', 'v'=>'q3', 'w'=>'q3', 'x'=>'q3', 'y'=>'q3', 'z'=>'q3',0 => 'q37', 1 => 'q37', 2 => 'q37', 3 => 'q37', 4 => 'q37', 5 => 'q37', 6 => 'q37', 7 => 'q37', 8 => 'q37', 9 => 'q37', '+' => 'q38', '-' => 'q40','*' => 'q42','/' => 'q43',';' => 'q44','>' => 'q45','<' => 'q47','=' => 'q49','^' => 'q51','(' => 'q52',')' => 'q53','[' => 'q54',']' => 'q55','{' => 'q56','}' => 'q57',',' => 'q66','\n'=> 'q0',"" => 'q0'),
              //if (2)
               'q1'=>array('a'=>'q3', 'b'=>'q3', 'c'=>'q3', 'd'=>'q3', 'e'=>'q3','f'=> 'q2', 'g'=>'q3', 'h'=>'q3','i'=>'q3', 'j'=>'q3', 'k'=>'q3', 'l'=>'q3', 'm'=>'q3', 'n'=>'q71', 'o'=>'q3', 'p'=>'q3', 'q'=>'q3', 'r'=>'q3', 's'=>'q3', 't'=>'q3', 'u'=>'q3', 'v'=>'q3', 'w'=>'q3', 'x'=>'q3', 'y'=>'q3', 'z'=>'q3', 0 => 'q3', 1 => 'q3', 2 => 'q3', 3 => 'q3', 4 => 'q3', 5 => 'q3', 6 => 'q3', 7 => 'q3', 8 => 'q3', 9 => 'q3'),
               'q2'=>array('a'=>'q3', 'b'=>'q3', 'c'=>'q3', 'd'=>'q3', 'e'=>'q3','f'=> 'q3', 'g'=>'q3', 'h'=>'q3','i'=>'q3', 'j'=>'q3', 'k'=>'q3', 'l'=>'q3', 'm'=>'q3', 'n'=>'q3', 'o'=>'q3', 'p'=>'q3', 'q'=>'q3', 'r'=>'q3', 's'=>'q3', 't'=>'q3', 'u'=>'q3', 'v'=>'q3', 'w'=>'q3', 'x'=>'q3', 'y'=>'q3', 'z'=>'q3', 0 => 'q3', 1 => 'q3', 2 => 'q3', 3 => 'q3', 4 => 'q3', 5 => 'q3', 6 => 'q3', 7 => 'q3', 8 => 'q3', 9 => 'q3'),
              //identificador (3)
              'q3'=>array('a'=>'q3', 'b'=>'q3', 'c'=>'q3', 'd'=>'q3', 'e'=>'q3','f'=> 'q3', 'g'=>'q3', 'h'=>'q3','i'=>'q3', 'j'=>'q3', 'k'=>'q3', 'l'=>'q3', 'm'=>'q3', 'n'=>'q3', 'o'=>'q3', 'p'=>'q3', 'q'=>'q3', 'r'=>'q3', 's'=>'q3', 't'=>'q3', 'u'=>'q3', 'v'=>'q3', 'w'=>'q3', 'x'=>'q3', 'y'=>'q3', 'z'=>'q3', 0 => 'q3', 1 => 'q3', 2 => 'q3', 3 => 'q3', 4 => 'q3', 5 => 'q3', 6 => 'q3', 7 => 'q3', 8 => 'q3', 9 => 'q3'),
             //PRINTA (32)
              'q28'=>array('a'=>'q3', 'b'=>'q3', 'c'=>'q3', 'd'=>'q3', 'e'=>'q3','f'=> 'q3', 'g'=>'q3', 'h'=>'q3','i'=>'q3', 'j'=>'q3', 'k'=>'q3', 'l'=>'q3', 'm'=>'q3', 'n'=>'q3', 'o'=>'q3', 'p'=>'q3', 'q'=>'q3', 'r'=>'q29', 's'=>'q3', 't'=>'q3', 'u'=>'q3', 'v'=>'q3', 'w'=>'q3', 'x'=>'q3', 'y'=>'q3', 'z'=>'q3', 0 => 'q3', 1 => 'q3', 2 => 'q3', 3 => 'q3', 4 => 'q3', 5 => 'q3', 6 => 'q3', 7 => 'q3', 8 => 'q3', 9 => 'q3'),
              'q29'=>array('a'=>'q3', 'b'=>'q3', 'c'=>'q3', 'd'=>'q3', 'e'=>'q3','f'=> 'q3', 'g'=>'q3', 'h'=>'q3','i'=>'q30', 'j'=>'q3', 'k'=>'q3', 'l'=>'q3', 'm'=>'q3', 'n'=>'q3', 'o'=>'q60', 'p'=>'q3', 'q'=>'q3', 'r'=>'q3', 's'=>'q3', 't'=>'q3', 'u'=>'q3', 'v'=>'q3', 'w'=>'q3', 'x'=>'q3', 'y'=>'q3', 'z'=>'q3', 0 => 'q3', 1 => 'q3', 2 => 'q3', 3 => 'q3', 4 => 'q3', 5 => 'q3', 6 => 'q3', 7 => 'q3', 8 => 'q3', 9 => 'q3'),
              'q30'=>array('a'=>'q3', 'b'=>'q3', 'c'=>'q3', 'd'=>'q3', 'e'=>'q3','f'=> 'q3', 'g'=>'q3', 'h'=>'q3','i'=>'q3', 'j'=>'q3', 'k'=>'q3', 'l'=>'q3', 'm'=>'q3', 'n'=>'q31', 'o'=>'q3', 'p'=>'q3', 'q'=>'q3', 'r'=>'q3', 's'=>'q3', 't'=>'q3', 'u'=>'q3', 'v'=>'q3', 'w'=>'q3', 'x'=>'q3', 'y'=>'q3', 'z'=>'q3', 0 => 'q3', 1 => 'q3', 2 => 'q3', 3 => 'q3', 4 => 'q3', 5 => 'q3', 6 => 'q3', 7 => 'q3', 8 => 'q3', 9 => 'q3'),
              'q31'=>array('a'=>'q3', 'b'=>'q3', 'c'=>'q3', 'd'=>'q3', 'e'=>'q3','f'=> 'q3', 'g'=>'q3', 'h'=>'q3','i'=>'q3', 'j'=>'q3', 'k'=>'q3', 'l'=>'q3', 'm'=>'q3', 'n'=>'q3', 'o'=>'q3', 'p'=>'q3', 'q'=>'q3', 'r'=>'q3', 's'=>'q3', 't'=>'q32', 'u'=>'q3', 'v'=>'q3', 'w'=>'q3', 'x'=>'q3', 'y'=>'q3', 'z'=>'q3', 0 => 'q3', 1 => 'q3', 2 => 'q3', 3 => 'q3', 4 => 'q3', 5 => 'q3', 6 => 'q3', 7 => 'q3', 8 => 'q3', 9 => 'q3'),
              'q32'=>array('a'=>'q3', 'b'=>'q3', 'c'=>'q3', 'd'=>'q3', 'e'=>'q3','f'=> 'q3', 'g'=>'q3', 'h'=>'q3','i'=>'q3', 'j'=>'q3', 'k'=>'q3', 'l'=>'q3', 'm'=>'q3', 'n'=>'q3', 'o'=>'q3', 'p'=>'q3', 'q'=>'q3', 'r'=>'q3', 's'=>'q3', 't'=>'q3', 'u'=>'q3', 'v'=>'q3', 'w'=>'q3', 'x'=>'q3', 'y'=>'q3', 'z'=>'q3', 0 => 'q3', 1 => 'q3', 2 => 'q3', 3 => 'q3', 4 => 'q3', 5 => 'q3', 6 => 'q3', 7 => 'q3', 8 => 'q3', 9 => 'q3'),
              //for
              'q33'=>array('a'=>'q3', 'b'=>'q3', 'c'=>'q3', 'd'=>'q3', 'e'=>'q3','f'=> 'q3', 'g'=>'q3', 'h'=>'q3','i'=>'q3', 'j'=>'q3', 'k'=>'q3', 'l'=>'q3', 'm'=>'q3', 'n'=>'q3', 'o'=>'q34', 'p'=>'q3', 'q'=>'q3', 'r'=>'q3', 's'=>'q3', 't'=>'q3', 'u'=>'q3', 'v'=>'q3', 'w'=>'q3', 'x'=>'q3', 'y'=>'q3', 'z'=>'q3', 0 => 'q3', 1 => 'q3', 2 => 'q3', 3 => 'q3', 4 => 'q3', 5 => 'q3', 6 => 'q3', 7 => 'q3', 8 => 'q3', 9 => 'q3'),
              'q34'=>array('a'=>'q3', 'b'=>'q3', 'c'=>'q3', 'd'=>'q3', 'e'=>'q3','f'=> 'q3', 'g'=>'q3', 'h'=>'q3','i'=>'q3', 'j'=>'q3', 'k'=>'q3', 'l'=>'q3', 'm'=>'q3', 'n'=>'q3', 'o'=>'q3', 'p'=>'q3', 'q'=>'q3', 'r'=>'q35', 's'=>'q3', 't'=>'q3', 'u'=>'q3', 'v'=>'q3', 'w'=>'q3', 'x'=>'q3', 'y'=>'q3', 'z'=>'q3', 0 => 'q3', 1 => 'q3', 2 => 'q3', 3 => 'q3', 4 => 'q3', 5 => 'q3', 6 => 'q3', 7 => 'q3', 8 => 'q3', 9 => 'q3'),
              'q35'=>array('a'=>'q3', 'b'=>'q3', 'c'=>'q3', 'd'=>'q3', 'e'=>'q3','f'=> 'q3', 'g'=>'q3', 'h'=>'q3','i'=>'q3', 'j'=>'q3', 'k'=>'q3', 'l'=>'q3', 'm'=>'q3', 'n'=>'q3', 'o'=>'q3', 'p'=>'q3', 'q'=>'q3', 'r'=>'q3', 's'=>'q3', 't'=>'q3', 'u'=>'q3', 'v'=>'q3', 'w'=>'q3', 'x'=>'q3', 'y'=>'q3', 'z'=>'q3', 0 => 'q3', 1 => 'q3', 2 => 'q3', 3 => 'q3', 4 => 'q3', 5 => 'q3', 6 => 'q3', 7 => 'q3', 8 => 'q3', 9 => 'q3'),
              //ograma
              'q60'=>array('a'=>'q3', 'b'=>'q3', 'c'=>'q3', 'd'=>'q3', 'e'=>'q3','f'=> 'q3', 'g'=>'q61', 'h'=>'q3','i'=>'q3', 'j'=>'q3', 'k'=>'q3', 'l'=>'q3', 'm'=>'q3', 'n'=>'q3', 'o'=>'q3', 'p'=>'q3', 'q'=>'q3', 'r'=>'q3', 's'=>'q3', 't'=>'q3', 'u'=>'q3', 'v'=>'q3', 'w'=>'q3', 'x'=>'q3', 'y'=>'q3', 'z'=>'q3', 0 => 'q3', 1 => 'q3', 2 => 'q3', 3 => 'q3', 4 => 'q3', 5 => 'q3', 6 => 'q3', 7 => 'q3', 8 => 'q3', 9 => 'q3'),
              'q61'=>array('a'=>'q3', 'b'=>'q3', 'c'=>'q3', 'd'=>'q3', 'e'=>'q3','f'=> 'q3', 'g'=>'q3', 'h'=>'q3','i'=>'q3', 'j'=>'q3', 'k'=>'q3', 'l'=>'q3', 'm'=>'q3', 'n'=>'q3', 'o'=>'q3', 'p'=>'q3', 'q'=>'q3', 'r'=>'q62', 's'=>'q3', 't'=>'q3', 'u'=>'q3', 'v'=>'q3', 'w'=>'q3', 'x'=>'q3', 'y'=>'q3', 'z'=>'q3', 0 => 'q3', 1 => 'q3', 2 => 'q3', 3 => 'q3', 4 => 'q3', 5 => 'q3', 6 => 'q3', 7 => 'q3', 8 => 'q3', 9 => 'q3'),
              'q62'=>array('a'=>'q63', 'b'=>'q3', 'c'=>'q3', 'd'=>'q3', 'e'=>'q3','f'=> 'q3', 'g'=>'q3', 'h'=>'q3','i'=>'q3', 'j'=>'q3', 'k'=>'q3', 'l'=>'q3', 'm'=>'q3', 'n'=>'q3', 'o'=>'q3', 'p'=>'q3', 'q'=>'q3', 'r'=>'q3', 's'=>'q3', 't'=>'q3', 'u'=>'q3', 'v'=>'q3', 'w'=>'q3', 'x'=>'q3', 'y'=>'q3', 'z'=>'q3', 0 => 'q3', 1 => 'q3', 2 => 'q3', 3 => 'q3', 4 => 'q3', 5 => 'q3', 6 => 'q3', 7 => 'q3', 8 => 'q3', 9 => 'q3'),
              'q63'=>array('a'=>'q3', 'b'=>'q3', 'c'=>'q3', 'd'=>'q3', 'e'=>'q3','f'=> 'q3', 'g'=>'q3', 'h'=>'q3','i'=>'q3', 'j'=>'q3', 'k'=>'q3', 'l'=>'q3', 'm'=>'q64', 'n'=>'q3', 'o'=>'q3', 'p'=>'q3', 'q'=>'q3', 'r'=>'q3', 's'=>'q3', 't'=>'q3', 'u'=>'q3', 'v'=>'q3', 'w'=>'q3', 'x'=>'q3', 'y'=>'q3', 'z'=>'q3', 0 => 'q3', 1 => 'q3', 2 => 'q3', 3 => 'q3', 4 => 'q3', 5 => 'q3', 6 => 'q3', 7 => 'q3', 8 => 'q3', 9 => 'q3'),
              'q64'=>array('a'=>'q65', 'b'=>'q3', 'c'=>'q3', 'd'=>'q3', 'e'=>'q3','f'=> 'q3', 'g'=>'q3', 'h'=>'q3','i'=>'q3', 'j'=>'q3', 'k'=>'q3', 'l'=>'q3', 'm'=>'q3', 'n'=>'q3', 'o'=>'q3', 'p'=>'q3', 'q'=>'q3', 'r'=>'q3', 's'=>'q3', 't'=>'q3', 'u'=>'q3', 'v'=>'q3', 'w'=>'q3', 'x'=>'q3', 'y'=>'q3', 'z'=>'q3', 0 => 'q3', 1 => 'q3', 2 => 'q3', 3 => 'q3', 4 => 'q3', 5 => 'q3', 6 => 'q3', 7 => 'q3', 8 => 'q3', 9 => 'q3'),
              'q65'=>array(),
             //char
             'q67'=>array('a'=>'q3', 'b'=>'q3', 'c'=>'q3', 'd'=>'q3', 'e'=>'q3','f'=> 'q3', 'g'=>'q3', 'h'=>'q68','i'=>'q3', 'j'=>'q3', 'k'=>'q3', 'l'=>'q3', 'm'=>'q3', 'n'=>'q3', 'o'=>'q3', 'p'=>'q3', 'q'=>'q3', 'r'=>'q3', 's'=>'q3', 't'=>'q3', 'u'=>'q3', 'v'=>'q3', 'w'=>'q3', 'x'=>'q3', 'y'=>'q3', 'z'=>'q3', 0 => 'q3', 1 => 'q3', 2 => 'q3', 3 => 'q3', 4 => 'q3', 5 => 'q3', 6 => 'q3', 7 => 'q3', 8 => 'q3', 9 => 'q3'),
              'q68'=>array('a'=>'q69', 'b'=>'q3', 'c'=>'q3', 'd'=>'q3', 'e'=>'q3','f'=> 'q3', 'g'=>'q3', 'h'=>'q3','i'=>'q3', 'j'=>'q3', 'k'=>'q3', 'l'=>'q3', 'm'=>'q64', 'n'=>'q3', 'o'=>'q3', 'p'=>'q3', 'q'=>'q3', 'r'=>'q3', 's'=>'q3', 't'=>'q3', 'u'=>'q3', 'v'=>'q3', 'w'=>'q3', 'x'=>'q3', 'y'=>'q3', 'z'=>'q3', 0 => 'q3', 1 => 'q3', 2 => 'q3', 3 => 'q3', 4 => 'q3', 5 => 'q3', 6 => 'q3', 7 => 'q3', 8 => 'q3', 9 => 'q3'),
              'q69'=>array('a'=>'q5', 'b'=>'q3', 'c'=>'q3', 'd'=>'q3', 'e'=>'q3','f'=> 'q3', 'g'=>'q3', 'h'=>'q3','i'=>'q3', 'j'=>'q3', 'k'=>'q3', 'l'=>'q3', 'm'=>'q3', 'n'=>'q3', 'o'=>'q3', 'p'=>'q3', 'q'=>'q3', 'r'=>'q70', 's'=>'q3', 't'=>'q3', 'u'=>'q3', 'v'=>'q3', 'w'=>'q3', 'x'=>'q3', 'y'=>'q3', 'z'=>'q3', 0 => 'q3', 1 => 'q3', 2 => 'q3', 3 => 'q3', 4 => 'q3', 5 => 'q3', 6 => 'q3', 7 => 'q3', 8 => 'q3', 9 => 'q3'),
              'q70'=>array('a'=>'q3', 'b'=>'q3', 'c'=>'q3', 'd'=>'q3', 'e'=>'q3','f'=> 'q3', 'g'=>'q3', 'h'=>'q3','i'=>'q3', 'j'=>'q3', 'k'=>'q3', 'l'=>'q3', 'm'=>'q3', 'n'=>'q3', 'o'=>'q3', 'p'=>'q3', 'q'=>'q3', 'r'=>'q3', 's'=>'q3', 't'=>'q3', 'u'=>'q3', 'v'=>'q3', 'w'=>'q3', 'x'=>'q3', 'y'=>'q3', 'z'=>'q3', 0 => 'q3', 1 => 'q3', 2 => 'q3', 3 => 'q3', 4 => 'q3', 5 => 'q3', 6 => 'q3', 7 => 'q3', 8 => 'q3', 9 => 'q3'),
             
             //int
             'q71'=>array('a'=>'q3', 'b'=>'q3', 'c'=>'q3', 'd'=>'q3', 'e'=>'q3','f'=> 'q3', 'g'=>'q3', 'h'=>'q3','i'=>'q3', 'j'=>'q3', 'k'=>'q3', 'l'=>'q3', 'm'=>'q3', 'n'=>'q3', 'o'=>'q3', 'p'=>'q3', 'q'=>'q3', 'r'=>'q3', 's'=>'q3', 't'=>'q72', 'u'=>'q3', 'v'=>'q3', 'w'=>'q3', 'x'=>'q3', 'y'=>'q3', 'z'=>'q3', 0 => 'q3', 1 => 'q3', 2 => 'q3', 3 => 'q3', 4 => 'q3', 5 => 'q3', 6 => 'q3', 7 => 'q3', 8 => 'q3', 9 => 'q3'),
              'q72'=>array('a'=>'q3', 'b'=>'q3', 'c'=>'q3', 'd'=>'q3', 'e'=>'q3','f'=> 'q3', 'g'=>'q3', 'h'=>'q3','i'=>'q3', 'j'=>'q3', 'k'=>'q3', 'l'=>'q3', 'm'=>'q3', 'n'=>'q3', 'o'=>'q3', 'p'=>'q3', 'q'=>'q3', 'r'=>'q70', 's'=>'q3', 't'=>'q3', 'u'=>'q3', 'v'=>'q3', 'w'=>'q3', 'x'=>'q3', 'y'=>'q3', 'z'=>'q3', 0 => 'q3', 1 => 'q3', 2 => 'q3', 3 => 'q3', 4 => 'q3', 5 => 'q3', 6 => 'q3', 7 => 'q3', 8 => 'q3', 9 => 'q3'),
             

              //const (37)
              'q37'=>array(0 => 'q37', 1 => 'q37', 2 => 'q37', 3 => 'q37', 4 => 'q37', 5 => 'q37', 6 => 'q37', 7 => 'q37', 8 => 'q37', 9 => 'q37'),
              //+ (38)
              'q38'=>array('+' => 'q39'),
              'q39'=>array(),
              //- (40)
              'q40'=>array('-' => 'q41'),
              'q41'=>array(),
              //(/) (43)
              'q43'=>array(), 
                //pv
              'q44'=>array(), 
              //> (45)
              'q45'=>array('=' => 'q46'), 
              'q46'=>array(), 
              //< (47)
              'q47'=>array('=' => 'q48'), 
              'q48'=>array(), 
              'q49'=>array('=' => 'q50'), 
              // ( (52)
              'q52'=>array(),
              // ) (53)
              'q53'=>array(),
              // { (56) 
              'q56'=>array(),
              // } (57)
              'q57'=>array(),
                //virgula
              'q66'=>array());

$Q = array('q0','q1', 'q2', 'q3','q32','q33','q34','q35','q36','q37','q38','q39','q40','q41','q42','q43','q44','q45','q46','q47','q48','q49','q50','q51','q52','q53','q54','q55','q56','q57','q60','q61','q62','q63','q64','q65','q66','q67','q68','q69','q70','q71','q72');

$q0 = 'q0';
$count = 0;
$pos1 = 0;
$pos2 = 0;
$tokens = [];
$tokens2 = [];
$index = 0;
$mostratokens ='';
$errosiniciais = '';

$finais = array('q1', 'q2', 'q3','q32','q35','q36','q37', 'q38', 'q39','q40','q41','q42', 'q43', 'q44','q45','q46','q47', 'q48', 'q49', 'q50','q51','q52','q53', 'q54', 'q55','q56','q57','q58','q65','q66','q70','q72');

$palavra = (isset($_POST['entrada'])?$_POST['entrada']:""); 

$array_palavra = explode(" ",$palavra);
$tam = count($array_palavra);

$estado = $q0;

for($j = 0; $j < $tam; $j++){
    for($i = 0; $i < strlen($array_palavra[$j]); $i++){
        $count++;
       
        $palavra_atual = $array_palavra[$j];
        $estado = $delta[$estado][$palavra_atual[$i]];

        if($i == 0){
            $pos1 = $count;
        }
        if($i == strlen($array_palavra[$j])-1){
            $pos2 = $count;
        }
    }
    

    if(in_array($estado,$finais)){
        // token , palavra,  pos1 , pos2
        $token = "";

        switch ($estado) {
            case 'q1':
                $token = "id";
                $tokens[$index] = $token;
                $index++;
                break;
            case 'q2':
                $token = "ifi";
                $tokens[$index] = $token;
                $index++;

                break;
            case 'q3':
                $token = "id";
                $tokens[$index] = $token;
                $index++;
                break;
            case 'q32':
                $token ="printa";
                $tokens[$index] = $token;
                $index++;
                break;
            case 'q35':
                $token ="for";
                $tokens[$index] = $token;
                $index++;
                break;
            case 'q37':
                $token ="const";
                $tokens[$index] = $token;
                $index++;
                break;
            case 'q38':
                $token ="mais";
                $tokens[$index] = $token;
                $index++;
                break;
            case 'q39':
                $token ="incremento";
                $tokens[$index] = $token;
                $index++;
                break;
            case 'q40':
                $token ="menos";
                $tokens[$index] = $token;
                $index++;
                break;
            case 'q41':
                $token ="decremento";
                $tokens[$index] = $token;
                $index++;
                break;
            case 'q43':
                $token ="barra";
                $tokens[$index] = $token;
                $index++;
                break;
            case 'q44':
                $token ="pv";
                $tokens[$index] = $token;
                $index++;
                break;
            case 'q45':
                $token ="maior";
                $tokens[$index] = $token;
                $index++;
                break;
            case 'q46':
                $token ="maiorigual";
                $tokens[$index] = $token;
                $index++;
                break;
            case 'q47':
                $token ="menor";
                $tokens[$index] = $token;
                $index++;
                break;
            case 'q48':
                $token ="menorigual";
                $tokens[$index] = $token;
                $index++;
                break;
            case 'q50':
                $token ="igualdade";
                $tokens[$index] = $token;
                $index++;
            break;
            case 'q52':
                $token ="ap";
                $tokens[$index] = $token;
                $index++;
                break;
            case 'q53':
                $token ="fp";
                $tokens[$index] = $token;
                $index++;
                break;
            case 'q56':
                $token ="ac";
                $tokens[$index] = $token;
                $index++;
                break;
            case 'q57':
                $token ="fc";
                $tokens[$index] = $token;
                $index++;
                break;
            case 'q65':
                $token ="programa";
                $tokens[$index] = $token;
                $index++;
                break;
            case 'q66':
                $token ="v";
                $tokens[$index] = $token;
                $index++;
                break;
            case 'q70':
                $token ="char";
                $tokens[$index] = $token;
                $index++;
                break;
            case 'q72':
                $token ="int";
                $tokens[$index] = $token;
                $index++;
                break;
            case 'q49':
                $token ="igual";
                $tokens[$index] = $token;
                $index++;
                break;
            default:
            $errosiniciais .= "<br>O estado não é final.";
        }   

        $mostratokens.= "<br>Token: '".$token. "',   Palavra: '".$palavra_atual."',   Estado: '$estado'".",   Posição inicial: '".$pos1."',   Posição final:'".$pos2."'<br>";

        $pos1 = 0;
        $pos2 = 0; 
        $estado = 'q0';
    }else{
        $errosiniciais .= "Cadeia rejeitada"."<br>Estado atual: ".$estado;
        break;
    }   
}


    $tokens2 = $tokens;

    for($i = 0; $i < $tam; $i++){
        if($tokens2[$i]=="id"){
            $tokens2[$i] = $array_palavra[$i];
        }
    }
    
    $slr = new SLR();

    $tokens[$index] = '$';
    $sint = '';

    if ($slr->parser($tokens)){
        $sint .= $slr->parser($tokens);
        $sint.= "\nLinguagem aceita pela análise sintática.";
     } else
        $sint.= "\nErro ao processar entrada na análise sintática.";


    $sem = new AnalisadorSemantico($tokens2);
    $semantica = $sem->analisar();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="style.css">
    
    <title>Compilador</title>
</head>
<body>   
    <main id="container">
        <div>
            <form id="login_form">
            <div id="form_header">
                <h1>Compilador</h1>
            </div>
            <div id="table">
                <h2>Análise léxica:</h2>
                <br>
                <?php
                echo('Palavra de entrada: '.$palavra.'<br>');
                echo($errosiniciais.'<br>');
                echo($mostratokens.'<br>');
                ?>

                <br>
                <h2>Análise sintática:</h2>
               <br>
               <?php             
                echo($sint);
                ?>
                <br>
                <br>
                <h2>Análise semântica:</h2>     
                <?php   
                echo('<br>'.'<br>'.$semantica.'<br>');
                ?>
            </div>

            </a><button type="submit"id="login_button"><a href="index.html">Digitar novamente</a></button>
            </form>
</div>
</body>
</html>
