<?php
    session_start();
    if(!empty($_POST['page'])){
        $page = $_POST['page'];
        $_SESSION['page'] = $page;
        header("Location: /index.php");
    }else{
        $page = 1;
    };
    $page = $_SESSION['page'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="index-style.css">  
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <title>Global Interview</title>
        
    </head>
    <body>
        <section class="main__board">
            <div class="container-sm">
                <div class="interview">
                    <a class="btn btn-primary" href="addpage.php" role="button">Добавить</a>               
                    <?php
                    // connect with database
                    require_once 'connectDB.php';
                    $position = ($_SESSION['page']-1)*10;
                    $sql = 'SELECT title FROM interviews LIMIT ' . $position . ',10';
                    //$sql = 'SELECT title FROM interviews ORDER BY id ASC LIMIT ' . $position . ',10';
                    // Output all interview on screen
                    foreach ($pdo->query($sql) as $row) {
                        $title =  $row['title'];
                        echo "<div class=\"interview__item\">" . $title . "</div>";       
                    }          
                    ?>
                </div>
                <form class="pages" method="POST" action="index.php">
                    <?php
                        require_once 'connectDB.php';
                        // Counting count elements in table 'interviews'
                        $query=$pdo->query("SELECT COUNT(*) as title FROM interviews");
                        $query->setFetchMode(PDO::FETCH_ASSOC);
                        $row=$query->fetch();
                        $members=$row['title']/10+1;

                        // Create pages on screen
                        for($i = 1; $i<=$members; ++$i)
                        {
                            echo "<input type=\"submit\" name=\"page\" class=\"page $i\" value=\"$i\">";
                        }
                    ?>

                </form>
            </div>
        </section> 
    </body>
</html>