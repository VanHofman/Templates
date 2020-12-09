<?php
require_once 'login.php';

// Check current page, default = first page
if(!empty($_POST['page'])){
    $page = $_POST['page'];
}else{
    $page = 1;
}

// Check current sort, default = sorting by username
if(!empty($_POST['sortingname'])){
    $sortby  = $_POST['sortingname'];  
}else{
    $sortby = "username";
}

// Connect to MYSQL database, data about connect in file "login.php"
$connect = new mysqli($hn, $un, $pw, $db);

//Check error connect
if ($connect->connect_error) 
    die(mysql_fatal_error(mysql_error()));

//Query to database, table 'guest'.
$query = "SELECT * FROM guest ORDER BY " . $sortby;
$result = $connect->query($query);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- link tags -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet"> 

    <!-- Scripts -->
    <!-- Google reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Title Page-->
    <title>Cuest Book</title>
</head>
<body>

    <!---- Main board ---->
    <section class="board">
        <div class="title">
            <h1>Guest Book</h1>
        </div>

        <!---- Form for Sort ---->
        <h2>Sort</h2>
        <form action="index.php" method="POST">
        <select size="1"  name="sortingname" class="sorting">
            <option selected value="username">Choice</option>
            <option value="username">Username</option>
            <option value="email" >E-mail</option>
            <option value="time ASC" >▲  Date added</option>
            <option value="time DESC" >▼  Date added</option>
        </select>
        <input type="submit" value=">" class="sortimg">
        </form>

        <!---- Reveive data from database MYSQL and display on screen ---->
        <div class="main__table">
            <?php
                if(!$result)
                    die($connect->error);
                else
                {
                    $rows = $result->num_rows;
                    $j = 0;
                    for($i = 0 + (($page-1)*25) ; $i < $rows && $j<25; ++$i, ++$j)
                    {
                        $result->data_seek($i);
                        $row = $result->fetch_array(MYSQLI_ASSOC); // Creare assoc array

                        // Receive data from assoc array
                        $username = $row['username'];
                        $email = $row['email'];
                        $ip = $row['ip'];
                        $browser = $row['browser'];
                        $homepage = $row['homepage'];
                        $time = $row['time'];
                        $text = $row['text'];

                        // Display all guest and message
                        echo<<<_END
                        <div class="window__guest">
                            <div class="guest__info">
                                <span>Username: $username </span>
                                <span>Email: $email</span>
                                <span>IP: $ip</span>
                                <span>Browser: $browser</span>
                                <span>Homepage: $homepage</span>
                                <span>Date and time: $time</span>
                            </div>
                            <div class="guest__text">
                                Message: 
                                <div class="text">$text
                                </div>
                            </div>
                        </div>
                        _END;
                    }
                }
            ?>           
        </div>

        <!---- Section Pages ---->
        <div class="pages__table">
        <div class="title">Pages: </div>
        </div>
            <!---- Form define of pages ---->
            <form class="pages" method="post" action="index.php">
            <?php
                if(!$result)
                    die($connect->error);
                else
                {
                    $rows = $result->num_rows;
                    $rows = $rows/25+1;
                    for($i = 1; $i<=$rows; ++$i)
                    {
                        echo<<<_END
                        <input type="submit" name="page" class="page $i" value="$i"</div>
                        _END;
                    }
                }            
            ?>
            </form>
    </section>

    <!---- Form insert message and data about guest ---->
    <form action="insert.php" method="POST">
        <section class="input__form">
        <div class="title">Write a message</div>

        <!---- input username ---->
        <div class="input username">
            Username <br>
            <input type="text" required maxlength="40" name="username">
        </div>
        <hr>

        <!---- input mail ---->
        <div class="input mail">
            E-mail <br>
            <input type="text" placeholder="example@example.com" maxlength="80" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email">
        </div>
        <hr>

        <!---- input homepage ---->
        <div class="input homepage" >
            Homepage <br>
            <input type="text"maxlength="80" name="homepage">
        </div>
        <hr>
    
        <!---- input message ---->
        <div class="input message">
            Your message <br>
            <textarea cols="10" rows="2" required maxlength="256" name="message"></textarea>
        </div>

        <!---- display reCAPTCHA v2 ---->
        <div class="captcha">
            <div class="g-recaptcha" data-sitekey="6Lf6NsUZAAAAACCctRiyqXDpS6mtJIL6Jc_MBq5K">
            </div>
        </div>
        
        <!---- Button submit ---->
        <div>
            <input type="submit" value="Send message" class="send" >
        </div>
        
        </section>
    </form>
</body>
</html>


<!---- Free  ---->
<?php
    $result->close();
    $connect->close();
?>
