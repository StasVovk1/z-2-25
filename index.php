<?php 
    $mass = [-1,-2,-1,-5,3,6,8,45,-3,54,6,7,-6,7,8,-4,5,6,7,16];
    $k = 4;
    echo 'Исходные данные: k: '.$k.' array: '.json_encode($mass);
    $positionMaxNumber = positionMaxNumber($mass);
    echo '<br> Позицыя максимального числа: '.$positionMaxNumber;
    $arrayMinNumber = minNumberArray($mass, $k);
    echo '<br> k минимальных элементов: '.json_encode($arrayMinNumber);
    if ($arrayMinNumber){
        $answer = arraysMerging($mass, $arrayMinNumber, $positionMaxNumber);
        echo '<br> Ответ: '.json_encode($answer);
    }else {
        echo '<br>Что то не так с заданными параметрами.';
    }

    function counts($mass){
        $i = 1;            
        while ($mass[$i].'' != ''){
            $i++;
        }
        return $i;
    }

    function arraysMerging ($firstArray, $secondArray, $positionInFirstArray = null){
        $array = [];
        if ($positionInFirstArray){
            for ($i = 0; $i < counts($firstArray); $i++){
                if ($i != $positionInFirstArray){
                    $array[] = $firstArray[$i];
                }else {
                    $array[] = $firstArray[$i];
                    for ($j = 0; $j < counts($secondArray); $j++){
                        $array[] = $secondArray[$j];
                    }
                }
            }
            return $array;
        }else {
            for ($i = 0; $i < counts($secondArray); $i++){
                $firstArray[] = $secondArray[$i];
            }
            return $firstArray;
        }        
    }

    function minNumberArray($array, $kol = 0){
        $array_2 = [];
        if ($kol <= 0){return false;}
        if ($kol >= counts($array)-1) {return false;}

        $arrayNew = sortArray($array);

        for ($i = 0; $i < $kol; $i++){
            $array_2[] = $arrayNew[$i];
        }
        return $array_2;
    }

    function  positionMaxNumber ($array){
        $max = $array[0];
        $position = 0;
        for ($i = 0; $i < counts($array); $i++){
            if ($max < $array[$i]){
                $max = $array[$i];
                $position = $i;
            }
        }
        return $position;
    }

    function sortArray ($array){
        for ($i = 0; $i < counts($array) - 1; $i++) {
            for ($j = 0; $j < counts($array) - $i - 1; $j++) {
                if ($array[$j] > $array[$j + 1]) {
                    $temp = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $temp;
                }
            }
        }
        return $array;
    }
?>