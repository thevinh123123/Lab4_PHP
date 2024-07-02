<?php

require_once 'Student.php';
require_once 'StudentList.php';

// Khởi tạo danh sách học sinh
$studentList = new StudentList();

// Xử lý dữ liệu form
if (isset($_POST['name']) && isset($_POST['age']) && isset($_POST['grade'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $grade = $_POST['grade'];

    // Tạo sinh viên mới
    $student = new Student(null, $name, $age, $grade);

    // Thêm sinh viên vào danh sách
    $studentList->addStudent($student);
}

// Hiển thị danh sách học sinh
$studentList->displayStudents();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Form Nhập Thông Tin Học Sinh</title>
</head>
<body>
    <h1>Form Nhập Thông Tin Học Sinh</h1>
    <form action="process.php" method="post">
        <label for="name">Tên:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="age">Tuổi:</label>
        <input type="number" id="age" name="age" required><br>

        <label for="grade">Lớp:</label>
        <input type="number" id="grade" name="grade" required><br>

        <button type="submit">Thêm Sinh Viên</button>
    </form>
</body>
</html>
