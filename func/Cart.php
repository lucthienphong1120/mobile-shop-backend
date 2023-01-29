<?php

// php cart class
class Cart
{
    public $db = null;

    public function __construct(Connect $db)
    {
        if (!isset($db->con))
            exit;
        $this->db = $db;
    }

    // get cart using user_id
    public function getCart($userid = null, $table = 'cart')
    {
        $sql = "SELECT * FROM {$table} WHERE user_id={$userid}";
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

    // insert into cart table
    public function insertIntoCart($params = null, $table = "cart")
    {
        if ($this->db->con != null) {
            if ($params != null) {
                // "Insert into cart(user_id, item_id) values (0)"
                // get table columns
                $columns = implode(',', array_keys($params));

                $values = implode(',', array_values($params));

                // create sql query
                $sql = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

                // execute query
                $result = $this->db->con->query($sql);
                return $result;
            }
        }
    }

    // get user_id and item_id and insert into cart table
    public function addToCart($userid, $itemid)
    {
        if (isset($userid) && isset($itemid)) {
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemid,
            );

            // insert data into cart
            $result = $this->insertIntoCart($params);
            if ($result) {
                // Reload Page
                header('Location: ' . $_SERVER['REQUEST_URI']);
            } else {
                echo '<script>alert("Error")</script>';
            }
        }
    }

    // delete cart item using cart item id
    public function deleteCart($item_id = null, $table = 'cart')
    {
        if ($item_id != null) {
            $sql = "DELETE FROM {$table} WHERE item_id={$item_id}";
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

    // calculate sub total
    public function getSum($arr)
    {
        $sum = 0;
        foreach ($arr as $item) {
            $sum += floatval($item);
        }
        return sprintf('%.2f', $sum);
    }

    // get item_id of shopping cart list
    public function getCartId($cartArray = null)
    {
        $cart_id = array();
        if ($cartArray != null) {
            foreach ($cartArray as $item) {
                array_push($cart_id, $item['item_id']);
            }
            return $cart_id;
        }
    }
}