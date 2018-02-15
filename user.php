<?php

function checkUser($fuid,$fname,$femail,$url){
    include  'dbconfig.php';
    $sql= "SELECT * FROM users WHERE Fuid = $fuid";
    $result = $conn->query($sql);

    if (empty($result->num_rows)){
        $sql = "INSERT INTO users (Fuid,Ffname,Femail,url)VALUES ('$fuid','$fname','$femail','$url')";
        $conn->query($sql);
    }else{
        $sql = "UPDATE users SET Ffname='$fname',Femail='$femail',url ='$url' where Fuid='$fuid'";
        $conn->query($sql);
    }

$conn->close();

}





