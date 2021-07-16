<?php
/*
# Redirect Functions
#
#
*/

    function RedirectIndex($Msg , $seconds= 3, $url) {

        echo "<div class='alert alert-success'>$Msg</div>";

        echo "<div class='alert alert-info'>YOU WILL BE REDIRECTED  AFTER $seconds SECONDES. </div>";

        header("refresh:$seconds; url=$url");

        exit();


    }

    function getTitle() {
        
        global $getTitle;

        if(isset($getTitle)) {

            echo $getTitle;
        }
        else {

            echo "Default";
        }
    }



    function getlatest($select, $table, $limit = 5) {
        global $con ;

        $getstmt = $con->prepare("SELECT $select FROM $table LIMIT $limit");

        $getstmt->execute();

        $rows = $getstmt->fetchAll();

        return $rows;
    }