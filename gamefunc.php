<?php
    
    $action = $_GET['action'];

    $prizeArr = ['Деньги', 'Баллы', 'Предмет'];

    $thingArr = ['предмет1', 'предмет2', 'предмет3', 'предмет4', 'предмет5', 'предмет6', 'предмет7', 'предмет8', 'предмет9', 'предмет10'];

    $prizeNumber = random_int(0, 2);  

    if($prizeNumber < 2){
        $prizeSize = random_int(1, 100);
        $prizeStr = $prizeArr[$prizeNumber] . ": " . $prizeSize;
    }else{            
        $thingNumber = random_int(0, count($thingArr)-1);
        $prizeStr = $prizeArr[$prizeNumber] . ": '" . $thingArr[$thingNumber]."'";
    };

    echo $prizeStr;

?>