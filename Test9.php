<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Question1(c)Sept2021</title>
    </head>

    <body>
        <?php
        $op2="be";
        function foo($opl)
        {
            global $op2;
            echo $op2;
            echo $opl;
        }        
        foo("awesome");
        ?>
    </body>
</html>