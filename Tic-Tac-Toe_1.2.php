<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" http-equiv="refresh" content="1.5"/>
  <title>Tic-Tac-Toe</title>
  <style>
  .box
    {
      width: 100px;
      height: 100px;
      text-align: center;
      font-size: 20px;
      cursor: pointer;
      background-color: #ffffff;
      border-style: solid;
      border-color: #999999;
    }
  .new_game,
  .logout,
  .links
    {
      text-align: center;
      cursor: pointer;
    }
  .version {
      text-align: center;
    }
  input[name="0"] {
      border-top: none;
      border-left: none;
    }
  input[name="1"] {
      border-top: none;
    }
  input[name="2"] {
      border-top: none;
      border-right: none;
    }
  input[name="3"] {
      border-left: none;
    }
  input[name="5"] {
      border-right: none;
    }
  input[name="6"] {
      border-bottom: none;
      border-left: none;
    }
  input[name="7"] {
      border-bottom: none;
    }
  input[name="8"] {
      border-bottom: none;
      border-right: none;
    }
  </style>
  <script type="text/javascript">
  function releases() {
    window.open("https://github.com/VarunS2002/PHP-Tic-Tac-Toe/releases/", "_blank");
  }

  function sources() {
    window.open("https://github.com/VarunS2002/PHP-Tic-Tac-Toe/", "_blank");
  }
  </script>
</head>
<body align="center">
  <h1 style="font-family: Arial">Tic-Tac-Toe</h1>
  <?php

  if (empty($_SESSION['name'])) {
      try {
          $_SESSION['name'] = $_POST['name'];
          if (empty($_SESSION['name'])) {
              throw new Exception("User not found, please login");
          }
          new_game();
          $file_name=fopen("name.txt", "w");
          fwrite($file_name, serialize($_SESSION['name']));
          fclose($file_name);
      } catch (Exception $e) {
          echo 'Error: ' .$e->getMessage();
          echo "<br />Click <a href=\"Login-Tic-Tac-Toe_1.2.html\">here</a> to go to login page";
          die();
      }
  }
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
            $result_displayed="draw";
            $file_result_displayed=fopen("result_displayed.txt", "w");
            fwrite($file_result_displayed, serialize($result_displayed));
            fclose($file_result_displayed);
            $game_over=1;
            $file_game_over=fopen("game_over.txt", "w");
            fwrite($file_game_over, serialize($game_over));
            fclose($file_game_over);
        }
    }

    function result()
    {
        $file_f=fopen("f.txt", "r");
        $f=unserialize(fread($file_f, 1000));
        fclose($file_f);
        echo "<script>alert(\"You won\");</script>";
        $game_over=1;
        $file_game_over=fopen("game_over.txt", "w");
        fwrite($file_game_over, serialize($game_over));
        fclose($file_game_over);
    }

    function new_game()
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
        $result_displayed="you lost";
        $file_result_displayed=fopen("result_displayed.txt", "w");
        fwrite($file_result_displayed, serialize($result_displayed));
        fclose($file_result_displayed);
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
            $file_name=fopen("name.txt", "w");
            fwrite($file_name, serialize($_SESSION['name']));
            fclose($file_name);
            check($z);
        }
    }
    if (array_key_exists("new_game", $_POST)) {
        new_game();
    }
    if (array_key_exists("logout", $_POST)) {
        session_destroy();
        echo "<script>window.location.replace(\"Login-Tic-Tac-Toe_1.2.html\");</script>";
    }

    $i=0;
    echo '<form method="post">';
    echo "<nav>";
    echo "<input type=\"submit\" name=\"new_game\" value=\"New Game\" class=\"new_game\"/>";
    echo "&nbsp";
    echo "<input type=\"submit\" name=\"logout\" value=\"Logout\" class=\"logout\" />";
    echo "</nav>";
    echo "<br>";
    $file_data=fopen("data.txt", "r");
    $data=unserialize(fread($file_data, 1000));
    fclose($file_data);
    $file_game_over=fopen("game_over.txt", "r");
    $game_over=unserialize(fread($file_game_over, 1000));
    fclose($file_game_over);
    $file_name=fopen("name.txt", "r");
    $new_name=unserialize(fread($file_name, 1000));
    fclose($file_name);
    $file_result_displayed=fopen("result_displayed.txt", "r");
    $result_displayed=unserialize(fread($file_result_displayed, 1000));
    fclose($file_result_displayed);
    for ($r=0;$r<3;$r++) {
        for ($w=0;$w<3;$w++) {
            if ($new_name==$_SESSION['name']) {
                echo  "<input type=\"submit\" value=\"{$data[$i]}\" class=\"box\" name=\"{$i}\" disabled=true style=\"cursor : default;\">";
            } else {
                if ($game_over==1) {
                    if ($result_displayed=="you lost") {
                        echo "<script>alert(\"You lost\");</script>";
                        $result_displayed="done";
                        $file_result_displayed=fopen("result_displayed.txt", "w");
                        fwrite($file_result_displayed, serialize($result_displayed));
                        fclose($file_result_displayed);
                    } elseif ($result_displayed=="draw") {
                        echo "<script>alert(\"Draw\");</script>";
                        $result_displayed="done";
                        $file_result_displayed=fopen("result_displayed.txt", "w");
                        fwrite($file_result_displayed, serialize($result_displayed));
                        fclose($file_result_displayed);
                    }
                    echo  "<input type=\"submit\" value=\"{$data[$i]}\" class=\"box\" name=\"{$i}\" disabled=true style=\"cursor : default;\">";
                } elseif ($data[$i]==" ") {
                    echo  "<input type=\"submit\" value=\"{$data[$i]}\" class=\"box\" name=\"{$i}\">";
                } else {
                    echo  "<input type=\"submit\" value=\"{$data[$i]}\" class=\"box\" name=\"{$i}\" disabled=true style=\"cursor : default;\">";
                }
            }
            $i++;
        }
        echo "<br>";
    }
    echo '</form>';
  ?>
  <nav>
    <br />
    <input type="button" value="Version : 1.2" class="version" disabled=true/>
    <input type="button" value="Releases" class="links" onclick="releases()"/>
    <input type="button" value="Sources" class="links" onclick="sources()" />
  </nav>
</body>
</html>
