

<?php include "includes/db.php";?>  
<?php session_start();?>  



<h1><pre>VSW: Very <del>Secure</del>     
          Vulnerable Website</pre></h1>

<?php 

if (!isset($_SESSION['logged_in'])){
echo "<h2><a href='login.php'>Login</a></h2>";
echo "<h2><a href='signup.php'>Signup</a></h2>";
}else{
    if(isset($_SESSION['username'])){
        echo "<h2>Hello, " . $_SESSION['username'] . "</h2>";
        echo "<h2> Your role: " . $_SESSION['role'] . "</h2>";
    }
    
    if ($_SESSION['role'] === 'admin'){
        echo "Your are the Administrator :)";
    }
    
    if ($_SESSION['role'] === 'user'){
        echo "Just another user :(";
    }
    echo "<h2><a href='logout.php'>Logout</a></h2>";
}


?>



</body>
</html>