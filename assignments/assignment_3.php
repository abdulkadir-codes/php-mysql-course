<?php
session_start();

$errors = array();

// Question 2: Required fields
$fields = array(
    "student_name" => "Full name",
    "pob" => "Place of birth",
    "dob" => "Date of birth",
    "address" => "Address",
    "gender" => "Gender",
    "telephone" => "Telephone",
    "email" => "Email",
    "parent_name" => "Parent name",
    "parent_telephone" => "Parent telephone",
    "relationship" => "Relationship",
    "student_id" => "Student ID",
    "faculty" => "Faculty",
    "department" => "Department",
    "class" => "Class",
    "registration_date" => "Registration date"
);

// Keep the entered values when there is an error
function old($field) {
    $value = $_POST[$field] ?? "";
    return htmlspecialchars(is_string($value) ? $value : "", ENT_QUOTES, "UTF-8");
}

// Show a message below each field only when that field has an error
function showError($field) {
    global $errors, $firstErrorField;
    $message = ($firstErrorField == $field) ? $errors[$field] : "";
    echo '<div class="invalid-feedback">' . htmlspecialchars($message, ENT_QUOTES, "UTF-8") . '</div>';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Question 2: Check for empty fields
    foreach ($fields as $field => $label) {
        if (!isset($_POST[$field]) || !is_string($_POST[$field]) || trim($_POST[$field]) == "") {
            $errors[$field] = "$label is required.";
        }
    }

    // Question 3: Check names and email
    if (!isset($errors["student_name"]) && !preg_match('/^[A-Za-z ]+$/', trim($_POST["student_name"]))) {
        $errors["student_name"] = "Use letters and spaces only.";
    }

    if (!isset($errors["parent_name"]) && !preg_match('/^[A-Za-z ]+$/', trim($_POST["parent_name"]))) {
        $errors["parent_name"] = "Use letters and spaces only.";
    }

    if (!isset($errors["email"]) && !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Enter a valid email address.";
    }

    // Question 3: Check that an image was uploaded and its type is allowed
    $allowedImages = array(
        "image/jpeg" => "jpg",
        "image/png" => "png",
        "image/gif" => "gif"
    );

    if (!isset($_FILES["image"]) || $_FILES["image"]["error"] == UPLOAD_ERR_NO_FILE) {
        $errors["image"] = "Student image is required.";
    } elseif ($_FILES["image"]["error"] != UPLOAD_ERR_OK) {
        $errors["image"] = "The image could not be uploaded.";
    } elseif ($_FILES["image"]["size"] > 2 * 1024 * 1024) {
        $errors["image"] = "Image must be 2 MB or smaller.";
    } else {
        $imageInfo = @getimagesize($_FILES["image"]["tmp_name"]);
        if ($imageInfo === false || !isset($allowedImages[$imageInfo["mime"]])) {
            $errors["image"] = "Upload a JPG, PNG, or GIF image.";
        }
    }

    // Question 4: Save the image and go to the result page
    if (empty($errors)) {
        $folder = __DIR__ . "/uploads";

        if (!is_dir($folder) && !mkdir($folder, 0755)) {
            $errors["image"] = "Unable to create the upload folder.";
        } else {
            $imageName = uniqid("student_") . "." . $allowedImages[$imageInfo["mime"]];

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $folder . "/" . $imageName)) {
                $_SESSION["student"] = array();

                foreach ($fields as $field => $label) {
                    $_SESSION["student"][$field] = trim($_POST[$field]);
                }
                $_SESSION["student"]["image"] = "uploads/" . $imageName;

                header("Location: result.php");
                exit;
            } else {
                $errors["image"] = "Unable to save the image.";
            }
        }
    }
}

