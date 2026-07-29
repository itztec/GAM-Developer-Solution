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

$company_name = trim($_POST['company_name'] ?? '');
$contact_person = trim($_POST['contact_person'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$email = trim($_POST['email'] ?? '');
$required_workers = intval($_POST['required_workers'] ?? 1);
$job_type = trim($_POST['job_type'] ?? '');
$message = trim($_POST['message'] ?? '');

if (empty($company_name) || empty($contact_person) || empty($phone) || empty($email) || empty($job_type)) {
    echo json_encode(['status' => 'error', 'message' => 'Please fill in all required fields.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => 'error', 'message' => 'Please provide a valid email address.']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO enquiries (company_name, contact_person, phone, email, required_workers, job_type, message) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$company_name, $contact_person, $phone, $email, $required_workers, $job_type, $message]);

    echo json_encode([
        'status' => 'success',
        'message' => 'Thank you! Your workforce enquiry has been submitted successfully. Our recruitment manager will contact you shortly.'
    ]);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database error: Unable to save your enquiry.']);
}
