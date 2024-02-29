// Mohammed Sabil Ali Student ID: 220192905

// List of universities 
var universitiesList = [
    "Abertay University",
    "Aberystwyth University",
    "Anglia Ruskin University",
    "Arts University Bournemouth",
    "Arts University Plymouth",
    "Aston University",
    "Bangor University",
    "Bath Spa University",
    "Birkbeck, University of London",
    "Birmingham City University",
    "Birmingham Newman University",
    "Bishop Grosseteste University",
    "Bournemouth University",
    "BPP University",
    "Brunel University London",
    "Buckinghamshire New University",
    "Canterbury Christ Church University",
    "Cardiff Metropolitan University",
    "Cardiff University",
    "City, University of London",
    "Coventry University",
    "Cranfield University",
    "De Montfort University",
    "Durham University",
    "Edge Hill University",
    "Edinburgh Napier University",
    "European School of Economics",
    "Falmouth University",
    "Glasgow Caledonian University",
    "Goldsmiths, University of London",
    "Guildhall School of Music and Drama",
    "Harper Adams University",
    "Hartpury University and Hartpury College",
    "Heriot-Watt University",
    "Imperial College London",
    "Keele University",
    "King's College London",
    "Kingston University",
    "Lancaster University",
    "Leeds Arts University",
    "Leeds Beckett University",
    "Leeds Conservatoire",
    "Leeds Trinity University",
    "Liverpool Hope University",
    "Liverpool John Moores University",
    "Liverpool School of Tropical Medicine",
    "London Business School",
    "London Metropolitan University",
    "London School of Hygiene and Tropical Medicine, University of London",
    "London South Bank University",
    "Loughborough University",
    "Manchester Metropolitan University",
    "Middlesex University",
    "Newcastle University",
    "Northern School of Contemporary Dance",
    "Northumbria University",
    "Norwich University of the Arts",
    "Nottingham Trent University",
    "Oxford Brookes University",
    "Plymouth Marjon University",
    "Queen Margaret University",
    "Queen Mary University of London",
    "Queen's University Belfast",
    "Ravensbourne University London",
    "Regent's University London",
    "Richmond, The American International University in London",
    "Robert Gordon University",
    "Rose Bruford College",
    "Royal College of Art",
    "Royal College of Music",
    "Royal Conservatoire of Scotland",
    "Royal Holloway, University of London",
    "Royal Northern College of Music",
    "School of Advanced Study, University of London",
    "Scotland's Rural College",
    "Sheffield Hallam University",
    "SOAS, University of London",
    "Solent University",
    "St George's, University of London",
    "St Mary's University, Twickenham",
    "Staffordshire University",
    "Swansea University",
    "Teesside University",
    "The Courtauld Institute of Art, University of London",
    "The Glasgow School of Art",
    "The Liverpool Institute for Performing Arts",
    "The London Institute of Banking and Finance",
    "The London School of Economics and Political Science",
    "The Royal Academy of Music, University of London",
    "The Royal Agricultural University",
    "The Royal Central School of Speech and Drama",
    "The Royal Veterinary College University of London",
    "The University of Law",
    "The University of Northampton",
    "The University of York",
    "Trinity Laban Conservatoire of Music and Dance",
    "Ulster University",
    "University College Birmingham",
    "University College London",
    "University for the Creative Arts",
    "University of Aberdeen",
    "University of Bath",
    "University of Bedfordshire",
    "University of Birmingham",
    "University of Bolton",
    "University of Bradford",
    "University of Brighton",
    "University of Bristol",
    "University of Buckingham",
    "University of Cambridge",
    "University of Central Lancashire",
    "University of Chester",
    "University of Chichester",
    "University of Cumbria",
    "University of Derby",
    "University of Dundee",
    "University of East Anglia",
    "University of East London",
    "University of Edinburgh",
    "University of Essex",
    "University of Exeter",
    "University of Glasgow",
    "University of Gloucestershire",
    "University of Greenwich",
    "University of Hertfordshire",
    "University of Huddersfield",
    "University of Hull",
    "University of Kent",
    "University of Leeds",
    "University of Leicester",
    "University of Lincoln",
    "University of Liverpool",
    "University of London",
    "University of Manchester",
    "University of Nottingham",
    "University of Oxford",
    "University of Plymouth",
    "University of Portsmouth",
    "University of Reading",
    "University of Roehampton",
    "University of Salford",
    "University of Sheffield",
    "University of South Wales",
    "University of Southampton",
    "University of St Andrews",
    "University of Stirling",
    "University of Strathclyde",
    "University of Suffolk",
    "University of Sunderland",
    "University of Surrey",
    "University of Sussex",
    "University of the Arts London",
    "University of the Highlands and Islands",
    "University of the West of England",
    "University of the West of England",
    "University of the West of Scotland",
    "University of Wales",
    "University of Wales Trinity Saint David",
    "University of Warwick",
    "University of West London",
    "University of Westminster",
    "University of Winchester",
    "University of Wolverhampton",
    "University of Worcester",
    "Wrexham Glyndwr University",
    "Writtle University College",
    "York St John University",



];

