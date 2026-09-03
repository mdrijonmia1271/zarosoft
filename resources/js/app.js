import './bootstrap';
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import { animate } from 'motion';
import { initHeroWaveBackdrop } from './hero-wave';

// Powers the `x-collapse` accordions on the FAQ page and the homepage.
Alpine.plugin(collapse);

window.Alpine = Alpine;
Alpine.start();

// =========================================================================
// PREMIUM MOTION & INTERACTION ENGINE (Physics Springs + Safe Reveals)
// =========================================================================

document.addEventListener('DOMContentLoaded', () => {
    // 0. Hero 3D Particle Wave & Interactive Backdrop
    initHeroWaveBackdrop();

    const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const isDesktopPointer = window.matchMedia('(pointer: fine)').matches;

    // 1. Safe Scroll-Reveal Engine
    const revealElements = document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-scale');
    
    if (prefersReduced) {
        revealElements.forEach(el => {
            el.classList.add('revealed');
            el.style.opacity = '1';
            el.style.transform = 'none';
        });
    } else {
        const windowHeight = window.innerHeight || document.documentElement.clientHeight;

        revealElements.forEach(el => {
            const rect = el.getBoundingClientRect();
            // If element is already in the viewport on load (Hero section, top badges), animate in immediately
            if (rect.top < windowHeight * 0.95 && rect.bottom > 0) {
                const delay = (parseInt(el.getAttribute('data-delay')) || 0) / 1000;
                
                let transformProp = { opacity: [0, 1], y: [16, 0] };
                if (el.classList.contains('reveal-left')) {
                    transformProp = { opacity: [0, 1], x: [-20, 0] };
                } else if (el.classList.contains('reveal-right')) {
                    transformProp = { opacity: [0, 1], x: [20, 0] };
                } else if (el.classList.contains('reveal-scale')) {
                    transformProp = { opacity: [0, 1], scale: [0.96, 1] };
                }

                animate(el, transformProp, { duration: 0.55, delay, easing: [0.16, 1, 0.3, 1] });
                el.classList.add('revealed');
            } else {
                // For elements below viewport, mark with motion-init and observe
                el.classList.add('motion-init');
            }
        });

        // Observe elements that are below the fold
        const pendingElements = document.querySelectorAll('.motion-init');
        if (pendingElements.length > 0) {
            const observer = new IntersectionObserver((entries, obs) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const target = entry.target;
                        const delay = (parseInt(target.getAttribute('data-delay')) || 0) / 1000;
                        
                        let transformProp = { opacity: [0, 1], y: [18, 0] };
                        if (target.classList.contains('reveal-left')) {
                            transformProp = { opacity: [0, 1], x: [-20, 0] };
                        } else if (target.classList.contains('reveal-right')) {
                            transformProp = { opacity: [0, 1], x: [20, 0] };
                        } else if (target.classList.contains('reveal-scale')) {
                            transformProp = { opacity: [0, 1], scale: [0.96, 1] };
                        }

                        animate(target, transformProp, { duration: 0.55, delay, easing: [0.16, 1, 0.3, 1] });
                        target.classList.add('revealed');
                        target.classList.remove('motion-init');
                        obs.unobserve(target);
                    }
                });
            }, {
                rootMargin: '0px 0px 80px 0px', // Trigger smoothly before entering screen
                threshold: 0.05
            });

            pendingElements.forEach(el => observer.observe(el));
        }

        // Safety fallback: after 2.5s, reveal any un-animated elements just in case
        setTimeout(() => {
            document.querySelectorAll('.motion-init').forEach(el => {
                el.classList.remove('motion-init');
                el.classList.add('revealed');
                el.style.opacity = '1';
                el.style.transform = 'none';
            });
        }, 2500);
    }

    // 2. Numerical Roll-Up Counters
    const counterElements = document.querySelectorAll('[data-counter]');
    if (prefersReduced) {
        counterElements.forEach((target) => {
            const endVal = target.getAttribute('data-counter');
            target.innerText = (target.getAttribute('data-prefix') || '') + endVal + (target.getAttribute('data-suffix') || '');
        });
    } else if (counterElements.length > 0) {
        const counterObserver = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = entry.target;
                    obs.unobserve(target);
                    
                    const endVal = parseFloat(target.getAttribute('data-counter'));
                    const suffix = target.getAttribute('data-suffix') || '';
                    const prefix = target.getAttribute('data-prefix') || '';
                    const duration = parseInt(target.getAttribute('data-duration')) || 1200;
                    const isDecimal = endVal % 1 !== 0;

                    let startTime = null;
                    const animateCounter = (timestamp) => {
                        if (!startTime) startTime = timestamp;
                        const progress = Math.min((timestamp - startTime) / duration, 1);
                        const easeProgress = 1 - Math.pow(1 - progress, 3);
                        const currentVal = endVal * easeProgress;

                        target.innerText = prefix + (isDecimal ? currentVal.toFixed(1) : Math.floor(currentVal)) + suffix;

                        if (progress < 1) {
                            requestAnimationFrame(animateCounter);
                        } else {
                            target.innerText = prefix + endVal + suffix;
                        }
                    };
                    requestAnimationFrame(animateCounter);
                }
            });
        }, { threshold: 0.1 });

        counterElements.forEach(el => counterObserver.observe(el));
    }

    // 3. Spotlight Card Radial Hover Tracking
    if (!prefersReduced && isDesktopPointer) {
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

        // 4. Subtle 3D Tilt Effect on Desktop Showcase ([data-tilt])
        const tiltElements = document.querySelectorAll('[data-tilt]');
        tiltElements.forEach(item => {
            item.addEventListener('mousemove', (e) => {
                const rect = item.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                // Max tilt 3.5 degrees for premium subtle feel
                const rotateX = ((y - centerY) / centerY) * -3.5;
                const rotateY = ((x - centerX) / centerX) * 3.5;
                item.style.transform = `perspective(1000px) rotateX(${rotateX.toFixed(2)}deg) rotateY(${rotateY.toFixed(2)}deg) scale3d(1.01, 1.01, 1.01)`;
            });

            item.addEventListener('mouseleave', () => {
                item.style.transform = `perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)`;
                item.style.transition = 'transform 0.5s cubic-bezier(0.16, 1, 0.3, 1)';
            });

            item.addEventListener('mouseenter', () => {
                item.style.transition = 'transform 0.1s ease-out';
            });
        });
    }
});





