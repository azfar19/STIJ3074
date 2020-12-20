<html>
<body>
<h3> BOOK DEPOSITORY </h3>
<div class="body">

<?php
    error_reporting(0);
    include "dbconnect.php";
    

    if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $publisher = $_POST['publisher'];
    $isbn = $_POST['isbn'];

    //

    if ($id==''||$title==''||$author==''||$price==''||$description==''||$publisher==''||$isbn=='')
	{
	?><script language="javascript">alert('Some data not filled')</script><?php
	?><script language="javascript">document.location.href="index.php"</script><?php
	}

	else
	{
	
            $sql = "insert into bookdepo (id, title, author, price, description, publisher,isbn) VALUE 
                                        ('$id', '$title', '$author', '$price', '$description', '$publisher', '$isbn')";
			$query = mysqli_query($db, $sql);
			
			if( $query ) {
			
			echo '<script language="javascript"> alert ("Thank You, You Data Succefully Save");
              window.location="bookdepo.php";
              </script>';
              exit();
			} else {
			
			echo '<script language="javascript">alert ("Sorry, Data is failed to Save");
              window.location="bookdepo.php";
              </script>';
              exit();
			}	
	}	
}

include "dbconnect.php";
if(isset($_GET['mode'])=='delete'){
$id=$_GET['id'];

$sql = "delete from bookdepo where id='$id'";
$query = mysqli_query($db, $sql);
}

?>

<form action="bookdepo.php" method="post">
    <table>
        <tr> 
          <td><strong>ID </strong></td>
          <td>:</td>
          <td><input type="text" name="id"/></td>
        </tr>
        <tr> 
          <td><b>Title </b></td>           
          <td>:</td>
          <td><input type="text" name="title"/></td>
        </tr>
		<tr> 
          <td><b>Author </b></td>           
          <td>:</td>
          <td><input type="text" name="author"/></td>
        </tr>
		<tr> 
        <td><b>Price </b></td>           
          <td>:</td>
          <td><input type="text" name="price"/></td>
        </tr>
		<tr> 
          <td><b>Description </b></td>           
          <td>:</td>
          <td><input type="text" name="description"/></td>
        </tr>
        <tr> 
        <td><b>Publisher </b></td>           
          <td>:</td>
          <td><input type="text" name="publisher"/></td>
        </tr>
		<tr> 
          <td><b>ISBN </b></td>           
          <td>:</td>
          <td><input type="text" name="isbn"/></td>
        </tr>
        <tr> 
        <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" class="button" value="Submit" name="submit"> 
            <input type="reset" class="button" value="Reset"> </td>
        </tr>
      </table>
    </form>

    <table class="data" width="100%" border="1">
    <tr bgcolor="FFFFCC" align="center"> 
        <td width="3%">No</td>
        <td width="3%">ID</td>
        <td width="10%">Title</td>
        <td width="10%">Author </td> 		
        <td width="5%">Price </td>    		
        <td width="15%">Description</td> 		    
	    <td width="10%">Publisher </td>		
		<td width="10%">ISBN</td>		
        <td width="6%">Navigation</td>
      </tr>
<?php
$baris= 1;
$no=0;
$i=1;
include "dbconnect.php";

	$sql = "SELECT * FROM bookdepo";
	$query = mysqli_query($db, $sql);
	while($tampil = mysqli_fetch_array($query)){

    $warna= ($baris% 2 == 1) ? "#FFF" : "#EEE";
    echo "<tr bgcolor=\"".$warna."\">";
    echo "<td><font size=2>$baris.</font></td>";
    echo "<td><font size=2>$tampil[id]</font></td>";   
	echo "<td><font size=2>$tampil[title]</font></td>";
	echo "<td align=center><font size=2>$tampil[author]</font></td>";
	echo "<td align=center><font size=2>$tampil[price]</font></td>";	
	echo "<td align=center><font size=2>$tampil[description]</font></td>";	
	echo "<td align=center><font size=2>$tampil[publisher]</font></td>";	
	echo "<td align=center><font size=2>$tampil[isbn]</font></td>";		

	?>
	<td align="center"> 
	<a href="bookdepo.php?mode=delete&id=<?php echo "$tampil[id]";?>" title="Delete" onClick="return confirm('Do you confirm?')"><font size=2>Delete</font></a>&nbsp;&nbsp;&nbsp; 
    <a href="editbookdepo.php?id=<?php echo "$tampil[id]";?>" title="Update"><font size=2>Update</font></a>&nbsp;&nbsp;&nbsp; 
	
	</td>
	<?php
    echo "</tr>";
    $baris++;
}
;
?>
</body>
</html>