document.getElementById('registrationForm').addEventListener('submit', function(event) {
    var email = document.getElementById('Email').value;
    if (!/.+@.+\.ac\.uk$/.test(email)) {
        alert('Email must end with .ac.uk');
        event.preventDefault(); // STOPS form submission
    }
});

var universitiesDatalist = document.getElementById("universities");
universitiesList.forEach(function (university) {
    var option = document.createElement("option");
    option.value = university;
    universitiesDatalist.appendChild(option);
});

document.getElementById('phoneNumber').addEventListener('input', function(event) {
    this.value = this.value.replace(/[^\d]/g, ''); // Remove any non-numeric characters
});

function validatePasswordRequirements() {
    var password = document.getElementById("password").value;
    var regex = /^(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/; // Regex pattern
    
    if (!regex.test(password)) {
        alert("Password must be at least 8 characters long, contain at least one uppercase letter, and include numbers.");
        return false;
    }
    return true;
}

// event listener
document.getElementById('registrationForm').addEventListener('submit', function(event) {
    if (!validatePasswordRequirements()) {
        event.preventDefault(); // Prevent form submission
    }
});

// js for validating passwords
function validatePassword() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    var passwordError = document.getElementById("passwordError");
    var passwordMatch = document.getElementById("passwordMatch");

    if (password !== confirmPassword) {
        passwordError.textContent = "Passwords do not match!";
        passwordMatch.textContent = "";
        return false; // Prevent form submission
    } else {
        passwordError.textContent = "";
        passwordMatch.textContent = "Passwords match!";
        return true; // Allow form submission
    }
}
// js for pop up message for password
document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const errorMessage = urlParams.get('error');

    if (errorMessage === 'password_mismatch') {
        alert('Passwords do not match. Please try again.');
    } else if (errorMessage === 'duplicate_entry') {
        alert('The email or phone number is already in use. Please try again.');
    } else if (errorMessage === 'invalid_data') {
        alert('Invalid data provided. Please check your input.');
    }
});
// js for pop up if email or number are in database already
document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const errorMessage = urlParams.get('error');

    if (errorMessage === 'duplicate_entry') {
        alert('The email or phone number is already in use. Please try again.');
    }
});

// OLD JS FOR PASSWORD VALIDATION
//function validatePassword() {
   // var password = document.getElementById("password").value;
    //var confirmPassword = document.getElementById("confirmPassword").value;
    //var passwordError = document.getElementById("passwordError");
   // var passwordMatch = document.getElementById("passwordMatch");

   // if (password !== confirmPassword) {
   //     passwordError.textContent = "Passwords do not match!";
   //     passwordMatch.textContent = "";
   // } else {
   //     passwordError.textContent = "";
   //     passwordMatch.textContent = "Passwords match!";
   //// }
//}