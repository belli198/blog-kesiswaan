// ===== NAVBAR SCROLL =====
const navbar = document.querySelector('.navbar');
window.addEventListener('scroll', () => {
    navbar && navbar.classList.toggle('scrolled', window.scrollY > 50);
    const btn = document.querySelector('.back-to-top');
    btn && btn.classList.toggle('show', window.scrollY > 400);
});

// ===== HAMBURGER MENU =====
const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('.nav-links');
const overlay = document.querySelector('.mobile-overlay');
let scrollPos = 0;
function openMenu() {
    scrollPos = window.scrollY;
    hamburger.classList.add('active');
    navLinks.classList.add('active');
    overlay && overlay.classList.add('active');
    document.body.classList.add('menu-open');
    document.body.style.top = `-${scrollPos}px`;
}
function closeMenu() {
    hamburger.classList.remove('active');
    navLinks.classList.remove('active');
    overlay && overlay.classList.remove('active');
    document.body.classList.remove('menu-open');
    document.body.style.top = '';
    window.scrollTo(0, scrollPos);
}
if (hamburger) {
    hamburger.addEventListener('click', () => {
        navLinks.classList.contains('active') ? closeMenu() : openMenu();
    });
    overlay && overlay.addEventListener('click', closeMenu);
    navLinks.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', closeMenu);
    });
}


// ===== SCROLL ANIMATIONS =====
const observerOptions = { threshold: 0.1, rootMargin: '0px 0px -50px 0px' };
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);
document.querySelectorAll('.fade-up, .fade-left').forEach(el => observer.observe(el));

// ===== COUNTER ANIMATION =====
function animateCounters() {
    document.querySelectorAll('[data-count]').forEach(el => {
        const target = parseInt(el.dataset.count);
        const duration = 2000;
        const increment = target / (duration / 16);
        let current = 0;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) { el.textContent = target; clearInterval(timer); }
            else el.textContent = Math.floor(current);
        }, 16);
    });
}
const counterSection = document.querySelector('.hero-stats, .stats-section');
if (counterSection) {
    const cObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) { animateCounters(); cObserver.unobserve(entry.target); }
        });
    }, { threshold: 0.5 });
    cObserver.observe(counterSection);
}

// ===== TABS =====
document.querySelectorAll('.tab-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        const group = btn.closest('.tabs-wrapper');
        if (!group) return;
        group.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        group.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
        btn.classList.add('active');
        const target = document.getElementById(btn.dataset.tab);
        if (target) target.classList.add('active');
    });
});

// ===== FILTER TABS =====
document.querySelectorAll('.filter-tab').forEach(tab => {
    tab.addEventListener('click', () => {
        const group = tab.closest('.filter-tabs');
        group.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        const filter = tab.dataset.filter;
        const cards = tab.closest('.section, main').querySelectorAll('[data-category]');
        cards.forEach(card => {
            if (filter === 'Semua' || card.dataset.category === filter) {
                card.style.display = '';
                card.style.animation = 'fadeIn .4s ease';
            } else {
                card.style.display = 'none';
            }
        });
    });
});

// ===== LIGHTBOX =====
const lightbox = document.getElementById('lightbox');
const lightboxImg = document.getElementById('lightbox-img');
let galleryImages = [];
let currentImageIndex = 0;

document.querySelectorAll('.gallery-item').forEach((item, index) => {
    galleryImages.push(item.querySelector('img').src);
    item.addEventListener('click', () => {
        currentImageIndex = index;
        openLightbox(galleryImages[index]);
    });
});

function openLightbox(src) {
    if (!lightbox || !lightboxImg) return;
    lightboxImg.src = src;
    lightbox.classList.add('active');
    document.body.style.overflow = 'hidden';
}
function closeLightbox() {
    if (!lightbox) return;
    lightbox.classList.remove('active');
    document.body.style.overflow = '';
}
function navigateLightbox(dir) {
    currentImageIndex = (currentImageIndex + dir + galleryImages.length) % galleryImages.length;
    if (lightboxImg) lightboxImg.src = galleryImages[currentImageIndex];
}

