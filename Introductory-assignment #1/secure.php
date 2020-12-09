
<?php
// file contain function for input validation

// Functions for preventing SQL injection and XSS or Cross Site Scripting
function mysql_entities_fix_string($connect, $string)
{
    return htmlentities(mysql_fix_string($connect, $string));
}

// A method for neutralizing data entered by the user, applicable for MySQL
function mysql_fix_string($connect, $string)
{
    if (get_magic_quotes_gpc())
        $string = stripslashes($string);
    return $connect->real_escape_string($string);
}
?>