<?php

class Student {
    private const VALID_STATUS = ['freshman', 'sophomore', 'junior', 'senior'];

    private $firstName;
    private $lastName;
    private $gender;
    private $status;
    private $gpa;

    public function __construct($FirstName, $LastName, $Gender, $Status, $Gpa) {
        $this->firstName = $FirstName;
        $this->lastName = $LastName;

        if ($Gender !== 'male' && $Gender !== 'female') {
            exit('You\'ve entered incorrect gender!'.PHP_EOL);
        } else {
            $this->gender = $Gender;
        }

        if (!in_array($Status, Student::VALID_STATUS)) {
            exit('You\'ve entered incorrect status!'.PHP_EOL);
        } else {
            $this->status = $Status;
        }

        if (!is_numeric($Gpa) || $Gpa < 0 || $Gpa > 4) {
            exit('Error! GPA value should be number from 0 to 4!'.PHP_EOL);
        } else {
            $this->gpa = $Gpa;
        }
    }

    public function showMyself()
    {
        echo 'FirstName: ' . $this->firstName . PHP_EOL;
        echo 'LastName: ' . $this->lastName . PHP_EOL;
        echo 'Gender: ' . $this->gender . PHP_EOL;
        echo 'Status: ' . $this->status . PHP_EOL;
        echo 'GPA: ' . $this->gpa;
    }

    public function studyTime($time)
    {
        if (!is_numeric($time) || $time <= 0) {
            exit('Error! Study time should be positive number');
        }
        $this->gpa + log($time) > 4 ? $this->gpa = 4.0 : $this->gpa += log($time);
    }
}

$studentsData = [
    ['Mike', 'Barnes', 'male', 'freshman', 4],
    ['Jim', 'Nickerson', 'male', 'sophomore', 3],
    ['Jack', 'Indabox', 'male', 'junior', 2.5],
    ['Jane', 'Miller', 'female', 'senior', 3.6],
    ['Mary', 'Scott', 'female', 'senior', 2.7]
];

for ($i=0; $i < count($studentsData); $i++) {
    $students[$i] = new Student($studentsData[$i][0], 
    $studentsData[$i][1], 
    $studentsData[$i][2], 
    $studentsData[$i][3], 
    $studentsData[$i][4]);
}

foreach ($students as $student) {
    $student->showMyself();
    echo PHP_EOL.PHP_EOL;
}

