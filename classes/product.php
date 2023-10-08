<?php
include_once __DIR__ . '/../lib/database.php';
?>

<?php
class product
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function insert_product($data)
    {
        // echo $data['brandid'];
        // return $data['catid'];
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $brandid = mysqli_real_escape_string($this->db->link, $data['brandid']);
        $catid = mysqli_real_escape_string($this->db->link, $data['catid']);

        $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);

        // $permited = array('jpg', 'jpeg', 'png', 'gif', 'webp');
        // $file_name = $_FILES['image']['name'];
        // $file_size = $_FILES['image']['size'];
        // $file_temp = $_FILES['image']['tmp_name'];

        // $div = explode('.', $file_name);
        // $file_ext = strtolower(end($div));
        // $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        // $uploaded_image = "uploads/" . $unique_image;

        $productimg = addslashes(file_get_contents($_FILES['image']['tmp_name']));

        if ($productName == '' || $brandid == '' || $catid == '' || $product_desc == '' || $price == '' || $type == '') {
            $alert = "Input Full";
            return $alert;
        } else {
            // move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO table_product(productName,brandId,catId,product_desc,price,type,image) VALUES('$productName', '$brandid', '$catid', '$product_desc', '$price', '$type', '$productimg')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<p>Done.</p>";
                return $alert;
            } else {
                $alert = "<p>Error.</p>";
                return $alert;
            }
        }
    }

    public function update_product($data, $id)
    {
        // $productName = $this->fm->validation($productName);

        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $catId = mysqli_real_escape_string($this->db->link, $data['catid']);
        $brandId = mysqli_real_escape_string($this->db->link, $data['brandid']);
        $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $id = mysqli_real_escape_string($this->db->link, $id);

        if (isset($_FILES['image']['tmp_name']) && $_FILES['image']['tmp_name'] != '') {
            $productimg = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        }

        if (!isset($productimg)) {
            if ($productName == '' || $price == '' || $catId == '' || $product_desc == '') {
                $arlet = "<div class='alert alert-danger' role='alert'>Fields empty</div>";
                return $arlet;
            } else {
                $query = "UPDATE `table_product` SET `productName` = '$productName', `price` = '$price', `catId` = '$catId', `brandId` = '$brandId', `type` = '$type', `product_desc` = '$product_desc' WHERE `table_product`.`productId` = '$id'";
                $result = $this->db->insert($query);
                if ($result) {
                    // return $catId;
                    $arlet = "<div class='alert alert-success' role='alert'>Update Product Successfully</div>";
                    return $arlet;
                } else {
                    $arlet = "<div class='alert alert-danger' role='alert'>Error</div>";

                    return $arlet;
                }
            }
        } else {
            $img_info = getimagesize($_FILES['image']['tmp_name']);
            if ($img_info === FALSE) {
                $arlet = "<div class='alert alert-danger' role='alert'>Image is not valid</div>";
                return $arlet;
            } else {
                // Nếu tệp tin là ảnh, thực hiện lưu trữ và xử lý tiếp theo tại đây
                $productimg = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            }
            if ($productName == '' || $price == '' || $catId == '' || $product_desc == '') {
                $arlet = "<div class='alert alert-danger' role='alert'>Fields empty</div>";
                return $arlet;
            } else {
                $query = "UPDATE `table_product` SET `productName` = '$productName', `image` = '$productimg', `price` = '$price', `catId` = '$catId', `product_desc` = '$product_desc'  WHERE `table_product`.`productId` = '$id'";


                $result = $this->db->insert($query);
                if ($result) {
                    // return $catId;
                    $arlet = "<div class='alert alert-success' role='alert'>Update Product Successfully</div>";
                    return $arlet;
                } else {
                    $arlet = "<div class='alert alert-danger' role='alert'>Error</div>";

                    return $arlet;
                }
            }
        }
    }

    public function show_product()
    {
        $query = "SELECT table_product.*, table_category.catName, table_brand.brandName 
        FROM table_product INNER JOIN table_category ON table_product.catId = table_category.catId 
        INNER JOIN table_brand ON table_product.brandId = table_brand.brandId 
        order by table_product.productId desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function del_product($id)
    {
        $query = "DELETE FROM table_product where productId = '$id'";
        $result = $this->db->delete($query);
        return $result;
        if ($result) {
            $alert = "<p>Done.</p>";
            return $alert;
        } else {
            $alert = "<p>Error.</p>";
            return $alert;
        }
    }

    public function getproductbyId($id)
    {
        $query = "SELECT table_product.*, table_category.catName , table_brand.brandName 
        FROM table_product
        INNER JOIN table_category ON table_product.catId = table_category.catId
        INNER JOIN table_brand ON table_product.brandId = table_brand.brandId
        WHERE `table_product`.`productId` = '$id'
        ORDER BY table_product.productId DESC;";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_product_index()
    {
        $query = "SELECT table_product.*, table_category.catName 
        FROM table_product
        INNER JOIN table_category ON table_product.catId = table_category.catId
        ORDER BY table_product.productId DESC;";

        $result = $this->db->select($query);

        return $result;
    }
}




?>