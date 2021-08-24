<html>

<head><title>Sign In Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/css/bootstrap.css">
    <link rel="stylesheet" href="signin_css.css">
</head>
<body>
     
<!-- when you signup yoou have to comment signin php code and when you signin you to comment signup php code #in joined case -->

<?php
// require_once ("opendata.php");
// if(isset($_POST["btn"])){
//     $username=$_POST['username'];
//     $email=$_POST['email'];
//     $password=$_POST['password'];  
//     $query="insert into form_info(txtusername,txtemail,txtpassword) VALUE('$username','$email','$password')";
//     $result=$conn->query($query);
//     if ($result)
//     {
//       echo "sucessful";
//     }
    
// }

?> 


<?php
require_once("opendata.php");
if(isset($_POST["btn"])){
  $email=$_POST['email'];
  $password=$_POST['password'];
  $query = "select * from form_info where txtemail = :email and txtpassword = :password";
  $stmt=$conn->prepare($query);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':password', $password);
  try{
    $result=$stmt->execute();
    // row by row check if any row affected 
    $count=$stmt->rowCount();    
    if($count>0){
      while($row=$stmt->fetch()){
        session_start();
        $_SESSION['email']=$row[3];
        // echo "<script language = \"javascript\" type = \"text/javascript\"> window.location.href=\"index.php\"; </script>";
        // OR Use Redirect to other page
        header("location:tndex.php");
      }
    }
    else{
      echo "<script> alert('Wrong Username and password'); </script>";
    }
  }
  catch(Exception $e){
    
    $e->getMessage();


  }
}
?>



 <!-- sign in start here -->
<div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                <div class="leftside">
                    <div class="card-body">
                        <h5 class="card-title">Sign in </h5>
                <form method="POST"> 

                    <div class="form-group">
                    <i class=" fa fa-envelope"></i>   
                   <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="    Enter email" required>
                      <div class="invalid-feedback">please fill out this form</div>
                    </div>
                    <div class="form-group">
                      <i class="fa fa-lock"></i>
                      <input type="password" class="form-control " id="exampleInputPassword1" name="password" placeholder="   Password" required>
                      <div class="invalid-feedback">please fill out this form</div>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                      <label class="form-check-label" for="exampleCheck1">I accept all conditions </label>
                      <div class="invalid-feedback">Must check the box</div>
                    </div>
                    <button type="submit" class="btn btn-primary  bt" name="btn" id="button">Sign in</button>
                </form>  
                    </div>
               </div>
           </div>
           </div>
           
<!-- sign up here start -->

           <div class="col-md-6">
            <div class="card">
            <div class="rightside">
                <div class="card-body">
                    <h5 class="card-title">Create new account</h5>
            <form id="myform" method="POST">  
                
                <div class="form-group">
                    <i class=" fa fa-user"></i>    
                    <input type="text" class="form-control" id="exampleInputName1" name="username"  placeholder="   Enter name here..." required>
                    <div class="invalid-feedback">please fill out this form</div>
                  </div>

                <div class="form-group">
                  <i class=" fa fa-envelope"></i>
                  <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="    Enter email" required>
                
                  <div class="invalid-feedback">please fill out this form</div>
                </div>
                <div class="form-group">
                  <i class="fa fa-lock"></i>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="   Password" required>
                  <div class="invalid-feedback">please fill out this form</div>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                  <label class="form-check-label" for="exampleCheck1">I accept all conditions </label>
                  <div class="invalid-feedback">Must check the box</div>
                </div>
                <button type="submit" class="btn btn-primary bt" name="btn" id="btn">Sign up</button>
            </form>  
                </div>
           </div>
       </div>
       

    </div>

   </div>
   
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT
7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0
CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd
0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>