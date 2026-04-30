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
if (hamburger) {
    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        navLinks.classList.toggle('active');
        overlay && overlay.classList.toggle('active');
        document.body.style.overflow = navLinks.classList.contains('active') ? 'hidden' : '';
    });
    overlay && overlay.addEventListener('click', () => {
        hamburger.classList.remove('active');
        navLinks.classList.remove('active');
        overlay.classList.remove('active');
        document.body.style.overflow = '';
    });
    navLinks.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            hamburger.classList.remove('active');
            navLinks.classList.remove('active');
            overlay && overlay.classList.remove('active');
            document.body.style.overflow = '';
        });
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
