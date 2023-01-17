<?php

// Use to fetch product data
class Product
{
    public $db = null;

    public function __construct(Connect $db)
    {
        if (!isset($db->con))
            exit;
        $this->db = $db;
    }

    // fetch product data using getData Method
    public function getData($table = 'product')
    {
        $sql = "SELECT * FROM {$table}";
        $result = $this->db->con->query($sql);

        $resultArray = array();

        // fetch product data one by one
        if ($result->num_rows > 0) {
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }
        }

        return $resultArray;
    }

    // get product using item id
    public function getProduct($id = null, $table = 'product')
    {
        if ($id != null) {
            $sql = "SELECT * FROM {$table} WHERE id={$id}";
            $result = $this->db->con->query($sql);

            $resultArray = array();

            // fetch product data once
            if ($result->num_rows == 1) {
                $resultArray = mysqli_fetch_array($result, MYSQLI_ASSOC);
            }

            return $resultArray;
        }
    }

}