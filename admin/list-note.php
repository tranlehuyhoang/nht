<?php

include_once __DIR__ . '/../inc/_header.admin.inc.php';
?>

<div class="page-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">List Note</h6>
                    <div class="accordion" id="FaqAccordion">
                        <?php
                                    $show_note = $note->show_note();
                                    $i = 0;
                                    if ($show_note) {
                                        while ($result = $show_note->fetch_assoc()) {
                                            $i++;
                                            ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne<?php echo $i; ?>" aria-expanded="false">
                                    <?php echo $result['noteName'] ?>
                                    <br>
                                    <?php echo $result['noteDateUp'] ?>
                                </button>
                            </h2>
                            <div id="collapseOne<?php echo $i; ?>" class="accordion-collapse collapse"
                                aria-labelledby="headingOne" data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <?php echo $result['noteContent'] ?>
                                </div>
                                <div class="accordion-body">
                                    <a type="button" class="btn btn-inverse-info"
                                        href="edit-note.php?noteid=<?php echo $result['noteId'] ?>">Edit</a>
                                    <a type="button" class="btn btn-inverse-danger"
                                        href="?delid=<?php echo $result['noteId'] ?>"
                                        onclick="return confirm('Delete?')">Delete</a>
                                </div>
                            </div>
                        </div>
                        <?php }
                                    } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

include_once __DIR__ . '/../inc/_footer.admin.inc.php';
?>