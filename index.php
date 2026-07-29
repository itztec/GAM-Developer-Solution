<?php
require_once __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAM Developer Solutions | Manpower Supply & Workforce Recruitment Solutions</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="GAM Developer Solutions - Leading international manpower supply and workforce recruitment agency. Supplying skilled, semi-skilled, and unskilled labor for construction, manufacturing, corporate, and healthcare sectors.">
    <meta name="keywords" content="Manpower Supply, Workforce Recruitment, Staffing Agency, Skilled Labour, Unskilled Labour, GAM Developer Solutions, Employment Services">
    <meta name="author" content="GAM Developer Solutions">

    <!-- FontAwesome & Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- Top Mini Bar -->
    <div class="top-bar">
        <div class="container top-bar-content">
            <div class="top-info">
                <div class="top-info-item">
                    <i class="fa-solid fa-envelope"></i>
                    <span>contact@gamdevelopersolution.com</span>
                </div>
                <div class="top-info-item">
                    <i class="fa-solid fa-phone"></i>
                    <span>+1 (800) 555-MANPOWER / +1 555-0199</span>
                </div>
                <div class="top-info-item">
                    <i class="fa-solid fa-clock"></i>
                    <span>Mon - Sat: 8:00 AM - 6:00 PM</span>
                </div>
            </div>
            <div class="top-social">
                <a href="https://facebook.com" target="_blank" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="https://linkedin.com" target="_blank" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="https://wa.me/15550199" target="_blank" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                <a href="admin/login.php" title="Admin Portal" style="margin-left: 10px; background: rgba(201,162,39,0.2); color: var(--color-gold); border: 1px solid var(--color-gold);"><i class="fa-solid fa-user-lock"></i></a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <header class="main-header" id="mainHeader">
        <div class="container navbar">
            <a href="index.php" class="brand-logo">
                <img src="assets/images/logo.png" alt="GAM Developer Solutions Logo" class="brand-logo-img">
                <div class="brand-text">
                    <span class="brand-name">GAM Developer Solutions</span>
                    <span class="brand-tagline">Connecting Talent With Opportunities</span>
                </div>
            </a>

            <nav class="nav-menu" id="navMenu">
                <a href="#hero" class="nav-link active">Home</a>
                <a href="#about" class="nav-link">About Us</a>
                <a href="#services" class="nav-link">Services</a>
                <a href="#industries" class="nav-link">Sectors</a>
                <a href="#jobs" class="nav-link">Job Openings</a>
                <a href="#client-enquiry" class="nav-link">Contact</a>
            </nav>

            <div class="nav-actions">
                <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- 1. Hero Section -->
    <section class="hero-section" id="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-badge">
                    <i class="fa-solid fa-star"></i> Connecting Talent With Opportunities
                </div>
                <h1 class="hero-title">Reliable Manpower & Workforce Solutions</h1>
                <p class="hero-description">
                    GAM Developer Solutions connects ambitious businesses with verified skilled, semi-skilled, and corporate talent worldwide.
                </p>
                <div class="hero-buttons">
                    <a href="#client-enquiry" class="btn btn-gold">
                        <i class="fa-solid fa-users-gear"></i> Find Workers
                    </a>
                    <a href="#candidate-registration" class="btn btn-outline-white">
                        <i class="fa-solid fa-user-plus"></i> Apply For Job
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. About Our Company -->
    <section class="section" id="about">
        <div class="container">
            <div class="about-grid">
                <div class="about-image-wrapper">
                    <img src="assets/images/about-us.jpg" alt="GAM Developer Solutions Workforce Team" class="about-image">
                    <div class="about-experience-card">
                        <div class="exp-years">12+</div>
                        <div class="exp-text">Years of Recruitment Excellence</div>
                    </div>
                </div>

                <div class="about-content">
                    <span class="section-subtitle">Who We Are</span>
                    <h2 class="section-title">GAM Developer Solutions</h2>
                    <p class="section-description" style="margin-bottom: 20px;">
                        GAM Developer Solutions is a premier manpower supply and recruitment company providing comprehensive skilled, semi-skilled, and unskilled workforce solutions tailored for dynamic global industries.
                    </p>
                    <p style="color: var(--color-text-muted); font-size: 0.98rem; line-height: 1.7;">
                        We help businesses scale seamlessly by discovering, screening, and deploying top-tier talent, while empowering job candidates to achieve fulfilling career opportunities across international markets.
                    </p>

                    <div class="about-highlights">
                        <div class="highlight-box">
                            <div class="highlight-icon"><i class="fa-solid fa-user-tie"></i></div>
                            <div class="highlight-title">Experienced Recruitment Team</div>
                            <div class="highlight-desc">Seasoned HR experts dedicated to matching exact skill profiles.</div>
                        </div>

                        <div class="highlight-box">
                            <div class="highlight-icon"><i class="fa-solid fa-user-check"></i></div>
                            <div class="highlight-title">Verified Candidates</div>
                            <div class="highlight-desc">100% background-checked, credential-tested personnel.</div>
                        </div>

                        <div class="highlight-box">
                            <div class="highlight-icon"><i class="fa-solid fa-bolt"></i></div>
                            <div class="highlight-title">Fast Workforce Deployment</div>
                            <div class="highlight-desc">Rapid turnaround times to fulfill critical operational demands.</div>
                        </div>

                        <div class="highlight-box">
                            <div class="highlight-icon"><i class="fa-solid fa-handshake"></i></div>
                            <div class="highlight-title">Reliable Service</div>
                            <div class="highlight-desc">Transparent compliance, contract management, and ongoing support.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Our Services -->
    <section class="section section-bg-light" id="services">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle">Tailored Workforce Solutions</span>
                <h2 class="section-title">Our Core Services</h2>
                <div class="section-header-divider"></div>
                <p class="section-description">End-to-end recruitment, staffing, and manpower management engineered for business efficiency.</p>
            </div>

            <div class="services-grid">
                <!-- Service 1 -->
                <div class="service-card">
                    <div class="service-card-header">
                        <div class="service-icon-circle"><i class="fa-solid fa-users"></i></div>
                        <h3 class="service-card-title">Workforce Supply</h3>
                    </div>
                    <div class="service-card-body">
                        <p class="service-card-desc">Providing trained manpower according to precise company requirements and operational specifications.</p>
                        <a href="#client-enquiry" class="service-card-link">Request Workforce <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="service-card">
                    <div class="service-card-header">
                        <div class="service-icon-circle"><i class="fa-solid fa-screwdriver-wrench"></i></div>
                        <h3 class="service-card-title">Skilled Labour Recruitment</h3>
                    </div>
                    <div class="service-card-body">
                        <p class="service-card-desc">Certified electricians, technicians, heavy equipment operators, supervisors, and specialized tradesmen.</p>
                        <a href="#client-enquiry" class="service-card-link">Hire Skilled Staff <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="service-card">
                    <div class="service-card-header">
                        <div class="service-icon-circle"><i class="fa-solid fa-boxes-packing"></i></div>
                        <h3 class="service-card-title">Unskilled Labour Supply</h3>
                    </div>
                    <div class="service-card-body">
                        <p class="service-card-desc">General warehouse workers, helpers, loaders, construction support staff, and maintenance labor.</p>
                        <a href="#client-enquiry" class="service-card-link">Request Helpers <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Service 4 -->
                <div class="service-card">
                    <div class="service-card-header">
                        <div class="service-icon-circle"><i class="fa-solid fa-building-user"></i></div>
                        <h3 class="service-card-title">Corporate Staffing Solution</h3>
                    </div>
                    <div class="service-card-body">
                        <p class="service-card-desc">Providing administrative employees, front-desk executives, sales specialists, and office personnel.</p>
                        <a href="#client-enquiry" class="service-card-link">Corporate Hiring <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Service 5 -->
                <div class="service-card">
                    <div class="service-card-header">
                        <div class="service-icon-circle"><i class="fa-solid fa-file-contract"></i></div>
                        <h3 class="service-card-title">Contract Staffing</h3>
                    </div>
                    <div class="service-card-body">
                        <p class="service-card-desc">Flexible temporary and long-term workforce management to optimize labor costs and project deadlines.</p>
                        <a href="#client-enquiry" class="service-card-link">Manage Contracts <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Service 6 -->
                <div class="service-card">
                    <div class="service-card-header">
                        <div class="service-icon-circle"><i class="fa-solid fa-magnifying-glass-chart"></i></div>
                        <h3 class="service-card-title">Recruitment Services</h3>
                    </div>
                    <div class="service-card-body">
                        <p class="service-card-desc">Comprehensive candidate sourcing, technical screening, interview scheduling, and placement support.</p>
                        <a href="#client-enquiry" class="service-card-link">Placement Support <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Industries We Serve ("Sectors We Support") -->
    <section class="section" id="industries">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle">Sectors We Support</span>
                <h2 class="section-title">Industries We Serve</h2>
                <div class="section-header-divider"></div>
                <p class="section-description">Delivering qualified manpower for diverse key industrial and commercial domains.</p>
            </div>

            <div class="industries-grid">
                <div class="industry-card">
                    <div class="industry-icon"><i class="fa-solid fa-helmet-safety"></i></div>
                    <h3 class="industry-title">Construction</h3>
                </div>

                <div class="industry-card">
                    <div class="industry-icon"><i class="fa-solid fa-industry"></i></div>
                    <h3 class="industry-title">Manufacturing</h3>
                </div>

                <div class="industry-card">
                    <div class="industry-icon"><i class="fa-solid fa-heart-pulse"></i></div>
                    <h3 class="industry-title">Healthcare</h3>
                </div>

                <div class="industry-card">
                    <div class="industry-icon"><i class="fa-solid fa-hotel"></i></div>
                    <h3 class="industry-title">Hospitality</h3>
                </div>

                <div class="industry-card">
                    <div class="industry-icon"><i class="fa-solid fa-truck-ramp-box"></i></div>
                    <h3 class="industry-title">Logistics</h3>
                </div>

                <div class="industry-card">
                    <div class="industry-icon"><i class="fa-solid fa-user-shield"></i></div>
                    <h3 class="industry-title">Security Services</h3>
                </div>

                <div class="industry-card">
                    <div class="industry-icon"><i class="fa-solid fa-laptop-code"></i></div>
                    <h3 class="industry-title">IT & Corporate Offices</h3>
                </div>

                <div class="industry-card">
                    <div class="industry-icon"><i class="fa-solid fa-store"></i></div>
                    <h3 class="industry-title">Retail</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Job Opportunities Section -->
    <section class="section section-bg-light" id="jobs">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle">Join Our Talent Network</span>
                <h2 class="section-title">Find Your Next Career Opportunity</h2>
                <div class="section-header-divider"></div>
                <p class="section-description">Explore active job vacancies across major job categories and apply today.</p>
            </div>

            <div class="jobs-grid">
                <!-- Job 1 -->
                <div class="job-card">
                    <div class="job-icon"><i class="fa-solid fa-shield-cat"></i></div>
                    <h3 class="job-card-title">Security Guard</h3>
                    <span class="job-badge">Full-time / Shift</span>
                    <button class="btn btn-gold apply-job-btn" data-category="Security Guard">Apply Now</button>
                </div>

                <!-- Job 2 -->
                <div class="job-card">
                    <div class="job-icon"><i class="fa-solid fa-gears"></i></div>
                    <h3 class="job-card-title">Factory Worker</h3>
                    <span class="job-badge">Industrial</span>
                    <button class="btn btn-gold apply-job-btn" data-category="Factory Worker">Apply Now</button>
                </div>

                <!-- Job 3 -->
                <div class="job-card">
                    <div class="job-icon"><i class="fa-solid fa-truck-steering"></i></div>
                    <h3 class="job-card-title">Driver</h3>
                    <span class="job-badge">Heavy & Light</span>
                    <button class="btn btn-gold apply-job-btn" data-category="Driver">Apply Now</button>
                </div>

                <!-- Job 4 -->
                <div class="job-card">
                    <div class="job-icon"><i class="fa-solid fa-wrench"></i></div>
                    <h3 class="job-card-title">Technician</h3>
                    <span class="job-badge">Mechanical / HVAC</span>
                    <button class="btn btn-gold apply-job-btn" data-category="Technician">Apply Now</button>
                </div>

                <!-- Job 5 -->
                <div class="job-card">
                    <div class="job-icon"><i class="fa-solid fa-bolt-lightning"></i></div>
                    <h3 class="job-card-title">Electrician</h3>
                    <span class="job-badge">Certified</span>
                    <button class="btn btn-gold apply-job-btn" data-category="Electrician">Apply Now</button>
                </div>

                <!-- Job 6 -->
                <div class="job-card">
                    <div class="job-icon"><i class="fa-solid fa-user-group"></i></div>
                    <h3 class="job-card-title">Office Staff</h3>
                    <span class="job-badge">Admin & Front Desk</span>
                    <button class="btn btn-gold apply-job-btn" data-category="Office Staff">Apply Now</button>
                </div>

                <!-- Job 7 -->
                <div class="job-card">
                    <div class="job-icon"><i class="fa-solid fa-chart-line"></i></div>
                    <h3 class="job-card-title">Sales Executive</h3>
                    <span class="job-badge">Corporate Sales</span>
                    <button class="btn btn-gold apply-job-btn" data-category="Sales Executive">Apply Now</button>
                </div>

                <!-- Job 8 -->
                <div class="job-card">
                    <div class="job-icon"><i class="fa-solid fa-hand-holding-hand"></i></div>
                    <h3 class="job-card-title">Helper</h3>
                    <span class="job-badge">General Assistant</span>
                    <button class="btn btn-gold apply-job-btn" data-category="Helper">Apply Now</button>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. Candidate Registration Section -->
    <section class="section" id="candidate-registration">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle">Quick Registration</span>
                <h2 class="section-title">Candidate Application Form</h2>
                <div class="section-header-divider"></div>
                <p class="section-description">Submit your details and upload your resume to be matched with leading employers.</p>
            </div>

            <div class="form-wrapper">
                <form id="applyForm" enctype="multipart/form-data">
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label" for="candName">Full Name *</label>
                            <input type="text" id="candName" name="full_name" class="form-input" placeholder="e.g. John Doe" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="candPhone">Phone Number *</label>
                            <input type="tel" id="candPhone" name="phone" class="form-input" placeholder="e.g. +1 555 123 4567" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="candEmail">Email Address *</label>
                            <input type="email" id="candEmail" name="email" class="form-input" placeholder="e.g. john@example.com" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="candLocation">Current Location *</label>
                            <input type="text" id="candLocation" name="location" class="form-input" placeholder="City, Country" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="candQualification">Qualification *</label>
                            <select id="candQualification" name="qualification" class="form-select" required>
                                <option value="" disabled selected>Select Highest Qualification</option>
                                <option value="High School">High School</option>
                                <option value="Diploma / ITI">Diploma / ITI Technical</option>
                                <option value="Bachelor Degree">Bachelor's Degree</option>
                                <option value="Master Degree">Master's Degree</option>
                                <option value="Other">Other / Practical Skills</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="candExperience">Total Experience *</label>
                            <select id="candExperience" name="experience" class="form-select" required>
                                <option value="" disabled selected>Select Work Experience</option>
                                <option value="Fresher">Fresher / No Experience</option>
                                <option value="1-2 Years">1 - 2 Years</option>
                                <option value="3-5 Years">3 - 5 Years</option>
                                <option value="5+ Years">5+ Years</option>
                            </select>
                        </div>

                        <div class="form-group full-width">
                            <label class="form-label" for="jobCategorySelect">Target Job Category *</label>
                            <select id="jobCategorySelect" name="job_category" class="form-select" required>
                                <option value="" disabled selected>Select Desired Position</option>
                                <option value="Security Guard">Security Guard</option>
                                <option value="Factory Worker">Factory Worker</option>
                                <option value="Driver">Driver</option>
                                <option value="Technician">Technician</option>
                                <option value="Electrician">Electrician</option>
                                <option value="Office Staff">Office Staff</option>
                                <option value="Sales Executive">Sales Executive</option>
                                <option value="Helper">Helper / General Worker</option>
                                <option value="Other Industry">Other Industry Category</option>
                            </select>
                        </div>

                        <div class="form-group full-width">
                            <label class="form-label">Upload Resume / CV (Optional)</label>
                            <div class="file-input-wrapper">
                                <i class="fa-solid fa-cloud-arrow-up" style="font-size: 2rem; color: var(--color-gold); margin-bottom: 8px;"></i>
                                <div id="resumeLabel" style="font-size: 0.9rem; color: var(--color-text-muted);">
                                    Click or Drag file to upload (PDF, DOC, DOCX - Max 5MB)
                                </div>
                                <input type="file" id="resumeInput" name="resume" accept=".pdf,.doc,.docx">
                            </div>
                        </div>
                    </div>

                    <div style="margin-top: 30px; text-align: center;">
                        <button type="submit" class="btn btn-gold btn-full" style="max-width: 400px;">
                            <i class="fa-solid fa-paper-plane"></i> Submit Application
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Global Reach Network Visual (Inspired by reference screenshot) -->
    <section class="global-section">
        <div class="container">
            <span class="section-subtitle" style="color: var(--color-gold);">Global Footprint</span>
            <h2 class="section-title" style="color: #FFF; margin-bottom: 15px;">International Manpower Network</h2>
            <p style="color: #CBD5E1; max-width: 700px; margin: 0 auto 30px auto;">
                Connecting global corporate clients with high-caliber manpower across international boundaries.
            </p>

            <div class="global-tags">
                <span class="global-tag"><i class="fa-solid fa-earth-americas"></i> North America</span>
                <span class="global-tag"><i class="fa-solid fa-earth-europe"></i> Europe</span>
                <span class="global-tag"><i class="fa-solid fa-earth-asia"></i> Middle East & Gulf</span>
                <span class="global-tag"><i class="fa-solid fa-earth-asia"></i> Asia Pacific</span>
            </div>
        </div>
    </section>

    <!-- 9. Client Enquiry Section -->
    <section class="section section-bg-light" id="client-enquiry">
        <div class="container">
            <div class="section-header">
                <span class="section-subtitle">Get In Touch</span>
                <h2 class="section-title">Client Workforce Enquiry</h2>
                <div class="section-header-divider"></div>
                <p class="section-description">Request manpower staffing solutions tailored specifically for your organization.</p>
            </div>

            <div class="enquiry-layout">
                <div class="enquiry-info">
                    <h3 class="font-serif" style="font-size: 1.6rem; color: var(--color-gold); margin-bottom: 15px;">Partner With Us</h3>
                    <p style="color: #CBD5E1; font-size: 0.95rem; line-height: 1.6;">
                        Whether you need 5 skilled technicians or 200 general workers, GAM Developer Solutions provides fast, reliable, and compliant staffing services.
                    </p>

                    <div class="info-item">
                        <div class="info-icon"><i class="fa-solid fa-location-dot"></i></div>
                        <div>
                            <div style="font-weight: 700;">Global Headquarters</div>
                            <div style="color: #94A3B8; font-size: 0.88rem;">100 Corporate Plaza, Executive Avenue, Suite 400</div>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon"><i class="fa-solid fa-headset"></i></div>
                        <div>
                            <div style="font-weight: 700;">Direct Recruitment Desk</div>
                            <div style="color: #94A3B8; font-size: 0.88rem;">+1 (800) 555-MANPOWER / enquiry@gamdevelopersolution.com</div>
                        </div>
                    </div>

                    <!-- Interactive Google Map Embed -->
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.83543450937!2d144.9537353153166!3d-37.81627977975171!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2s!4v1620000000000!5m2!1sen!2s" loading="lazy" title="Office Location Map"></iframe>
                    </div>
                </div>

                <div class="form-wrapper">
                    <form id="enquiryForm">
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label" for="compName">Company Name *</label>
                                <input type="text" id="compName" name="company_name" class="form-input" placeholder="e.g. Apex Logistics Corp" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="contPerson">Contact Person Name *</label>
                                <input type="text" id="contPerson" name="contact_person" class="form-input" placeholder="e.g. Robert Smith" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="compPhone">Phone Number *</label>
                                <input type="tel" id="compPhone" name="phone" class="form-input" placeholder="e.g. +1 555 987 6543" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="compEmail">Corporate Email *</label>
                                <input type="email" id="compEmail" name="email" class="form-input" placeholder="e.g. robert@apexlogistics.com" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="reqWorkers">Required Workers Count *</label>
                                <input type="number" id="reqWorkers" name="required_workers" class="form-input" min="1" value="10" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="jobTypeSelect">Job Category / Type *</label>
                                <select id="jobTypeSelect" name="job_type" class="form-select" required>
                                    <option value="" disabled selected>Select Required Workforce Type</option>
                                    <option value="Skilled Labour">Skilled Labour (Electricians, Technicians, Operators)</option>
                                    <option value="Unskilled Labour">Unskilled Labour (Helpers, Loaders, Support)</option>
                                    <option value="Corporate Staffing">Corporate & Office Staffing</option>
                                    <option value="Contract Staffing">Contract Staffing Management</option>
                                    <option value="Executive Recruitment">Executive / Managerial Recruitment</option>
                                </select>
                            </div>

                            <div class="form-group full-width">
                                <label class="form-label" for="enqMessage">Workforce Requirements & Details</label>
                                <textarea id="enqMessage" name="message" class="form-textarea" rows="4" placeholder="Briefly describe your project requirements, duration, and worker specifications..."></textarea>
                            </div>
                        </div>

                        <div style="margin-top: 24px;">
                            <button type="submit" class="btn btn-gold btn-full">
                                <i class="fa-solid fa-paper-plane"></i> Submit Client Enquiry
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- 10. Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <div class="brand-logo">
                        <img src="assets/images/logo.png" alt="GAM Developer Solutions Logo" class="brand-logo-img">
                        <div class="brand-text">
                            <span class="brand-name">GAM Developer Solutions</span>
                            <span class="brand-tagline">Manpower Supply & Workforce Solutions</span>
                        </div>
                    </div>
                    <p class="footer-brand-desc">
                        GAM Developer Solutions is a trusted workforce recruitment and manpower supply agency connecting companies with verified skilled, semi-skilled, and general labor personnel worldwide.
                    </p>
                    <div class="top-social">
                        <a href="https://facebook.com" target="_blank" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://linkedin.com" target="_blank" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="https://wa.me/15550199" target="_blank" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>

                <div>
                    <h3 class="footer-title">Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="#hero"><i class="fa-solid fa-chevron-right text-gold"></i> Home</a></li>
                        <li><a href="#about"><i class="fa-solid fa-chevron-right text-gold"></i> About Us</a></li>
                        <li><a href="#services"><i class="fa-solid fa-chevron-right text-gold"></i> Our Services</a></li>
                        <li><a href="#jobs"><i class="fa-solid fa-chevron-right text-gold"></i> Job Opportunities</a></li>
                        <li><a href="#client-enquiry"><i class="fa-solid fa-chevron-right text-gold"></i> Client Contact</a></li>
                        <li><a href="admin/login.php"><i class="fa-solid fa-chevron-right text-gold"></i> Admin Portal</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="footer-title">Services</h3>
                    <ul class="footer-links">
                        <li><a href="#services"><i class="fa-solid fa-chevron-right text-gold"></i> Workforce Supply</a></li>
                        <li><a href="#services"><i class="fa-solid fa-chevron-right text-gold"></i> Skilled Labour</a></li>
                        <li><a href="#services"><i class="fa-solid fa-chevron-right text-gold"></i> Unskilled Labour</a></li>
                        <li><a href="#services"><i class="fa-solid fa-chevron-right text-gold"></i> Corporate Staffing</a></li>
                        <li><a href="#services"><i class="fa-solid fa-chevron-right text-gold"></i> Contract Staffing</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="footer-title">Contact Info</h3>
                    <div style="font-size: 0.9rem; line-height: 1.8;">
                        <p><i class="fa-solid fa-location-dot text-gold"></i> Executive Avenue, Suite 400, Global City</p>
                        <p><i class="fa-solid fa-phone text-gold"></i> +1 (800) 555-MANPOWER</p>
                        <p><i class="fa-solid fa-envelope text-gold"></i> info@gamdevelopersolution.com</p>
                        <p><i class="fa-solid fa-globe text-gold"></i> www.gamdevelopersolution.com</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container footer-bottom-content">
                <div>
                    &copy; <?= date('Y'); ?> <b>GAM Developer Solutions</b>. All Rights Reserved. Manpower Supply & Recruitment Agency.
                </div>
                <div>
                    Built with Excellence | ISO Compliant Manpower Partner
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Action Button -->
    <a href="https://wa.me/15550199?text=Hello%20GAM%20Developer%20Solution,%20I%20am%20interested%20in%20your%20manpower%20supply%20services." class="whatsapp-float" target="_blank" aria-label="Chat on WhatsApp">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

    <!-- Main JavaScript File -->
    <script src="assets/js/main.js"></script>

</body>
</html>
