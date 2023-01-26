
<?php
include('header.php');
$conn=mysqli_connect('localhost','root','','vaccination1');
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $address=$_POST['address'];
  $passsword=password_hash($_POST['password'],PASSWORD_DEFAULT);
  $sql="INSERT INTO hospital VALUES (null,'$name','$passsword','$address')";
  $res=mysqli_query($conn,$sql) or die('REGISTRATION FAILED');
}
$sql1="SELECT * from hospital";
$res1=mysqli_query($conn,$sql1);
?>
    
 

<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Add Hospital</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-medkit prefix grey-text"></i>
          <input type="text" id="defaultForm-email" name="name" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Hospital Name</label>
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-address-card prefix grey-text"></i>
          <input type="text" id="defaultForm-email" name="address" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Address</label>
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="defaultForm-pass" name="password" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Password</label>
        </div>
        
        
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input type="submit" name="submit" class="btn btn-primary" value="Add">
      </div>
      </form>
    </div>
  </div>
</div>

<div class="text-center">
  <a href="" class="btn btn-primary btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">Add Hospital</a>
</div>
<br>
<div class="card shadow mb-4">
     <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Hospital List</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
      <tr>
          <th>Hospital Name</th>
          <th>Address</th>
          <th>Update</th>
          <th>Delete</th>
      </tr>
  </thead>
  <tbody>
  <?php
  if(mysqli_num_rows($res1)>0){
    while($row=mysqli_fetch_assoc($res1)){
  ?>
      <tr>
          <td><?php echo $row['hname'];?></td>
          <td><?php echo $row['haddress'];?></td>
          <td><a href="update/hospital.php?id=<?php echo $row['hid'];?>"class="btn btn-primary">Update</a></td>
          <td><a href="delete/hospital.php?id=<?php echo $row['hid'];?>"class="btn btn-primary">Delete</a></td>
        </tr>
<?php
  }}
?>
    </tbody>
</table>

        </div>
    </div>
</div>
<?php
    
    include('footer.php');
    

?>
