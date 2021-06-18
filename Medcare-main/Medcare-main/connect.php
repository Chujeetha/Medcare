<?php
$username = filter_input(INPUT_POST,'username');
$password= filter_input(INPUT_POST,'password');
$password1=filter_input(INPUT_POST,'password1');
if(!empty($username)){
    if(!empty($password)){
        if(!empty($password1)){
            $host="localhost";
            $dbusername="root";
            $dbpassword="";
            $dbname="register";
            
        $conn= new mysqli ($host,$dbusername,$dbpassword,$dbname);
            
        if(mysqli_connect_error()){
            die('Connect Error('. mysqli_connect_errno().')'
                .mysqli_connect_error());
        }
             if($password!=$password1){
                echo '<script>alert("password not correct")</script>';
                 die();
            }
        else{
            $sql="INSERT INTO username (username,password,password1)
            values ('$username','$password','$password1')";
            
           
            
            if($conn->query($sql)){
                echo '<script>alert("Registeration has been successful")</script>';
                header("posr.php"); 
               
            }
            else{
                echo '<script>alert("Error:".$sql."<br>".$conn->error"</script>';
                
            }
            $conn->close();
                
        }
            
        }
    else{
        echo '<script>alert("Password1 should not be empty")</script>';
        
        die();
    }
    }
    else{
        echo '<script>alert("Password should not be empty")</script>';
        header("connect.php");
        die();
    }
    }
else{
    echo '<script>alert("username should not be empty")</script>';
    header("connect.php");
    die();
}
?>