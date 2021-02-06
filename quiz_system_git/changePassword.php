<?php 

    include('scripts/connect_db.php');
    
    if(isset($_POST['login']) && $_POST['login'] != "" &&
       isset($_POST['password']) && $_POST['password'] != "" ){
        session_start();
        {
            $user=$mysqli->real_escape_string($_POST['login']);
            $pass=$mysqli->real_escape_string($_POST['password']);
            $fetch=$mysqli->query("SELECT id FROM admins 
                                WHERE username='$user'")or die($mysqli->error);
            $count=$fetch->num_rows;
            if($count!="") {
                $mysqli->query("UPDATE admins 
                             SET password = '$pass'
                             WHERE username = '$user' ")or die($mysqli->error);

                $user_msg = 'Password Changed Successfully for \\'.$user.'\\';
                header('location: admin.php?msg='.$user_msg.'');
            }
            else
            {
                $user_msg = 'Wrong Username or Password!';
                header('location: admin.php?msg='.$user_msg.'');
            }
        }
    }else{
        $user_msg = 'Sorry, but Something went wrong';
        header('location: admin.php?msg='.$user_msg.'');
    }
?>

