/**
 * Zarosoft High-Performance 3D Particle Wave & Interactive Network Plexus Engine
 * Features:
 * - Undulating 3D neural particle wave mesh with depth perspective
 * - Autonomous Network Nodes with Dynamic Triangulation (Plexus Triangle Motion)
 * - Real-Time Network Connection Triangles & Constellation Faces when Hovering Cursor
 * - Laser Data Edge Rays, Traveling Packets & Glowing Vertex Dots
 * - Interactive Cursor Network Hub with Elastic Gravitational Field
 * - 3D Camera Tilt, Ripples, and Battery-Friendly Auto-Pause on Scroll
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

    // 2. Interactive Network Plexus Nodes (Floating Nodes forming dynamic Triangles)
    const networkNodeCount = 65;
    let networkNodes = [];

    // 3. Mouse tracking & physics
    let mouse = {
        x: 0,
        y: 0,
        targetX: 0,
        targetY: 0,
        screenX: 0,
        screenY: 0,
        targetScreenX: 0,
        targetScreenY: 0,
        vx: 0,
        vy: 0,
        lastX: 0,
        lastY: 0,
        speed: 0,
        active: false,
        lastMoveTime: 0
    };

    // 4. Cursor motion line trail history
    const maxTrailPoints = 22;
    let cursorTrail = [];

    // 5. Ripple impulses spawned on mouse move
    const maxRipples = 6;
    let ripples = [];

    // 6. Traveling Network Packets
    const maxPackets = 18;
    let packets = [];

    // Animation state
    let animationFrameId = null;
    let isVisible = true;
    let startTime = performance.now();

    // Ambient floating sparkle nodes
    const sparkCount = 30;
    let sparks = [];

    function initNetworkNodes() {
        networkNodes = [];
        for (let i = 0; i < networkNodeCount; i++) {
            networkNodes.push({
                x: Math.random() * (width || 1200),
                y: Math.random() * (height || 540),
                vx: (Math.random() - 0.5) * 0.75,
                vy: (Math.random() - 0.5) * 0.65,
                radius: Math.random() * 2.2 + 2.0,
                pulseOffset: Math.random() * Math.PI * 2,
                color: Math.random() > 0.35 ? '#00D2FF' : '#38BDF8',
                origSpeedX: (Math.random() - 0.5) * 0.75,
                origSpeedY: (Math.random() - 0.5) * 0.65,
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
            // Re-bound existing nodes
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
                    alpha: 0,
                    mouseLift: 0
                });
            }
            points.push(rowPoints);
        }
    }

    // Global mouse listener attached to window for smooth responsiveness
    function onMouseMove(e) {
        if (!heroSection) return;
        const rect = heroSection.getBoundingClientRect();
        
        // Check if cursor is within or near the hero section
        if (e.clientY >= rect.top - 120 && e.clientY <= rect.bottom + 120) {
            const screenX = e.clientX - rect.left;
            const screenY = e.clientY - rect.top;
            const relX = screenX - width / 2;
            const relY = screenY - height / 2;

            mouse.targetX = relX;
            mouse.targetY = relY;
            mouse.targetScreenX = screenX;
            mouse.targetScreenY = screenY;
            mouse.active = true;

            const now = performance.now();
            const dt = Math.max(1, now - mouse.lastMoveTime);
            mouse.vx = (relX - mouse.lastX) / dt;
            mouse.vy = (relY - mouse.lastY) / dt;
            mouse.speed = Math.min(Math.sqrt(mouse.vx * mouse.vx + mouse.vy * mouse.vy) * 20, 50);

            mouse.lastX = relX;
            mouse.lastY = relY;
            mouse.lastMoveTime = now;

            // Spawn traveling packet along network on cursor movement
            if (packets.length < maxPackets && Math.random() > 0.4) {
                packets.push({
                    x: screenX,
                    y: screenY,
                    targetNode: Math.floor(Math.random() * networkNodes.length),
                    progress: 0,
                    speed: Math.random() * 0.04 + 0.03,
                    color: '#00D2FF'
                });
            }

            // Push point to glowing cursor motion trail
            cursorTrail.push({
                x: screenX,
                y: screenY,
                birth: now,
                maxLife: 550,
                alpha: 1.0,
                width: Math.min(Math.max(mouse.speed * 0.4, 2.5), 5.5)
            });

            if (cursorTrail.length > maxTrailPoints) {
                cursorTrail.shift();
            }

            // Spawn expanding 3D wave ripples on fast movements
            if (mouse.speed > 8 && ripples.length < maxRipples) {
                ripples.push({
                    x: relX * 1.6,
                    z: (relY + height / 2) * 1.4 + 100,
                    radius: 10,
                    maxRadius: 280 + mouse.speed * 4,
                    strength: Math.min(mouse.speed * 1.4, 45),
                    speed: 5 + mouse.speed * 0.2
                });
            }
        } else {
            mouse.active = false;
        }
    }

    window.addEventListener('mousemove', onMouseMove, { passive: true });

    window.addEventListener('mouseleave', () => {
        mouse.active = false;
    }, { passive: true });

    // Touch support for mobile/tablets
    window.addEventListener('touchmove', (e) => {
        if (!heroSection || !e.touches[0]) return;
        const rect = heroSection.getBoundingClientRect();
        const t = e.touches[0];
        if (t.clientY >= rect.top && t.clientY <= rect.bottom) {
            const screenX = t.clientX - rect.left;
            const screenY = t.clientY - rect.top;
            mouse.targetX = screenX - width / 2;
            mouse.targetY = screenY - height / 2;
            mouse.targetScreenX = screenX;
            mouse.targetScreenY = screenY;
            mouse.active = true;

            cursorTrail.push({
                x: screenX,
                y: screenY,
                birth: performance.now(),
                maxLife: 500,
                alpha: 1.0,
                width: 3.5
            });
            if (cursorTrail.length > maxTrailPoints) cursorTrail.shift();
        }
    }, { passive: true });

    function renderFrame(now) {
        if (!isVisible && !prefersReducedMotion) return;

        const time = (now - startTime) * 0.001;

        // Smooth mouse damping (elastic physics)
        if (mouse.active) {
            mouse.x += (mouse.targetX - mouse.x) * 0.12;
            mouse.y += (mouse.targetY - mouse.y) * 0.12;
            mouse.screenX += (mouse.targetScreenX - mouse.screenX) * 0.12;
            mouse.screenY += (mouse.targetScreenY - mouse.screenY) * 0.12;
        } else {
            mouse.x += (0 - mouse.x) * 0.035;
            mouse.y += (0 - mouse.y) * 0.035;
        }

        // Age out cursor trail points
        for (let i = cursorTrail.length - 1; i >= 0; i--) {
            const age = now - cursorTrail[i].birth;
            if (age >= cursorTrail[i].maxLife) {
                cursorTrail.splice(i, 1);
            } else {
                cursorTrail[i].alpha = Math.max(0, 1 - age / cursorTrail[i].maxLife);
            }
        }

        // Update active ripples
        for (let i = ripples.length - 1; i >= 0; i--) {
            const rip = ripples[i];
            rip.radius += rip.speed;
            rip.strength *= 0.94;
            if (rip.radius > rip.maxRadius || rip.strength < 0.5) {
                ripples.splice(i, 1);
            }
        }

        ctx.clearRect(0, 0, width, height);

        // Dynamic 3D Camera Projection with Mouse Tilt
        const focalLength = 320;
        const cameraTiltX = mouse.x * 0.12;
        const cameraTiltY = mouse.y * 0.18;
        const cameraY = -140 + cameraTiltY;
        const cameraZ = -100;
        const originX = width / 2 + cameraTiltX;
        const originY = height * 0.70 + mouse.y * 0.04;

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

                const targetWorldMouseX = mouse.x * 1.6;
                const targetWorldMouseZ = (mouse.y + height * 0.25) * 1.8 + 250;
                const distToMouse = Math.hypot(x - targetWorldMouseX, z - targetWorldMouseZ);

                if (distToMouse < 420) {
                    const normDist = distToMouse / 420;
                    const lift = Math.cos(normDist * Math.PI * 2.5) * Math.exp(-normDist * 2.2) * 48;
                    waveY -= lift;
                    pt.mouseLift = Math.max(0, 1 - normDist);
                } else {
                    pt.mouseLift = 0;
                }

                for (let i = 0; i < ripples.length; i++) {
                    const rip = ripples[i];
                    const d = Math.hypot(x - rip.x, z - rip.z);
                    const ripDist = Math.abs(d - rip.radius);
                    if (ripDist < 70) {
                        const ripEffect = Math.cos((ripDist / 70) * (Math.PI / 2)) * rip.strength;
                        waveY += ripEffect;
                    }
                }

                pt.y = waveY;

                const relZ = z - cameraZ;
                if (relZ <= 0) continue;

                const scale = focalLength / relZ;
                pt.scale = scale;
                pt.screenX = originX + x * scale;
                pt.screenY = originY + (waveY - cameraY) * scale;

                const depthFactor = 1 - Math.min(Math.max((z - 60) / (rows * spacingZ), 0), 1);
                const elevationBoost = Math.max((waveY + 60) / 120, 0.1);
                pt.alpha = Math.min(Math.max(depthFactor * (0.35 + elevationBoost * 0.65) + pt.mouseLift * 0.35, 0.03), 0.98);
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

                const radius = Math.max(0.85, pt.scale * 2.8 + pt.mouseLift * 1.4);
                const alpha = pt.alpha;
                const isHighlighted = pt.mouseLift > 0.3 || pt.y > 15;
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
        // 4. INTERACTIVE NETWORK PLEXUS & TRIANGLE MOTION (নেটওয়ার্ক কানেকশন ট্রায়াঙ্গেল)
        // =========================================================================
        const currentCursorX = mouse.active ? mouse.screenX : width / 2 + mouse.x;
        const currentCursorY = mouse.active ? mouse.screenY : height / 2 + mouse.y;

        // Update Network Nodes positions with organic drift and cursor gravity
        for (let i = 0; i < networkNodes.length; i++) {
            const node = networkNodes[i];

            // Ambient drift
            node.x += node.vx;
            node.y += node.vy;

            // Screen boundary bounce
            if (node.x < 10) { node.x = 10; node.vx = Math.abs(node.vx); }
            if (node.x > width - 10) { node.x = width - 10; node.vx = -Math.abs(node.vx); }
            if (node.y < 10) { node.y = 10; node.vy = Math.abs(node.vy); }
            if (node.y > height - 10) { node.y = height - 10; node.vy = -Math.abs(node.vy); }

            // Interactive Cursor Gravitational Attraction & Swirl
            if (mouse.active) {
                const dx = currentCursorX - node.x;
                const dy = currentCursorY - node.y;
                const distToCursor = Math.hypot(dx, dy);

                if (distToCursor < 260 && distToCursor > 15) {
                    const force = (1 - distToCursor / 260) * 0.08;
                    // Move gently toward cursor
                    node.x += (dx / distToCursor) * force * 15;
                    node.y += (dy / distToCursor) * force * 15;

                    // Subtle tangent swirl
                    node.vx += (-dy / distToCursor) * force * 0.6;
                    node.vy += (dx / distToCursor) * force * 0.6;
                }
            }

            // Velocity dampening back to base speed
            node.vx += (node.origSpeedX - node.vx) * 0.02;
            node.vy += (node.origSpeedY - node.vy) * 0.02;
        }

        // Inter-Node Triangle Connection Thresholds
        const maxConnectDist = 135;
        const cursorConnectDist = 240;

        // A. Draw Triangles between Network Nodes (Autonomous Constellation Triangles)
        for (let i = 0; i < networkNodes.length; i++) {
            const p1 = networkNodes[i];

            for (let j = i + 1; j < networkNodes.length; j++) {
                const p2 = networkNodes[j];
                const d12 = Math.hypot(p1.x - p2.x, p1.y - p2.y);

                if (d12 < maxConnectDist) {
                    // Search for 3rd node to form a triangle face
                    for (let k = j + 1; k < networkNodes.length; k++) {
                        const p3 = networkNodes[k];
                        const d23 = Math.hypot(p2.x - p3.x, p2.y - p3.y);
                        const d31 = Math.hypot(p3.x - p1.x, p3.y - p1.y);

                        if (d23 < maxConnectDist && d31 < maxConnectDist) {
                            const avgDist = (d12 + d23 + d31) / 3;
                            const triAlpha = Math.pow(1 - avgDist / maxConnectDist, 1.4) * 0.22;

                            // Fill Network Connection Triangle Face
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

                    // Draw connecting line edge
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

        // B. Draw Dynamic Network Connection Triangles to Cursor (When Mouse is Active)
        if (mouse.active && currentCursorX > 0 && currentCursorX < width && currentCursorY > 0 && currentCursorY < height) {
            const nearbyCursorNodes = [];

            for (let i = 0; i < networkNodes.length; i++) {
                const node = networkNodes[i];
                const d = Math.hypot(node.x - currentCursorX, node.y - currentCursorY);
                if (d < cursorConnectDist) {
                    nearbyCursorNodes.push({ node, d });
                }
            }

            // Form Triangles between Cursor + Node Pairs
            for (let i = 0; i < nearbyCursorNodes.length; i++) {
                const n1 = nearbyCursorNodes[i];

                for (let j = i + 1; j < nearbyCursorNodes.length; j++) {
                    const n2 = nearbyCursorNodes[j];
                    const interNodeDist = Math.hypot(n1.node.x - n2.node.x, n1.node.y - n2.node.y);

                    if (interNodeDist < 140) {
                        const avgCursorDist = (n1.d + n2.d) / 2;
                        const triAlpha = (1 - avgCursorDist / cursorConnectDist) * (1 - interNodeDist / 140) * 0.9;

                        // Triangle face
                        ctx.beginPath();
                        ctx.moveTo(currentCursorX, currentCursorY);
                        ctx.lineTo(n1.node.x, n1.node.y);
                        ctx.lineTo(n2.node.x, n2.node.y);
                        ctx.closePath();

                        ctx.fillStyle = `rgba(0, 210, 255, ${triAlpha * 0.20})`;
                        ctx.fill();

                        ctx.strokeStyle = `rgba(0, 210, 255, ${triAlpha * 0.85})`;
                        ctx.lineWidth = 1.1;
                        ctx.stroke();
                    }
                }
            }

            // Direct laser connection lines from Cursor to nearby nodes
            for (let i = 0; i < nearbyCursorNodes.length; i++) {
                const item = nearbyCursorNodes[i];
                const lineAlpha = Math.pow(1 - item.d / cursorConnectDist, 1.2) * 0.9;

                ctx.beginPath();
                ctx.moveTo(currentCursorX, currentCursorY);
                ctx.lineTo(item.node.x, item.node.y);
                ctx.strokeStyle = `rgba(0, 210, 255, ${lineAlpha})`;
                ctx.lineWidth = Math.max(0.8, (1 - item.d / cursorConnectDist) * 2.2);
                ctx.stroke();

                // High-glow node pulse on connected nodes
                ctx.beginPath();
                ctx.arc(item.node.x, item.node.y, 4.2, 0, Math.PI * 2);
                ctx.fillStyle = `rgba(0, 210, 255, ${lineAlpha})`;
                ctx.fill();

                ctx.beginPath();
                ctx.arc(item.node.x, item.node.y, 2.0, 0, Math.PI * 2);
                ctx.fillStyle = '#FFFFFF';
                ctx.fill();
            }

            // Cursor Network Hub Reticle & Radar Pulsing Waves
            const hubPulse = (Math.sin(time * 5) + 1) * 0.5;

            // Outer radar wave ring
            ctx.beginPath();
            ctx.arc(currentCursorX, currentCursorY, 8 + hubPulse * 16, 0, Math.PI * 2);
            ctx.strokeStyle = `rgba(0, 210, 255, ${0.9 - hubPulse * 0.7})`;
            ctx.lineWidth = 1.3;
            ctx.stroke();

            // Inner Rotating Geometric Reticle Triangle
            const triRot = time * 2.5;
            ctx.save();
            ctx.translate(currentCursorX, currentCursorY);
            ctx.rotate(triRot);
            ctx.beginPath();
            for (let k = 0; k < 3; k++) {
                const ang = (k * 2 * Math.PI) / 3 - Math.PI / 2;
                const tx = Math.cos(ang) * (14 + hubPulse * 2);
                const ty = Math.sin(ang) * (14 + hubPulse * 2);
                if (k === 0) ctx.moveTo(tx, ty);
                else ctx.lineTo(tx, ty);
            }
            ctx.closePath();
            ctx.strokeStyle = '#00D2FF';
            ctx.lineWidth = 1.4;
            ctx.fillStyle = 'rgba(0, 210, 255, 0.15)';
            ctx.fill();
            ctx.stroke();
            ctx.restore();

            // Central Glowing Hub Dot
            ctx.beginPath();
            ctx.arc(currentCursorX, currentCursorY, 4.0, 0, Math.PI * 2);
            ctx.fillStyle = '#00D2FF';
            ctx.fill();

            ctx.beginPath();
            ctx.arc(currentCursorX, currentCursorY, 2.0, 0, Math.PI * 2);
            ctx.fillStyle = '#FFFFFF';
            ctx.fill();
        }

        // C. Draw Network Nodes (Dots)
        for (let i = 0; i < networkNodes.length; i++) {
            const node = networkNodes[i];
            const pulse = (Math.sin(time * 3 + node.pulseOffset) + 1) * 0.5;
            const nodeRadius = node.radius + pulse * 0.8;

            ctx.beginPath();
            ctx.arc(node.x, node.y, nodeRadius, 0, Math.PI * 2);
            ctx.fillStyle = node.color;
            ctx.fill();

            // Subtle glow halo
            ctx.beginPath();
            ctx.arc(node.x, node.y, nodeRadius * 2.2, 0, Math.PI * 2);
            ctx.fillStyle = 'rgba(0, 210, 255, 0.18)';
            ctx.fill();
        }

        // D. Draw Traveling Network Data Packets
        for (let i = packets.length - 1; i >= 0; i--) {
            const pkt = packets[i];
            const target = networkNodes[pkt.targetNode];

            if (!target) {
                packets.splice(i, 1);
                continue;
            }

            pkt.progress += pkt.speed;

            if (pkt.progress >= 1) {
                packets.splice(i, 1);
                continue;
            }

            const curX = pkt.x + (target.x - pkt.x) * pkt.progress;
            const curY = pkt.y + (target.y - pkt.y) * pkt.progress;

            ctx.beginPath();
            ctx.arc(curX, curY, 2.5, 0, Math.PI * 2);
            ctx.fillStyle = '#FFFFFF';
            ctx.fill();

            ctx.beginPath();
            ctx.arc(curX, curY, 5, 0, Math.PI * 2);
            ctx.fillStyle = 'rgba(0, 210, 255, 0.6)';
            ctx.fill();
        }

        // =========================================================================
        // 5. GLOWING CURSOR MOTION TRAIL RIBBON
        // =========================================================================
        if (cursorTrail.length > 2) {
            ctx.beginPath();
            for (let i = 0; i < cursorTrail.length - 1; i++) {
                const p1 = cursorTrail[i];
                const p2 = cursorTrail[i + 1];
                const midX = (p1.x + p2.x) / 2;
                const midY = (p1.y + p2.y) / 2;

                if (i === 0) {
                    ctx.moveTo(p1.x, p1.y);
                }
                ctx.quadraticCurveTo(p1.x, p1.y, midX, midY);
            }
            const trailLatestAlpha = cursorTrail[cursorTrail.length - 1].alpha;
            ctx.strokeStyle = `rgba(0, 210, 255, ${trailLatestAlpha * 0.45})`;
            ctx.lineWidth = 5.5;
            ctx.lineCap = 'round';
            ctx.lineJoin = 'round';
            ctx.stroke();

            ctx.beginPath();
            for (let i = 0; i < cursorTrail.length - 1; i++) {
                const p1 = cursorTrail[i];
                const p2 = cursorTrail[i + 1];
                const midX = (p1.x + p2.x) / 2;
                const midY = (p1.y + p2.y) / 2;

                if (i === 0) {
                    ctx.moveTo(p1.x, p1.y);
                }
                ctx.quadraticCurveTo(p1.x, p1.y, midX, midY);
            }
            ctx.strokeStyle = `rgba(255, 255, 255, ${trailLatestAlpha * 0.9})`;
            ctx.lineWidth = 2.0;
            ctx.stroke();
        }

        // 6. Interactive Mouse Aura Spotlight on the Canvas
        if (mouse.active) {
            const cursorScreenX = currentCursorX;
            const cursorScreenY = currentCursorY;
            const radial = ctx.createRadialGradient(
                cursorScreenX, cursorScreenY, 0,
                cursorScreenX, cursorScreenY, 200
            );
            radial.addColorStop(0, 'rgba(0, 210, 255, 0.12)');
            radial.addColorStop(0.5, 'rgba(0, 123, 255, 0.04)');
            radial.addColorStop(1, 'rgba(0, 0, 0, 0)');
            ctx.fillStyle = radial;
            ctx.fillRect(0, 0, width, height);
        }

        // 7. Ambient Floating Sparkle Nodes
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
