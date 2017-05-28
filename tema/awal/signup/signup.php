<?php

require_once "core/init.php";

if( isset($_POST['submit']) ){
  $unama = $_POST['username'];
  $pass = $_POST['password'];
  $email = $_POST['email'];
  $nama = $_POST['name'];

  if (!empty(trim($unama)) && !empty(trim($pass)) ){

  if(register_cek_nama($unama)){
    //memasukan ke database
        if(register_user($unama, $pass)){
          echo 'berhasil';
        }else{
          echo 'gagal daftar';
        }
      }else{
        echo 'nama sudah ada, tidak bisa daftar';
      }



  }else{
    echo 'tidak boleh kosong';
  }
}