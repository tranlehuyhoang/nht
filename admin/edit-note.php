<?php

include_once __DIR__ . '/../inc/_header.admin.inc.php';
?>

<?php

if (!isset($_GET['noteid']) || $_GET['noteid'] == NULL) {
    echo "<script>window.location = 'list-note.php'</script>";
} else {
    $id = $_GET['noteid'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $noteName = $_POST['noteName'];
    $noteContent = $_POST['noteContent'];
    $noteDateUp = $_POST['noteDateUp'];

    $updateNote = $note->update_note($noteName, $noteContent, $noteDateUp, $id);
}
?>


<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Note</h6>
                    <?php
                    $get_note_name = $note->getnotebyId($id);
                    if ($get_note_name) {
                        while ($result = $get_note_name->fetch_assoc()) {
                    ?>
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <input name="noteName" type="text" class="form-control" placeholder="Title || Name Note" value="<?php echo $result['noteName'] ?>">
                                </div>
                                <div class=" mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Content Note</label>
                                    <input class="form-control" id="exampleFormControlTextarea1" rows="5" name="noteContent" placeholder="Content Note" value="<?php echo $result['noteContent'] ?>">
                                </div>
                                <div class="mb-3">
                                    <div class="form-group row">
                                        <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-right">Time</label>
                                        <div class="col-sm-12">
                                            <input class="form-control" type="datetime-local" id="example-datetime-local-input" name="noteDateUp" value="<?php echo $result['noteDateUp'] ?>">
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-inverse-primary" type="submit" name="btnSubmit">Edit</button>
                            </form>
                    <?php }
                    } ?>
                    <?php
                    if (isset($insertNote)) {
                        echo $insertNote;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

include_once __DIR__ . '/../inc/_footer.admin.inc.php';
?>