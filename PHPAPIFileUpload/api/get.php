<?php

$con=mysqli_connect('localhost:3301','root','','pg-management');

$res=mysqli_query($con,"select * from tenant_Image_Upload order by id desc");

if(mysqli_num_rows($res)>0){
    echo "<table border='1'>";
        echo "<tr><td>S.No</td><td>Image</td><td>Added On</td>";
        $i=1;
        while($row=mysqli_fetch_assoc($res)){
            $image=$row['image'];
            $added_on=date('d-M Y',strtotime($row['added_on']));
            echo "<tr><td>$i</td><td><a href='media/$image' target='_blank'><img width='100px' src='media/$image'/></a></td><td>$added_on</td>";
            $i++;
        }
    echo "</table>";
}else{
    
    echo "No data found";
}
?>