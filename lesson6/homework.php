<?php
//exercise 1
class Student {  
    private const VALID_STATUSES = ['freshman', 'sophomore', 'junior', 'senior'];

    private $firstName;
    private $lastName;
    private $gender;
    private $status;
    private $gpa;

    //exercise 4
    public function __construct($FirstName, $LastName, $Gender, $Status, $Gpa) {
        $this->firstName = $FirstName;
        $this->lastName = $LastName;

        if ($Gender !== 'male' && $Gender !== 'female') {
            throw new RuntimeException('You\'ve entered incorrect gender!'.PHP_EOL);
        } else {
            $this->gender = $Gender;
        }

        if (!in_array($Status, Student::VALID_STATUSES)) {
            throw new RuntimeException('You\'ve entered incorrect status!'.PHP_EOL);
        } else {
            $this->status = $Status;
        }

        if (!Student::isValidGPA($Gpa)) {
            throw new RuntimeException('Error! GPA value should be number from 0 to 4!'.PHP_EOL);
        } else {
            $this->gpa = $Gpa;
        }
    }

    private static function isValidGPA($value)
    {
        if (!is_numeric($value) || $value < 0 || $value > 4) {
            return false;
        } else {
            return true;
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
            throw new RuntimeException('Error! Study time should be positive number');
        }
        $this->gpa + log($time) > 4 ? $this->gpa = 4.0 : $this->gpa += log($time);
    }
}

function showStudentsInfo($studentsArray)
{
    foreach ($studentsArray as $student) {
        $student->showMyself();
        echo PHP_EOL.PHP_EOL;
    }
}

//exercise 2
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
showStudentsInfo($students);

//exercise 3
$time = [60, 100, 40, 300, 1000];
for ($i=0; $i < count($students); $i++) { 
    $students[$i]->studyTime($time[$i]);
}
showStudentsInfo($students[0]);
