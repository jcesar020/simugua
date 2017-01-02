<?php  namespace myClass;
/**
 * Created by PhpStorm.
 * User: jcesa
 * Date: 06/03/2016
 * Time: 10:19 PM
 */


class myTest{

    public static function miTest(){
        return "Hola desde mi clase myTest";

    }

    public static function  Years( $desde){
        $hasta= date('Y');
        for($i=$hasta; $i>=$desde; $i--){
            $years[$i]=$i;

        }

        return $years;
    }
}