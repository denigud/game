<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page GAME</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="CSS/main.css" />
</head>
<body>

    <div id="prize"></div>
    <form name="startGame"> 
               
        <div id='Money' class='buttonGroup hidden'>            
            <input type="button" id="money_btn" value="Перечислить на банковский счет">
            <input type="button" id="moneyToBonus_btn" value="Конвертировать в баллы лояльности">            
        </div>
        <div id='Point' class='buttonGroup hidden'>
            <input type="button" id="point_btn" value="Зачислить на счет лояльности">
        </div>
        <div id='Item' class='buttonGroup hidden'>
            <input type="button" id="item_btn" value="Отправить по почте">
            <input type="button" id="itemCancel_btn" value="Отказаться">
        </div>

        <p><input type="button" name="game" id="game_btn" value="Получить приз"></p>

    </form>   

    <script>
        var gameBtn = document.getElementById("game_btn");

        gameBtn.onclick = function() { 
            var xhr = new XMLHttpRequest();
            xhr.open("GET", 'gameStart.php?action=getPrize', true);
            xhr.send();

            xhr.onreadystatechange = function(){
                if(xhr.status == 200 && xhr.response != ""){                    
                    var response = JSON.parse(xhr.response);
                    document.getElementById("prize").innerHTML = response.responseText;

                    $elements = document.getElementsByClassName('buttonGroup');
                    for (var i = 0; i < $elements.length; i++) {
                        if(!$elements[i].classList.contains("hidden"))$elements[i].classList.add("hidden");
                    }

                    document.getElementById(response.prize).classList.remove("hidden");
                }
            }
            
        };    
    </script>
</body>
</html>