$firstErrorField = empty($errors) ? "" : array_key_first($errors);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Assignment 3 - Student Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4" style="max-width: 960px;">
    <div class="text-center text-white rounded-3 p-4 mb-4 shadow-sm" style="background-color: #17365d;">
        <h5 class="fw-normal mb-2">Jamhuriya University of Science &amp; Technology</h5>
        <h1 class="h3 fw-semibold mb-2">Student Registration Form</h1>
        <p class="mb-0 text-white-50">PHP Assignment 3 &bull; forms</p>
    </div>

    <!-- Question 1: Student registration form -->
    <!-- Validate one field at a time, and show the message below that field. -->
    <form action="" method="post" enctype="multipart/form-data" novalidate>

        <div class="card mb-3">
            <div class="card-header fw-semibold">1. Personal Information</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="student_name" class="form-label">Full Name</label>
                        <input type="text" class="form-control <?php if ($firstErrorField == 'student_name') echo 'is-invalid'; ?>" id="student_name" name="student_name" value="<?php echo old('student_name'); ?>" required>
                        <?php showError("student_name"); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="pob" class="form-label">Place of Birth</label>
                        <input type="text" class="form-control <?php if ($firstErrorField == 'pob') echo 'is-invalid'; ?>" id="pob" name="pob" value="<?php echo old('pob'); ?>" required>
                        <?php showError("pob"); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control <?php if ($firstErrorField == 'dob') echo 'is-invalid'; ?>" id="dob" name="dob" value="<?php echo old('dob'); ?>" required>
                        <?php showError("dob"); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control <?php if ($firstErrorField == 'address') echo 'is-invalid'; ?>" id="address" name="address" value="<?php echo old('address'); ?>" required>
                        <?php showError("address"); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select <?php if ($firstErrorField == 'gender') echo 'is-invalid'; ?>" id="gender" name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="Male" <?php if (old('gender') == 'Male') echo 'selected'; ?>>Male</option>
                            <option value="Female" <?php if (old('gender') == 'Female') echo 'selected'; ?>>Female</option>
                        </select>
                        <?php showError("gender"); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="telephone" class="form-label">Telephone</label>
                        <input type="tel" class="form-control <?php if ($firstErrorField == 'telephone') echo 'is-invalid'; ?>" id="telephone" name="telephone" value="<?php echo old('telephone'); ?>" required>
                        <?php showError("telephone"); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control <?php if ($firstErrorField == 'email') echo 'is-invalid'; ?>" id="email" name="email" value="<?php echo old('email'); ?>" required>
                        <?php showError("email"); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="image" class="form-label">Student Image</label>
                        <input type="file" class="form-control <?php if ($firstErrorField == 'image') echo 'is-invalid'; ?>" id="image" name="image" accept=".jpg,.jpeg,.png,.gif" required>
                        <div class="form-text">JPG, PNG, or GIF (maximum 2 MB).</div>
                        <?php showError("image"); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header fw-semibold">2. Parent Information</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="parent_name" class="form-label">Parent Name</label>
                        <input type="text" class="form-control <?php if ($firstErrorField == 'parent_name') echo 'is-invalid'; ?>" id="parent_name" name="parent_name" value="<?php echo old('parent_name'); ?>" required>
                        <?php showError("parent_name"); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="parent_telephone" class="form-label">Parent Telephone</label>
                        <input type="tel" class="form-control <?php if ($firstErrorField == 'parent_telephone') echo 'is-invalid'; ?>" id="parent_telephone" name="parent_telephone" value="<?php echo old('parent_telephone'); ?>" required>
                        <?php showError("parent_telephone"); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="relationship" class="form-label">Relationship</label>
                        <select class="form-select <?php if ($firstErrorField == 'relationship') echo 'is-invalid'; ?>" id="relationship" name="relationship" required>
                            <option value="">Select Relationship</option>
                            <option value="Father" <?php if (old('relationship') == 'Father') echo 'selected'; ?>>Father</option>
                            <option value="Mother" <?php if (old('relationship') == 'Mother') echo 'selected'; ?>>Mother</option>
                            <option value="Guardian" <?php if (old('relationship') == 'Guardian') echo 'selected'; ?>>Guardian</option>
                        </select>
                        <?php showError("relationship"); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header fw-semibold">3. Academic Information</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="student_id" class="form-label">Student ID</label>
                        <input type="text" class="form-control <?php if ($firstErrorField == 'student_id') echo 'is-invalid'; ?>" id="student_id" name="student_id" value="<?php echo old('student_id'); ?>" required>
                        <?php showError("student_id"); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="faculty" class="form-label">Faculty</label>
                        <select class="form-select <?php if ($firstErrorField == 'faculty') echo 'is-invalid'; ?>" id="faculty" name="faculty" required>
                            <option value="">Select Faculty</option>
                            <option value="Computer and IT" <?php if (old('faculty') == 'Computer and IT') echo 'selected'; ?>>Computer and IT</option>
                            <option value="Medicine and Health Sciences" <?php if (old('faculty') == 'Medicine and Health Sciences') echo 'selected'; ?>>Medicine and Health Sciences</option>
                            <option value="Engineering" <?php if (old('faculty') == 'Engineering') echo 'selected'; ?>>Engineering</option>
                            <option value="Business" <?php if (old('faculty') == 'Business') echo 'selected'; ?>>Business</option>
                        </select>
                        <?php showError("faculty"); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="department" class="form-label">Department</label>
                        <input type="text" class="form-control <?php if ($firstErrorField == 'department') echo 'is-invalid'; ?>" id="department" name="department" value="<?php echo old('department'); ?>" required>
                        <?php showError("department"); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="class" class="form-label">Class</label>
                        <input type="text" class="form-control <?php if ($firstErrorField == 'class') echo 'is-invalid'; ?>" id="class" name="class" value="<?php echo old('class'); ?>" required>
                        <?php showError("class"); ?>
                    </div>
                    <div class="col-md-6">
                        <label for="registration_date" class="form-label">Registration Date</label>
                        <input type="date" class="form-control <?php if ($firstErrorField == 'registration_date') echo 'is-invalid'; ?>" id="registration_date" name="registration_date" value="<?php echo old('registration_date'); ?>" required>
                        <?php showError("registration_date"); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end gap-2 mb-4">
            <button type="button" class="btn btn-outline-secondary px-4" onclick="window.location.href='assignment_3.php'">Clear Form</button>
            <button type="submit" class="btn btn-primary px-4">Register</button>
        </div>
    </form>
