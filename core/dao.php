<?php

class DAO{
public function searchData($searchVal){
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'db1');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	try {
$search = $searchVal;
$stmt = "SELECT * FROM `blogs` WHERE (`title` like '%$search%' OR `body` like '%$search%')";
$result = mysqli_query($db,$stmt) or die( mysqli_error($db));
$Count = mysqli_num_rows($result);
//echo " Total Records Count : $Count .<br>" ;
$out ="" ;
if ($Count  > 0){
while($data=mysqli_fetch_array($result)) {      
        $url = "blogdetail.php?id=".$data['id']."";    
		$out = $out .'<div class="search-result"><a href='.$url.'>'.$data['title'].'</a></div>';    
}
return $out ;
}
}
catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}
} 
}
?>
