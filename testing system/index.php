<?php
    // ---- includes ----
    require_once 'includes/connectDB.php';
    // ------------------

    $count_pages = DefiningCountPages($pdo);

    // Check № page
    $page = (int)$_GET['page'];
    if(empty($page) || $page >= $count_pages || !is_numeric($page)) {
        $page = 1;
    }

    // Determining question number
    $position = ($page-1)*$ROWS_ON_PAGE;

    // Crearing SQL query for receive data about interviews from $position to $position+10
    $sql = 'SELECT * 
            FROM interviews 
            LIMIT ' . $position . ',' . $ROWS_ON_PAGE ;

    // Main layout
    require_once "includes/headerHTML.php";
?>

<section class="main__board">
    <div class="container-sm">
    <a class="btn btn-primary" href="addpage.php" role="button">Добавить</a>
        <div class="interview">
            <?php foreach ($pdo->query($sql) as $row):?>
                <div class="item">
                    <a class="interview__item" href="interview.php?id=<? echo $row['interviewcode'] ?>"><? echo $row['title'] ?></a>
                    <a class="edit__btn" href="editpage.php?id=<? echo $row['interviewcode'] ?>">🖊</a>
                    <a class="results__btn" href="resultspage.php?id=<? echo $row['interviewcode'] ?>">🏆</a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="pages">
            <?php
                // Create pages on screen
                for($i = 1; $i<$count_pages; $i++) {
                    echo "<a href=\"index.php?page=$i\" class=\"page $i\">$i</a>";
                }
            ?>
        </div>
    </div>
</section>

<?php
    require_once "includes/endHTML.php";
?>