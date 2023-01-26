<?php
include('../db.php');
include('header.php');
$sql1 = "SELECT * from childs";
$res1 = mysqli_query($conn, $sql1);
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Child List</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Contact</th>
                        <th>Gender</th>
                        <th>CNIC</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($res1) > 0) {
                        while ($row = mysqli_fetch_assoc($res1)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $row['cname']; ?>
                                </td>
                                <td>
                                    <?php echo $row['age']; ?>
                                </td>
                                <td>
                                    <?php echo $row['contact']; ?>
                                </td>
                                <td>
                                    <?php echo $row['gender']; ?>
                                </td>
                                <td>
                                    <?php echo $row['cnic']; ?>
                                </td>
                                <td>
                                    <?php echo $row['address']; ?>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<?php

include('footer.php')

    ?>