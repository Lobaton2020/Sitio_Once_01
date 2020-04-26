<?php
 function getDatetime($fecha){

    $date = new DateTime($fecha);

   $mes = [1=>"Enero",
           2=>"Febrero",
           3=>"Marzo",
           4=>"Abril",
           5=>"Mayo",
           6=>"Junio",
           7=>"Julio",
           8=>"Agosto",
           9=>"Sertiembre",
           10=>"Octubre",
           11=>"Noviembre",
           12=>"Diciembre"];

   $dia =  [1=>"Lunes",
            2=>"Martes",
            3=>"Miercoles",
            4=>"Jueves",
            5=>"Viernes",
            6=>"Sabado",
            0=>"Domingo"];

$string_formato =  $dia[$date->format("w")].
            " <em><b>". $date->format("j").
            " de ". $mes[$date->format("n")].
            "</b></em> del ".$date->format("Y");

return $string_formato;
        }

 function getDatetime_login_history($fecha,$hora){

            $date = new DateTime($fecha);
            $time = new DateTime($hora);

           $mes = [1=>"Enero",
                   2=>"Febrero",
                   3=>"Marzo",
                   4=>"Abril",
                   5=>"Mayo",
                   6=>"Junio",
                   7=>"Julio",
                   8=>"Agosto",
                   9=>"Sertiembre",
                   10=>"Octubre",
                   11=>"Noviembre",
                   12=>"Diciembre"];

           $dia =  [1=>"Lunes",
                    2=>"Martes",
                    3=>"Miercoles",
                    4=>"Jueves",
                    5=>"Viernes",
                    6=>"Sabado",
                    0=>"Domingo"];

     $string_formato =  $dia[$date->format("w")].
                    " <em><b>". $date->format("j").
                    " de ". $mes[$date->format("n")].
                    "</b></em> del ".$date->format("Y").
                    " a las  <b>".$time->format("g").
                    ":". $time->format("i")."<small>:".
                    $time->format("s").
                    "</small> ". $time->format("a") ."</b>";

     return $string_formato;
                }
?>
