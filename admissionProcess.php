<?php include('header.php'); ?>

<div class="container mt-5 text-center">
    <h2 class="mb-4">Admission Process</h2>
    <div class="d-flex justify-content-center">
        <div class="timeline">
            <div class="timeline-item" id="step1">
                <h4>Step 1: Apply Online</h4>
                <p>Fill out the application form on our website.</p>
            </div>
            <div class="timeline-item" id="step2">
                <h4>Step 2: Take Entrance Test</h4>
                <p>Appear for the required entrance examination.</p>
            </div>
            <div class="timeline-item" id="step3">
                <h4>Step 3: Get Selected</h4>
                <p>Shortlisted candidates will receive a confirmation email.</p>
            </div>
            <div class="timeline-item" id="step4">
                <h4>Step 4: Appear for Counseling</h4>
                <p>Attend the counseling session and select your course.</p>
            </div>
            <div class="timeline-item" id="step5">
                <h4>Step 5: Get Admission</h4>
                <p>Complete documentation and fee payment to secure your admission.</p>
            </div>
        </div>
    </div>
</div>

<style>
    .timeline {
        position: relative;
        width: 50%;
    }
    .timeline-item {
        position: relative;
        padding: 20px;
        margin-bottom: 20px;
        background: #f8f9fa;
        border-radius: 10px;
        animation: fadeInUp 1s ease-in-out;
    }
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<?php include('footer.php'); ?>