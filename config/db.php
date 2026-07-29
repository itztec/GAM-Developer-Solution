<?php
/**
 * GAM Developer Solution - Database Configuration & PDO Connection
 */

// Database Credentials (Default XAMPP / WAMP / standard PHP server settings)
$db_host = 'localhost';
$db_name = 'gam_manpower';
$db_user = 'root';
$db_pass = '';

try {
    // 1. Connect to MySQL server
    $pdo = new PDO("mysql:host=$db_host;charset=utf8mb4", $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);

    // 2. Ensure Database exists
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$db_name` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $pdo->exec("USE `$db_name`");

    // 3. Auto-initialize tables if not present
    $check_table = $pdo->query("SHOW TABLES LIKE 'enquiries'")->rowCount();
    if ($check_table === 0) {
        // Create enquiries table
        $pdo->exec("CREATE TABLE IF NOT EXISTS `enquiries` (
          `id` INT AUTO_INCREMENT PRIMARY KEY,
          `company_name` VARCHAR(255) NOT NULL,
          `contact_person` VARCHAR(255) NOT NULL,
          `phone` VARCHAR(50) NOT NULL,
          `email` VARCHAR(255) NOT NULL,
          `required_workers` INT NOT NULL DEFAULT 1,
          `job_type` VARCHAR(100) NOT NULL,
          `message` TEXT DEFAULT NULL,
          `status` ENUM('Pending', 'In Contact', 'Fulfilled', 'Closed') DEFAULT 'Pending',
          `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

        // Create candidates table
        $pdo->exec("CREATE TABLE IF NOT EXISTS `candidates` (
          `id` INT AUTO_INCREMENT PRIMARY KEY,
          `full_name` VARCHAR(255) NOT NULL,
          `phone` VARCHAR(50) NOT NULL,
          `email` VARCHAR(255) NOT NULL,
          `location` VARCHAR(255) NOT NULL,
          `qualification` VARCHAR(255) NOT NULL,
          `experience` VARCHAR(100) NOT NULL,
          `job_category` VARCHAR(100) NOT NULL,
          `resume_path` VARCHAR(255) DEFAULT NULL,
          `status` ENUM('New', 'Shortlisted', 'Interviewed', 'Hired', 'Rejected') DEFAULT 'New',
          `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

        // Create admin_users table
        $pdo->exec("CREATE TABLE IF NOT EXISTS `admin_users` (
          `id` INT AUTO_INCREMENT PRIMARY KEY,
          `username` VARCHAR(50) UNIQUE NOT NULL,
          `password` VARCHAR(255) NOT NULL,
          `email` VARCHAR(255) NOT NULL,
          `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

        // Insert default admin: admin / password123
        $admin_pass = password_hash('password123', PASSWORD_BCRYPT);
        $stmt = $pdo->prepare("INSERT INTO `admin_users` (`username`, `password`, `email`) VALUES (?, ?, ?)");
        $stmt->execute(['admin', $admin_pass, 'admin@gamdevelopersolution.com']);
    }

} catch (PDOException $e) {
    // If DB connection fails (e.g. MySQL server not running yet), store error flag
    $db_error = "Database Connection Warning: " . $e->getMessage();
    $pdo = null;
}
