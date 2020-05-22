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
        $file_data=fopen("data.txt", "r");
        $data=unserialize(fread($file_data, 1000));
        fclose($file_data);
        if ($id == 0) {
            if ($data[0] == $data[1] && $data[1] == $data[2]) {
                result();
                return;
            } elseif ($data[0] == $data[3] && $data[3] == $data[6]) {
                result();
                return;
            } elseif ($data[0] == $data[4] && $data[4] == $data[8]) {
                result();
                return;
            }
        } elseif ($id == 1) {
            if ($data[0] == $data[1] && $data[1] == $data[2]) {
                result();
                return;
            } elseif ($data[1] == $data[4] && $data[4] == $data[7]) {
                result();
                return;
            }
        } elseif ($id == 2) {
            if ($data[0] == $data[1] && $data[1] == $data[2]) {
                result();
                return;
            } elseif ($data[2] == $data[5] && $data[5] == $data[8]) {
                result();
                return;
            } elseif ($data[2] == $data[4] && $data[4] == $data[6]) {
                result();
                return;
            }
        } elseif ($id == 3) {
            if ($data[0] == $data[3] && $data[3] == $data[6]) {
                result();
                return;
            } elseif ($data[3] == $data[4] && $data[4] == $data[5]) {
                result();
                return;
            }
        } elseif ($id == 4) {
            if ($data[1] == $data[4] && $data[4] == $data[7]) {
                result();
                return;
            } elseif ($data[3] == $data[4] && $data[4] == $data[5]) {
                result();
                return;
            } elseif ($data[0] == $data[4] && $data[4] == $data[8]) {
                result();
                return;
            } elseif ($data[2] == $data[4] && $data[4] == $data[6]) {
                result();
                return;
            }
        } elseif ($id == 5) {
            if ($data[2] == $data[5] && $data[5] == $data[8]) {
                result();
                return;
            } elseif ($data[3] == $data[4] && $data[4] == $data[5]) {
                result();
                return;
            }
        } elseif ($id == 6) {
            if ($data[0] == $data[3] && $data[3] == $data[6]) {
                result();
                return;
            } elseif ($data[2] == $data[4] && $data[4] == $data[6]) {
                result();
                return;
            } elseif ($data[6] == $data[7] && $data[7] == $data[8]) {
                result();
                return;
            }
        } elseif ($id == 7) {
            if ($data[6] == $data[7] && $data[7] == $data[8]) {
                result();
                return;
            } elseif ($data[1] == $data[4] && $data[4] == $data[7]) {
                result();
                return;
            }
        } elseif ($id == 8) {
            if ($data[2] == $data[5] && $data[5] == $data[8]) {
                result();
                return;
            } elseif ($data[0] == $data[4] && $data[4] == $data[8]) {
                result();
                return;
            } elseif ($data[6] == $data[7] && $data[7] == $data[8]) {
                result();
                return;
            }
        }
        if (in_array(" ", $data)) {
            return;
        } else {
            echo "<script>alert(\"Draw\");</script>";
        }
    }

    function result()
    {
        $file_f=fopen("f.txt", "r");
        $f=unserialize(fread($file_f, 1000));
        fclose($file_f);
        if ($f==0) {
            echo "<script>alert(\"O won\");</script>";
        } elseif ($f==1) {
            echo "<script>alert(\"X won\");</script>";
        }
        $game_over=1;
        $file_game_over=fopen("game_over.txt", "w");
        fwrite($file_game_over, serialize($game_over));
        fclose($file_game_over);
    }

    function restart()
    {
        $data=array(" ", " ", " ", " ", " ", " ", " ", " ", " ");
        $file_data=fopen("data.txt", "w");
        fwrite($file_data, serialize($data));
        fclose($file_data);
        $f=0;
        $file_f=fopen("f.txt", "w");
        fwrite($file_f, serialize($f));
        fclose($file_f);
        $game_over=0;
        $file_game_over=fopen("game_over.txt", "w");
        fwrite($file_game_over, serialize($game_over));
        fclose($file_game_over);
    }

    for ($z=0;$z<9;$z++) {
        if (array_key_exists($z, $_POST)) {
            $file_data=fopen("data.txt", "r");
            $data=unserialize(fread($file_data, 1000));
            fclose($file_data);
            $file_f=fopen("f.txt", "r");
            $f=unserialize(fread($file_f, 1000));
            fclose($file_f);
            if ($f==0) {
                $data[$z]="X";
                $f+=1;
            } elseif ($f==1) {
                $data[$z]="O";
                $f-=1;
            }
            $file_data=fopen("data.txt", "w");
            fwrite($file_data, serialize($data));
            fclose($file_data);
            $file_f=fopen("f.txt", "w");
            fwrite($file_f, serialize($f));
            fclose($file_f);
            check($z);
        }
    }
    if (array_key_exists("restart", $_POST)) {
        restart();
    }
    if (!isset($_POST['first_time'])) {
        $data=array(" ", " ", " ", " ", " ", " ", " ", " ", " ");
        $file_data=fopen("data.txt", "w");
        fwrite($file_data, serialize($data));
        fclose($file_data);
        $f=0;
        $file_f=fopen("f.txt", "w");
        fwrite($file_f, serialize($f));
        fclose($file_f);
        $game_over=0;
        $file_game_over=fopen("game_over.txt", "w");
        fwrite($file_game_over, serialize($game_over));
        fclose($file_game_over);
    }
    $i=0;
    echo '<form method="post">';
    echo "<nav>";
    echo "<input type=\"submit\" name=\"restart\" value=\"Restart\" class=\"restart\"/>";
    echo "</nav>";
    echo "<br>";
    $file_data=fopen("data.txt", "r");
    $data=unserialize(fread($file_data, 1000));
    fclose($file_data);
    $file_game_over=fopen("game_over.txt", "r");
    $game_over=unserialize(fread($file_game_over, 1000));
    fclose($file_game_over);
    for ($r=0;$r<3;$r++) {
        for ($w=0;$w<3;$w++) {
            if ($game_over==1) {
                echo  "<input type=\"submit\" value=\"{$data[$i]}\" class=\"box\" name=\"{$i}\" disabled=true style=\"cursor : default;\">";
            } elseif ($data[$i]==" ") {
                echo  "<input type=\"submit\" value=\"{$data[$i]}\" class=\"box\" name=\"{$i}\">";
            } else {
                echo  "<input type=\"submit\" value=\"{$data[$i]}\" class=\"box\" name=\"{$i}\" disabled=true style=\"cursor : default;\">";
            }
            $i++;
        }
        echo "<br>";
    }
    echo "<input type=\"hidden\" name=\"first_time\" value=\"1\" id=\"100\" />";
    echo '</form>';
  ?>
</body>
</html>
