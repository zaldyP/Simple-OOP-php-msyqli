<?php

class dbConfig 
{
    public $host;
    public $username;
    public $password;
    public $dab;
    public $conn;



    public function dbConnect()
    {
        $this->conn = mysqli_connect($this->host,$this->username,$this->password);

        if(!$this->conn){
            die("Connection Failed: " . mysqli_connect_error());
        }
        else {
            echo "Connected succesfully to the server";
        }

        $db_selected = mysqli_select_db($this->conn, $this->dab);

        if(!$db_selected){

            $db_sql = 'CREATE DATABASE chatapp';

            if(mysqli_query($this->conn, $db_sql)){
                echo 'Database chatapp already exist or created successfuly';
            }
            else {
                echo 'Error creating Database' . msyqli_error() . "\n";
            }

        }

        $table_sql = "CREATE TABLE IF NOT EXISTS users (".
            "uid INT PRIMARY KEY AUTO_INCREMENT," .
            "username VARCHAR(30) UNIQUE," .
            "password VARCHAR(50)," .
            "name VARCHAR(30)," .
            "email VARCHAR(70) UNIQUE); ";


        if(mysqli_query($this->conn, $table_sql)){
            echo 'Table : users already exist or created or created successfully'; 
        }
        else {
            echo 'Error creating table:' . mysqli_error() . "\n";
        }    



    }

    


}

$obj = new dbConfig();

$obj->host = 'localhost';
$obj->username = 'root';
$obj->password = '';
$obj->dab = 'chatapp';
$obj->dbConnect();
