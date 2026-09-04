/**
 * Zarosoft High-Performance 3D Particle Wave & Autonomous Network Plexus Engine
 * Features:
 * - Undulating 3D neural particle wave mesh with depth perspective
 * - Autonomous Network Nodes with Dynamic Triangulation (Constellation Plexus Motion)
 * - Inter-node dynamic laser data lines & packet flow
 * - Ambient floating data sparkles
 * - Pure autonomous background (Mouse/cursor interaction disabled for zero-distraction UX)
 * - Battery-friendly auto-pause on scroll (IntersectionObserver)
 */

export function initHeroWaveBackdrop() {
    const canvas = document.getElementById('hero-particle-wave-canvas');
    if (!canvas) return;

    const heroSection = document.getElementById('hero-section') || canvas.closest('section');
    const ctx = canvas.getContext('2d');
    if (!ctx) return;

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    let width = 0;
    let height = 0;
    let dpr = 1;

    // 1. 3D Wave Grid configuration
    const cols = 58;
    const rows = 28;
    const spacingX = 40;
    const spacingZ = 36;
    let points = [];

    // 2. Autonomous Network Plexus Nodes
    const networkNodeCount = 50;
    let networkNodes = [];

    // 3. Traveling Network Packets
    const maxPackets = 12;
    let packets = [];

    // Animation state
    let animationFrameId = null;
    let isVisible = true;
    let startTime = performance.now();

    // Ambient floating sparkle nodes
    const sparkCount = 28;
    let sparks = [];

    function initNetworkNodes() {
        networkNodes = [];
        for (let i = 0; i < networkNodeCount; i++) {
            networkNodes.push({
                x: Math.random() * (width || 1200),
                y: Math.random() * (height || 540),
                vx: (Math.random() - 0.5) * 0.55,
                vy: (Math.random() - 0.5) * 0.45,
                radius: Math.random() * 2.0 + 1.8,
                pulseOffset: Math.random() * Math.PI * 2,
                color: Math.random() > 0.35 ? '#00D2FF' : '#38BDF8',
            });
        }
    }

    function initSparks() {
        sparks = [];
        for (let i = 0; i < sparkCount; i++) {
            sparks.push({
                x: Math.random() * width,
                y: Math.random() * height,
                size: Math.random() * 2 + 0.8,
                speedY: -(Math.random() * 0.35 + 0.15),
                speedX: (Math.random() - 0.5) * 0.25,
                opacity: Math.random() * 0.7 + 0.2,
                pulseOffset: Math.random() * Math.PI * 2,
                color: Math.random() > 0.4 ? '#00D2FF' : '#38BDF8',
            });
        }
    }

    function spawnPacket() {
        if (networkNodes.length < 2 || packets.length >= maxPackets) return;
        const sourceIdx = Math.floor(Math.random() * networkNodes.length);
        let targetIdx = Math.floor(Math.random() * networkNodes.length);
        if (sourceIdx === targetIdx) targetIdx = (sourceIdx + 1) % networkNodes.length;

        const p1 = networkNodes[sourceIdx];
        const p2 = networkNodes[targetIdx];
        if (Math.hypot(p1.x - p2.x, p1.y - p2.y) < 160) {
            packets.push({
                sourceIdx,
                targetIdx,
                progress: 0,
                speed: Math.random() * 0.02 + 0.015,
                color: '#00D2FF'
            });
        }
    }

    function resize() {
        if (!heroSection) return;
        const rect = heroSection.getBoundingClientRect();
        width = rect.width || window.innerWidth;
        height = rect.height || 540;
        dpr = Math.min(window.devicePixelRatio || 1, 2);

        canvas.width = Math.floor(width * dpr);
        canvas.height = Math.floor(height * dpr);
        canvas.style.width = `${width}px`;
        canvas.style.height = `${height}px`;

        ctx.setTransform(1, 0, 0, 1, 0, 0);
        ctx.scale(dpr, dpr);

        if (networkNodes.length === 0) {
            initNetworkNodes();
        } else {
            networkNodes.forEach(node => {
                if (node.x > width) node.x = Math.random() * width;
                if (node.y > height) node.y = Math.random() * height;
            });
        }

        initSparks();

        if (prefersReducedMotion) {
            renderFrame(1000);
        }
    }

    function initPoints() {
        points = [];
        const totalWidth = (cols - 1) * spacingX;

        for (let r = 0; r < rows; r++) {
            const rowPoints = [];
            for (let c = 0; c < cols; c++) {
                const x = c * spacingX - totalWidth / 2;
                const z = r * spacingZ + 60;
                rowPoints.push({
                    baseX: x,
                    baseZ: z,
                    x: x,
                    y: 0,
                    z: z,
                    screenX: 0,
                    screenY: 0,
                    scale: 0,
                    alpha: 0
                });
            }
            points.push(rowPoints);
        }
    }

    function renderFrame(now) {
        if (!isVisible && !prefersReducedMotion) return;

        const time = (now - startTime) * 0.001;

        ctx.clearRect(0, 0, width, height);

        // Fixed Stable Camera Projection (No Mouse Tilt / No Cursor Shift)
        const focalLength = 320;
        const cameraY = -140;
        const cameraZ = -100;
        const originX = width / 2;
        const originY = height * 0.70;

        // 1. Calculate 3D points & 2D Screen Projections for the base wave mesh
        for (let r = 0; r < rows; r++) {
            for (let c = 0; c < cols; c++) {
                const pt = points[r][c];
                const x = pt.baseX;
                const z = pt.baseZ;

                let waveY = 0;
                waveY += Math.sin(x * 0.0035 + time * 1.5) * Math.cos(z * 0.0038 + time * 0.8) * 55;
                waveY += Math.sin((x * 0.0025 - z * 0.0032) + time * 1.25) * 30;
                waveY += Math.sin(x * 0.007 + time * 2.2) * 12;

                const flankFactor = Math.pow(Math.abs(x) / (cols * spacingX * 0.48), 2.2);
                waveY += Math.sin(x * 0.0045 + time * 1.0) * flankFactor * 42;

                pt.y = waveY;

                const relZ = z - cameraZ;
                if (relZ <= 0) continue;

                const scale = focalLength / relZ;
                pt.scale = scale;
                pt.screenX = originX + x * scale;
                pt.screenY = originY + (waveY - cameraY) * scale;

                const depthFactor = 1 - Math.min(Math.max((z - 60) / (rows * spacingZ), 0), 1);
                const elevationBoost = Math.max((waveY + 60) / 120, 0.1);
                pt.alpha = Math.min(Math.max(depthFactor * (0.35 + elevationBoost * 0.65), 0.03), 0.98);
            }
        }

        // 2. Draw 3D Base Wave Lattice Lines
        for (let r = 0; r < rows; r++) {
            ctx.beginPath();
            let started = false;
            for (let c = 0; c < cols; c++) {
                const pt = points[r][c];
                if (pt.screenX < -50 || pt.screenX > width + 50 || pt.screenY < -50 || pt.screenY > height + 50) {
                    started = false;
                    continue;
                }
                if (!started) {
                    ctx.moveTo(pt.screenX, pt.screenY);
                    started = true;
                } else {
                    ctx.lineTo(pt.screenX, pt.screenY);
                }
            }
            const rowAlpha = Math.max(0.03, (1 - r / rows) * 0.20);
            ctx.strokeStyle = `rgba(0, 210, 255, ${rowAlpha})`;
            ctx.lineWidth = Math.max(0.65, (1 - r / rows) * 1.15);
            ctx.stroke();
        }

        for (let c = 0; c < cols; c += 2) {
            ctx.beginPath();
            let started = false;
            for (let r = 0; r < rows; r++) {
                const pt = points[r][c];
                if (pt.screenX < -50 || pt.screenX > width + 50 || pt.screenY < -50 || pt.screenY > height + 50) {
                    started = false;
                    continue;
                }
                if (!started) {
                    ctx.moveTo(pt.screenX, pt.screenY);
                    started = true;
                } else {
                    ctx.lineTo(pt.screenX, pt.screenY);
                }
            }
            ctx.strokeStyle = `rgba(0, 123, 255, 0.12)`;
            ctx.lineWidth = 0.65;
            ctx.stroke();
        }

        // 3. Draw Base 3D Wave Dots
        for (let r = 0; r < rows; r++) {
            for (let c = 0; c < cols; c++) {
                const pt = points[r][c];
                if (pt.screenX < 0 || pt.screenX > width || pt.screenY < 0 || pt.screenY > height) {
                    continue;
                }

                const radius = Math.max(0.85, pt.scale * 2.8);
                const alpha = pt.alpha;
                const isHighlighted = pt.y > 15;
                const fillStyle = isHighlighted
                    ? `rgba(0, 210, 255, ${alpha})`
                    : `rgba(56, 189, 248, ${alpha * 0.85})`;

                ctx.beginPath();
                ctx.arc(pt.screenX, pt.screenY, radius, 0, Math.PI * 2);
                ctx.fillStyle = fillStyle;
                ctx.fill();

                if (isHighlighted && pt.scale > 0.45 && alpha > 0.35) {
                    ctx.beginPath();
                    ctx.arc(pt.screenX, pt.screenY, radius * 2.4, 0, Math.PI * 2);
                    ctx.fillStyle = `rgba(0, 210, 255, ${alpha * 0.25})`;
                    ctx.fill();
                }
            }
        }

        // =========================================================================
        // 4. AUTONOMOUS NETWORK PLEXUS & TRIANGULATION (কনেকশন ট্রায়াঙ্গেল)
        // =========================================================================
        for (let i = 0; i < networkNodes.length; i++) {
            const node = networkNodes[i];

            // Ambient smooth autonomous drift
            node.x += node.vx;
            node.y += node.vy;

            // Screen boundary bounce
            if (node.x < 10) { node.x = 10; node.vx = Math.abs(node.vx); }
            if (node.x > width - 10) { node.x = width - 10; node.vx = -Math.abs(node.vx); }
            if (node.y < 10) { node.y = 10; node.vy = Math.abs(node.vy); }
            if (node.y > height - 10) { node.y = height - 10; node.vy = -Math.abs(node.vy); }
        }

        const maxConnectDist = 135;

        // Triangles between autonomous Network Nodes
        for (let i = 0; i < networkNodes.length; i++) {
            const p1 = networkNodes[i];

            for (let j = i + 1; j < networkNodes.length; j++) {
                const p2 = networkNodes[j];
                const d12 = Math.hypot(p1.x - p2.x, p1.y - p2.y);

                if (d12 < maxConnectDist) {
                    for (let k = j + 1; k < networkNodes.length; k++) {
                        const p3 = networkNodes[k];
                        const d23 = Math.hypot(p2.x - p3.x, p2.y - p3.y);
                        const d31 = Math.hypot(p3.x - p1.x, p3.y - p1.y);

                        if (d23 < maxConnectDist && d31 < maxConnectDist) {
                            const avgDist = (d12 + d23 + d31) / 3;
                            const triAlpha = Math.pow(1 - avgDist / maxConnectDist, 1.4) * 0.22;

                            ctx.beginPath();
                            ctx.moveTo(p1.x, p1.y);
                            ctx.lineTo(p2.x, p2.y);
                            ctx.lineTo(p3.x, p3.y);
                            ctx.closePath();

                            ctx.fillStyle = `rgba(0, 210, 255, ${triAlpha * 0.18})`;
                            ctx.fill();

                            ctx.strokeStyle = `rgba(0, 210, 255, ${triAlpha * 0.65})`;
                            ctx.lineWidth = 0.85;
                            ctx.stroke();
                        }
                    }

                    // Connecting line edge
                    const edgeAlpha = Math.pow(1 - d12 / maxConnectDist, 1.3) * 0.45;
                    ctx.beginPath();
                    ctx.moveTo(p1.x, p1.y);
                    ctx.lineTo(p2.x, p2.y);
                    ctx.strokeStyle = `rgba(56, 189, 248, ${edgeAlpha})`;
                    ctx.lineWidth = 0.8;
                    ctx.stroke();
                }
            }
        }

        // Draw Network Nodes (Dots & Halos)
        for (let i = 0; i < networkNodes.length; i++) {
            const node = networkNodes[i];
            const pulse = (Math.sin(time * 3 + node.pulseOffset) + 1) * 0.5;
            const nodeRadius = node.radius + pulse * 0.8;

            ctx.beginPath();
            ctx.arc(node.x, node.y, nodeRadius, 0, Math.PI * 2);
            ctx.fillStyle = node.color;
            ctx.fill();

            ctx.beginPath();
            ctx.arc(node.x, node.y, nodeRadius * 2.2, 0, Math.PI * 2);
            ctx.fillStyle = 'rgba(0, 210, 255, 0.18)';
            ctx.fill();
        }

        // Ambient traveling packets between connected nodes
        if (Math.random() < 0.03) {
            spawnPacket();
        }

        for (let i = packets.length - 1; i >= 0; i--) {
            const pkt = packets[i];
            const src = networkNodes[pkt.sourceIdx];
            const target = networkNodes[pkt.targetIdx];

            if (!src || !target) {
                packets.splice(i, 1);
                continue;
            }

            pkt.progress += pkt.speed;

            if (pkt.progress >= 1) {
                packets.splice(i, 1);
                continue;
            }

            const curX = src.x + (target.x - src.x) * pkt.progress;
            const curY = src.y + (target.y - src.y) * pkt.progress;

            ctx.beginPath();
            ctx.arc(curX, curY, 2.5, 0, Math.PI * 2);
            ctx.fillStyle = '#FFFFFF';
            ctx.fill();

            ctx.beginPath();
            ctx.arc(curX, curY, 5, 0, Math.PI * 2);
            ctx.fillStyle = 'rgba(0, 210, 255, 0.6)';
            ctx.fill();
        }

        // 5. Ambient Floating Sparkle Nodes
        for (let i = 0; i < sparks.length; i++) {
            const sp = sparks[i];
            sp.y += sp.speedY;
            sp.x += sp.speedX;

            if (sp.y < -10) {
                sp.y = height + 10;
                sp.x = Math.random() * width;
            }
            if (sp.x < 0) sp.x = width;
            if (sp.x > width) sp.x = 0;

            const pulse = (Math.sin(time * 3 + sp.pulseOffset) + 1) * 0.5;
            const currentAlpha = sp.opacity * (0.4 + pulse * 0.6);

            ctx.beginPath();
            ctx.arc(sp.x, sp.y, sp.size, 0, Math.PI * 2);
            ctx.fillStyle = sp.color === '#00D2FF'
                ? `rgba(0, 210, 255, ${currentAlpha})`
                : `rgba(56, 189, 248, ${currentAlpha})`;
            ctx.fill();
        }

        if (!prefersReducedMotion) {
            animationFrameId = requestAnimationFrame(renderFrame);
        }
    }

    // Intersection observer for performance efficiency
    if (heroSection && 'IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                isVisible = entry.isIntersecting;
                if (isVisible && !prefersReducedMotion && !animationFrameId) {
                    startTime = performance.now();
                    animationFrameId = requestAnimationFrame(renderFrame);
                } else if (!isVisible && animationFrameId) {
                    cancelAnimationFrame(animationFrameId);
                    animationFrameId = null;
                }
            });
        }, { threshold: 0.05 });

        observer.observe(heroSection);
    }

    window.addEventListener('resize', resize, { passive: true });

    initPoints();
    resize();

    if (!prefersReducedMotion) {
        animationFrameId = requestAnimationFrame(renderFrame);
    } else {
        renderFrame(1000);
    }
}
