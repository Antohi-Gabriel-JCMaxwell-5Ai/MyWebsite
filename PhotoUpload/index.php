<?php
//THIS IS INDEX.PHP PAGE
//connect to database.db name is images
        mysql_connect("localhost", "root", "") OR DIE (mysql_error());
        mysql_select_db ("photography") OR DIE ("Unable to select db".mysql_error());
//to retrive send the page to another page
if(isset($_POST['retrive']))
{
    header("location:search.php");

}

//to upload

if(isset($_POST['submit']))
{
if(isset($_FILES['image'])) {
        $name=$_POST['image_name'];

        $fp=addslashes(file_get_contents($_FILES['image']['tmp_name'])); //will store the image to fp
        }
                // our sql query
                $sql = "INSERT INTO images VALUES('null', '{$name}','{$fp}');";
                            mysql_query($sql) or die("Error in Query insert: " . mysql_error());
}
?>
