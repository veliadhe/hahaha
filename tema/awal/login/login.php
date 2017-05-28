<?php

require_once ('core/init.php');

if( isset($_POST['submit']) ){
    $unama = $_POST['username'];
    $pass = $_POST['password'];

    if(!empty(trim($unama)) && !empty(trim($pass)))
    {
      if(login_cek_nama($unama))
        {
          if(cek_data($unama, $pass)){
            echo "hai";
          }
          else{
            echo 'Data ada yang salah';
          }
        }
        else{
            echo 'Namanya belum terdaftar di database';
        }
      }
      else{
            echo 'Tidak Boleh Kosong';
        }
  }
?>
