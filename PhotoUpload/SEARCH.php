<?php
//SEARCH.PHP PAGE
    //connect to database.db name = images
         mysql_connect("localhost", "root", "") OR DIE (mysql_error());
        mysql_select_db ("photography") OR DIE ("Unable to select db".mysql_error());
//display all the image present in the database

        $msg="";
        $sql="select * from images";
        if(mysql_query($sql))
        {
            $res=mysql_query($sql);
            while($row=mysql_fetch_array($res))
            {
                    $id=$row['id'];
                    $name=$row['name'];
                    $image=$row['image'];

                  $msg.= '<a href="search.php?id='.$id.'"><img src="data:image/jpeg;base64,'.base64_encode($row['image']). ' " />   </a>';

            }
        }
        else
            $msg.="Query failed";
?>
<div>
<?php
echo $msg;
?>
