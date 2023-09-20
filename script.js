// script.js
function toggleNav() {
    var nav = document.querySelector('nav.nav');

    if (window.innerWidth <= 1080) {
        nav.classList.toggle('active');
        nav.style.cursor = 'pointer'; // Change cursor to pointer
    } else {
        // Hide the hamburger icon on screens wider than 1080px
        nav.classList.remove('active');
        nav.style.cursor = 'default'; // Reset cursor to default
    }
}


// Add smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        const targetId = this.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);

        if (targetElement) {
            window.scrollTo({
                top: targetElement.offsetTop - 80, // Adjust this value to match your navbar's height
                behavior: 'smooth'
            });
        }
    });
});

//contact
function toggleContact(type) {
    const contact = document.querySelector('.contact');
    const email = contact.querySelector('p:nth-child(1)');
    const phone = contact.querySelector('p:nth-child(2)');
    const instagram = contact.querySelector('p:nth-child(3)');

    switch (type) {
        case 'email':
            email.style.display = 'block';
            phone.style.display = 'none';
            instagram.style.display = 'none';
            break;
        case 'phone':
            email.style.display = 'none';
            phone.style.display = 'block';
            instagram.style.display = 'none';
            break;
        case 'instagram':
            email.style.display = 'none';
            phone.style.display = 'none';
            instagram.style.display = 'block';
            break;
    }
}


//timer
(
    function () {
const second = 1000,
minute = second * 60,
hour = minute * 60,
day = hour * 24;

// Set the date and time of your one-time event
const eventDate = new Date('2023-09-30T23:59:59').getTime();

const x = setInterval(function () {
const now = new Date().getTime(),
distance = eventDate - now;

const daysElement = document.getElementById("days");
const hoursElement = document.getElementById("hours");
const minutesElement = document.getElementById("minutes");
const secondsElement = document.getElementById("seconds");

if (distance < 0) {
document.getElementById("headline").innerText = "Event Started!";
daysElement.innerText = "0";
hoursElement.innerText = "0";
minutesElement.innerText = "0";
secondsElement.innerText = "0";
clearInterval(x);
} else {
daysElement.innerText = Math.floor(distance / day);
hoursElement.innerText = Math.floor((distance % day) / hour);
minutesElement.innerText = Math.floor((distance % hour) / minute);
secondsElement.innerText = Math.floor((distance % minute) / second);
}
}, 1000);
}
)();

//popup in events
function openPopup(eventId) {
    document.getElementById(eventId + "-popup").style.display = "block";
}

function closePopup(eventId) {
    document.getElementById(eventId + "-popup").style.display = "none";
}
