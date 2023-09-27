<div id="home" style="min-height:100vh;width: 100%;background-blend-mode: overlay;background-image: url(https://www.elegantthemes.com/layouts/wp-content/uploads/2017/12/coding-background-texture.jpg),linear-gradient(180deg,#474ab6 0%,#9271f6 100%)!important;">
<?php
include('./inc/header.php');
include('./inc/nav.php');
include('./core/functions.php');
$x = 0;
?>

<div class="container mt-5 bg-white p-5">
<?php if (isset($_SESSION['success'])):?>
<div class="alert alert-success">
  <?php
  foreach($_SESSION['success'] as $success){
    echo $success;
  }
  unset($_SESSION['success']);
  ?>
</div>
<?php endif;?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">username</th>
      <th scope="col">email</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  
<?php
    $allData = json_decode(file_get_contents('./data.json'),true);
    if (!empty($allData)):
    foreach($allData as $key=>$value):
//     foreach($index as $key=>$value){
//     if ($key == 'username'&& $_POST['username']==$value){
//         $errors['username']="username is already exsits";
//     }
// }
// }
?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $key + 1 ?></th>
      <td><?php echo $value['username'] ?></td>
      <td><?php echo $value['email'] ?></td>
      <td>
        <a href="update.php?id=<?php echo $key?>" class="btn btn-info">Edit</a>
        <a href="delete.php?id=<?php echo $key?>" class="btn btn-danger">Delete</a>
        </td>
    </tr>
  </tbody>
  <?php endforeach;endif; ?>
</table>
</div>
<?php
include('./inc/footer.php');