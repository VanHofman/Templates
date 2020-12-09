<?php

    // library for working with reCAPTCHA from Google Team. 
    require_once "recaptchalib.php";
    require_once "secure.php";
    // Secret Key
    $secret = "6Lf6NsUZAAAAAPRReJGbyxoHtNwmRwytDV8rVure";
    
    // Empty Response
    $response = null;

    //Checking secret key
    $reCaptcha = new ReCaptcha($secret);

    //Setting and checking guest on verify
    if ($_POST["g-recaptcha-response"]) 
    {
        $response = $reCaptcha->verifyResponse(
                $_SERVER["REMOTE_ADDR"],
                $_POST["g-recaptcha-response"]);
    }

    // Success verify or guest are robot :)
    if ($response != null && $response->success) // Guest aren`t robot!!!!!
    {
        require_once 'login.php';
        $connect = new mysqli($hn, $un, $pw, $db);
        if ($connect->connect_error) 
            die(mysql_fatal_error(mysql_error()));

        // Receive data about the guest IP
        $ip = $_SERVER['REMOTE_ADDR']; // ::1 because our IPv4 - 127.0.0.1 and IPv6 - ::1

        // Receive data about date and time
        $time = date("Y-m-d H:i:s");  // 2001-03-10 17:16:18 (формат MySQL DATETIME)

        // Receive data about guest Browser
        $user_agent = $_SERVER["HTTP_USER_AGENT"];
        if (strpos($user_agent, "Firefox") !== false) $browser = "Firefox";
        elseif (strpos($user_agent, "Opera") !== false) $browser = "Opera";
        elseif (strpos($user_agent, "Chrome") !== false) $browser = "Chrome";
        elseif (strpos($user_agent, "MSIE") !== false) $browser = "Internet Explorer";
        elseif (strpos($user_agent, "Safari") !== false) $browser = "Safari";
        else $browser = "Неизвестный";

        // The second check will make sure that the data we need has been entered and received on the server.
        if(isset($_POST['username']) &&
            isset($_POST['email']) &&
            isset($_POST['message']))
        {
            // mysql_entities_fix_string() - defence from XSS, define in 'secure.php'
            // into function  mysql_entities_fix_string() have function mysql_fix_string(), 
            // which protects against SQL injection.
            $username   = mysql_entities_fix_string($connect, $_POST['username']);
            $email      = mysql_entities_fix_string($connect, $_POST['email']);
            $message    = mysql_entities_fix_string($connect, $_POST['message']);
            $homepage   = mysql_entities_fix_string($connect, $_POST['homepage']);

            // Query to insert data in database
            $query      = "INSERT INTO guest VALUES" .
            "('$ip', '$browser', '$email', ' $username', '$homepage', '$message', '$time')";
            $result     = $connect->query($query);

            if(!$result)
                echo "Something went wrong while sending data..."; 
        }
    } 
    else // Guest aren`t robot!!!!!!!!!!!!
    {
        $page = 1;
        echo '<script>
        alert( "You are a robot. Change it and try again. :)" );
        </script>';
    }  

    // Display index page.
    include 'index.php';
?>