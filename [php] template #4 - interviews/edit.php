<?php
    // ---- includes ----
    require_once 'includes/connectDB.php';
    // ------------------
    session_start();
    if(!CheckToken($_POST['token'], $_SESSION['token']))
        header("Location: /");

    // Checking table of database on empty
    CheckEmptyDataFromDatabase($pdo, $id);

    // Receive data from Global GET/POST
    $id = intval($_GET['id']);
    foreach ($_POST as $key => $value) {
        if(substr_count($key, 'text__question'))
            $essence[] = FixXSS($value);
        elseif(substr_count($key, 'answer__one__question'))
            $var1[] = FixXSS($value);
        elseif(substr_count($key, 'answer__two__question'))
            $var2[] = FixXSS($value);
        elseif(substr_count($key, 'answer__three__question'))
            $var3[] = FixXSS($value);
        elseif(substr_count($key, 'answer__four__question'))
            $var4[] = FixXSS($value);
        elseif(substr_count($key, 'radio__question'))
            $vartrue[] = FixXSS($value);
    }


    // Creating SQL query for update data about title interview
    $sql = "UPDATE interviews 
            SET title=?
            WHERE interviewcode=?" ;

    // Preparing and executing query
    $query = $pdo->prepare($sql);
    $query->execute(array(FixXSS($_POST['title_interview']), $id));


    // Check on 'is empty'
    if(empty($essence) ||
        empty($var1) ||
        empty($var2) ||
        empty($var3) ||
        empty($var4) ||
        empty($vartrue))
        header("Location: /");


    // Create SQL query for search data about questions of interview
    $sql = 'SELECT * 
            FROM questionsinterview 
            WHERE interviewcode=?';
    $query = $pdo->prepare($sql);
    $query->execute([$id]);
    $data = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($data as $key => $row) {
        // Determining right answer from 1 to 4
        $vartrue[$key] = ((int)$vartrue[$key]) % 4;
        if ($vartrue[$key] == 0)
            $vartrue[$key] = 4;

        // Query for change data in tables
        $sql = "UPDATE question 
                SET    essence=:essence,
                       var1=:var1,
                       var2=:var2,
                       var3=:var3,
                       var4=:var4,
                       vartrue=:vartrue
                WHERE  questioncode=" . $row['questioncode'];

        // Preparing query for add quiestion in table 'questions' and executing.
        $query = $pdo->prepare($sql);
        $query->execute(['essence' => $essence[$key],
            'var1' => $var1[$key],
            'var2' => $var2[$key],
            'var3' => $var3[$key],
            'var4' => $var4[$key],
            'vartrue' => $vartrue[$key]]);
    }

   header('Location: /');

?>