<?php
/*
** check item in databse
*/
function checkitem ($select, $from) {
    global $conn;

    $statement = $conn->prepare("SELECT $select FROM $from "); {

        $statement->execute(array());

        $count = $statement->rowCount();

        return $count;
    }
}


function checkitems ($select, $from, $vlaue) {
    global $conn;

    $statement = $conn->prepare("SELECT $select FROM $from WHERE $select = ? "); {

        $statement->execute(array($vlaue));

        $count = $statement->rowCount();

        return $count;
    }
}
/*
** get title dynmic 
*/


function getTitle() {
        
    global $getTitle;

    if(isset($getTitle)) {

        echo $getTitle;
    }
    else {

        echo "Karma";
    }
}

/*
** redirect index
*/

function RedirectIndex($msg , $seconds= 3, $url) {

    echo $msg;

    echo "<div class='alert alert-info'>YOU WILL BE REDIRECTED  AFTER $seconds SECONDES. </div>";

    header("refresh:$seconds; url=$url");

    exit();


}




function getlatest($select, $table, $order, $limit = 5) {
    global $conn ;

    $getstmt = $conn->prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT $limit");

    $getstmt->execute();

    $rows = $getstmt->fetchAll();

    return $rows;
}