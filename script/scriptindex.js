const toggle = document.getElementById('toggle');
const nav = document.getElementById('nav');

toggle.addEventListener('click', () => {
    nav.classList.toggle('active');
});


var dropdownTimer;

function showDropdown() {
    clearTimeout(dropdownTimer);
    document.getElementById("dropdownContent").style.display = "block";
}

function hideDropdown() {
    dropdownTimer = setTimeout(function () {
        document.getElementById("dropdownContent").style.display = "none";
    }, 500); // Set the delay time in milliseconds (e.g., 500 for 0.5 seconds)
}