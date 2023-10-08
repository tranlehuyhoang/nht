 <?php

    include_once __DIR__ . '/../inc/_header.admin.inc.php';
    ?>
 <div class="page-content">
     <div class="row">
         <div class="col-md-12 grid-margin stretch-card">
             <div class="card">
                 <div class="card-body">
                     <h6 class="card-title">Data Table User</h6>
                     <div class="table-responsive">
                         <table id="dataTableExample" class="table">
                             <thead>
                                 <tr>
                                     <th>STT</th>
                                     <th>Name</th>
                                     <th>Full Name</th>
                                     <th>Email</th>
                                     <th>Password</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    $show_user = $user->show_user();
                                    if ($show_user) {
                                        $i = 0;
                                        while ($result = $show_user->fetch_assoc()) {
                                            $i++;
                                    ?>
                                         <tr>
                                             <td>
                                                 <?php echo $i; ?>
                                             </td>
                                             <td>
                                                 <?php echo $result['userName'] ?>
                                             </td>
                                             <td>
                                                 <?php echo $result['userFullName'] ?>
                                             </td>
                                             <td>
                                                 <?php echo $result['userEmail'] ?>
                                             </td>
                                             <td>
                                                 <?php echo $result['userPass'] ?>
                                             </td>
                                             <td>
                                                 <!-- <a type="button" class="btn btn-inverse-info"
                                                                href="edit-categories.php?catid=<?php echo $result['catId'] ?>">Edit</a> -->
                                                 <a type="button" class="btn btn-inverse-info" href="#">Edit</a>
                                                 <a type="button" class="btn btn-inverse-danger" href="?delid=<?php echo $result['userId'] ?>" onclick="return confirm('Delete?')">Delete</a>
                                             </td>
                                         </tr>
                                 <?php }
                                    } ?>
                             </tbody>
                         </table>
                         <?php
                            if (isset($delluser)) {
                                echo $delluser;
                            }
                            ?>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <?php

    include_once __DIR__ . '/../inc/_footer.admin.inc.php';
    ?>