<?php
$servername = "localhost";
$username = "root";
$password = "";

$full_name = $_POST['full_name'];
$email_add = $_POST['email_add'];
$mobile_number = $_POST['mobile_number'];
$birth_date = $_POST['birth_date'];
$age = $_POST['age'];
$gender = $_POST['gender'];

if($full_name != ''){
    if (preg_match('/\d/', $full_name)) {
        echo "can't have numbers";
        exit();
    }
}
else{
    echo "FULL NAME must be filled up";
    exit();
}

if($email_add != ''){
    if (!preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/', $email_add)) {
        echo "wrong email format";
        exit();
    }
}
else{
    echo "EMAIL ADDRESS must be filled up";
    exit();
}

if($mobile_number != ''){
    if (!preg_match('/^09\d{9}$/', $mobile_number)) {
        echo "wrong PH mobile number format";
        exit();
    }
}
else{
    echo "MOBILE NUMBER must be filled up";
    exit();
}

if($birth_date == ''){
    echo "DATE OF BIRTH must be filled up";
    exit();
}

if($age == ''){
    echo"AGE must be filled up";
    exit();
}

if($gender == ''){
    echo "GENDER must be filled up";
    exit();
}

try {
  $conn = new PDO("mysql:host=$servername;dbname=profile", $username, $password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $insert_profile = "INSERT INTO personal_info (`full_name`, `email_add`, `mobile_number`, `birth_date`, `age`, `gender`)
                    VALUES ('$full_name','$email_add','$mobile_number','$birth_date','$age','$gender')";
  $conn->exec($insert_profile);

  echo "SAVED";

} catch(PDOException $e) {
  echo $insert_profile . "\n" . $e->getMessage();
}

?>