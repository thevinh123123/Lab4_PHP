<?php

class StudentList {
    private $students = [];

    public function addStudent($student) {
        $this->students[] = $student;
    }

    public function getStudents() {
        return $this->students;
    }

    public function displayStudents() {
        echo '<table>';
        echo '<tr><th>ID</th><th>Name</th><th>Age</th><th>Grade</th></tr>';
        foreach ($this->students as $student) {
            echo '<tr>';
            echo '<td>' . $student->getId() . '</td>';
            echo '<td>' . $student->getName() . '</td>';
            echo '<td>' . $student->getAge() . '</td>';
            echo '<td>' . $student->getGrade() . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
}
