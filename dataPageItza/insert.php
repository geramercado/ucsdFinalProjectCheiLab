

<!DOCTYPE html>

<html>
    <head>
        <title>InsertDone</title>
        <link rel="stylesheet" href="insertPhpStyle.css">
    </head>

        <body>

            <header>
                <nav>
                    <a href="inventory.html">Inventory</a>
                    <a href="insertBuilding.html">InsertData</a>
                </nav>
            </header>

                <div class="header-image">
                    <h1>Insert data</h1>
                </div>

                        <div class = "done-text">
                                <p>Register done</p>
                        </div>


                        <?php

                                $conexion = mysqli_connect('localhost','root','','itzadata');


                                $canonical_name = $_POST['canonical_name'];

                                
                                
                                if ($_REQUEST['object'] == 'pointclouds,rasters') {
                                    $objecType = "pointclouds,rasters";
                                }elseif ($_REQUEST['object'] == 'pointclouds') {
                                    $objecType = "pointclouds";
                                }elseif ($_REQUEST['object'] == 'sfm') {
                                    $objecType = "sfm";
                                }elseif ($_REQUEST['object'] == '360 pano') {
                                    $objecType = "360 pano";
                                }elseif ($_REQUEST['object'] == 'video') {
                                    $objecType = "video";
                                }elseif ($_REQUEST['object'] == 'sfm w/ control points') {
                                    $objecType = "sfm w/ control points";
                                }


                                if ($_REQUEST['device'] == '1') {
                                    $deviceType = "1";
                                }elseif ($_REQUEST['device'] == '2') {
                                    $deviceType = "2";
                                }elseif ($_REQUEST['device'] == '3') {
                                    $deviceType = "3";
                                }elseif ($_REQUEST['device'] == '4') {
                                    $deviceType = "4";
                                }elseif ($_REQUEST['device'] == '5') {
                                    $deviceType = "5";
                                }elseif ($_REQUEST['device'] == '6') {
                                    $deviceType = "6";
                                }

                                $date = $_POST['date'];
                                $description = $_POST['data_description'];
                                $autor = $_POST['autor'];

                                

                                if ($_REQUEST['stat'] == 'processed') {
                                    $status =  "processed";
                                }elseif ($_REQUEST['stat'] == 'unprocessed') {
                                    $status =  "unprocessed";
                                }

                                $archiveLink = $_POST['archive_link'];
                                $fileLocation = $_POST['file_location'];


                                $latitude = 'null';
                                $longitude = 'null';
                                $longitude = 'null';
                                $englishName = 'null';
                                $alternateName = 'null';
                                $buildDescrition = 'null';
                                $id_inah_building = 'null';
                                $inah_building_group = 'null';

                                $idDataset = mysqli_insert_id($conexion);
                                        echo ''.$idDataset;
                                
                                    

                                                                       /* id_autor,*/
                                    $autorsTable = "INSERT INTO autors ( name ) VALUES ( '$autor' )" ;

                                    $insertAutor = mysqli_query($conexion, $autorsTable);

                                    $idAutor = mysqli_insert_id($conexion);
                                    echo ''.$idAutor;
                                    
                                    if ($insertAutor == true) {
                                                                                     /* id_building,*/
                                        $buildingTable = "INSERT INTO buildings( canonical_name, english_name, alternate_name, building_description, latitude, longitude, id_inah_building, inah_building_group) VALUES ( '$canonical_name', '$englishName',
                                        '$alternateName', '$buildDescrition', '$latitude', '$longitude', '$id_inah_building', '$inah_building_group')";
                                       
                                            $insertBuilding = mysqli_query($conexion, $buildingTable);

                                                $idBuilding = mysqli_insert_id($conexion);
                                                echo ''.$idBuilding;
                                                  
                                                if ($insertBuilding == true) {


                                                         /* id_proyect,*/
                                                         $idDevice = (int) $deviceType;
                                                         $dataSetTable = "INSERT INTO datasets ( id_dataset, id_device, id_building,  id_autor, data_status, data_description, date_capture, file_location, object_type, archive_link) 
                                                                                         VALUES ('$idDataset','$idDevice','$idBuilding', '$idAutor', '$status', '$description', '$date', '$fileLocation', '$objecType', '$archiveLink' )";
                               
                                                            $insertDataSet = mysqli_query($conexion, $dataSetTable);
                                                             echo "";
                                            }
                                    }

                        ?>


        </body>

</html>


