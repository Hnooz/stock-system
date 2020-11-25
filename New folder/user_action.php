<?php
require_once 'php_action/db_connect.php';
require_once 'core.php';
if(isset($_POST["btn_action"]))
{
    if($_POST["btn_action"] == 'Add')
    {
        $qry = "insert into user_details (email,password,username,) values(:email,:password,:username,:)";
        $statement = $connect->prepare($qry);
        $result = $statement->execute([
            ':email'    => $_POST["user_email"],
            ':password' => $_POST["user_password"],
            ':username'     => $_POST["user_name"],
            
        ]);
        $result = $statement->fetchAll();
        if(isset($result))
        {
            echo 'New User Added';
        }
    }
    
    if($_POST["btn_action"] == 'fetch_single')
    {
        $qry="select * from user_details where usr_id = :user_id ";
        $statement = $connect->prepare($qry);
        $statement->execute([
            ':user_id'  =>  $_POST["user_id"]
        ]);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row)
        {
            $output['user_email']  = $row['usr_email'];
            $output['user_name']= $row['usr_name'];
        }
        echo json_encode($output);
        
    }
    
    if($_POST["btn_action"] == 'Edit')
    {
        if($_POST["user_password"] !="")
        {
            $qry="update user_details set usr_name ='".$_POST['user_name']."',usr_email='".$_POST["user_email"]."',usr_password=".$_POST["user_password"]." where usr_id=".$_POST["user_id"]." ";  
        }
        else
        {
            $qry="update user_details set usr_name ='".$_POST['user_name']."',usr_email='".$_POST["user_email"]."' where usr_id=".$_POST["user_id"]." ";
        }
        $statement=$connect->prepare($qry);
        $statement->execute();
        $result = $statement->fetchAll();
        if(isset($result))
        {
            echo 'User Edited';
        }
    }
    
    if($_POST["btn_action"] =='Delete')
    {
        //print_r($_POST);
        $status = 'active';
        if($_POST["status"] == 'active')
        {
            $status = 'inactive';
        }
        $qry = "update user_details set usr_status='".$status."' where usr_id=".$_POST["user_id"]."";
        $statement = $connect->prepare($qry);
        $statement->execute();
        $result=$statement->fetchAll();
        if(isset($result))
        {
            echo 'User changes to '.$status;
        }
    }
}

?>