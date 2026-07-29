<?php
session_start();
require_once __DIR__ . '/../config/db.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

$enquiries = [];
$candidates = [];

if ($pdo) {
    // Fetch Enquiries
    try {
        $stmt = $pdo->query("SELECT * FROM enquiries ORDER BY created_at DESC");
        $enquiries = $stmt->fetchAll();
    } catch (Exception $e) {}

    // Fetch Candidates
    try {
        $stmt = $pdo->query("SELECT * FROM candidates ORDER BY created_at DESC");
        $candidates = $stmt->fetchAll();
    } catch (Exception $e) {}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - GAM Developer Solution</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body { background-color: #F4F6F9; }
        .admin-header {
            background-color: #0B1F3A;
            color: #FFFFFF;
            padding: 18px 0;
            border-bottom: 3px solid #C9A227;
        }
        .admin-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .dash-card-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin: 30px 0;
        }
        .dash-card {
            background: #FFFFFF;
            padding: 24px;
            border-radius: 8px;
            border-left: 4px solid #C9A227;
            box-shadow: var(--shadow-sm);
        }
        .dash-num {
            font-family: var(--font-heading);
            font-size: 2rem;
            font-weight: 700;
            color: #0B1F3A;
        }
        .tab-btn {
            padding: 12px 24px;
            font-weight: 600;
            background: #E2E8F0;
            border: none;
            cursor: pointer;
            border-radius: 4px 4px 0 0;
            margin-right: 5px;
            font-family: var(--font-body);
        }
        .tab-btn.active {
            background: #0B1F3A;
            color: #C9A227;
        }
        .table-responsive {
            background: #FFFFFF;
            border-radius: 0 8px 8px 8px;
            padding: 24px;
            box-shadow: var(--shadow-sm);
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }
        th, td {
            padding: 14px 16px;
            text-align: left;
            border-bottom: 1px solid #E2E8F0;
        }
        th {
            background-color: #0B1F3A;
            color: #FFFFFF;
            font-family: var(--font-heading);
            font-weight: 600;
        }
        tr:hover { background-color: #F8FAFC; }
        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 700;
        }
        .badge-pending { background: #FEF3C7; color: #92400E; }
        .badge-success { background: #D1FAE5; color: #065F46; }
    </style>
</head>
<body>

<header class="admin-header">
    <div class="container">
        <div class="admin-nav">
            <div class="brand-logo">
                <img src="../assets/images/logo.png" alt="GAM Developer Solutions Logo" class="brand-logo-img">
                <div class="brand-text">
                    <span class="brand-name">GAM Developer Solutions</span>
                    <span class="brand-tagline">Admin Management Portal</span>
                </div>
            </div>
            <div>
                <span style="margin-right: 15px; font-size: 0.9rem; color: #CBD5E1;">
                    <i class="fa-solid fa-user-gear text-gold"></i> Welcome, <b><?= htmlspecialchars($_SESSION['admin_username']); ?></b>
                </span>
                <a href="logout.php" class="btn btn-gold" style="padding: 8px 18px; font-size: 0.82rem;">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </a>
            </div>
        </div>
    </div>
</header>

<main class="container" style="padding: 40px 24px;">
    <h2>Workforce Dashboard Overview</h2>
    
    <div class="dash-card-grid">
        <div class="dash-card">
            <div class="stat-label">Total Enquiries</div>
            <div class="dash-num"><?= count($enquiries); ?></div>
        </div>
        <div class="dash-card">
            <div class="stat-label">Job Applicants</div>
            <div class="dash-num"><?= count($candidates); ?></div>
        </div>
        <div class="dash-card">
            <div class="stat-label">Database Status</div>
            <div style="color: #059669; font-weight: 700; margin-top: 5px;">
                <i class="fa-solid fa-circle-check"></i> Connected
            </div>
        </div>
        <div class="dash-card">
            <div class="stat-label">Quick Link</div>
            <a href="../index.php" target="_blank" style="color: #0B1F3A; font-weight: 700; text-decoration: underline; font-size: 0.9rem;">
                <i class="fa-solid fa-arrow-up-right-from-square text-gold"></i> View Live Site
            </a>
        </div>
    </div>

    <!-- Dashboard Tabs -->
    <div>
        <button class="tab-btn active" id="tabEnquiry" onclick="showTab('enquiries')">
            <i class="fa-solid fa-building"></i> Client Enquiries (<?= count($enquiries); ?>)
        </button>
        <button class="tab-btn" id="tabCandidate" onclick="showTab('candidates')">
            <i class="fa-solid fa-user-tie"></i> Candidate Applications (<?= count($candidates); ?>)
        </button>
    </div>

    <!-- Enquiries Content -->
    <div id="enquiriesSection" class="table-responsive">
        <h3><i class="fa-solid fa-briefcase text-gold"></i> Corporate Client Enquiries</h3>
        <p style="color: #64748B; font-size: 0.88rem; margin-bottom: 20px;">Requests received from companies looking for manpower supply.</p>
        
        <?php if (empty($enquiries)): ?>
            <p style="padding: 20px; text-align: center; color: #94A3B8;">No client enquiries received yet.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Company Name</th>
                        <th>Contact Person</th>
                        <th>Phone & Email</th>
                        <th>Workers Needed</th>
                        <th>Job Type</th>
                        <th>Message</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($enquiries as $row): ?>
                        <tr>
                            <td>#<?= $row['id']; ?></td>
                            <td><b><?= htmlspecialchars($row['company_name']); ?></b></td>
                            <td><?= htmlspecialchars($row['contact_person']); ?></td>
                            <td>
                                <div><i class="fa-solid fa-phone text-gold"></i> <?= htmlspecialchars($row['phone']); ?></div>
                                <div style="font-size:0.8rem; color:#64748B;"><i class="fa-solid fa-envelope"></i> <?= htmlspecialchars($row['email']); ?></div>
                            </td>
                            <td><span class="badge badge-pending"><?= htmlspecialchars($row['required_workers']); ?> Workers</span></td>
                            <td><b><?= htmlspecialchars($row['job_type']); ?></b></td>
                            <td style="max-width: 250px; font-size: 0.85rem; color: #475569;"><?= htmlspecialchars($row['message'] ?: 'N/A'); ?></td>
                            <td style="font-size: 0.8rem; color: #94A3B8;"><?= date('M d, Y', strtotime($row['created_at'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <!-- Candidates Content -->
    <div id="candidatesSection" class="table-responsive" style="display: none;">
        <h3><i class="fa-solid fa-user-check text-gold"></i> Candidate Registrations</h3>
        <p style="color: #64748B; font-size: 0.88rem; margin-bottom: 20px;">Job seekers registered for employment placement.</p>

        <?php if (empty($candidates)): ?>
            <p style="padding: 20px; text-align: center; color: #94A3B8;">No candidate registrations received yet.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Contact Details</th>
                        <th>Location</th>
                        <th>Qualification</th>
                        <th>Experience</th>
                        <th>Target Job</th>
                        <th>Resume</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($candidates as $cand): ?>
                        <tr>
                            <td>#<?= $cand['id']; ?></td>
                            <td><b><?= htmlspecialchars($cand['full_name']); ?></b></td>
                            <td>
                                <div><i class="fa-solid fa-phone text-gold"></i> <?= htmlspecialchars($cand['phone']); ?></div>
                                <div style="font-size:0.8rem; color:#64748B;"><?= htmlspecialchars($cand['email']); ?></div>
                            </td>
                            <td><?= htmlspecialchars($cand['location']); ?></td>
                            <td><?= htmlspecialchars($cand['qualification']); ?></td>
                            <td><span class="badge badge-success"><?= htmlspecialchars($cand['experience']); ?></span></td>
                            <td><b><?= htmlspecialchars($cand['job_category']); ?></b></td>
                            <td>
                                <?php if (!empty($cand['resume_path'])): ?>
                                    <a href="../<?= htmlspecialchars($cand['resume_path']); ?>" target="_blank" class="btn btn-navy" style="padding: 4px 10px; font-size: 0.75rem;">
                                        <i class="fa-solid fa-file-arrow-down"></i> View Resume
                                    </a>
                                <?php else: ?>
                                    <span style="color: #94A3B8; font-size: 0.8rem;">No File</span>
                                <?php endif; ?>
                            </td>
                            <td style="font-size: 0.8rem; color: #94A3B8;"><?= date('M d, Y', strtotime($cand['created_at'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</main>

<script>
    function showTab(tab) {
        document.getElementById('enquiriesSection').style.display = tab === 'enquiries' ? 'block' : 'none';
        document.getElementById('candidatesSection').style.display = tab === 'candidates' ? 'block' : 'none';
        
        document.getElementById('tabEnquiry').classList.toggle('active', tab === 'enquiries');
        document.getElementById('tabCandidate').classList.toggle('active', tab === 'candidates');
    }
</script>

</body>
</html>
