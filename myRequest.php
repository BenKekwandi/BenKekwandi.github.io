<?php
include "functions.php";
include "connection.php";
session_start();
$employee=check_login($con);

$qry="select * from requests where employee_id=$employee[employee_id]";
$i=0;
    $r=mysqli_query($con,$qry);
    if($r)
    {
        if($r && mysqli_num_rows($r)>0)
        {
            $i=0;
            while($a=mysqli_fetch_assoc($r))
            {
                $requests[$i]=$a;
                $i=$i+1;
            }
        }
    }

?>
<!DOCTYPE html>
<html>
<head>
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
    <body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="logo.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">Employee</span>
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
                        <a href="employee_information.php">
                            <i class='bx bx-bar-chart-alt-2 icon'></i>
                            <span class="text nav-text">My profile</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="edit_profile.php">
                            <i class='bx bx-bar-chart-alt-2 icon'></i>
                            <span class="text nav-text">Edit my profile</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="request.php">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Request</span>
                        </a>
                    </li>


                    <li class="nav-link">
                        <a href="leave.php">
                            <i class='bx bx-wallet icon'></i>
                            <span class="text nav-text">Leave</span>
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
        <div class="text"><?php echo "$employee[employee_firstName] $employee[employee_lastName]";?></div>
    
        <div id="containReq">
            <div>
            <span id="title"><a href="request.php">MAKE A REQUEST</a></span>
            <span id="title0"><a href="myRequest.php">MY REQUESTS</a></span>
            </div>
            <div id="root">
            <table>
                    <th align="center">Request ID</th>
                    <th align="center">Request TITLE</th>
                    <th align="center">Request CONTENT</th>
                    <th align="center">Feedback</th>
                
                    <?php for($n=0;$n<$i;$n++){  ?>
                    <tr>
                        <td><?php echo $requests[$n]['request_id']?></td>
                        <td><?php echo $requests[$n]['request_motivation']?></td>
                        <td><?php echo $requests[$n]['request_content']?></td>
                        <td><?php echo $requests[$n]['request_status']?></td>
                    <?php } ?>
                    </tr>
            </table>
        </div>
        </div>
        </section>
    </body>
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
    <style>
       @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
       #root{
        position:fixed;
         top:20%;
         left:15%;
         height:400px;
         width:1000px;
         background-color:white;
         color:black;
         border-radius:17px; 
         display:flex;
         justify-content: center;
     }
     #root>table>td{
         color:black;
         justify-content:center;
     }
     #root>table>tr{
         border:2px solid black;
     }
     #root>table{
         color:black;
         position:relative;
         overflow: scroll;
         width:100%;
         height:100%;
         background-color: white;
         border-radius: 17px;
         border:5px solid grey;
         /*border-collapse: collapse;*/
     }
     td>span:hover{
         background-color:#DE3163;
     }
     
     td>form>#btn{
        width:70px;
        height:50px;
        text-align: center;
        background-color: yellowgreen;
        border-radius:10px;
        border:3.5px solid white;
        font-size:20px;
     }
     th, td {
  text-align: center;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
tr:hover {background-color:#76D7C4;}

th {
  background-color: #3a3b3c;
  color: white;
}
      #title,#title0{
        top:10%;
        left:15%;
        position:fixed;
        background-color:black;
         color:white;
         border-radius:17px; 
         height:40px;
         width:200px;
         display:flex;
         text-align:center;
         justify-content:center;
         padding-left:8px;
         font-weight:bolder;
         font-family:'Poppins', sans-serif;
      }
    
      #title>a,#title0>a{
          text-decoration:none;
          color:white;
          font-weight:bolder;
        font-family:'Poppins', sans-serif;
      }
      #title0>a{
        color:black;
        
      }
      #title0{
        background-color:yellowgreen;
          font-style:italic;
          height:40px;
          width:210px;
          border:3px solid green;
      }
      #title>a:hover,#title0>a:hover{
          color:black;
      }
      #title:hover,#title0:hover{
          background-color:yellowgreen;
          font-style:italic;
          height:40px;
          width:210px;
          border:3px solid green;
          
      }
      #title0{
          left:30%;
      }
       #motif
       {
        position:fixed;
         top:20%;
         left:15%;
         width:1000px;
         height:60px;
         background-color:white;
         color:black;
         border-radius:17px; 
         display:flex;
         justify-content: center;
       }
       #reqst
       {
        position:fixed;
         top:30%;
         left:15%;
         height:400px;
         width:1000px;
         background-color:white;
         color:black;
         border-radius:17px; 
         display:flex;
         justify-content: center;
       }
       #req_btn
       {
        top:88%;
        left:15%;
        position:fixed;
        background-color:black;
         color:white;
         border-radius:17px; 
         height:60px;
         width:200px;
       }
      /* #containReq
       {
           position:fixed;
           top:30%;
           left:30%;
           background-color:yellow;
           width:750px;
           height:300px;
       }*/
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
.sidebar .icon {
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
    </style>
</html>