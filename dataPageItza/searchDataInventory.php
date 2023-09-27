<?php 
require_once('databaseInventory.php');

$search_criteria = $_POST['search_criteria'];


//chain query

$query = "SELECT id_dataset, canonical_name, object_type, device_type, date_capture, data_description, name, data_status, archive_link, file_location 
FROM datasets t INNER JOIN devices d 
ON t.id_device = d.id_device
INNER JOIN buildings b
ON t.id_building = b.id_building
INNER JOIN autors a
ON t.id_autor = a.id_autor 

WHERE id_dataset LIKE   '%".$search_criteria."%'  
OR canonical_name LIKE    '%".$search_criteria."%' 
OR  object_type LIKE     '%".$search_criteria."%' 
OR device_type LIKE            '%".$search_criteria."%' 
OR date_capture LIKE   '%".$search_criteria."%'
OR name LIKE  '%".$search_criteria."%'
OR data_description LIKE  '%".$search_criteria."%'
OR data_status LIKE   '%".$search_criteria."%'
OR archive_link LIKE          '%".$search_criteria."%'
OR file_location LIKE          '%".$search_criteria."%' ORDER BY (id_dataset) " ;


 
/*  
 
 
 
 */


$buildings = [];

$errors = ['data' => false];

$getBuildings = $conexion -> query($query);

if($getBuildings -> num_rows > 0){

    while($data = $getBuildings -> fetch_assoc()){
        $buildings[] = $data;
    }

    echo json_encode($buildings);

}else{
    echo json_encode($errors);
}