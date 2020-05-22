<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <title>Tic-Tac-Toe</title>
  <style>
  .box
    {
      width: 100px;
      height: 100px;
      text-align: center;
      font-size: 20px;
      margin: 2px 0px;
      cursor: pointer;
    }
  .restart
    {
      text-align: center;
      cursor: pointer;
    }
  </style>
</head>
<body align="center">
  <?php

    function check($id)
    {
        if ($id == 0) {
            if ($_SESSION['data'][0] == $_SESSION['data'][1] && $_SESSION['data'][1] == $_SESSION['data'][2]) {
                result();
                return;
            } elseif ($_SESSION['data'][0] == $_SESSION['data'][3] && $_SESSION['data'][3] == $_SESSION['data'][6]) {
                result();
                return;
            } elseif ($_SESSION['data'][0] == $_SESSION['data'][4] && $_SESSION['data'][4] == $_SESSION['data'][8]) {
                result();
                return;
            }
        } elseif ($id == 1) {
            if ($_SESSION['data'][0] == $_SESSION['data'][1] && $_SESSION['data'][1] == $_SESSION['data'][2]) {
                result();
                return;
            } elseif ($_SESSION['data'][1] == $_SESSION['data'][4] && $_SESSION['data'][4] == $_SESSION['data'][7]) {
                result();
                return;
            }
        } elseif ($id == 2) {
            if ($_SESSION['data'][0] == $_SESSION['data'][1] && $_SESSION['data'][1] == $_SESSION['data'][2]) {
                result();
                return;
            } elseif ($_SESSION['data'][2] == $_SESSION['data'][5] && $_SESSION['data'][5] == $_SESSION['data'][8]) {
                result();
                return;
            } elseif ($_SESSION['data'][2] == $_SESSION['data'][4] && $_SESSION['data'][4] == $_SESSION['data'][6]) {
                result();
                return;
            }
        } elseif ($id == 3) {
            if ($_SESSION['data'][0] == $_SESSION['data'][3] && $_SESSION['data'][3] == $_SESSION['data'][6]) {
                result();
                return;
            } elseif ($_SESSION['data'][3] == $_SESSION['data'][4] && $_SESSION['data'][4] == $_SESSION['data'][5]) {
                result();
                return;
            }
        } elseif ($id == 4) {
            if ($_SESSION['data'][1] == $_SESSION['data'][4] && $_SESSION['data'][4] == $_SESSION['data'][7]) {
                result();
                return;
            } elseif ($_SESSION['data'][3] == $_SESSION['data'][4] && $_SESSION['data'][4] == $_SESSION['data'][5]) {
                result();
                return;
            } elseif ($_SESSION['data'][0] == $_SESSION['data'][4] && $_SESSION['data'][4] == $_SESSION['data'][8]) {
                result();
                return;
            } elseif ($_SESSION['data'][2] == $_SESSION['data'][4] && $_SESSION['data'][4] == $_SESSION['data'][6]) {
                result();
                return;
            }
        } elseif ($id == 5) {
            if ($_SESSION['data'][2] == $_SESSION['data'][5] && $_SESSION['data'][5] == $_SESSION['data'][8]) {
                result();
                return;
            } elseif ($_SESSION['data'][3] == $_SESSION['data'][4] && $_SESSION['data'][4] == $_SESSION['data'][5]) {
                result();
                return;
            }
        } elseif ($id == 6) {
            if ($_SESSION['data'][0] == $_SESSION['data'][3] && $_SESSION['data'][3] == $_SESSION['data'][6]) {
                result();
                return;
            } elseif ($_SESSION['data'][2] == $_SESSION['data'][4] && $_SESSION['data'][4] == $_SESSION['data'][6]) {
                result();
                return;
            } elseif ($_SESSION['data'][6] == $_SESSION['data'][7] && $_SESSION['data'][7] == $_SESSION['data'][8]) {
                result();
                return;
            }
        } elseif ($id == 7) {
            if ($_SESSION['data'][6] == $_SESSION['data'][7] && $_SESSION['data'][7] == $_SESSION['data'][8]) {
                result();
                return;
            } elseif ($_SESSION['data'][1] == $_SESSION['data'][4] && $_SESSION['data'][4] == $_SESSION['data'][7]) {
                result();
                return;
            }
        } elseif ($id == 8) {
            if ($_SESSION['data'][2] == $_SESSION['data'][5] && $_SESSION['data'][5] == $_SESSION['data'][8]) {
                result();
                return;
            } elseif ($_SESSION['data'][0] == $_SESSION['data'][4] && $_SESSION['data'][4] == $_SESSION['data'][8]) {
                result();
                return;
            } elseif ($_SESSION['data'][6] == $_SESSION['data'][7] && $_SESSION['data'][7] == $_SESSION['data'][8]) {
                result();
                return;
            }
        }
        if (in_array(" ", $_SESSION['data'])) {
            return;
        } else {
            echo "<script>alert(\"Draw\");</script>";
        }
    }

    function result()
    {
        if ($_SESSION['f']==0) {
            echo "<script>alert(\"O won\");</script>";
        } elseif ($_SESSION['f']==1) {
            echo "<script>alert(\"X won\");</script>";
        }
        $_SESSION['game_over']=1;
    }

    function restart()
    {
        $_SESSION['data']=array(" ", " ", " ", " ", " ", " ", " ", " ", " ");
        $_SESSION['game_over']=0;
        $_SESSION['f']=0;
    }

    for ($z=0;$z<9;$z++) {
        if (array_key_exists($z, $_POST)) {
            if ($_SESSION['f']==0) {
                $_SESSION['data'][$z]="X";
                $_SESSION['f']+=1;
            } elseif ($_SESSION['f']==1) {
                $_SESSION['data'][$z]="O";
                $_SESSION['f']-=1;
            }
            check($z);
        }
    }
    if (array_key_exists("restart", $_POST)) {
        restart();
    }
    if (!isset($_POST['first_time'])) {
        $data=array(" ", " ", " ", " ", " ", " ", " ", " ", " ");
        $_SESSION['data']=$data;
        $f=0;
        $_SESSION['f']=$f;
        $game_over=0;
        $_SESSION['game_over']=$game_over;
    }
    $i=0;
    echo '<form method="post">';
    echo "<nav>";
    echo "<input type=\"submit\" name=\"restart\" value=\"Restart\" class=\"restart\"/>";
    echo "</nav>";
    echo "<br>";
    for ($r=0;$r<3;$r++) {
        for ($w=0;$w<3;$w++) {
            if ($_SESSION['game_over']==1) {
                echo  "<input type=\"submit\" value=\"{$_SESSION['data'][$i]}\" class=\"box\" name=\"{$i}\" disabled=true style=\"cursor : default;\">";
            } elseif ($_SESSION['data'][$i]==" ") {
                echo  "<input type=\"submit\" value=\"{$_SESSION['data'][$i]}\" class=\"box\" name=\"{$i}\">";
            } else {
                echo  "<input type=\"submit\" value=\"{$_SESSION['data'][$i]}\" class=\"box\" name=\"{$i}\" disabled=true style=\"cursor : default;\">";
            }
            $i++;
        }
        echo "<br>";
    }
    echo "<input type=\"hidden\" name=\"first_time\" value=\"1\" />";
    echo '</form>';
  ?>
</body>
</html>