if (lightbox) {
    document.querySelector('.lightbox-close')?.addEventListener('click', closeLightbox);
    document.querySelector('.lightbox-prev')?.addEventListener('click', () => navigateLightbox(-1));
    document.querySelector('.lightbox-next')?.addEventListener('click', () => navigateLightbox(1));
    lightbox.addEventListener('click', e => { if (e.target === lightbox) closeLightbox(); });
    document.addEventListener('keydown', e => {
        if (!lightbox.classList.contains('active')) return;
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowLeft') navigateLightbox(-1);
        if (e.key === 'ArrowRight') navigateLightbox(1);
    });
}

// ===== BACK TO TOP =====
document.querySelector('.back-to-top')?.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

// ===== FADE IN KEYFRAME =====
if (!document.querySelector('#fade-keyframe')) {
    const style = document.createElement('style');
    style.id = 'fade-keyframe';
    style.textContent = '@keyframes fadeIn{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:translateY(0)}}';
    document.head.appendChild(style);
}

// ===== DARK MODE =====
const themeToggle = document.getElementById('theme-toggle');
const iconSun = document.querySelector('.icon-sun');
const iconMoon = document.querySelector('.icon-moon');

// Check saved theme or system preference
const savedTheme = localStorage.getItem('theme');
const systemPrefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;

if (savedTheme === 'dark' || (!savedTheme && systemPrefersDark)) {
    document.documentElement.setAttribute('data-theme', 'dark');
    if (iconSun && iconMoon) {
        iconSun.style.display = 'block';
        iconMoon.style.display = 'none';
    }
}

if (themeToggle) {
    themeToggle.addEventListener('click', () => {
        const currentTheme = document.documentElement.getAttribute('data-theme');
        if (currentTheme === 'dark') {
            document.documentElement.removeAttribute('data-theme');
            localStorage.setItem('theme', 'light');
            if (iconSun && iconMoon) {
                iconSun.style.display = 'none';
                iconMoon.style.display = 'block';
            }
        } else {
            document.documentElement.setAttribute('data-theme', 'dark');
            localStorage.setItem('theme', 'dark');
            if (iconSun && iconMoon) {
                iconSun.style.display = 'block';
                iconMoon.style.display = 'none';
            }
        }
    });
}

// ===== PAGE TRANSITION =====
document.addEventListener('DOMContentLoaded', () => {
    document.body.classList.add('fade-in');
    
    const transitionEl = document.querySelector('.page-transition');
    const links = document.querySelectorAll('a[href]:not([target="_blank"]):not([href^="#"]):not([href^="mailto:"]):not([href^="tel:"])');
    
    links.forEach(link => {
        link.addEventListener('click', e => {
            // Check if it's the same page
            if (link.hostname === window.location.hostname && link.pathname === window.location.pathname && link.search === window.location.search) {
                return;
            }
            
            e.preventDefault();
            const target = link.href;
            
            if (transitionEl) {
                transitionEl.classList.add('active');
                setTimeout(() => {
                    window.location.href = target;
                }, 400); // Wait for transition
            } else {
                window.location.href = target;
            }
        });
    });
});

// ===== DRAG-TO-SCROLL FOR MOUSE ON CAROUSELS =====
document.querySelectorAll('.mobile-carousel').forEach(carousel => {
    let isDown = false;
    let startX;
    let scrollLeft;

    carousel.addEventListener('mousedown', (e) => {
        // Ignore if clicking on a link or button
        if (e.target.closest('a, button')) return;
        isDown = true;
        carousel.style.cursor = 'grabbing';
        startX = e.pageX - carousel.offsetLeft;
        scrollLeft = carousel.scrollLeft;
        e.preventDefault();
    });

    carousel.addEventListener('mouseleave', () => {
        isDown = false;
        carousel.style.cursor = 'grab';
    });

    carousel.addEventListener('mouseup', () => {
        isDown = false;
        carousel.style.cursor = 'grab';
    });

    carousel.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - carousel.offsetLeft;
        const walk = (x - startX) * 2;
        carousel.scrollLeft = scrollLeft - walk;
    });

    // Show grab cursor by default
    carousel.style.cursor = 'grab';
});
