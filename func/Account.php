<?php

// php account class
class Account
{
    public $db = null;

    public function __construct(Connect $db)
    {
        if (!isset($db->con))
            exit;
        $this->db = $db;
    }

    // fetch account data using getData Method
    public function getData($table = 'account')
    {
        $sql = "SELECT * FROM {$table}";
        $result = $this->db->con->query($sql);

        $resultArray = array();

        // fetch account data one by one
        if ($result->num_rows > 0) {
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }
        }

        return $resultArray;
    }

    // get account using item id
    public function getAccount($id = null, $table = 'account')
    {
        if ($id != null) {
            $sql = "SELECT * FROM {$table} WHERE id={$id}";
            $result = $this->db->con->query($sql);

            $resultArray = array();

            // fetch account data once
            if ($result->num_rows == 1) {
                $resultArray = mysqli_fetch_array($result, MYSQLI_ASSOC);
            }

            return $resultArray;
        }
    }

    // handle login functionality
    public function login($username = null, $password = null)
    {
        if ($username != null && $password != null) {
            echo "<script>alert('ok');</script>";
            $sql = "SELECT * FROM account WHERE username='{$username}' AND password='{$password}'";
            $result = $this->db->con->query($sql);

            if ($result->num_rows == 1) {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $_SESSION['user_id'] = $row['id'];
                echo "<script>alert('success');</script>";
                return true;
            } else {
                echo "<script>alert('fail');</script>";
                return false;
            }
        }
        else {
            echo "<script>alert('fail');</script>";
            return false;
        }
    }

    // handle user registration
    public function register($username = null, $password = null)
    {
        if ($username != null && $password != null) {
            $sql = "INSERT INTO account (username, password) VALUES ('{$username}', '{$password}')";
            $result = $this->db->con->query($sql);
            if ($result) {
                return true;
            }
        }
        return false;
    }


}