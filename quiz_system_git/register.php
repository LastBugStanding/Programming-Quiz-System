<?php

	include('scripts/connect_db.php');

    if(isset($_POST['login']) && $_POST['login'] != "" &&
       isset($_POST['password']) && $_POST['password'] != ""){

    
        $user=$mysqli->real_escape_string($_POST['login']);
        $pass=$mysqli->real_escape_string($_POST['password']);

        $fetch=$mysqli->query("SELECT id FROM admins 
                            WHERE username='$user'")or die($mysqli->error);
        $count=$fetch->num_rows;
        if($count!="")
        {
        	$user_msg = 'Sorry, but \ '.$user.' \ is already taken!';
            header('location: admin.php?msg='.$user_msg.'');
        }
        else
        {
            $mysqli->query("INSERT INTO admins (username, password) 
            	VALUES ('$user','$pass')")or die($mysqli->error);

        	$user_msg = 'Admin account, \ '.$user.' \ has been created!';
            header('location: admin.php?msg='.$user_msg.'');
        }
    }else{
        $user_msg = 'Sorry, but Something went wrong';
        header('location: admin.php?msg='.$user_msg.'');
    }

?>