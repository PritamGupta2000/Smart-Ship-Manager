
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Authority</title>
  <style>
body{
  background-image: url(abcd.jpg);
  background-size: cover;
}
.class1{
  height: 300px;
  width: 200px;
  /* background-color: #A0D94A; */
  margin-left: 350px;
  margin-top: 100px;
  padding: 50px;
  border-radius: 35px;
  background-image: url(portproject2.jpg);
 
}
.btn {
  height: 35px;
  width: 140px;
  background-color: #03A64A;
  border: none;
  color:wheat;
}
.btn:hover{
  color: black;
  background-color: #F2B705;
  cursor: pointer;
}
  </style>
</head>
<body>
  
</body>
</html>
<div class="class1">

                <div class="form">

                    <form action ="authority.php" method="post">

                         <h2  style="color:white;">Login Here</h2> <hr>
                    
                          <input type="text" name="EmployeeId" placeholder="Enter id Here" style="height: 26px;width:175px;border:none;" required><br><br>

                          <input type="Password" name="Password" placeholder="Enter Password Here" style="height: 26px;width:175px;border:none;" required> <br> <br>
                          <input type="submit" name="submit" value="submit" class="btn ">


                    </form>

                    <?php
                       
                       $conn = new mysqli('localhost', 'root', '', 'learn');
                       if (!$conn) {
                           echo 'not connect';
                       }
                      
                       if (isset($_POST['EmployeeId']) && isset($_POST['Password'])   ) {
                        $email = $_POST['EmployeeId'];
                        $password = $_POST['Password'];



                        $sql = "SELECT* FROM authoritylogin WHERE  EmployeeId = '$email' AND Password = '$password' " ;
                
                        $query = $conn->query($sql);
                
                
                    
                        if ($query->num_rows> 0) {
                           
                              header("location:authoritydashboard.php");
                       
                        }else{
                           
                        
                        }
                       }
                
                
                ?>



     
                </div>
</div>
                
  
</body>
</html>