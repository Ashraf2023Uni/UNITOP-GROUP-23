document.addEventListener('DOMContentLoaded', function() {
    var profileBtn = document.getElementById('showInfoBtn');
    var ordersBtn = document.getElementById('showOrdersBtn');
    var passwordBtn = document.getElementById('showPasswordBtn');
    
    var changePasswordForm = document.querySelector('form[action="' + window.location.pathname + '"]');
    
    profileBtn.addEventListener('click', function() {
        setActiveSection('profile');
    });
    
    ordersBtn.addEventListener('click', function() {
        setActiveSection('orders');
    });

    passwordBtn.addEventListener('click', function() {
        setActiveSection('changePassword');
    });

    changePasswordForm.addEventListener('submit', function(event) {
        var newPassword = document.getElementById('new_password').value;
        if (!validateNewPassword(newPassword)) {
            event.preventDefault(); // Prevent form from submitting
            alert('New password must be at least 8 characters long, include at least one uppercase character, and at least one number.');
        }
    });

    function setActiveSection(sectionId) {
        document.querySelectorAll('.section').forEach(function(section) {
            section.style.display = 'none';
        });
        document.getElementById(sectionId).style.display = 'block';
    }

    function validateNewPassword(password) {
        var minLength = 8;
        var upperCasePattern = /[A-Z]/;
        var numberPattern = /[0-9]/;
        return password.length >= minLength && upperCasePattern.test(password) && numberPattern.test(password);
    }
});