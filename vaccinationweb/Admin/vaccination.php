<?php
include('header.php');
include('../db.php');
$sql1 = "SELECT v.name,v.id,v.available,h.hname FROM vaccination v INNER JOIN hospital h WHERE v.hfkid=h.hid";
$res1 = mysqli_query($conn, $sql1);
// SELECT c.cname,c.cnic,h.hname,v.name FROM vaccination_status d INNER JOIN childs c ON d.cfkid=c.id INNER JOIN hospital h ON d.chfkid=h.hid INNER JOIN vaccination v ON d.vfkid=v.id"
?>
<a href="vaccinationadd.php">Add</a>
<br>
<br>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Vaccine List</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Vaccine Name</th>
            <th>Hospatal</th>
            <th>Available</th>
            <th>Update</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (mysqli_num_rows($res1) > 0) {
            while ($row = mysqli_fetch_assoc($res1)) {
              ?>
              <tr>
                <td>
                  <?php echo $row['name']; ?>
                </td>
                <td>
                  <?php echo $row['hname']; ?>
                </td>
                <?php
                if ($row['available']) {
                  $a = 'Yes';
                } else {
                  $a = 'No';
                }
                ?>
                <td>
                  <?php echo $a; ?>
                </td>
                <td><a href="update/vaccination.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Update</a></td>
                <td><a href="delete/vaccination.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Delete</a></td>
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