<?php

// php manage class
class Manage
{
    public $db = null;

    public function __construct(Connect $db)
    {
        if (!isset($db->con))
            exit;
        $this->db = $db;
    }

    // fetch product data using getData Method
    public function getData()
    {
        $sql = "SELECT product.*, manufacturer.brand, manufacturer.headquarter AS origin FROM product INNER JOIN manufacturer ON product.brand = manufacturer.id";
        $result = $this->db->con->query($sql);

        $resultArray = array();

        // fetch manage data one by one
        if ($result->num_rows > 0) {
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }
        }

        return $resultArray;
    }

    // fetch brand data using getBrands Method
    public function getBrands()
    {
        $sql = "SELECT * FROM manufacturer";
        $result = $this->db->con->query($sql);

        $resultArray = array();

        // fetch manage data one by one
        if ($result->num_rows > 0) {
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }
        }

        return $resultArray;
    }

    // get brand using brand id
    public function getBrand($id = null, $table = 'manufacturer')
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

}