<?php
include_once __DIR__ . '/../lib/database.php';

?>
<?php
class brand
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        // $this->fm = new Format();
    }
    public function insert_brand($brandName)
    {
        $brandName = $this->fm->validation($brandName);

        $brandName = mysqli_real_escape_string($this->db->link, $brandName);

        if ($brandName == '') {
            $alert = "Input Category";
            return $alert;
        } else {
            $query = "INSERT INTO table_brand(brandName) VALUES('$brandName')";
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

    public function update_brand($brandName, $id)
    {
        // $brandName = $this->fm->validation($brandName);

        $brandName = mysqli_real_escape_string($this->db->link, $brandName);
        $id = mysqli_real_escape_string($this->db->link, $id);

        if ($brandName == '') {
            $alert = "Input Category";
            return $alert;
        } else {
            $query = "UPDATE table_brand SET brandName = '$brandName' WHERE brandId = '$id'";
            $result = $this->db->update($query);
            if ($result) {
                $alert = "<p>Done.</p>";
                return $alert;
            } else {
                $alert = "<p>Error.</p>";
                return $alert;
            }
        }
    }

    public function show_brand()
    {
        $query = "SELECT * FROM table_brand order by brandId desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function del_brand($id)
    {
        $query = "DELETE FROM table_brand where brandId = '$id'";
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

    public function getbrandbyId($id)
    {
        $query = "SELECT * FROM table_brand where brandId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
}


?>