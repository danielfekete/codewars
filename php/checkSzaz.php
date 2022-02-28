<?php


$szaz="3-000324-3549";

function checkSzaz(string $szaz):bool{
    if($szaz){
        $szaz=str_replace("-","",$szaz);
        $len=strlen($szaz);
        if($len === 11){
            //Confirmation number
            $cNumber=intval($szaz[$len-1]); 
            /*Szaz validáció confirmation number nélkül*/
            $x=[];
            preg_match('/^([1-8]{1})(\d{2})([0]{1}[1-9]{1}||[1]{1}[0-2]{1})([0]{1}[1-9]{1}||[1-2]{1}\d{1}||[3]{1}[0-1]{1})(\d{3}||)$/',substr($szaz,0,$len-1),$x);
            if(!empty($x)){
                //Gender
                $g=intval($x[1]);
                //Year
                $y=intval($x[2]);
                //Month
                $m=intval($x[3]);
                //Day
                $d=intval($x[4]);
                //Number of people born on the same day
                $n=intval($x[5]);

                /*Születési dátum ellenőrzés*/
                if($m === 2){
                    //Február -> szökőév vizsgálat 
                    /**
                     * 1900-1997 -> $g [1,2,5,6]
                     *18xx || 20xx -> $g [3,4] 
                     *2000 szökőév lenne, de nem lehet egyértelműen eldönteni, hogy az adott személy 2000-ben vagy 1800-ban született 
                     */
                    
                    if($y % 4 === 0 && $y != 0 ){
                        if($d>29){
                            return false;
                        }
                    }else if($d>28){
                        return false;
                    }
                }else{
                    //Nem februári születésű
                    if(($m < 8 && $m % 2 === 0) ||($m > 8 && $m % 2 === 1)){
                        if($d === 31){
                            return false;
                        }
                    }
                }
                /*End of születési dátum ellenőrzés*/

                /*End of Szaz validáció confirmation number nélkül*/

                /*Confirmation number validáció*/

                $calcMethod=function($array,$newMethod=false){
                    if($newMethod){
                        $array=array_reverse($array);
                    }
                    $index=0;
                    return array_reduce($array,function($carry,$item)use(&$index){
                        $multiplier=$index+1;
                        $index++;
                        return $carry+$item*$multiplier;
                    },0) % 11;
                };

                $array=str_split(substr($szaz,0,$len-1));
                $calcNumber=0;
                if(preg_match('/[1,2,5,6]/',$g)){
                    if($y<97){
                        //97 előtt születtek -> régi metódus
                        $calcNumber=$calcMethod($array);
                    }else{
                        //97 után születtek -> új metódus
                        $calcNumber=$calcMethod($array,true);
                    }
                }else if(preg_match('/[3,4]/',$g)){
                    
                    $calcNumber=$calcMethod($array);
                    if($calcNumber != $cNumber){
                        $calcNumber=$calcMethod($array,true);
                    }
                }else{
                    $calcNumber=$calcMethod($array);
                }
                if($calcNumber=== $cNumber){
                    return true;
                }
                
                var_dump($calcNumber);

                /*End of confirmation number validáció*/


            }
        }
    }
    return false;
}


var_dump(checkSzaz($szaz));

