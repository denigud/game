<?php
    
    $action = $_GET['action'];

    if($action == 'getPrize'){
        echo json_encode(getPrize());
    }

    function getPrize(){
       
        $money = 0;
        $_FILE_ITEMS = './data/things.txt';
        $_FILE_MONEY = './data/moneys.txt';

        $prizeArr = ['Money', 'Point', 'Item'];
        $thingArr = file($_FILE_ITEMS, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $moneysArr = file($_FILE_MONEY, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);         

        if(count($moneysArr) > 0)$money = (int) $moneysArr[0];

        if($money <= 0){
            unset($prizeArr[0]);
            $prizeArr = array_values($prizeArr);
        }

        if(count($thingArr) == 0){
            unset($prizeArr[1]);
            $prizeArr = array_values($prizeArr);
        }
        
        $prizeNumber = random_int(0, count($prizeArr)-1);  

        if($prizeArr[$prizeNumber] == 'Money'){
            $prizeSize = random_int(1, $money);
            $prizeStr = $prizeArr[$prizeNumber] . ": " . $prizeSize;
            file_put_contents($_FILE_MONEY, $money - $prizeSize);

        }elseif($prizeArr[$prizeNumber] == 'Point'){
            $prizeSize = random_int(1, 100);
            $prizeStr = $prizeArr[$prizeNumber] . ": " . $prizeSize;

        }else {            
            $thingNumber = random_int(0, count($thingArr)-1);
            $prizeStr = $prizeArr[$prizeNumber] . ": '" . $thingArr[$thingNumber]."'";
            unset($thingArr[$thingNumber]);
            $thingArr = array_values($thingArr);
            file_put_contents($_FILE_ITEMS, implode("\r\n", $thingArr));
        };

        return ['responseText'=>$prizeStr, 'prize'=>$prizeArr[$prizeNumber]];

    } 

?>