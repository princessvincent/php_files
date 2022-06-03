<?php
function resetPassword($email, $password){
    $email = strtolower($email);
    $password = md5($password);
    if(($f_open = fopen("../storage/users.csv", "r")) !== FALSE && ($fopen = fopen("../storage/users.temp.csv", "w")) !== FALSE) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            while(($details = fgetcsv($f_open)) !== FALSE) {
                if($details[1] == $email) {
                    fputcsv($fopen, [$details[0], $details[1], $password]);
                    $msg = "You have Successfully Upadated your Password";
                } else {
                    fputcsv($fopen, [$details[0], $details[1], $details[2]]);
                }
            }
            if(!isset($msg)) {
                $msg = "User does not exist";
            }
        } else {
            $msg = "Invalid email address";
        }
        fclose($f_open);
        fclose($fopen);
        @rename("../storage/users.temp.csv", "../storage/users.csv");
    } else {
        $msg = "Internal error";
    }
    return $msg;
}
if(isset($_POST['submit'])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    echo resetPassword($email, $password);
} else {
    header("Location: ../forms/resetpassword.html");
}
?>