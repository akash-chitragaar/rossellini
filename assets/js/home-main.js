// Navbar scroll effect with throttling for better mobile performance
let ticking = false;
window.addEventListener('scroll', function() {
    if (!ticking) {
        window.requestAnimationFrame(function() {
            const navbar = document.querySelector('.navbar');
            if (navbar) {
                if (window.scrollY > 50) {
                    navbar.style.padding = '0.5rem 0';
                    navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.2)';
                } else {
                    navbar.style.padding = '1rem 0';
                    navbar.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.1)';
                }
            }
            ticking = false;
        });
        ticking = true;
    }
}, { passive: true });

// Smooth scroll for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            const navbarHeight = document.querySelector('.navbar').offsetHeight;
            const targetPosition = target.offsetTop - navbarHeight;
            
            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
            
            // Close mobile menu if open
            const navbarCollapse = document.querySelector('.navbar-collapse');
            if (navbarCollapse.classList.contains('show')) {
                navbarCollapse.classList.remove('show');
            }
        }
    });
});

// Animate elements on scroll
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Observe all cards and sections
document.addEventListener('DOMContentLoaded', function() {
    const animatedElements = document.querySelectorAll('.menu-card, .feature-card, .testimonial-card');
    
    animatedElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
});

// Active navigation link highlight with throttling
let navTicking = false;
window.addEventListener('scroll', function() {
    if (!navTicking) {
        window.requestAnimationFrame(function() {
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('.nav-link');
            
            let current = '';
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (window.pageYOffset >= (sectionTop - 200)) {
                    current = section.getAttribute('id');
                }
            });
            
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + current) {
                    link.classList.add('active');
                }
            });
            navTicking = false;
        });
        navTicking = true;
    }
}, { passive: true });

// Lazy load images
if ('loading' in HTMLImageElement.prototype) {
    const images = document.querySelectorAll('img[loading="lazy"]');
    images.forEach(img => {
        img.src = img.dataset.src || img.src;
    });
} else {
    // Fallback for browsers that don't support lazy loading
    const script = document.createElement('script');
    script.src = 'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js';
    document.body.appendChild(script);
}

// Phone number click tracking (optional analytics)
document.querySelectorAll('a[href^="tel:"]').forEach(link => {
    link.addEventListener('click', function() {
        console.log('Phone number clicked:', this.href);
        // Add your analytics tracking code here if needed
    });
});

// Order button click tracking (optional analytics)
document.querySelectorAll('.btn-order, .btn-primary').forEach(button => {
    if (button.href && button.href.includes('ser.vi')) {
        button.addEventListener('click', function() {
            console.log('Order button clicked:', this.href);
            // Add your analytics tracking code here if needed
        });
    }
});

// Add loading animation for images
document.addEventListener('DOMContentLoaded', function() {
    const images = document.querySelectorAll('img');
    images.forEach(img => {
        if (!img.complete) {
            img.style.opacity = '0';
            img.addEventListener('load', function() {
                this.style.transition = 'opacity 0.3s ease';
                this.style.opacity = '1';
            });
        }
    });
});

// Back to top button (optional - can be added)
const backToTopButton = document.createElement('button');
backToTopButton.innerHTML = '<i class="bi bi-arrow-up"></i>';
backToTopButton.className = 'back-to-top';
backToTopButton.setAttribute('aria-label', 'Back to top');
backToTopButton.style.cssText = `
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: #ff7a5c;
    color: white;
    border: none;
    cursor: pointer;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease, transform 0.3s ease, visibility 0.3s ease;
    z-index: 1000;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
`;

document.body.appendChild(backToTopButton);

let backToTopTicking = false;
window.addEventListener('scroll', function() {
    if (!backToTopTicking) {
        window.requestAnimationFrame(function() {
            if (window.scrollY > 300) {
                backToTopButton.style.opacity = '1';
                backToTopButton.style.visibility = 'visible';
                backToTopButton.style.transform = 'scale(1)';
            } else {
                backToTopButton.style.opacity = '0';
                backToTopButton.style.visibility = 'hidden';
                backToTopButton.style.transform = 'scale(0.8)';
            }
            backToTopTicking = false;
        });
        backToTopTicking = true;
    }
}, { passive: true });

backToTopButton.addEventListener('click', function() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

// Only add hover effects on non-touch devices
if (window.matchMedia('(hover: hover)').matches) {
    backToTopButton.addEventListener('mouseenter', function() {
        this.style.transform = 'scale(1.1)';
        this.style.background = '#c1150b';
    });

    backToTopButton.addEventListener('mouseleave', function() {
        this.style.transform = 'scale(1)';
        this.style.background = '#ff7a5c';
    });
}

// Mobile-specific: Adjust button position on small screens
function adjustBackToTopButton() {
    if (window.innerWidth <= 576) {
        backToTopButton.style.bottom = '15px';
        backToTopButton.style.right = '15px';
        backToTopButton.style.width = '45px';
        backToTopButton.style.height = '45px';
        backToTopButton.style.fontSize = '1.1rem';
    } else {
        backToTopButton.style.bottom = '20px';
        backToTopButton.style.right = '20px';
        backToTopButton.style.width = '50px';
        backToTopButton.style.height = '50px';
        backToTopButton.style.fontSize = '1.25rem';
    }
}

adjustBackToTopButton();
window.addEventListener('resize', adjustBackToTopButton);

