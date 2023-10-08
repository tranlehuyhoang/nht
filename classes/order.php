<?php
include_once __DIR__ . '/../lib/database.php';
?>

<?php
class order
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function insert_cart($data)
    {
        $cartproductid = mysqli_real_escape_string($this->db->link, $data['cartproductid']);
        $cartsession = mysqli_real_escape_string($this->db->link, $data['cartsession']);
        $cartquantity = mysqli_real_escape_string($this->db->link, $data['cartquantity']);
        $cartuserid = mysqli_real_escape_string($this->db->link, $data['cartuserid']);
        $cartstatus = mysqli_real_escape_string($this->db->link, $data['cartstatus']);

        if ($cartproductid == '' || $cartsession == '' || $cartquantity == '' || $cartuserid == '' || $cartstatus == '') {
            $arlet = "<div class='alert alert-danger' role='alert'>Error</div>";
            return $arlet;
        } else {
            $query = "INSERT INTO table_cart(cartproductid,cartsession,cartquantity,cartuserid,cartstatus) VALUES ('$cartproductid','$cartsession','$cartquantity','$cartuserid','$cartstatus')";
            $result = $this->db->insert($query);
            if ($result) {
                $arlet = "<div class='alert alert-success' role='alert'>Add Successfully</div>";
                return $arlet;
            } else {
                $arlet = "<div class='alert alert-danger' role='alert'>Add Successfully</div>";
                return $arlet;
            }
        }
    }
    public function add_cart($data)
    {

        $cartproductid = mysqli_real_escape_string($this->db->link, $data['cart']);
        $cartquantity = mysqli_real_escape_string($this->db->link, $data['cartquantity']);
        $cartuserid = mysqli_real_escape_string($this->db->link, $_SESSION['user_id']);

        if ($cartproductid == '' || $cartquantity == '' || $cartuserid == '') {

            $arlet = "<div class='alert alert-danger' role='alert'>Error</div>";
            return $arlet;
        } else {
            $query = "SELECT * FROM table_cart WHERE cartproductid = '$cartproductid' AND cartuserid = '$cartuserid'  ";
            $result = $this->db->select($query);

            if ($result) {
                $arlet = "<div class='alert alert-danger' role='alert'>Error</div>";
                return $arlet;
            } else {

                $query = "INSERT INTO table_cart(cartproductid,cartquantity,cartuserid) VALUES ('$cartproductid','$cartquantity','$cartuserid')";
                $result = $this->db->insert($query);
                if ($result) {
                    $arlet = "<div class='alert alert-success' role='alert'>Add Successfully</div>";
                    return $arlet;
                } else {
                    $arlet = "<div class='alert alert-danger' role='alert'>Add Successfully</div>";
                    return $arlet;
                }
            }
        }
    }
    public function show_cart()
    {
        $query = "SELECT c.*, p.*, u.*, cat.*
        FROM table_cart c
        INNER JOIN table_product p ON c.cartproductid = p.productid
        INNER JOIN table_user u ON c.cartuserid = u.userid
        INNER JOIN table_category cat ON p.productcat = cat.categoryid 
        ORDER BY c.cartid DESC;";
        $result = $this->db->select($query);

        return $result;
    }

    public function update_cart($data, $id)
    {
        $cartproductid = mysqli_real_escape_string($this->db->link, $data['cartproductid']);
        $cartsession = mysqli_real_escape_string($this->db->link, $data['cartsession']);
        $cartquantity = mysqli_real_escape_string($this->db->link, $data['cartquantity']);
        $cartuserid = mysqli_real_escape_string($this->db->link, $data['cartuserid']);
        $id = mysqli_real_escape_string($this->db->link, $id);

        if ($cartproductid == '' || $cartsession == '' || $cartquantity == '' || $cartuserid == '') {
            $arlet = "<div class='alert alert-danger' role='alert'>Category name empty</div>";
            return $arlet;
        } else {
            $query = "UPDATE table_cart SET cartproductid = '$cartproductid', cartsession = '$cartsession',cartquantity = '$cartquantity', cartuserid = '$cartuserid' WHERE cartid = '$id'";
            $result = $this->db->update($query);
            if ($result) {
                $arlet = "<div class='alert alert-success' role='alert'>Update Category Successfully</div>";
                return $arlet;
            } else {
                $arlet = "<div class='alert alert-danger' role='alert'>Error</div>";

                return $arlet;
            }
        }
    }

    public function delete_cart($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "DELETE FROM table_cart WHERE cartproductid = '$id'";
        $result = $this->db->delete($query);


        if ($result) {
            $arlet = "<div class='alert alert-success' role='alert'>Delete Successfully</div>";
            return $arlet;
        } else {
            $arlet = "<div class='alert alert-danger' role='alert'>Delete Successfully</div>";

            return $arlet;
        }
    }
    public function getcartbyid($id)
    {
        $query = "SELECT * FROM table_cart WHERE cartid = '$id'";
        $result = $this->db->select($query);

        return $result;
    }
    public function show_cart_user($id)
    {
        $query = "SELECT c.*, p.*, u.*, cat.*FROM table_cart c
        INNER JOIN table_product p ON c.cartproductid = p.productId
        INNER JOIN table_user u ON c.cartuserid = u.userid
        INNER JOIN table_category cat ON p.catId = cat.catId 
        WHERE c.cartuserid = '$id'
        ORDER BY c.cartid DESC;";
        $result = $this->db->select($query);

        return $result;
    }
}
