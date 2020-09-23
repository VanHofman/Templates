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
                   <br><h1>Добавление опроса</h1><br>        
                   <h4>Название опроса</h4>
                   <input type="text" name="title_interview"/>
                   <br><br><br>
                   <div class="question">
                       <p>
                           <h5>Вопрос №1:</h5>
                           <input type="text" name="text__question__one" class="text__question" required>
                        </p>
                        <div class="answer">
                            <div class="row">
                                <div class="column">Ответ №1 <br>  
                                    <input type="text" name="answer__one__question__one" required>
                                    <input type="radio" name="radio__question__one" value="1" required>
                                </div>
                                <div class="column">Ответ №2 <br>  
                                    <input type="text" name="answer__two__question__one" required>
                                    <input type="radio" name="radio__question__one" value="2" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="column">Ответ №3 <br>  
                                    <input type="text" name="answer__three__question__one" required>
                                    <input type="radio" name="radio__question__one" value="3" required >
                                    
                                </div>
                                <div class="column">Ответ №4 <br>  
                                    <input type="text" name="answer__four__question__one" required>
                                    <input type="radio" name="radio__question__one" value="4" required>
                                </div>
                            </div>
                        </div>                  
                   </div>  
                   <div class="question" >
                       <p>
                           <h5>Вопрос №2:</h5>
                           <input type="text" name="text__question__two" class="text__question" required>
                        </p>
                        <div class="answer">
                            <div class="row">
                                <div class="column">Ответ №1 <br>  
                                    <input type="text" name="answer__one__question__two" required>
                                    <input type="radio" name="radio__question__two" value="5" required>
                                </div>
                                <div class="column">Ответ №2 <br>  
                                    <input type="text" name="answer__two__question__two" required>
                                    <input type="radio" name="radio__question__two" value="6" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="column">Ответ №3 <br>  
                                    <input type="text" name="answer__three__question__two" required>
                                    <input type="radio" name="radio__question__two" value="7" required>
                                </div>
                                <div class="column">Ответ №4 <br>  
                                    <input type="text" name="answer__four__question__two" required>
                                    <input type="radio" name="radio__question__two" value="8" required>
                                </div>
                            </div>
                        </div>                  
                   </div> 
                   <div class="question">
                       <p>
                           <h5>Вопрос №3:</h5>
                           <input type="text" name="text__question__three" class="text__question"  required>
                        </p>
                        <div class="answer">
                            <div class="row">
                                <div class="column">Ответ №1 <br>  
                                    <input type="text" name="answer__one__question__three" required>
                                    <input type="radio" name="radio__question__three"  value="9" required>
                                </div>
                                <div class="column">Ответ №2 <br>  
                                    <input type="text" name="answer__two__question__three" required>
                                    <input type="radio" name="radio__question__three"  value="10" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="column">Ответ №3 <br>  
                                    <input type="text" name="answer__three__question__three" required>
                                    <input type="radio" name="radio__question__three" value="11" required>
                                </div>
                                <div class="column">Ответ №4 <br>  
                                    <input type="text" name="answer__four__question__three" required>
                                    <input type="radio" name="radio__question__three" value="12" required>
                                </div>
                            </div>
                        </div>                  
                   </div> 
                   <div class="question">
                       <p>
                           <h5>Вопрос №4:</h5>
                           <input type="text" name="text__question__four" class="text__question"  required>
                        </p>
                        <div class="answer">
                            <div class="row">
                                <div class="column">Ответ №1 <br>  
                                    <input type="text" name="answer__one__question__four" required>
                                    <input type="radio" name="radio__question__four" value="13" required>
                                </div>
                                <div class="column">Ответ №2 <br>  
                                    <input type="text" name="answer__two__question__four" required>
                                    <input type="radio" name="radio__question__four" value="14" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="column">Ответ №3 <br>  
                                    <input type="text" name="answer__three__question__four" required>
                                    <input type="radio" name="radio__question__four" value="15" required>
                                </div>
                                <div class="column">Ответ №4 <br>  
                                    <input type="text" name="answer__four__question__four" required>
                                    <input type="radio" name="radio__question__four" value="16" required>
                                </div>
                            </div>
                        </div>                  
                   </div> 
                   <div class="question">
                       <p>
                           <h5>Вопрос №5:</h5>
                           <input type="text" name="text__question__five" class="text__question"  required>
                        </p>
                        <div class="answer">
                            <div class="row">
                                <div class="column">Ответ №1 <br>  
                                    <input type="text" name="answer__one__question__five" required>
                                    <input type="radio" name="radio__question__five" value="17" required>
                                </div>
                                <div class="column">Ответ №2 <br>  
                                    <input type="text" name="answer__two__question__five" required>
                                    <input type="radio" name="radio__question__five" value="18" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="column">Ответ №3 <br>  
                                    <input type="text"  name="answer__three__question__five" required>
                                    <input type="radio" name="radio__question__five" value="19"  required>
                                </div>
                                <div class="column">Ответ №4 <br>  
                                    <input type="text" name="answer__four__question__five" required>
                                    <input type="radio" name="radio__question__five" value="20" required>
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