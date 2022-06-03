<?php
function logout(){
    session_start();
    session_destroy();
    // Header("Location: ../php/login.php");
    /*
Check if the existing user has a session
if it does
destroy the session and redirect to login page
*/
}

echo logout();
