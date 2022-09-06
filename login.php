<?php
session_start();
include("connection.php");
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $user_name=$_POST['user_name'];
    $password=$_POST['password'];
    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {
       //read the database
        $query="select * from employees where username='$user_name'limit 1";
        $result=mysqli_query($con, $query);
        if($result)
        {
            if($result && mysqli_num_rows($result)>0)
            {
                $user_data=mysqli_fetch_assoc($result);
                if($user_data['password']===$password)
                {
                    $_SESSION['empl_id']=$user_data['employee_id'];
                    header("location: employee_information.php");
                    die;
                }
            }
        }
        echo "<h2>wrong username or password!</h2>";
      
    }
    else{
        echo "<h2>Please enter some valid information!<h2>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        html>h2{
            font-size:30px;
            color:white;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <h1>Employee Management System</h1>
            <ul id="navli">
                <li><a class="homered" href="homepage.html">HOME</a></li>
                <li><a class="homeblack0" href="login.php">LOG IN</a></li>
                <li><a class="homeblack" href="admin_login.php">ADMIN</a></li>
            </ul>
        </nav>
        
    </header>
    <div class="divider"></div>
    <img src="homepage/logo.png" alt="">
    <div id="box">
        <div style="font-size:20px;margin:10px;color:white">
        Login
        </div>
        <form method="post">
            <input type="text" id="text0" name="user_name" placeholder="username"><br><br>
            <input type="password" id="text1" name="password" placeholder="password"><br><br>
            <input type="submit" id="button" value="Login"><br><br>
        </form>
    </div>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Lobster');
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700');
    #logo{
        left:0;
    }
    body {
        margin: 0px;
    }
    
    header {
        top:0;
        margin:0;
        background: rgb(47,79,79);
        color: white;
        padding: 8px 20px 6px 40px;
        height: 50px;
    }
    
    header h1{
        display: inline;
        font-family: 'Lobster', cursive;
        font-weight: 400;
        font-size: 32px;
        float: left;
        margin-top: 0px;
        margin-right: 10px;
    }
    
    nav ul {
        display: inline;
        padding: 0px;
        float: right;
    }
    
    nav ul li {
        display: inline-block;
        list-style-type: none;
        color: white;
        padding-left: 12px;
    }
    
    nav ul li a {
        color: white;
        text-decoration: none;
    }
    
    nav ul ul {
        display: none;
        position: absolute;
    }
    
  /*  #navli ul li ul:hovar {
        visibility: visible;
        display: block;
    }*/
    
    #navli {
        font-family: 'Montserrat', sans-serif;
    }
    
    .homeblack0 {
        background-color: yellowgreen;
        /*padding:100%;*/
        padding: 100% 10px 22px 10px;
    }
    
    .divider {
        background-color: yellowgreen;
        height: 5px;
    }
    
    .homered:hover,.homeblack:hover {
        background-color: cyan;
        padding:100%;
        padding: 30px 10px 21px 10px;
        color:black;
        font-weight:bolder;
    }
    
    #divimg {
        background-repeat: no-repeat;
        background-size: cover;
        background-image: url('../images/back.jpg');
        padding: 0px;
        margin: 10px;
        height: 100%;
        width: 100%;
    }
        body{
            background-image:url("homepage/background.png");
        }
        form >a{
            text-decoration:none;
            color:white;
            font-weight: bold;
            font-family:Arial, Helvetica, sans-serif
        }
        form >a:hover{
            color:cyan;
            font-style:italic;
        }
        #text0,#text1{
            height:25px;
            border-radius:5px;
            padding:4px;
            border:2px solid green;
            background-color: white;
            color:color;
        }
        #text0{
            position:fixed;
            top:40%;
        }
        #text1{
            top:50%;
            position:fixed;
        }
        #button{
            position:fixed;
            top:60%;
            padding:10px;
            width:200px;
            color:white;
            background-color:black;
            border:none;
            border:2px solid yellowgreen;
            border-radius: 5px;
        }
        #button:hover
        {
            padding-left:15px;
            background-color: green;
            color:black;
            font-weight:bolder;
            font-style:italic;
            font-family:'Times New Roman', Times, serif;
        }
        #box{
            position:fixed;
            background-color:rgb(47,79,79);
            top:30%;
            left:40%;
            padding:20px;
            border-radius: 20px;
            width:300px;
            height:300px;
            border:3.5px solid yellowgreen;
        }

    </style>
    
</body>
</html>
