import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// =========================================================================
// INTERACTIVE ANIMATIONS ENGINE (Continuous Multi-Scroll & Re-Trigger)
// =========================================================================

document.addEventListener('DOMContentLoaded', () => {
    // 1. Scroll-Reveal Observer with Continuous Re-trigger on Every Up/Down Scroll (Fast & Responsive)
    const revealElements = document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-scale');
    if (revealElements.length > 0) {
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                const target = entry.target;
                if (entry.isIntersecting) {
                    const delay = parseInt(target.getAttribute('data-delay')) || 0;
                    if (delay > 0) {
                        setTimeout(() => {
                            if (entry.isIntersecting) {
                                target.classList.add('revealed');
                            }
                        }, delay * 0.6);
                    } else {
                        target.classList.add('revealed');
                    }
                } else {
                    // Remove revealed class only when fully scrolled away (soft reset)
                    target.classList.remove('revealed');
                }
            });
        }, {
            threshold: 0.08,
            rootMargin: '0px 0px -40px 0px'
        });

        revealElements.forEach(el => revealObserver.observe(el));
    }

    // 2. Animated Number Counter Observer (Snappy & Smooth Rollup)
    const counterElements = document.querySelectorAll('[data-counter]');
    if (counterElements.length > 0) {
        const runningCounters = new WeakMap();

        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                const target = entry.target;
                const endVal = parseFloat(target.getAttribute('data-counter'));
                const suffix = target.getAttribute('data-suffix') || '';
                const prefix = target.getAttribute('data-prefix') || '';
                const duration = parseInt(target.getAttribute('data-duration')) || 1200;
                const isDecimal = endVal % 1 !== 0;

                if (entry.isIntersecting) {
                    // Cancel any previous in-flight animation frame if re-triggered
                    if (runningCounters.has(target)) {
                        cancelAnimationFrame(runningCounters.get(target));
                    }

                    let startTime = null;
                    const animateCounter = (timestamp) => {
                        if (!startTime) startTime = timestamp;
                        const progress = Math.min((timestamp - startTime) / duration, 1);
                        // Ease out cubic
                        const easeProgress = 1 - Math.pow(1 - progress, 3);
                        const currentVal = endVal * easeProgress;

                        target.innerText = prefix + (isDecimal ? currentVal.toFixed(1) : Math.floor(currentVal)) + suffix;

                        if (progress < 1) {
                            const rafId = requestAnimationFrame(animateCounter);
                            runningCounters.set(target, rafId);
                        } else {
                            target.innerText = prefix + endVal + suffix;
                            runningCounters.delete(target);
                        }
                    };

                    const rafId = requestAnimationFrame(animateCounter);
                    runningCounters.set(target, rafId);
                } else {
                    // Reset to 0 when scrolled out of view
                    if (runningCounters.has(target)) {
                        cancelAnimationFrame(runningCounters.get(target));
                        runningCounters.delete(target);
                    }
                    target.innerText = prefix + '0' + suffix;
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '80px 0px 80px 0px'
        });

        counterElements.forEach(el => counterObserver.observe(el));
    }

    // 3. Spotlight Card Mouse Coordinates
    const spotlightCards = document.querySelectorAll('.spotlight-card');
    spotlightCards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            card.style.setProperty('--mouse-x', `${x}px`);
            card.style.setProperty('--mouse-y', `${y}px`);
        });
    });

    // 4. Subtle 3D Tilt Effect on Elements with data-tilt
    const tiltElements = document.querySelectorAll('[data-tilt]');
    tiltElements.forEach(item => {
        item.addEventListener('mousemove', (e) => {
            const rect = item.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            const rotateX = ((y - centerY) / centerY) * -7;
            const rotateY = ((x - centerX) / centerX) * 7;
            item.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(1.02, 1.02, 1.02)`;
        });

        item.addEventListener('mouseleave', () => {
            item.style.transform = `perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)`;
            item.style.transition = 'transform 0.5s ease';
        });

        item.addEventListener('mouseenter', () => {
            item.style.transition = 'transform 0.1s ease';
        });
    });
});
