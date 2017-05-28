 <?php

function register_user($unama, $pass){
  global $link;

  $email = $_POST['email'];
  $nama = $_POST['name'];
  //mencegah sql injection
  $unama = mysqli_real_escape_string($link, $unama);
  $pass = mysqli_real_escape_string($link, $pass);

  $pass = password_hash($pass, PASSWORD_DEFAULT);
  $query = "INSERT INTO user_table(username, password, email, name) VALUES ('$unama', '$pass', '$email', '$nama')";

  if( mysqli_query($link,$query) ){
    return true;
  }else{
    return false;
  }
}

//menguji nama kemba
function register_cek_nama($unama){
  global $link;
  $unama = mysqli_real_escape_string($link, $unama);
  $query = "SELECT * FROM user_table WHERE username='$unama'";
  if($result = mysqli_query($link, $query)){
    if(mysqli_num_rows($result) == 0) return true;
    else return false;
  }
}

//menguji nama di database
function login_cek_nama($unama){
  global $link;
  $unama = mysqli_real_escape_string($link, $unama);
  $query = "SELECT * FROM user_table WHERE username='$unama'";
  if($result = mysqli_query($link, $query)){
    if(mysqli_num_rows($result) != 0) return true;
    else return false;
  }
}


//untuk login
function cek_data($unama, $pass){
  global $link;
  //mencegah sql injection
  $unama = mysqli_real_escape_string($link, $unama);
  $pass = mysqli_real_escape_string($link, $pass);

  $query = "SELECT password FROM user_table WHERE username ='$unama'";
  $result = mysqli_query($link, $query);
  $hash = mysqli_fetch_assoc($result);

  if( password_verify($pass, $hash['password']) ){
    return false;
  }
  else{
    return true;
  }
}
?>
