<?php
if(isset($_POST['submit'])){
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

registerUser($username, $email, $password);

}

function registerUser($username, $email, $password){
    //save data into the file
    $data = $username . ',' . $email . ',' . $password;
    $fname = '../storage/users.csv';
    $handle = fopen($fname, 'a');
    $save = fwrite($handle, $data . "\n");
    if($save){
        Header("Location: ../php/login.php");
    }else{
        echo "failed";
    }
    // echo "OKAY";
}
// echo registerUser($username, $email, $password);


