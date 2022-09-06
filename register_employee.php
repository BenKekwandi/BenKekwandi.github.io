<?php
session_start();
include("connection.php");
include("functions.php");
$admin=check_login_admin($con);
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $user_name=$_POST['user_name'];
    $password=$_POST['password'];
    $first=$_POST['firstname'];
    $last=$_POST['lastname'];
    $nation=$_POST['nationality'];
    $bdate=$_POST['birthdate'];
    $start=$_POST['start'];
    $end=$_POST['end'];
    $sal=$_POST['salary'];
    
    if(!empty($user_name) && !empty($password) && !is_numeric($user_name) && !empty($first) && !empty($last) && !empty($bdate) && !empty($start))
    {

        $query="insert into employees (employee_firstName,employee_lastName,username,password,employee_birthdate,Nationality,employee_contract_start,employee_contract_end,salary) values ('$first','$last','$user_name','$password','$bdate','$nation','$start','$end','$sal')";
        mysqli_query($con, $query);
        header("location: admin.php");
       die;
    }

    
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Register Employee</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">

    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <!--<title>Dashboard Sidebar Menu</title>--> 
    <body>
</head>
</head>
<body>
<div>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="logo.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">Administrator</span>
                    <span class="profession"></span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <!--li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li-->

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="admin.php">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="admin_profile.php">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Admin profile</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="register_employee.php">
                            <i class='bx bx-pie-chart-alt icon'></i>
                            <span class="text nav-text">New employee</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="requests_admin.php">
                            <i class='bx bx-heart icon'></i>
                            <span class="text nav-text">Requests</span>
                        </a>
                    </li>


                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="logout.php">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <!--i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    div class="toggle-switch">
                        <span class="switch"></span-->
                    </div>
                </li>

            </div>
        </div>

    </nav>
    
        <section class="home">
        <div class="text"><?php echo "$admin[admin_username]";?></div>
        <div id="box">
        <div style="font-size:20px;margin:10px;color:white">
        Register an employee
        <br><br>
        </div>
        <form id="fr" method="post" action="register_employee.php">
        
            <label>First name</label> 
            <input type="text" id="fname" name="firstname" placeholder="first name"><br><br><br>
           
            <label>Last name</label> 
            <input type="text" id="lname" name="lastname" placeholder="last name"> <br> <br><br>
            
            <label>Birth date</label> 
            <input type="date" id="bdate" name="birthdate" placeholder="birth date(yyyy-mm-dd)"><br><br><br>
          
            <label>Citizenship</label> 
            <input type="text" id="ntion" name="nationality" placeholder="Country"><br><br><br>

            <label>Contract start</label> 
            <input type="date" id="start" name="start" placeholder="contract start date(yyyy-mm-dd)"><br><br><br>
          
            <label>Contract end</label> 
            <input type="date" id="end" name="end" placeholder="contract end date(yyyy-mm-dd)"><br><br><br>
            
            <label>Salary</label> 
            <input type="number" id="salary" name="salary" placeholder="salary"><br><br><br>
            
            <label>Username</label> 
            <input type="text" id="text" name="user_name" placeholder="username"><br><br><br>
          
            <label>Password</label> 
            <input type="password" id="text" name="password" placeholder="password"><br><br> <br> 
           
        <input type="submit" id="button" value="Register">
        
        <!--form action="upload1.php"
           method="post"
           enctype="multipart/form-data">

           <input type="file" 
                  name="my_image">

           <input type="submit" 
                  name="submit"
                  value="Upload">
     	
     </form--> 
        
        </form>
    </div>
        </section>
    </div>
    <script>
        const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            searchBtn = body.querySelector(".search-box"),
            modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");


        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        })

        searchBtn.addEventListener("click", () => {
            sidebar.classList.remove("close");
        })

        modeSwitch.addEventListener("click", () => {
            body.classList.toggle("dark");

            if (body.classList.contains("dark")) {
                modeText.innerText = "Light mode";
            } else {
                modeText.innerText = "Dark mode";

            }
        });
    </script>  
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Lobster');
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700');
     #fr>table
     {
        position: relative;
        height:100%;
        width:100%;
        color:white;
     }
     #fr>table>tr>td>input{
         width:700px;
         height:30px;
         border-radius:17px;
         border:3px solid yellowgreen;
     }
     form>tr{
         padding:50px;
     }
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

:root {
    
    --body-color: #18191a;
    --sidebar-color: #242526;
    --primary-color: #3a3b3c;
    --primary-color-light: #3a3b3c;
    --toggle-color: #fff;
    --text-color: #ccc;
    
    --tran-03: all 0.2s ease;
    --tran-03: all 0.3s ease;
    --tran-04: all 0.3s ease;
    --tran-05: all 0.3s ease;
}

body {
    min-height: 100vh;
    background-color: var(--body-color);
    transition: var(--tran-05);
}

::selection {
    background-color: var(--primary-color);
    color: #fff;
}

body.dark {
    --body-color: #18191a;
    --sidebar-color: #242526;
    --primary-color: #3a3b3c;
    --primary-color-light: #3a3b3c;
    --toggle-color: #fff;
    --text-color: #ccc;
}


/* ===== Sidebar ===== */

.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 250px;
    padding: 10px 14px;
    background: var(--sidebar-color);
    transition: var(--tran-05);
    z-index: 100;
}

.sidebar.close {
    width: 88px;
}


/* ===== Reusable code - Here ===== */

.sidebar li {
    height: 50px;
    list-style: none;
    display: flex;
    align-items: center;
    margin-top: 10px;
}

