/**
 * GAM Developer Solution - Core JavaScript
 * Handles smooth scrolling, mobile nav, category pre-selection, AJAX form submissions & toast notifications.
 */

document.addEventListener('DOMContentLoaded', () => {

    // 1. Mobile Menu Toggle
    const mobileToggle = document.getElementById('mobileToggle');
    const navMenu = document.getElementById('navMenu');

    if (mobileToggle && navMenu) {
        mobileToggle.addEventListener('click', () => {
            navMenu.classList.toggle('show');
            const icon = mobileToggle.querySelector('i');
            if (icon) {
                icon.classList.toggle('fa-bars');
                icon.classList.toggle('fa-xmark');
            }
        });
    }

    // Close mobile nav when clicking a link
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', () => {
            if (navMenu && navMenu.classList.contains('show')) {
                navMenu.classList.remove('show');
                const icon = mobileToggle.querySelector('i');
                if (icon) {
                    icon.classList.add('fa-bars');
                    icon.classList.remove('fa-xmark');
                }
            }
        });
    });

    // 2. Job Card "Apply Now" Auto-Select & Smooth Scroll
    const applyButtons = document.querySelectorAll('.apply-job-btn');
    const jobCategorySelect = document.getElementById('jobCategorySelect');

    applyButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const category = this.getAttribute('data-category');
            
            // Scroll to Candidate Form section
            const targetSection = document.getElementById('candidate-registration');
            if (targetSection) {
                targetSection.scrollIntoView({ behavior: 'smooth' });
            }

            // Pre-select category dropdown
            if (jobCategorySelect && category) {
                for (let option of jobCategorySelect.options) {
                    if (option.value.toLowerCase() === category.toLowerCase() || option.text.toLowerCase().includes(category.toLowerCase())) {
                        option.selected = true;
                        break;
                    }
                }
                // Highlight input field momentarily
                jobCategorySelect.style.borderColor = '#C9A227';
                jobCategorySelect.style.boxShadow = '0 0 0 4px rgba(201, 162, 39, 0.3)';
                setTimeout(() => {
                    jobCategorySelect.style.borderColor = '';
                    jobCategorySelect.style.boxShadow = '';
                }, 2000);
            }
        });
    });

    // 3. File Input Label Updater
    const resumeInput = document.getElementById('resumeInput');
    const resumeLabel = document.getElementById('resumeLabel');

    if (resumeInput && resumeLabel) {
        resumeInput.addEventListener('change', (e) => {
            if (e.target.files.length > 0) {
                resumeLabel.textContent = `Selected File: ${e.target.files[0].name}`;
                resumeLabel.style.color = '#0B1F3A';
                resumeLabel.style.fontWeight = '700';
            }
        });
    }

    // 4. AJAX Submission: Candidate Registration Form
    const applyForm = document.getElementById('applyForm');
    if (applyForm) {
        applyForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;

            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Submitting Application...';

            const formData = new FormData(this);

            fetch('api/apply_job.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;

                if (data.status === 'success') {
                    showToast(data.message, 'success');
                    applyForm.reset();
                    if (resumeLabel) resumeLabel.textContent = 'Upload Resume (PDF, DOC, DOCX - Max 5MB)';
                } else {
                    showToast(data.message || 'Error submitting application.', 'error');
                }
            })
            .catch(err => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
                showToast('An unexpected error occurred. Please try again.', 'error');
            });
        });
    }

    // 5. AJAX Submission: Client Enquiry Form
    const enquiryForm = document.getElementById('enquiryForm');
    if (enquiryForm) {
        enquiryForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;

            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Sending Request...';

            const formData = new FormData(this);

            fetch('api/submit_enquiry.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;

                if (data.status === 'success') {
                    showToast(data.message, 'success');
                    enquiryForm.reset();
                } else {
                    showToast(data.message || 'Error submitting enquiry.', 'error');
                }
            })
            .catch(err => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
                showToast('An unexpected error occurred. Please try again.', 'error');
            });
        });
    }

    // 6. Toast Notification System
    function showToast(message, type = 'success') {
        let toast = document.createElement('div');
        toast.className = `toast-notification toast-${type}`;
        
        const icon = type === 'success' ? 'fa-circle-check' : 'fa-circle-exclamation';
        toast.innerHTML = `<i class="fa-solid ${icon}"></i> <span>${message}</span>`;
        
        document.body.appendChild(toast);

        setTimeout(() => {
            toast.classList.add('show');
        }, 100);

        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => {
                toast.remove();
            }, 400);
        }, 5000);
    }
});
