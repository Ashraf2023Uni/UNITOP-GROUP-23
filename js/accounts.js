document.addEventListener('DOMContentLoaded', function() {
    var profileBtn = document.getElementById('showInfoBtn');
    var ordersBtn = document.getElementById('showOrdersBtn');
    var passwordBtn = document.getElementById('showPasswordBtn');
    
    profileBtn.addEventListener('click', function() {
        setActiveSection('profile');
    });
    
    ordersBtn.addEventListener('click', function() {
        setActiveSection('orders');
    });

    passwordBtn.addEventListener('click', function() {
        setActiveSection('changePassword');
    });

    function setActiveSection(sectionId) {
        document.querySelectorAll('.section').forEach(function(section) {
            section.style.display = 'none';
        });
        document.getElementById(sectionId).style.display = 'block';
    }
});
