<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page GAME</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
    <form name="startGame">
    <p><input type="button" name="game" id="game_btn" value="Получить приз"></p>
    </form>

    <div id="prize"> 
           
    </div>

    <script>
        $("#game_btn").click(function() {                        
            $.ajax({
                url:"gamefunc.php",
                data:"",
                success:function(data){
                    $("#prize").html(data);
                }
            });                        
        });
    
    </script>
</body>
</html>