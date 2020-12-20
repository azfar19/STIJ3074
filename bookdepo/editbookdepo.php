<html>
<?php
    include("dbconnect.php");
    error_reporting(0);

    if(isset($_POST['submit'])){

    //
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $publisher = $_POST['publisher'];
    $isbn = $_POST['isbn'];


    //update
 
    $sql= "update bookdepo SET id ='$id',    
    title='$title',
    author='$author',
    price='$price',
    description='$description',
    publisher='$publisher',
    isbn='$isbn',
    where id='$id'";
       
    $query = mysqli_query($db, $sql);
if($query) 
{

header('Location: bookdepo.php');
} else 
{

die("Not Succesfully...");
    }

}

?>
<body>
<h3>Update Book Depository </h3>
	
      <form action="editbookdepo.php" method="post">  	  
	  <?php
		 error_reporting(0);
		 include "dbconnect.php";
			
		$id=$_GET['id'];
		$sql = "SELECT * FROM bookdepo WHERE id='$id'";
		$query = mysqli_query($db, $sql);
		$tampil = mysqli_fetch_assoc($query);		
	  ?>	 

      	
      <table>
        <tr> 
          <td><b>Title </b></td>           
          <td>:</td>
          <td><input type="text" name="title" value="<?php echo $tampil['title'] ?>" /></td>
        </tr>
		<tr> 
          <td><b>Author </b></td>           
          <td>:</td>
          <td><input type="text" name="author" value="<?php echo $tampil['author'] ?>" /></td>
        </tr>
		<tr> 
        <td><b> Price </b></td>
          <td>:</td>
          <td><input type="text" name="price" value="<?php echo $tampil['price'] ?>"/></td>
        </tr>
		<tr> 
          <td><b> Description </b></td>
          <td>:</td>
          <td><input type="text" name="description" value="<?php echo $tampil['description'] ?>"/></td>
        </tr>

        <tr> 
        <td><b> Publisher </b></td>
          <td>:</td>
          <td><input type="text" name="publisher" value="<?php echo $tampil['publisher'] ?>"/></td>
        </tr>
		<tr> 
          <td><b> ISBN </b></td>
          <td>:</td>
          <td><input type="text" name="isbn" value="<?php echo $tampil['isbn'] ?>"/></td>
        </tr>

        <tr> 
        <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" class="button" value="Submit" name="submit" onClick="return confirm('Do You want continue to save data?')"> 
              <a href="bookdepo.php"><input type="button" class="button" value="Cancel"> </a></td>
        </tr>
      </table>
    </form>
	

</body>
</html>