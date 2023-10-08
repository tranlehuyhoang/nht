<?php
include_once __DIR__ . '/../lib/database.php';
?>
<?php
class category
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function insert_category($catName)
    {


        $catName = mysqli_real_escape_string($this->db->link, $catName);

        if (empty($catName)) {
            $alert = "Input Category";
            return $alert;
        } else {
            $query = "INSERT INTO table_category(catName) VALUES('$catName')";
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

    public function update_category($catName, $id)
    {
        // $catName = $this->fm->validation($catName);

        $catName = mysqli_real_escape_string($this->db->link, $catName);
        $id = mysqli_real_escape_string($this->db->link, $id);

        if (empty($catName)) {
            $alert = "Input Category";
            return $alert;
        } else {
            $query = "UPDATE table_category SET catName = '$catName' WHERE catId = '$id'";
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

    public function show_category()
    {
        $query = "SELECT * FROM table_category order by catId desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function del_category($id)
    {
        $query = "DELETE FROM table_category where catId = '$id'";
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

    public function getcatbyId($id)
    {
        $query = "SELECT * FROM table_category where catId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }


    public function admin_check()
    {
    }
    public function admin_destroy()
    {
    }
}


?>