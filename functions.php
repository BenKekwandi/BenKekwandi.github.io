<?php

function check_login($con)
{
    if(isset($_SESSION['empl_id']))
    {
        $id=$_SESSION['empl_id'];
        $query="select *from employees where employee_id= $id limit 1";
        $result=mysqli_query($con,$query);
        
    }
    if($result && mysqli_num_rows($result)>0)
        {
            $user_data=mysqli_fetch_assoc($result);
            return $user_data;
        }
    //redirect to login
    header("location: login.php");
    die;
    
}
function check_login_admin($con)
{
    if(isset($_SESSION['admin_id']))
    {
        $id=$_SESSION['admin_id'];
        $query="select *from admin where admin_id= $id limit 1";
        $result=mysqli_query($con,$query);
        
    }
    if($result && mysqli_num_rows($result)>0)
        {
            $admin_data=mysqli_fetch_assoc($result);
            return $admin_data;
        }
    //redirect to login
    header("location: admin_login.php");
    die;
    
}