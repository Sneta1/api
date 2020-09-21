<?php
class Reminder{
 
    // database connection and table name
    private $conn;
    private $table_name = "api";
 
    // object properties
    public $id;
    public $timee;
    public $message;
 
    // constructor with $db as database conn
    public function __construct($db){
        $this->conn = $db;
    }
    // signup user
    function signup(){

        $query = "INSERT INTO ". $this->table_name. " (time, message) VALUES('$this->timee', '$this->message')";

        $stmt = $this->conn->prepare($query);

        if($stmt->execute()){
        $this->id = $this->conn->lastInsertId();
        return true;
        }
        return false;
    }

    function show(){

       $query = "SELECT *FROM api where id=(SELECT LAST_INSERT_ID()"; 
       $stmt = $this->conn->prepare($query);
    
        if($stmt->execute()){
           $result= $stmt->setFetchMode(PDO::FETCH_ASSOC);

           while($row= $stmt->fetch()){
            echo $row['time'] . "<br/>" ;
            echo $row['message'];
        }
        return true;
    }

      return false;
    }
  }
?>
