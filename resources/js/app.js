import './bootstrap';
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import { initHeroWaveBackdrop } from './hero-wave';

// Powers the `x-collapse` accordions on the FAQ page and the homepage.
Alpine.plugin(collapse);

window.Alpine = Alpine;
Alpine.start();

// =========================================================================
// PREMIUM MOTION & INTERACTION ENGINE
// =========================================================================

const REVEAL_SELECTOR = '.reveal, .reveal-left, .reveal-right, .reveal-scale';

/**
 * Writes a counter's finished value straight to the element, with whatever
 * prefix and suffix it carries.
 */
function paintCounter(el, value) {
    const prefix = el.getAttribute('data-prefix') || '';
    const suffix = el.getAttribute('data-suffix') || '';

    el.innerText = prefix + value + suffix;
}

/**
 * Rolls a `[data-counter]` element up from zero. Re-entrant: if the element is
 * scrolled away from and back mid-count, the in-flight animation is abandoned
 * rather than racing the new one.
 */
function runCounter(el) {
    const target = parseFloat(el.getAttribute('data-counter'));
    if (Number.isNaN(target)) return;

    const duration = parseInt(el.getAttribute('data-duration'), 10) || 1400;
    const isDecimal = target % 1 !== 0;
    const run = (parseInt(el.dataset.counterRun, 10) || 0) + 1;
    el.dataset.counterRun = String(run);

    let startTime = null;

    const step = (timestamp) => {
        // A newer run claimed this element while we were mid-flight.
        if (el.dataset.counterRun !== String(run)) return;

        if (startTime === null) startTime = timestamp;

        const progress = Math.min((timestamp - startTime) / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3);
        const current = target * eased;

        paintCounter(el, isDecimal ? current.toFixed(1) : Math.floor(current));

        if (progress < 1) {
            requestAnimationFrame(step);
        } else {
            paintCounter(el, target);
        }
    };

    requestAnimationFrame(step);
}

document.addEventListener('DOMContentLoaded', () => {
    // 0. Hero 3D Particle Wave & Interactive Backdrop
    initHeroWaveBackdrop();

    const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const isDesktopPointer = window.matchMedia('(pointer: fine)').matches;

    const revealElements = Array.from(document.querySelectorAll(REVEAL_SELECTOR));
    const counterElements = Array.from(document.querySelectorAll('[data-counter]'));

    // ---------------------------------------------------------------------
    // 1. Bidirectional scroll reveal
    // ---------------------------------------------------------------------
    if (prefersReduced) {
        // Leave every element in its default visible state and land the
        // counters on their final values without animating.
        counterElements.forEach((el) => paintCounter(el, el.getAttribute('data-counter')));
    } else {
        // Opting the document in is what arms the hidden start state in CSS,
        // so it happens only once we know we can animate back out of it.
        document.documentElement.setAttribute('data-reveal-ready', '');

        revealElements.forEach((el) => {
            const delay = parseInt(el.getAttribute('data-delay'), 10);
            if (delay) el.style.setProperty('--reveal-delay', `${delay}ms`);
        });

        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                const el = entry.target;

                if (entry.isIntersecting) {
                    el.classList.remove('is-above');
                    el.classList.add('is-visible');
                    return;
                }

                // Remember which edge it left through so it retreats that way
                // instead of always dropping back down through the fold.
                el.classList.toggle('is-above', entry.boundingClientRect.top < 0);
                el.classList.remove('is-visible');
            });
        }, {
            // Reveal once an element is a little way into view, and let it go
            // again shortly before it clears the top edge, so both halves of
            // the journey happen on screen where they can be seen.
            rootMargin: '-10% 0px -10% 0px',
            threshold: 0,
        });

        revealElements.forEach((el) => revealObserver.observe(el));

        // -----------------------------------------------------------------
        // 2. Numerical roll-up counters, replayed on every re-entry
        // -----------------------------------------------------------------
        if (counterElements.length > 0) {
            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        runCounter(entry.target);
                    } else {
                        // Reset to zero so the next pass rolls up again rather
                        // than snapping from the finished value.
                        entry.target.dataset.counterRun = String(
                            (parseInt(entry.target.dataset.counterRun, 10) || 0) + 1
                        );
                        paintCounter(entry.target, 0);
                    }
                });
            }, { threshold: 0.2 });

            counterElements.forEach((el) => counterObserver.observe(el));
        }
    }

    // ---------------------------------------------------------------------
    // 3. Spotlight Card Radial Hover Tracking
    // ---------------------------------------------------------------------
    if (!prefersReduced && isDesktopPointer) {
        document.querySelectorAll('.spotlight-card').forEach((card) => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                card.style.setProperty('--mouse-x', `${e.clientX - rect.left}px`);
                card.style.setProperty('--mouse-y', `${e.clientY - rect.top}px`);
            });
        });

        // 4. Subtle 3D Tilt Effect on Desktop Showcase ([data-tilt])
        document.querySelectorAll('[data-tilt]').forEach((item) => {
            item.addEventListener('mousemove', (e) => {
                const rect = item.getBoundingClientRect();
                const rotateX = ((e.clientY - rect.top - rect.height / 2) / (rect.height / 2)) * -3.5;
                const rotateY = ((e.clientX - rect.left - rect.width / 2) / (rect.width / 2)) * 3.5;
                item.style.transform = `perspective(1000px) rotateX(${rotateX.toFixed(2)}deg) rotateY(${rotateY.toFixed(2)}deg) scale3d(1.01, 1.01, 1.01)`;
            });

            item.addEventListener('mouseenter', () => {
                item.style.transition = 'transform 0.1s ease-out';
            });

            item.addEventListener('mouseleave', () => {
                item.style.transition = 'transform 0.5s cubic-bezier(0.16, 1, 0.3, 1)';
                item.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)';
            });
        });
    }
});
