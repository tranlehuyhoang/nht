<?php
include_once __DIR__ . '/../lib/database.php';
include_once __DIR__ . '/../helpers/format.php';
?>
<?php
class adminlogin
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function login_admin($adminUser, $adminPass)
    {


        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
        $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);
        echo $adminUser;
        echo $adminPass;

        if ($adminUser == '' || $adminPass == '') {
            $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Input Username || Password!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
        </div>';
            return $alert;
        } else {
            $query = "SELECT * FROM table_admin WHERE adminEmail = '$adminUser' and adminPass = '$adminPass' LIMIT 1";
            $result = $this->db->select($query);

            if ($result) {
                $value = $result->fetch_assoc();
                $_SESSION['adminId'] = $value['adminId'];
                $_SESSION['adminEmail'] = $value['adminEmail'];
                $_SESSION['adminName'] = $value['adminName'];
                header('Location:index.php');
            } else {
                $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Username || Password Wrong!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
            </div>';
                return $alert;
            }
        }
    }
    public function admin_check()
    {
    }
    public function admin_destroy()
    {
        unset($_SESSION['adminEmail']);
        unset($_SESSION['adminId']);
        unset($_SESSION['adminName']);
    }
}


?>