</div>

<script>
    const form = document.querySelector("form");
    const fields = form.querySelectorAll("[required]");

    // Check a field when the user leaves it
    function validateField(field) {
        let message = "";

        if (!field.value.trim()) {
            message = field.labels[0].textContent.trim() + " is required.";
        } else if ((field.name == "student_name" || field.name == "parent_name") &&
                   !/^[A-Za-z ]+$/.test(field.value.trim())) {
            message = "Use letters and spaces only.";
        } else if (field.name == "email" && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(field.value.trim())) {
            message = "Enter a valid email address.";
        } else if (field.name == "image") {
            const image = field.files[0];
            if (!/\.(jpg|jpeg|png|gif)$/i.test(image.name)) {
                message = "Upload a JPG, PNG, or GIF image.";
            } else if (image.size > 2 * 1024 * 1024) {
                message = "Image must be 2 MB or smaller.";
            }
        }

        field.classList.toggle("is-invalid", message != "");
        field.parentElement.querySelector(".invalid-feedback").textContent = message;
        return message == "";
    }

    fields.forEach(function (field) {
        field.addEventListener("blur", function () {
            validateField(field);
        });

        // Remove an error as soon as the value is corrected
        field.addEventListener("input", function () {
            if (field.classList.contains("is-invalid")) validateField(field);
        });

        if (field.tagName == "SELECT" || field.type == "file") {
            field.addEventListener("change", function () {
                validateField(field);
            });
        }
    });

    // On Register, show only the first missing or incorrect field
    form.addEventListener("submit", function (event) {
        for (const field of fields) {
            if (!validateField(field)) {
                event.preventDefault();
                field.focus();
                break;
            }
        }
    });

    // PHP validation (when JavaScript is unavailable or bypassed)
    const firstError = document.querySelector(".is-invalid");
    if (firstError) firstError.focus();
</script>
</body>
</html>
