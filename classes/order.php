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
    public function insert_order($user, $total)
    {
        $users = mysqli_real_escape_string($this->db->link, $user);
        $totals = mysqli_real_escape_string($this->db->link, $total);

        if ($users == '' || $totals == '') {
            $arlet = "<div class='alert alert-danger' role='alert'>Error</div>";
            return $arlet;
        } else {
            // Insert the new order into the table_order
            $query = "INSERT INTO table_order (user, total) VALUES ('$users', '$totals')";
            $result = $this->db->insert($query);


            $updateQuery = "UPDATE table_cart SET order_id = '1' WHERE cartuserid = '$users' AND order_id = 0";
            $updateResult = $this->db->update($updateQuery);
            echo "<script>window.location = './client/home.php'</script>";
        }
    }
    public function show_order_user()
    {
        $query = "SELECT c.*, u.* FROM table_order c
        INNER JOIN table_user u ON c.user = u.userid
        
        
        ORDER BY c.id DESC;";
        $result = $this->db->select($query);

        return $result;
    }
}
