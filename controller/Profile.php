<?php
header('Content-Type: application/json; charset=utf-8');
require_once '../config/Database.php';

class Profile extends Database
{
    private function formatBirthdate($bday)
    {
        return date("Y-m-d", strtotime($bday));
    }

    public function validateFullname()
    {
        if (!empty($_POST['fullname']) && preg_match('/^[A-Za-z.,\'\s]+$/', $_POST['fullname'])) {
            return $_POST['fullname'];
        } else {
            throw new Exception("Invalid Format / Fullname input must required", 400);
        }
    }

    public function validateEmail()
    {
        if (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            return $_POST['email'];
        } else {
            throw new Exception("Invalid Email Address / Email input must be required", 400);
        }
    }

    public function validatePHMobileNumber()
    {
        if (!empty($_POST['mobileNumber']) && preg_match('/^(\+63|0)[9]\d{9}$/', $_POST['mobileNumber'])) {
            return $_POST['mobileNumber'];
        } else {
            throw new Exception("Invalid Mobile Number / Mobile input must be required", 400);
        }
    }

    public function calculateAge()
    {
        $birthDate = new DateTime($_POST['dob']);
        $currentDate = new DateTime();
        $age = $currentDate->diff($birthDate)->y;
        return $age;
    }

    public function addProfile($fullname, $email, $mobile_number, $birthdate, $age, $gender)
    {
        $birthdate = $this->formatBirthdate($birthdate);
        $stmt = $this->conn->prepare("INSERT INTO profile (fullname, email, mobile_number, birthdate, age, gender) VALUES (:fullname, :email, :mobile_number, :birthdate, :age, :gender)");
        // Bind parameters
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mobile_number', $mobile_number);
        $stmt->bindParam(':birthdate', $birthdate);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':gender', $gender);
        return $stmt->execute();
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        $profile = new Profile();

        $fullname = $profile->validateFullname();
        $email = $profile->validateEmail();
        $mobileNumber = $profile->validatePHMobileNumber();
        $birthdate = $profile->calculateAge();
        $age = $_POST['age'];
        $gender = $_POST['gender'];

        $result = $profile->addProfile($fullname, $email, $mobileNumber, $birthdate, $age, $gender);
        header('Status: 200');
        echo json_encode([
            "status" => true,
            "message" => "Inserted Successfully!",
            "result" => $result
        ]);
    } catch (\Exception $ex) {
        header('Status: ' . $ex->getCode());
        echo json_encode([
            "status" => false,
            "message" => $ex->getMessage(),
            "result" => null
        ]);
    }
} else {

    echo json_encode([
        "status" => true,
        "message" => "Error: Invalid request method",
        "result" => null
    ]);
    exit;
}
