<?php
    
    $msg = '';

    if (count($_POST) > 0){

        $name = trim($_POST['name']);
        
        if(strlen($name) < 2){
            $msg = 'Имя должно содержать не менее трех символов!';
        }
        else{            
            header("Location: game.php");
        }           
        
    }
    else{
        $name = '';
        $msg = 'Укажите имя!';
    };
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<form method="post">
    Имя<br>
   <p><input type="text" name="name" value="<?=$name;?>"></p>
   <p><input type="submit" value="Войти"></p>
</form>
<?=$msg?>
</body>
</html>