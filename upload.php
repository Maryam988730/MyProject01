<?php
#checking if anthing was submitted
if (isset($_POST['submit'])) {

    #the superglobal $_FILES gets all the info from the file, we nbames it 'file'
    $file = $_FILES['file'];

    #we want to sort thru files to only accept csv so we need to split the data up, 
    #its currently in the assoccitiave array from $_FILES['file']

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $_ileType = $_FILES['file']['type'];

    #splits the file name at . so we can extract the file extension
    $fileExt = explode('.', $fileName);
    #extract second part (the extension) and convert to low caps for consistency
    $fileActualExt = strtolower(end($fileExt));

    #filtering for csv
    $allowed = array('csv');

    #checking if the uplouded extension is inside the 'allowed' array
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 500000) {
                #assigne new unique name to avoid overriding files with same name 
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;  #names file based on miliseconds and adds the extension
                $fileDestination = 'uploads/'.$fileNameNew;

                #actually uploading the file by moving it from its temporary location to the uploads doc
                move_uploaded_file($fileTmpName, $fileDestination);

                header("Location: my_project.php?uploadsuccess");




            } else {
                echo "file size too large";
            }

        } else {
            echo "there was an error uplaoding your file";
        }

    } else {
        echo "Please upload a csv file";
    }

}