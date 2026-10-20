<?php
session_start();

if (!isset($_SESSION["student"])) {
    header("Location: assignment_3.php");
    exit;
}

$student = $_SESSION["student"];

// Question 4: Display the submitted information in a table
$sections = array(
    "Personal Information" => array(
        "student_name" => "Full Name",
        "pob" => "Place of Birth",
        "dob" => "Date of Birth",
        "address" => "Address",
        "gender" => "Gender",
        "telephone" => "Telephone",
        "email" => "Email"
    ),
    "Parent Information" => array(
        "parent_name" => "Parent Name",
        "parent_telephone" => "Parent Telephone",
        "relationship" => "Relationship"
    ),
    "Academic Information" => array(
        "student_id" => "Student ID",
        "faculty" => "Faculty",
        "department" => "Department",
        "class" => "Class",
        "registration_date" => "Registration Date"
    )
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Assignment 3 - Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4" style="max-width: 960px;">
    <div class="text-center text-white rounded-3 p-4 mb-4 shadow-sm" style="background-color: #17365d;">
        <h5 class="fw-normal mb-2">Jamhuriya University of Science &amp; Technology</h5>
        <h1 class="h3 fw-semibold mb-2">Student Registration Details</h1>
        <p class="mb-0 text-white-50">PHP Assignment 3 &bull; Chapter 4 (Forms)</p>
    </div>

    <div class="alert alert-success">Student registered successfully.</div>

    <div class="card">
        <div class="card-body">
            <h2 class="h5 mb-3">Submitted Student Information</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <tr>
                        <th style="width: 35%;">Field</th>
                        <th>Information</th>
                    </tr>

                    <?php foreach ($sections as $section => $items) { ?>
                        <tr class="table-secondary">
                            <th colspan="2"><?php echo $section; ?></th>
                        </tr>

                        <?php foreach ($items as $field => $label) { ?>
                            <tr>
                                <td><?php echo $label; ?></td>
                                <td><?php echo htmlspecialchars($student[$field], ENT_QUOTES, "UTF-8"); ?></td>
                            </tr>
                        <?php } ?>

                        <?php if ($section == "Personal Information") { ?>
                            <tr>
                                <td>Student Image</td>
                                <td><img src="<?php echo htmlspecialchars($student['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="Student Image" class="img-thumbnail" style="max-width: 150px;"></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

    <a href="assignment_3.php" class="btn btn-secondary mt-3">Back to Form</a>
</div>
</body>
</html>
