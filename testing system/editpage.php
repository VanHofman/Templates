<?php
    // ---- includes ----
    require_once 'includes/connectDB.php';
    // ------------------
    session_start();
    // Receive data from Global GET/POST
    $id = ReceivingIDfromGET($_GET['id']);
    $title = ReceiveTitleInterview($pdo, $id);

    // Creating SQL query for receive data about questions of interview
    $sql = 'SELECT * 
            FROM questionsinterview 
            WHERE interviewcode=?';
    $query = $pdo->prepare($sql);
    $query->execute([$id]);
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach($data as $item){
        $questions[] = $item['questioncode'];
    }

    $place_holders = implode(',', $questions);
    $sql = 'SELECT * 
            FROM question 
            WHERE questioncode 
            IN (' . $place_holders . ')';

    foreach ($pdo->query($sql) as $row)
    {
        $essence[]  = $row['essence'];
        $var1[]     = $row['var1'];
        $var2[]     = $row['var2'];
        $var3[]     = $row['var3'];
        $var4[]     = $row['var4'];
        $vartrue[]  = $row['vartrue'];
    }
    // Main layout
    require_once "includes/headerHTML.php";
?>
    <section class="main__board">
        <div class="container-sm">
        <a class="btn btn-primary" href="index.php" role="button">Назад</a>
            <div class="edit__interview">
            <form action="edit.php?id=<?php echo $id?>" method="POST">
                   <br><h1>Редактирование опроса</h1><br>        
                   <h4>Название опроса</h4>
                   <input type="text" name="title_interview" <?php echo "value=\"$title\""?>/>
                   <br><br><br>
                        <?php   $value = 1;
                        $number__question = 1;
                        $index__question = 0;
                        for($i = 0; $i < $COUNT_QUESTIONS_IN_INTERVIEW; $i++):?>
                            <div class="question">
                                <p>
                                    <h5>Вопрос №<? echo $number__question?>:</h5>
                                    <input type="text" name="text__question__<? echo $number__question;  ?>"  <?php echo "value=\"$essence[$index__question]\""?> class="text__question" required>
                                </p>
                                <div class="answer">
                                    <div class="row">
                                        <div class="column">Ответ №1 <br>
                                            <input type="text" name="answer__one__question__<? echo $number__question;  ?>"   <?php echo "value=\"$var1[0]\""?>required>
                                            <input type="radio" name="radio__question__<? echo $number__question; ?>" value="<? echo $value; $value++; ?>"   <?php if($vartrue[$index__question] == 1) echo "checked ";?>required>
                                        </div>
                                        <div class="column">Ответ №2 <br>
                                            <input type="text" name="answer__two__question__<? echo $number__question;  ?>"   <?php echo "value=\"$var2[0]\""?>required>
                                            <input type="radio" name="radio__question__<? echo $number__question; ?>" value="<? echo $value; $value++; ?>"   <?php if($vartrue[$index__question] == 2) echo "checked ";?>required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="column">Ответ №3 <br>
                                            <input type="text" name="answer__three__question__<? echo $number__question;  ?>"   <?php echo "value=\"$var3[0]\""?>required>
                                            <input type="radio" name="radio__question__<? echo $number__question; ?>" value="<? echo $value; $value++; ?>"  required  <?php if($vartrue[$index__question] == 3) echo "checked ";?>>

                                        </div>
                                        <div class="column">Ответ №4 <br>
                                            <input type="text" name="answer__four__question__<? echo $number__question;  ?>"   <?php echo "value=\"$var4[0]\""?>required>
                                            <input type="radio" name="radio__question__<? echo $number__question; ?>" value="<? echo $value; $value++; ?>  " required <?php if($vartrue[$index__question] == 4) echo "checked ";?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php $number__question++; $index__question++; endfor; ?>
                   <input name="token" type="hidden" value="<? echo GetToken(); ?>"">
                   <input class="btn btn-primary" type="submit" value="Сохранить">      
               </form>
            </div>
        </div>
    </section>
<?php
require_once "includes/endHTML.php";
?>