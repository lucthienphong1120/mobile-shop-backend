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
            $sql = "SELECT * FROM account WHERE username='{$username}' AND password='{$password}'";
            $result = $this->db->con->query($sql);

            if ($result->num_rows == 1) {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $_SESSION['user_id'] = $row['id'];
                echo "<script>alert('login success');</script>";
                return true;
            } else {
                echo "<script>alert('login fail');</script>";
                return false;
            }
        }
    }

    // handle user registration
    public function register(
        $fullname = null,
        $username = null,
        $password = null,
        $phone = null,
        $avatar = null,
        $email = null,
        $city = null,
        $gender = null,
        $address = null
    )
    {
        if (
            $fullname != null
            && $username != null
            && $password != null
            && $phone != null
            // && $avatar != null
            && $email != null
            && $city != null
            && $gender != null
            // && $address != null
        ) {
            if ($avatar == null) {
                $avatar = null;
            }
            if ($address == null) {
                $address = null;
            }
            $sqlAccount = "INSERT INTO account(username, password, email) VALUES ('{$username}','{$password}','{$email}')";
            $sqlUser = "INSERT INTO user(fullname, phone, avatar, city, gender, address) VALUES ('{$fullname}','{$phone}','{$avatar}','{$city}','{$gender}','{$address}')";
            $resultAcc = $this->db->con->query($sqlAccount);
            $resultUser = $this->db->con->query($sqlUser);
            if ($resultAcc && $resultUser) {
                echo "<script>alert('register success');</script>";
                return true;
            } else if ($resultUser) {
                echo "<script>alert('register Account fail');</script>";
                $this->db->con->query("DELETE FROM account WHERE username = '{$username}'");
                return false;
            } else if ($resultAcc) {
                echo "<script>alert('register User fail');</script>";
                $this->db->con->query("DELETE FROM user WHERE fullname = '{$fullname}'");
                return false;
            } else {
                echo "<script>alert('register fail');</script>";
                return false;
            }
        }
    }

}