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

    // handle image upload
    public function handleImage($image)
    {
        $target_dir = "./assets/products/";
        $target_file = $target_dir . basename($image['name']);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($image['tmp_name']);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo '<script>alert("File is not an image.")</script>';
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo '<script>alert("Sorry, file already exists.")</script>';
            $uploadOk = 0;
        }

        // Check file size > 1MB
        if ($image['size'] > 1000000) {
            echo '<script>alert("Sorry, your file is too large.")</script>';
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")</script>';
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo '<script>alert("Sorry, your file was not uploaded.")</script>';
            return '';
        } else {
            if (move_uploaded_file($image['tmp_name'], $target_file)) {
                return $target_file;
            } else {
                echo '<script>alert("Sorry, there was an error uploading your file.")</script>';
                return '';
            }
        }
    }

    // delete product item using product id
    public function deleteProduct($id = null, $table = 'product')
    {
        if ($id != null) {
            $sql = "DELETE FROM {$table} WHERE id={$id}";
            $result = $this->db->con->query($sql);
            if ($result) {
                // Reload Page
                header('Location: ' . $_SERVER['REQUEST_URI']);
            } else {
                echo '<script>alert("Error")</script>';
            }
            return $result;
        }
    }

    // update product item using product id
    public function updateProduct($id = null, $name = null, $brand = null, $price = null, $image = null)
    {
        if ($id != null) {
            if (intval($brand) != 0) {
                $sql = "UPDATE product SET brand='{$brand}' WHERE id={$id}";
                $result = $this->db->con->query($sql);
                if (!$result) {
                    echo '<script>alert("Update brand error!")</script>';
                    return $result;
                }
            }
            if ($image['name'] != null) {
                $imgName = $this->handleImage($image);
                if ($imgName != '') {
                    $sql = "UPDATE product SET image='{$imgName}' WHERE id={$id}";
                    $result = $this->db->con->query($sql);
                    if (!$result) {
                        echo '<script>alert("Update image error!")</script>';
                        return $result;
                    }
                }
            }
            $sql = "UPDATE product SET name='{$name}', price={$price} WHERE id={$id}";
            $result = $this->db->con->query($sql);
            if ($result) {
                // Reload Page
                header('Location: ' . $_SERVER['REQUEST_URI']);
            } else {
                echo '<script>alert("Update error!")</script>';
            }
            return $result;
        }
    }

    // insert product item using product id
    public function insertProduct($name = null, $brand = null, $price = null, $image = null)
    {
        if ($name != null && $brand != null && $price != null && $image != null) {
            $imgName = $this->handleImage($image);
            if ($imgName != '') {
                $sql = "INSERT INTO product (name, brand, price, image) VALUES ('{$name}', {$brand}, {$price}, '{$imgName}')";
                $result = $this->db->con->query($sql);
                if ($result) {
                    // Reload Page
                    header('Location: ' . $_SERVER['REQUEST_URI']);
                } else {
                    echo '<script>alert("Insert error!")</script>';
                }
                return $result;
            }
        } else {
            echo '<script>alert("Please fill all fields!")</script>';
        }
    }

}