<?php

function user_load($fbid){
    include 'dbconfig.php';
    $sql = "SELECT UID, Ffname FROM users WHERE FUID = '$fbid'";
if($result = $conn->query($sql)){
    if($result->num_rows > 0){
        while($row = $result->fetch_array()){
             $id = $row['UID'];
             $name = $row['Ffname'];
            $user_info = array(
                $id,
                $name
            );
                return $user_info;
        }
    }
}
}

//user_subscribed

function user_subscribed($user_id){
    include 'dbconfig.php';
    $sql = "SELECT subscribers FROM count WHERE UID = $user_id ";
    $result = $conn->query($sql);
    $number = $result->num_rows;

    return $number;
}

