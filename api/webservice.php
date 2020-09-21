<?php
 
//get database connection
include_once 'config.php';
 
// instantiate user object
include_once 'reminders.php';
 
$database = new Database();
$db = $database->getConnection();
 
$reminder = new Reminder($db);
 
// set user property values


 
// create the user
if($_SERVER['REQUEST_METHOD']== 'POST'){
    
if($reminder->signup()){
    $reminder->timee = $_POST['timee'];
    $reminder->message = $_POST['message'];
    $reminder_arr=array(
        "status" => true,
        "message" => $reminder->message,
        "time" => $reminder->timee,
    );
}
}
/*else if($reminder->show()){
    $reminder->timee = $_GET['timee'];
    $reminder->message = $_GET['message'];
     $reminder_arr=array(
        "status" => true,
        "message" => $reminder->message,
        "time" => $reminder->timee,
    );
    
}*/
print_r(json_encode($reminder_arr));
    //$user->username = $_GET['username'];
    //$user->password = $_GET['password'];

?>