.sidebar header .image,
.sidebar .icon {
    min-width: 60px;
    border-radius: 6px;
}

.sidebar .icon {
    min-width: 60px;
    border-radius: 6px;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}

.sidebar .text,
.sidebar .icon{
    color: var(--text-color);
    transition: var(--tran-03);
}

.sidebar .text {
    font-size: 17px;
    font-weight: 500;
    white-space: nowrap;
    opacity: 1;
}

.sidebar.close .text {
    opacity: 0;
}


/* =========================== */

.sidebar header {
    position: relative;
}

.sidebar header .image-text {
    display: flex;
    align-items: center;
}

.sidebar header .logo-text {
    display: flex;
    flex-direction: column;
}

header .image-text .name {
    margin-top: 2px;
    font-size: 18px;
    font-weight: 600;
}

header .image-text .profession {
    font-size: 16px;
    margin-top: -2px;
    display: block;
}

.sidebar header .image {
    display: flex;
    align-items: center;
    justify-content: center;
}

.sidebar header .image img {
    width: 40px;
    border-radius: 6px;
}

.sidebar header .toggle {
    position: absolute;
    top: 50%;
    right: -25px;
    transform: translateY(-50%) rotate(180deg);
    height: 25px;
    width: 25px;
    background-color: var(--primary-color);
    color: var(--sidebar-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    cursor: pointer;
    transition: var(--tran-05);
}

body.dark .sidebar header .toggle {
    color: var(--text-color);
}

.sidebar.close .toggle {
    transform: translateY(-50%) rotate(0deg);
}

.sidebar .menu {
    margin-top: 40px;
}

.sidebar li.search-box {
    border-radius: 6px;
    background-color: var(--primary-color-light);
    cursor: pointer;
    transition: var(--tran-05);
}

.sidebar li.search-box input {
    height: 100%;
    width: 100%;
    outline: none;
    border: none;
    background-color: var(--primary-color-light);
    color: var(--text-color);
    border-radius: 6px;
    font-size: 17px;
    font-weight: 500;
    transition: var(--tran-05);
}

.sidebar li a {
    list-style: none;
    height: 100%;
    background-color: transparent;
    display: flex;
    align-items: center;
    height: 100%;
    width: 100%;
    border-radius: 6px;
    text-decoration: none;
    transition: var(--tran-03);
}

.sidebar li a:hover {
    background-color: var(--primary-color);
}

.sidebar li a:hover .icon,
.sidebar li a:hover .text {
    color: var(--sidebar-color);
}

body.dark .sidebar li a:hover .icon,
body.dark .sidebar li a:hover .text {
    color: var(--text-color);
}

.sidebar .menu-bar {
    height: calc(100% - 55px);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow-y: scroll;
}

.menu-bar::-webkit-scrollbar {
    display: none;
}

.sidebar .menu-bar .mode {
    border-radius: 6px;
    background-color: var(--primary-color-light);
    position: relative;
    transition: var(--tran-05);
}

.menu-bar .mode .sun-moon {
    height: 50px;
    width: 60px;
}

.mode .sun-moon i {
    position: absolute;
}

.mode .sun-moon i.sun {
    opacity: 0;
}

body.dark .mode .sun-moon i.sun {
    opacity: 1;
}

body.dark .mode .sun-moon i.moon {
    opacity: 0;
}

.menu-bar .bottom-content .toggle-switch {
    position: absolute;
    right: 0;
    height: 100%;
    min-width: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
    cursor: pointer;
}

.toggle-switch .switch {
    position: relative;
    height: 22px;
    width: 40px;
    border-radius: 25px;
    background-color: var(--toggle-color);
    transition: var(--tran-05);
}

.switch::before {
    content: '';
    position: absolute;
    height: 15px;
    width: 15px;
    border-radius: 50%;
    top: 50%;
    left: 5px;
    transform: translateY(-50%);
    background-color: var(--sidebar-color);
    transition: var(--tran-04);
}

body.dark .switch::before {
    left: 20px;
}

.home {
    position: absolute;
    top: 0;
    top: 0;
    left: 250px;
    height: 100vh;
    width: calc(100% - 250px);
    background-color: var(--body-color);
    transition: var(--tran-05);
}

.home .text {
    font-size: 30px;
    font-weight: 500;
    color: var(--text-color);
    padding: 12px 60px;
}

.sidebar.close~.home {
    left: 78px;
    height: 100vh;
    width: calc(100% - 78px);
}

body.dark .home .text {
    color: var(--text-color);
} 
    p{
        position:fixed;
        top:160px;
        left:680px;
        color:white;
    }
        form >a{
            text-decoration:none;
            color:yellowgreen;
            font-weight: bold;
            font-family:Arial, Helvetica, sans-serif
        }
        form >a:hover{
            color:cyan;
            font-style:italic;
        }
       
        #button{
            padding:10px;
            width:200px;
            color:white;
            background-color:black;
            border:none;
        }
        #button:hover
        {
            padding-left:15px;
            background-color: lightblue;
            color:black;
            font-weight:bolder;
            font-style:italic;
            font-family:'Times New Roman', Times, serif;
        }
        #box{
            position:fixed;
            /*background-color: red;*/
            padding:20px;
         top:10%;
         left:38%;
         height:600px;
         width:350px;
         background-color:red;
         color:white;
         border-radius:17px;
        }
        #box>form>input{
            border-radius:5px;
        }

    </style>
    
</body>
</html>