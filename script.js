// script.js

function toggleNav() {
    var nav = document.querySelector('nav.nav');
    nav.classList.toggle('active');
}

// Add smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        const targetId = this.getAttribute('href').substring(1);
        const target = document.getElementById(targetId);

        if (target) {
            window.scrollTo({
                top: target.offsetTop,
                behavior: 'smooth'
            });
        }
    });
});

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
