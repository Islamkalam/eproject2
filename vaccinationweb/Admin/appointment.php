<?php
include('../db.php');
include('header.php');
$sql1="SELECT c.cname,c.cnic,d.vsid,d.statuskey,h.hname,v.name FROM vaccination_status d INNER JOIN childs c ON d.cfkid=c.id INNER JOIN hospital h ON d.chfkid=h.hid INNER JOIN vaccination v ON d.vfkid=v.id";
$res1=mysqli_query($conn,$sql1);
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Parent Requests</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>CNIC</th>
                        <th>Hospital</th>
                        <th>Vaccine</th>
                        <th>Accept</th>
                    </tr>
                </thead>
                <tbody>
                <?php
          if (mysqli_num_rows($res1) > 0) {
            while ($row = mysqli_fetch_assoc($res1)) {
                if($row['statuskey']==0){
              ?>
              <tr>
                <td><?php echo $row['cname']; ?></td>
                <td><?php echo $row['cnic']; ?></td>
                <td><?php echo $row['hname']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><a href="accept.php?id=<?php echo $row['vsid']; ?>" class="btn btn-primary">Accept</a></td>
              </tr>
              <?php
            }}
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