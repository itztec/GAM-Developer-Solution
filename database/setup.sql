-- GAM Developer Solution Database Schema

CREATE DATABASE IF NOT EXISTS `gam_manpower` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `gam_manpower`;

-- --------------------------------------------------------
-- Table: enquiries (Client Recruitment Requests)
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `enquiries` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- Table: candidates (Job Applications & Registrations)
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `candidates` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- Table: admin_users (Workforce System Administrators)
-- Default Login: admin / admin123 (bcrypt hashed password)
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(50) UNIQUE NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert default admin account if not exists (username: admin, password: password123)
INSERT INTO `admin_users` (`username`, `password`, `email`)
SELECT 'admin', '$2y$10$w821NfJ2O2/6T5b3S8lH3.N6aE815Q5n6G34Yp3V5A3841h9RkELe', 'admin@gamdevelopersolution.com'
WHERE NOT EXISTS (SELECT * FROM `admin_users` WHERE `username` = 'admin');

-- --------------------------------------------------------
-- Sample Data for Demo/Testing
-- --------------------------------------------------------
INSERT INTO `enquiries` (`company_name`, `contact_person`, `phone`, `email`, `required_workers`, `job_type`, `message`, `status`) VALUES
('Apex Logistics Ltd', 'Robert Chen', '+1 555-0192', 'robert@apexlogistics.com', 25, 'Unskilled Labour', 'Need 25 warehouse loaders and general helpers for evening shift.', 'Pending'),
('Metropolitan Health Care', 'Sarah Jenkins', '+1 555-0483', 's.jenkins@metrohealth.org', 10, 'Corporate Staffing', 'Seeking qualified medical office assistants and facility support personnel.', 'In Contact');

INSERT INTO `candidates` (`full_name`, `phone`, `email`, `location`, `qualification`, `experience`, `job_category`, `status`) VALUES
('Marcus Vance', '+1 555-9012', 'marcus.v@example.com', 'Texas', 'Higher Secondary', '3 Years', 'Technician', 'Shortlisted'),
('Elena Rostova', '+1 555-4321', 'elena.rostova@example.com', 'California', 'Bachelor Degree', '5 Years', 'Office Staff', 'New');
