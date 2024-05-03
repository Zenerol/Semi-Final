<?php

$registration = array(
        'postal_regCode' => "'" . $_POST['inp_region'] . "'",
        'postal_provCode' => "'" . $_POST['inp_province'] . "'",
        'postal_citymunCode' => "'" . $_POST['inp_citymun'] . "'",
        'postal_code' => "'" . $_POST['inp_postalcode'] . "'",
);

save($registration);

function save($data)
{
     include('../config/database.php');

     $attributes = implode(", ", array_keys($data));
     $values = implode(", ", array_values($data));

     $postal_code = $_POST['inp_postalcode'];
     


     if($count['i'] == 0){
        //save record
        $query = "INSERT INTO postalcode_ph ($attributes) VALUES ($values)";
        $conn->query($query);
        header('location:  /event-driven-programming-3/postalcode.php?success');
       }else{
        //duplicate
        header('location:  /event-driven-programming-3/postalcode.php?invalid');
       }

     $conn->close();
}