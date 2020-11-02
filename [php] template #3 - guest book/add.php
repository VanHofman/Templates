<?php

    // Connect with database
    require 'connectDB.php';

    // Code review
    //echo '<pre>'.print_r($_POST,true).'</pre>';

    // Add data about title interview in table 'interview'
    $title = $_POST['title_interview'];
    $sql = 'INSERT INTO interviews(title) VALUES(:title)';
    $query = $pdo->prepare($sql);
    $query->execute(['title' => $title]);
    $lastInsertIdInterview = $pdo->lastInsertId();


    // Create query for add data in table 'question'
    $sql = 'INSERT INTO question(essence, var1, var2, var3, var4, vartrue) VALUES(:essence, :var1, :var2, :var3, :var4, :vartrue)';

    // Add data about essence and asnwers questions in table 'question'
    for($i = 1; $i<=5; $i++)
    {
        //Number question
        switch($i){
            case 1:
                $endstr = 'one';
                break;
            case 2:
                $endstr = 'two';
                break;
            case 3:
                $endstr = 'three';
                break;
            case 4:
                $endstr = 'four';
                break;
            case 5:
                $endstr = 'five';
                break;
        }
        
        // Receive data from POST
        $essence = $_POST['text__question__' . $endstr];
        $var1 = $_POST['answer__one__question__' . $endstr];
        $var2 = $_POST['answer__two__question__' . $endstr];
        $var3 = $_POST['answer__three__question__' . $endstr];
        $var4 = $_POST['answer__four__question__' . $endstr];

        //determine right answer from 1 to 4
        $vartrue = ((int)$_POST['radio__question__' . $endstr])%4;
        if($vartrue == 0) 
            $vartrue = 4;

        // prepate query and executing     
        $query = $pdo->prepare($sql);
        $query->execute(['essence' => $essence, 'var1' => $var1,'var2' => $var2,'var3' => $var3,'var4' => $var4,'vartrue' => $vartrue]);

        // saving data for table 'questionsinterview'
        $ligament[] = $pdo->lastInsertID();
    }


    //create query to table 'questionsinterview'
    $sql = 'INSERT INTO questionsinterview(interviewcode, questioncode) VALUES(:interviewcode, :questioncode)';

    // Go around array with answer codes and adding their into table 'questionsinterview'
    for($i = 0; $i<5; $i++){
        $query = $pdo->prepare($sql); 
        $lastInsertIdQuestion = $ligament[$i];
        $query->execute(['interviewcode' => $lastInsertIdInterview, 'questioncode' => $lastInsertIdQuestion]);
    }
    

    header('Location: /');

    /* --------------Not optimized code!--------------------------
    // Add data about essence and asnwers first question in table 'question'
    $essence = $_POST['text__question__one'];
    $var1 = $_POST['answer__one__question__one'];
    $var2 = $_POST['answer__two__question__one'];
    $var3 = $_POST['answer__three__question__one'];
    $var4 = $_POST['answer__four__question__one'];
    $vartrue = $_POST['radio__question__one'];
    $query = $pdo->prepare($sql);
    $query->execute(['essence' => $essence, 'var1' => $var1,'var2' => $var2,'var3' => $var3,'var4' => $var4,'vartrue' => $vartrue]);

    // Add data about essence and asnwers second question in table 'question'
    $essence = $_POST['text__question__two'];
    $var1 = $_POST['answer__one__question__two'];
    $var2 = $_POST['answer__two__question__two'];
    $var3 = $_POST['answer__three__question__two'];
    $var4 = $_POST['answer__four__question__two'];
    $vartrue = ((int)$_POST['radio__question__two'])%4;
    if($vartrue == 0)
        $vartrue = 4;
    $query = $pdo->prepare($sql);
    $query->execute(['essence' => $essence, 'var1' => $var1,'var2' => $var2,'var3' => $var3,'var4' => $var4,'vartrue' => $vartrue]);

    // Add data about essence and asnwers thrid question in table 'question'
    $essence = $_POST['text__question__three'];
    $var1 = $_POST['answer__one__question__three'];
    $var2 = $_POST['answer__two__question__three'];
    $var3 = $_POST['answer__three__question__three'];
    $var4 = $_POST['answer__four__question__three'];
    $vartrue = ((int)$_POST['radio__question__three'])%4;
    if($vartrue == 0)
        $vartrue = 4;
    $query = $pdo->prepare($sql);
    $query->execute(['essence' => $essence, 'var1' => $var1,'var2' => $var2,'var3' => $var3,'var4' => $var4,'vartrue' => $vartrue]);

    // Add data about essence and asnwers fourth question in table 'question'
    $essence = $_POST['text__question__four'];
    $var1 = $_POST['answer__one__question__four'];
    $var2 = $_POST['answer__two__question__four'];
    $var3 = $_POST['answer__three__question__four'];
    $var4 = $_POST['answer__four__question__four'];
    $vartrue = ((int)$_POST['radio__question__four'])%4;
    if($vartrue == 0)
        $vartrue = 4;
    $query = $pdo->prepare($sql);
    $query->execute(['essence' => $essence, 'var1' => $var1,'var2' => $var2,'var3' => $var3,'var4' => $var4,'vartrue' => $vartrue]);

    // Add data about essence and asnwers fifth question in table 'question'
    $essence = $_POST['text__question__five'];
    $var1 = $_POST['answer__one__question__five'];
    $var2 = $_POST['answer__two__question__five'];
    $var3 = $_POST['answer__three__question__five'];
    $var4 = $_POST['answer__four__question__five'];
    $vartrue = ((int)$_POST['radio__question__five'])%4;
    if($vartrue == 0)
        $vartrue = 4;
    $query = $pdo->prepare($sql);
    $query->execute(['essence' => $essence, 'var1' => $var1,'var2' => $var2,'var3' => $var3,'var4' => $var4,'vartrue' => $vartrue]);
*/

?>
