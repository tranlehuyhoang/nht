<?php
include_once __DIR__ . '/../lib/database.php';
include_once __DIR__ . '/../helpers/format.php';
?>
<?php
class user
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function insert_users($data)
    {
        $userName = mysqli_real_escape_string($this->db->link, $data['userName']);
        $userFullName = mysqli_real_escape_string($this->db->link, $data['userFullName']);
        $userEmail = mysqli_real_escape_string($this->db->link, $data['userEmail']);
        $userPass = mysqli_real_escape_string($this->db->link, $data['userPass']);

        if ($userName == "" || $userFullName == "" || $userEmail == "" || $userPass == "") {
            $alert = "Lỗi";
            return $alert;
        } else {
            $check_email = "SELECT * FROM table_user WHERE userEmail = '$userEmail' LIMIT 1";
            $result_check = $this->db->select($check_email);
            if ($result_check) {
                $alert = "Email đã tồn tại!";
                return $alert;
            } else {
                $query = "INSERT INTO table_user(userName, userFullName, userEmail, userPass) VALUES('$userName', '$userFullName', '$userEmail', '$userPass')";
                $result = $this->db->insert($query);
                if ($result) {
                    $alert = "Thành công";
                    return $alert;
                } else {
                    $alert = "Lỗi";
                    return $alert;
                }
            }
        }
    }

    public function insert_user($userName, $userFullName, $userEmail, $userPass)
    {
        $userName = $this->fm->validation($userName);
        $userFullName = $this->fm->validation($userFullName);
        $userEmail = $this->fm->validation($userEmail);
        $userPass = $this->fm->validation($userPass);

        $userName = mysqli_real_escape_string($this->db->link, $userName);
        $userFullName = mysqli_real_escape_string($this->db->link, $userFullName);
        $userEmail = mysqli_real_escape_string($this->db->link, $userEmail);
        $userPass = mysqli_real_escape_string($this->db->link, $userPass);

        if (empty($userName) || empty($userFullName) || empty($userEmail) || empty($userPass)) {
            $alert = "Input Category";
            return $alert;
        } else {
            $query = "INSERT INTO table_user(userName, userFullName, userEmail, userPass) VALUES('$userName', '$userFullName', '$userEmail', '$userPass')";
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

    public function login_users($data)
    {
        $userEmail = mysqli_real_escape_string($this->db->link, $data['userEmail']);
        $userPass = mysqli_real_escape_string($this->db->link, $data['userPass']);

        if ($userEmail == "" || $userPass == "") {
            $alert = "Lỗi";
            return $alert;
        } else {
            $check_login = "SELECT * FROM table_user WHERE userEmail = '$userEmail' AND userPass = '$userPass'";
            $result_check = $this->db->select($check_login);
            if ($result_check) {
                $value = $result_check->fetch_assoc();
                print_r($value);
                // Session::set('user_login', true);
                // Session::set('user_id', $value['userId']);
                // Session::set('user_name', $value['userName']);
                header("Location: ../index.php");
            } else {
                $alert = "Lỗi";
                return $alert;
            }
        }
    }

    public function show_user()
    {
        $query = "SELECT * FROM table_user order by userId desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function del_user($id)
    {
        $query = "DELETE FROM table_user where userId = '$id'";
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

    public function getuserbyId($id)
    {
        $query = "SELECT * FROM table_user where userId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
}

?>