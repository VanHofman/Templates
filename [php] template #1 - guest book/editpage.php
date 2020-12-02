<?php
    require_once "connectDB.php";

    $sql = 'SELECT * FROM interviews WHERE interviewcode='.$_GET['id'];
    foreach($pdo->query($sql) as $row)
        $title =  $row['title'];
    
    $sql = 'SELECT * FROM questionsinterview WHERE interviewcode='.$_GET['id'];

    foreach($pdo->query($sql) as $row)
    {
        $questions[] = $row['questioncode'];
    }

    for($i = 0; $i<5; $i++){
        $sql = 'SELECT * FROM question WHERE questioncode='.$questions[$i];
        foreach($pdo->query($sql) as $row)
        {
            $essence[] = $row['essence'];
            $var1[] = $row['var1'];
            $var2[] = $row['var2'];
            $var3[] = $row['var3'];
            $var4[] = $row['var4'];
            $vartrue[] = $row['vartrue'];

            /// Проверить вывод!!!!!!
        }
    }
    
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
          
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/add-style.css">  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <title>Global Interview</title>
    
</head>
<body>
    <section class="main__board">
        <div class="container-sm">
        <a class="btn btn-primary" href="index.php" role="button">Назад</a>
            <div class="add__interview">
            <form action="add.php" method="POST">
                   <br><h1>Редактирование опроса</h1><br>        
                   <h4>Название опроса</h4>
                   <input type="text" name="title_interview" <?php echo "value=\"$title\""?>/>
                   <br><br><br>
                   <div class="question">
                       <p>
                           <h5>Вопрос №1:</h5>
                           
                           <input type="text" name="text__question__one" class="text__question" <?php echo "value=\"$essence[0]\""?> required>

                           
                        </p>
                        <div class="answer">
                            <div class="row">

                                <div class="column">Ответ №1<br>  
                                    <input type="text" name="answer__one__question__one" <?php echo "value=\"$var1[0]\""?> required>
                                    <input type="radio" name="radio__question__one" value="1" <?php if($vartrue[0] == 1) echo "checked"?> required>
                                </div>
                                <div class="column">Ответ №2<br>  
                                    <input type="text" name="answer__two__question__one" <?php echo "value=\"$var2[0]\""?> required>
                                    <input type="radio" name="radio__question__one" value="2" <?php if($vartrue[0] == 2) echo "checked"?>required>
                                </div>


                            </div>
                            <div class="row">
                                <div class="column">Ответ №3<br>  
                                    <input type="text" name="answer__three__question__one" <?php echo "value=\"$var3[0]\""?> required>
                                    <input type="radio" name="radio__question__one" value="3" <?php if($vartrue[0] == 3) echo "checked"?> required >
                                    
                                </div>
                                <div class="column">Ответ №4<br>  
                                    <input type="text" name="answer__four__question__one" <?php echo "value=\"$var4[0]\""?> required>
                                    <input type="radio" name="radio__question__one" value="4" <?php if($vartrue[0] == 4) echo "checked"?> required>
                                </div>
                            </div>
                        </div>                  
                   </div>  
                   <div class="question" >
                       <p>
                           <h5>Вопрос №2:</h5>
                           <input type="text" name="text__question__two" class="text__question" <?php echo "value=\"$essence[1]\""?> required>
                        </p>
                        <div class="answer">
                            <div class="row">
                                <div class="column">Ответ №1 <br>  
                                    <input type="text" name="answer__one__question__two" <?php echo "value=\"$var1[1]\""?> required>
                                    <input type="radio" name="radio__question__two" value="5" <?php if($vartrue[01] == 1) echo "checked"?> required>
                                </div>
                                <div class="column">Ответ №2 <br>  
                                    <input type="text" name="answer__two__question__two" <?php echo "value=\"$var2[1]\""?> required>
                                    <input type="radio" name="radio__question__two" value="6" <?php if($vartrue[1] == 2) echo "checked"?> required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="column">Ответ №3 <br>  
                                    <input type="text" name="answer__three__question__two" <?php echo "value=\"$var3[1]\""?> required>
                                    <input type="radio" name="radio__question__two" value="7" <?php if($vartrue[1] == 3) echo "checked"?> required>
                                </div>
                                <div class="column">Ответ №4 <br>  
                                    <input type="text" name="answer__four__question__two" <?php echo "value=\"$var4[1]\""?> required>
                                    <input type="radio" name="radio__question__two" value="8" <?php if($vartrue[1] == 4) echo "checked"?> required>
                                </div>
                            </div>
                        </div>                  
                   </div> 
                   <div class="question">
                       <p>
                           <h5>Вопрос №3:</h5>
                           <input type="text" name="text__question__three" class="text__question" <?php echo "value=\"$essence[2]\""?> required>
                        </p>
                        <div class="answer">
                            <div class="row">
                                <div class="column">Ответ №1 <br>  
                                    <input type="text" name="answer__one__question__three" <?php echo "value=\"$var1[2]\""?> required>
                                    <input type="radio" name="radio__question__three"  value="9" <?php if($vartrue[2] == 1) echo "checked"?> required>
                                </div>
                                <div class="column">Ответ №2 <br>  
                                    <input type="text" name="answer__two__question__three" <?php echo "value=\"$var2[2]\""?> required>
                                    <input type="radio" name="radio__question__three"  value="10" <?php if($vartrue[2] == 2) echo "checked"?> required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="column">Ответ №3 <br>  
                                    <input type="text" name="answer__three__question__three" <?php echo "value=\"$var3[2]\""?> required>
                                    <input type="radio" name="radio__question__three" value="11" <?php if($vartrue[2] == 3) echo "checked"?> required>
                                </div>
                                <div class="column">Ответ №4 <br>  
                                    <input type="text" name="answer__four__question__three" <?php echo "value=\"$var4[2]\""?> required>
                                    <input type="radio" name="radio__question__three" value="12" <?php if($vartrue[2] == 4) echo "checked"?> required>
                                </div>
                            </div>
                        </div>                  
                   </div> 
                   <div class="question">
                       <p>
                           <h5>Вопрос №4:</h5>
                           <input type="text" name="text__question__four" class="text__question" <?php echo "value=\"$essence[3]\""?> required>
                        </p>
                        <div class="answer">
                            <div class="row">
                                <div class="column">Ответ №1 <br>  
                                    <input type="text" name="answer__one__question__four" <?php echo "value=\"$var1[3]\""?> required>
                                    <input type="radio" name="radio__question__four" value="13" <?php if($vartrue[3] == 1) echo "checked"?> required>
                                </div>
                                <div class="column">Ответ №2 <br>  
                                    <input type="text" name="answer__two__question__four" <?php echo "value=\"$var2[3]\""?> required>
                                    <input type="radio" name="radio__question__four" value="14" <?php if($vartrue[3] == 2) echo "checked"?> required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="column">Ответ №3 <br>  
                                    <input type="text" name="answer__three__question__four" <?php echo "value=\"$var3[3]\""?> required>
                                    <input type="radio" name="radio__question__four" value="15" <?php if($vartrue[3] == 3) echo "checked"?> required>
                                </div>
                                <div class="column">Ответ №4 <br>  
                                    <input type="text" name="answer__four__question__four" <?php echo "value=\"$var4[3]\""?> required>
                                    <input type="radio" name="radio__question__four" value="16" <?php if($vartrue[3] == 4) echo "checked"?> required>
                                </div>
                            </div>
                        </div>                  
                   </div> 
                   <div class="question">
                       <p>
                           <h5>Вопрос №5:</h5>
                           <input type="text" name="text__question__five" class="text__question"  <?php echo "value=\"$essence[4]\""?>required>
                        </p>
                        <div class="answer">
                            <div class="row">
                                <div class="column">Ответ №1 <br>  
                                    <input type="text" name="answer__one__question__five" <?php echo "value=\"$var1[4]\""?> required>
                                    <input type="radio" name="radio__question__five" value="17" <?php if($vartrue[4] == 1) echo "checked"?> required>
                                </div>
                                <div class="column">Ответ №2 <br>  
                                    <input type="text" name="answer__two__question__five" <?php echo "value=\"$var2[4]\""?> required>
                                    <input type="radio" name="radio__question__five" value="18" <?php if($vartrue[4] == 2) echo "checked"?> required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="column">Ответ №3 <br>  
                                    <input type="text"  name="answer__three__question__five" <?php echo "value=\"$var3[4]\""?> required>
                                    <input type="radio" name="radio__question__five" value="19" <?php if($vartrue[4] == 3) echo "checked"?> required>
                                </div>
                                <div class="column">Ответ №4 <br>  
                                    <input type="text" name="answer__four__question__five" <?php echo "value=\"$var4[4]\""?> required>
                                    <input type="radio" name="radio__question__five" value="20" <?php if($vartrue[4] == 4) echo "checked"?> required>
                                </div>
                            </div>
                        </div>                  
                   </div>  
                   <input class="btn btn-primary" type="submit" value="Сохранить">      
               </form>
            </div>
        </div>
    </section> 
</body>
</html>