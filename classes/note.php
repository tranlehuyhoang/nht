<?php
include_once __DIR__ . '/../lib/database.php';
?>

<?php
class note
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function insert_note($noteName, $noteContent, $noteDateUp)
    {


        $noteName = mysqli_real_escape_string($this->db->link, $noteName);
        $noteContent = mysqli_real_escape_string($this->db->link, $noteContent);
        $noteDateUp = mysqli_real_escape_string($this->db->link, $noteDateUp);

        if ($noteName == '' || $noteContent == '' || $noteDateUp == '') {
            $alert = '<br><div class="alert alert-fill-danger" role="alert">
            <strong>Input Note !</strong>
        </div>';
            return $alert;
        } else {
            $query = "INSERT INTO table_note (noteName, noteContent, noteDateUp) 
          VALUES ('$noteName', '$noteContent', '$noteDateUp')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = '<br><div class="alert alert-fill-success" role="alert">
            <strong>Success !</strong>
        </div>';
                return $alert;
            } else {
                $alert = '<br><div class="alert alert-fill-danger" role="alert">
            <strong>Error !</strong>
        </div>';
                return $alert;
            }
        }
    }

    public function update_note($noteName, $noteContent, $noteDateUp, $id)
    {


        $noteName = mysqli_real_escape_string($this->db->link, $noteName);
        $noteContent = mysqli_real_escape_string($this->db->link, $noteContent);
        $noteDateUp = mysqli_real_escape_string($this->db->link, $noteDateUp);
        $id = mysqli_real_escape_string($this->db->link, $id);

        if ($noteName == '' || $noteContent == '' || $noteDateUp == '') {
            $alert = '<br><div class="alert alert-fill-danger" role="alert">
            <strong>Input Note !</strong>
        </div>';
            return $alert;
        } else {
            $query = "UPDATE table_note SET noteName = '$noteName', noteContent = '$noteContent', noteDateUp = '$noteDateUp' WHERE noteId = '$id'";

            $result = $this->db->update($query);
            if ($result) {
                $alert = '<br><div class="alert alert-fill-success" role="alert">
            <strong>Success !</strong>
        </div>';
                return $alert;
            } else {
                $alert = '<br><div class="alert alert-fill-danger" role="alert">
            <strong>Error !</strong>
        </div>';
                return $alert;
            }
        }
    }

    public function show_note()
    {
        $query = "SELECT * FROM table_note order by noteId desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function del_note($id)
    {
        $query = "DELETE FROM table_note where noteId = '$id'";
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

    public function getnotebyId($id)
    {
        $query = "SELECT * FROM table_note where noteId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
}


?>