<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../config/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
    exit;
}

if (!$pdo) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed. Please try again later.']);
    exit;
}

$full_name = trim($_POST['full_name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$email = trim($_POST['email'] ?? '');
$location = trim($_POST['location'] ?? '');
$qualification = trim($_POST['qualification'] ?? '');
$experience = trim($_POST['experience'] ?? '');
$job_category = trim($_POST['job_category'] ?? '');

if (empty($full_name) || empty($phone) || empty($email) || empty($location) || empty($qualification) || empty($experience) || empty($job_category)) {
    echo json_encode(['status' => 'error', 'message' => 'Please fill in all mandatory application fields.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => 'error', 'message' => 'Please enter a valid email address.']);
    exit;
}

// Resume upload processing
$resume_path = null;
if (isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['resume']['tmp_name'];
    $fileName = $_FILES['resume']['name'];
    $fileSize = $_FILES['resume']['size'];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    $allowedExtensions = ['pdf', 'doc', 'docx'];
    if (!in_array($fileExtension, $allowedExtensions)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid file type. Only PDF, DOC, and DOCX files are allowed.']);
        exit;
    }

    // 5MB Max size
    if ($fileSize > 5 * 1024 * 1024) {
        echo json_encode(['status' => 'error', 'message' => 'File size exceeds 5MB limit. Please upload a smaller resume file.']);
        exit;
    }

    $uploadDir = __DIR__ . '/../uploads/resumes/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    // Generate sanitized unique filename
    $newFileName = time() . '_' . preg_replace('/[^a-zA-Z0-9_\.-]/', '', $fileName);
    $destPath = $uploadDir . $newFileName;

    if (move_uploaded_file($fileTmpPath, $destPath)) {
        $resume_path = 'uploads/resumes/' . $newFileName;
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to save resume upload.']);
        exit;
    }
}

try {
    $stmt = $pdo->prepare("INSERT INTO candidates (full_name, phone, email, location, qualification, experience, job_category, resume_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$full_name, $phone, $email, $location, $qualification, $experience, $job_category, $resume_path]);

    echo json_encode([
        'status' => 'success',
        'message' => 'Congratulations! Your job application has been submitted successfully. Our HR recruitment team will review your application soon.'
    ]);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database error: Unable to register candidate application.']);
}
