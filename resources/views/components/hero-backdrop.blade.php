{{--
    Zarosoft Enterprise 3D Particle Wave, Dot-Matrix World Map & Cyber Telemetry Backdrop
    High-performance Canvas 3D particle mesh + SVG world network map + Floating HUD telemetry panels
--}}
<div class="hero-tech-backdrop absolute inset-0 w-full h-full overflow-hidden pointer-events-none select-none" aria-hidden="true">

    <!-- 1. Ambient Dynamic Cyber Auroras -->
    <div class="absolute top-[10%] left-[15%] w-[600px] h-[600px] bg-[#007BFF]/20 rounded-full blur-[160px] pointer-events-none animate-aurora-1"></div>
    <div class="absolute bottom-[10%] right-[12%] w-[550px] h-[550px] bg-[#00D2FF]/18 rounded-full blur-[140px] pointer-events-none animate-aurora-2"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[400px] bg-[#03224C]/30 rounded-full blur-[180px] pointer-events-none"></div>

    <!-- 2. High-Tech Dot Matrix World Map & Intercontinental Network Arcs -->
    <div class="absolute inset-0 w-full h-full opacity-40 sm:opacity-55 lg:opacity-65 transition-opacity duration-700">
        <svg class="w-full h-full object-cover" viewBox="0 0 1200 650" preserveAspectRatio="xMidYMid slice" fill="none">
            <defs>
                <!-- Hub Gradient & Glow Filter -->
                <linearGradient id="wm-arc-glow" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" stop-color="#00D2FF" stop-opacity="0.1"/>
                    <stop offset="50%" stop-color="#00D2FF" stop-opacity="0.9"/>
                    <stop offset="100%" stop-color="#007BFF" stop-opacity="0.2"/>
                </linearGradient>

                <linearGradient id="wm-arc-soft" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#38BDF8" stop-opacity="0.6"/>
                    <stop offset="100%" stop-color="#007BFF" stop-opacity="0.15"/>
                </linearGradient>

                <filter id="hud-glow" x="-20%" y="-20%" width="140%" height="140%">
                    <feGaussianBlur stdDeviation="3" result="blur"/>
                    <feMerge>
                        <feMergeNode in="blur"/>
                        <feMergeNode in="SourceGraphic"/>
                    </feMerge>
                </filter>
            </defs>

            <!-- DOT MATRIX CONTINENTS (Precise Geographic Cluster Grid) -->
            <g class="world-dots" fill="#38BDF8" opacity="0.32">
                <!-- North America -->
                <!-- Alaska & Northern Canada -->
                <circle cx="120" cy="110" r="1.5"/><circle cx="135" cy="105" r="1.5"/><circle cx="150" cy="100" r="1.5"/><circle cx="165" cy="110" r="1.5"/><circle cx="180" cy="115" r="1.5"/>
                <circle cx="130" cy="125" r="1.5"/><circle cx="145" cy="120" r="1.5"/><circle cx="160" cy="125" r="1.5"/><circle cx="175" cy="130" r="1.5"/><circle cx="190" cy="125" r="1.5"/><circle cx="205" cy="120" r="1.5"/><circle cx="220" cy="115" r="1.5"/><circle cx="235" cy="110" r="1.5"/>
                <circle cx="140" cy="140" r="1.5"/><circle cx="155" cy="140" r="1.5"/><circle cx="170" cy="145" r="1.5"/><circle cx="185" cy="140" r="1.5"/><circle cx="200" cy="135" r="1.5"/><circle cx="215" cy="130" r="1.5"/><circle cx="230" cy="130" r="1.5"/><circle cx="245" cy="125" r="1.5"/><circle cx="260" cy="120" r="1.5"/><circle cx="275" cy="125" r="1.5"/>
                <!-- Canada & Greenland -->
                <circle cx="310" cy="95" r="1.5"/><circle cx="325" cy="90" r="1.5"/><circle cx="340" cy="95" r="1.5"/><circle cx="325" cy="110" r="1.5"/><circle cx="340" cy="110" r="1.5"/><circle cx="355" cy="105" r="1.5"/>
                <circle cx="160" cy="155" r="1.5"/><circle cx="175" cy="155" r="1.5"/><circle cx="190" cy="150" r="1.5"/><circle cx="205" cy="150" r="1.5"/><circle cx="220" cy="145" r="1.5"/><circle cx="235" cy="145" r="1.5"/><circle cx="250" cy="140" r="1.5"/><circle cx="265" cy="140" r="1.5"/><circle cx="280" cy="145" r="1.5"/><circle cx="295" cy="140" r="1.5"/>
                <circle cx="170" cy="170" r="1.5"/><circle cx="185" cy="170" r="1.5"/><circle cx="200" cy="165" r="1.5"/><circle cx="215" cy="165" r="1.5"/><circle cx="230" cy="160" r="1.5"/><circle cx="245" cy="160" r="1.5"/><circle cx="260" cy="155" r="1.5"/><circle cx="275" cy="155" r="1.5"/><circle cx="290" cy="160" r="1.5"/><circle cx="305" cy="155" r="1.5"/><circle cx="320" cy="160" r="1.5"/>
                <!-- USA (West to East Coast) -->
                <circle cx="180" cy="185" r="1.7" fill="#00D2FF"/><circle cx="195" cy="185" r="1.5"/><circle cx="210" cy="180" r="1.7"/><circle cx="225" cy="180" r="1.5"/><circle cx="240" cy="175" r="1.5"/><circle cx="255" cy="175" r="1.5"/><circle cx="270" cy="170" r="1.5"/><circle cx="285" cy="170" r="1.5"/><circle cx="300" cy="175" r="1.5"/><circle cx="315" cy="175" r="1.7"/><circle cx="330" cy="180" r="1.5"/>
                <circle cx="185" cy="200" r="1.7"/><circle cx="200" cy="200" r="1.5"/><circle cx="215" cy="195" r="2" fill="#00D2FF"/><circle cx="230" cy="195" r="1.5"/><circle cx="245" cy="190" r="1.5"/><circle cx="260" cy="190" r="1.5"/><circle cx="275" cy="185" r="1.5"/><circle cx="290" cy="185" r="1.5"/><circle cx="305" cy="190" r="1.5"/><circle cx="320" cy="190" r="2" fill="#00D2FF"/><circle cx="335" cy="195" r="1.5"/>
                <circle cx="190" cy="215" r="1.5"/><circle cx="205" cy="215" r="1.5"/><circle cx="220" cy="210" r="1.5"/><circle cx="235" cy="210" r="1.5"/><circle cx="250" cy="205" r="1.5"/><circle cx="265" cy="205" r="1.5"/><circle cx="280" cy="200" r="1.5"/><circle cx="295" cy="200" r="1.5"/><circle cx="310" cy="205" r="1.5"/><circle cx="325" cy="205" r="1.5"/><circle cx="340" cy="210" r="1.5"/>
                <circle cx="195" cy="230" r="1.5"/><circle cx="210" cy="230" r="1.5"/><circle cx="225" cy="225" r="1.5"/><circle cx="240" cy="225" r="1.5"/><circle cx="255" cy="220" r="1.5"/><circle cx="270" cy="220" r="1.5"/><circle cx="285" cy="215" r="1.5"/><circle cx="300" cy="215" r="1.5"/><circle cx="315" cy="220" r="1.5"/><circle cx="330" cy="225" r="1.5"/>
                <circle cx="215" cy="245" r="1.5"/><circle cx="230" cy="245" r="1.5"/><circle cx="245" cy="240" r="1.5"/><circle cx="260" cy="235" r="1.5"/><circle cx="275" cy="235" r="1.5"/><circle cx="290" cy="230" r="1.5"/><circle cx="305" cy="230" r="1.5"/><circle cx="320" cy="235" r="1.5"/>
                <!-- Mexico & Central America -->
                <circle cx="210" cy="260" r="1.5"/><circle cx="225" cy="260" r="1.5"/><circle cx="240" cy="255" r="1.5"/><circle cx="255" cy="250" r="1.5"/><circle cx="270" cy="250" r="1.5"/><circle cx="285" cy="245" r="1.5"/>
                <circle cx="220" cy="275" r="1.5"/><circle cx="235" cy="275" r="1.5"/><circle cx="250" cy="270" r="1.5"/><circle cx="265" cy="265" r="1.5"/>
                <circle cx="235" cy="290" r="1.5"/><circle cx="250" cy="290" r="1.5"/><circle cx="265" cy="285" r="1.5"/><circle cx="280" cy="280" r="1.5"/>
                <circle cx="250" cy="305" r="1.5"/><circle cx="265" cy="305" r="1.5"/><circle cx="280" cy="300" r="1.5"/><circle cx="295" cy="295" r="1.5"/>
                <circle cx="270" cy="320" r="1.5"/><circle cx="285" cy="320" r="1.5"/><circle cx="300" cy="315" r="1.5"/><circle cx="315" cy="310" r="1.5"/>

                <!-- South America -->
                <circle cx="290" cy="340" r="1.5"/><circle cx="305" cy="340" r="1.5"/><circle cx="320" cy="335" r="1.5"/><circle cx="335" cy="335" r="1.5"/><circle cx="350" cy="340" r="1.5"/>
                <circle cx="295" cy="355" r="1.5"/><circle cx="310" cy="355" r="1.5"/><circle cx="325" cy="350" r="1.5"/><circle cx="340" cy="350" r="1.5"/><circle cx="355" cy="355" r="1.5"/><circle cx="370" cy="355" r="1.5"/><circle cx="385" cy="360" r="1.5"/>
                <circle cx="300" cy="370" r="1.5"/><circle cx="315" cy="370" r="1.5"/><circle cx="330" cy="365" r="1.5"/><circle cx="345" cy="365" r="1.5"/><circle cx="360" cy="370" r="1.5"/><circle cx="375" cy="370" r="1.5"/><circle cx="390" cy="375" r="1.7" fill="#00D2FF"/><circle cx="405" cy="380" r="1.5"/>
                <circle cx="305" cy="385" r="1.5"/><circle cx="320" cy="385" r="1.5"/><circle cx="335" cy="380" r="1.5"/><circle cx="350" cy="380" r="1.5"/><circle cx="365" cy="385" r="1.5"/><circle cx="380" cy="390" r="2" fill="#00D2FF"/><circle cx="395" cy="395" r="1.5"/>
                <circle cx="310" cy="400" r="1.5"/><circle cx="325" cy="400" r="1.5"/><circle cx="340" cy="395" r="1.5"/><circle cx="355" cy="395" r="1.5"/><circle cx="370" cy="400" r="1.5"/><circle cx="385" cy="405" r="1.5"/>
                <circle cx="315" cy="415" r="1.5"/><circle cx="330" cy="415" r="1.5"/><circle cx="345" cy="410" r="1.5"/><circle cx="360" cy="415" r="1.5"/><circle cx="375" cy="420" r="1.5"/>
                <circle cx="320" cy="430" r="1.5"/><circle cx="335" cy="430" r="1.5"/><circle cx="350" cy="430" r="1.5"/><circle cx="365" cy="435" r="1.5"/>
                <circle cx="325" cy="445" r="1.5"/><circle cx="340" cy="445" r="1.5"/><circle cx="355" cy="450" r="1.5"/>
                <circle cx="330" cy="460" r="1.5"/><circle cx="345" cy="465" r="1.5"/><circle cx="360" cy="470" r="1.5"/>
                <circle cx="335" cy="480" r="1.5"/><circle cx="350" cy="485" r="1.5"/>
                <circle cx="340" cy="500" r="1.5"/><circle cx="350" cy="510" r="1.5"/>

                <!-- Europe & Scandinavia -->
                <circle cx="530" cy="140" r="1.5"/><circle cx="545" cy="135" r="1.5"/><circle cx="540" cy="155" r="2" fill="#00D2FF"/><circle cx="555" cy="150" r="1.5"/>
                <circle cx="580" cy="100" r="1.5"/><circle cx="595" cy="95" r="1.5"/><circle cx="610" cy="100" r="1.5"/><circle cx="625" cy="105" r="1.5"/><circle cx="640" cy="115" r="1.5"/>
                <circle cx="585" cy="120" r="1.5"/><circle cx="600" cy="115" r="1.5"/><circle cx="615" cy="120" r="1.5"/><circle cx="630" cy="125" r="1.5"/>
                <circle cx="550" cy="170" r="1.5"/><circle cx="565" cy="165" r="1.5"/><circle cx="580" cy="165" r="2" fill="#00D2FF"/><circle cx="595" cy="160" r="1.5"/><circle cx="610" cy="160" r="1.5"/><circle cx="625" cy="165" r="1.5"/><circle cx="640" cy="165" r="1.5"/><circle cx="655" cy="160" r="1.5"/>
                <circle cx="545" cy="185" r="1.5"/><circle cx="560" cy="180" r="1.5"/><circle cx="575" cy="180" r="1.5"/><circle cx="590" cy="175" r="1.5"/><circle cx="605" cy="175" r="1.5"/><circle cx="620" cy="180" r="1.5"/><circle cx="635" cy="180" r="1.5"/><circle cx="650" cy="175" r="1.5"/><circle cx="665" cy="175" r="1.5"/><circle cx="680" cy="170" r="1.5"/>
                <circle cx="540" cy="200" r="1.5"/><circle cx="555" cy="195" r="1.5"/><circle cx="570" cy="195" r="1.5"/><circle cx="585" cy="190" r="1.5"/><circle cx="600" cy="190" r="1.5"/><circle cx="615" cy="195" r="1.5"/><circle cx="630" cy="195" r="1.5"/><circle cx="645" cy="190" r="1.5"/><circle cx="660" cy="190" r="1.5"/><circle cx="675" cy="185" r="1.5"/><circle cx="690" cy="185" r="1.5"/>
                <circle cx="545" cy="215" r="1.5"/><circle cx="560" cy="210" r="1.5"/><circle cx="575" cy="210" r="1.5"/><circle cx="590" cy="205" r="1.5"/><circle cx="605" cy="205" r="1.5"/><circle cx="620" cy="210" r="1.5"/><circle cx="635" cy="210" r="1.5"/><circle cx="650" cy="205" r="1.5"/><circle cx="665" cy="205" r="1.5"/><circle cx="680" cy="200" r="1.5"/>

                <!-- Africa -->
                <circle cx="550" cy="235" r="1.5"/><circle cx="565" cy="235" r="1.5"/><circle cx="580" cy="230" r="1.5"/><circle cx="595" cy="230" r="1.5"/><circle cx="610" cy="235" r="1.5"/><circle cx="625" cy="235" r="1.5"/><circle cx="640" cy="230" r="1.5"/><circle cx="655" cy="230" r="1.5"/><circle cx="670" cy="235" r="1.5"/>
                <circle cx="535" cy="250" r="1.5"/><circle cx="550" cy="250" r="1.5"/><circle cx="565" cy="245" r="1.5"/><circle cx="580" cy="245" r="1.5"/><circle cx="595" cy="250" r="1.5"/><circle cx="610" cy="250" r="1.5"/><circle cx="625" cy="245" r="1.5"/><circle cx="640" cy="245" r="1.5"/><circle cx="655" cy="250" r="1.5"/><circle cx="670" cy="250" r="1.5"/>
                <circle cx="525" cy="265" r="1.5"/><circle cx="540" cy="265" r="1.5"/><circle cx="555" cy="260" r="1.5"/><circle cx="570" cy="260" r="1.5"/><circle cx="585" cy="265" r="1.5"/><circle cx="600" cy="265" r="1.5"/><circle cx="615" cy="260" r="1.5"/><circle cx="630" cy="260" r="1.5"/><circle cx="645" cy="265" r="1.5"/><circle cx="660" cy="265" r="1.5"/><circle cx="675" cy="270" r="1.5"/>
                <circle cx="520" cy="280" r="1.5"/><circle cx="535" cy="280" r="1.5"/><circle cx="550" cy="275" r="1.5"/><circle cx="565" cy="275" r="1.5"/><circle cx="580" cy="280" r="1.5"/><circle cx="595" cy="280" r="1.5"/><circle cx="610" cy="275" r="1.5"/><circle cx="625" cy="275" r="1.5"/><circle cx="640" cy="280" r="1.5"/><circle cx="655" cy="280" r="1.5"/><circle cx="670" cy="285" r="1.5"/>
                <circle cx="530" cy="295" r="1.5"/><circle cx="545" cy="295" r="1.5"/><circle cx="560" cy="290" r="1.5"/><circle cx="575" cy="290" r="1.5"/><circle cx="590" cy="295" r="1.5"/><circle cx="605" cy="295" r="1.5"/><circle cx="620" cy="290" r="1.5"/><circle cx="635" cy="290" r="1.5"/><circle cx="650" cy="295" r="1.5"/><circle cx="665" cy="300" r="1.5"/>
                <circle cx="545" cy="315" r="1.5"/><circle cx="560" cy="315" r="1.5"/><circle cx="575" cy="310" r="1.5"/><circle cx="590" cy="310" r="1.5"/><circle cx="605" cy="315" r="1.5"/><circle cx="620" cy="315" r="1.5"/><circle cx="635" cy="310" r="1.5"/><circle cx="650" cy="315" r="1.5"/><circle cx="665" cy="320" r="1.5"/>
                <circle cx="560" cy="335" r="1.5"/><circle cx="575" cy="335" r="1.5"/><circle cx="590" cy="330" r="1.5"/><circle cx="605" cy="330" r="1.5"/><circle cx="620" cy="335" r="1.5"/><circle cx="635" cy="335" r="1.5"/><circle cx="650" cy="340" r="1.5"/>
                <circle cx="575" cy="355" r="1.5"/><circle cx="590" cy="355" r="1.5"/><circle cx="605" cy="350" r="1.5"/><circle cx="620" cy="350" r="1.5"/><circle cx="635" cy="355" r="1.5"/><circle cx="650" cy="360" r="1.5"/>
                <circle cx="590" cy="375" r="1.5"/><circle cx="605" cy="375" r="1.5"/><circle cx="620" cy="370" r="1.5"/><circle cx="635" cy="375" r="1.5"/><circle cx="650" cy="380" r="1.5"/>
                <circle cx="600" cy="395" r="1.5"/><circle cx="615" cy="395" r="1.5"/><circle cx="630" cy="390" r="1.5"/><circle cx="645" cy="395" r="1.5"/>
                <circle cx="605" cy="415" r="1.5"/><circle cx="620" cy="415" r="1.5"/><circle cx="635" cy="415" r="1.5"/><circle cx="650" cy="420" r="1.5"/>
                <circle cx="615" cy="435" r="1.5"/><circle cx="630" cy="435" r="1.5"/><circle cx="645" cy="440" r="1.5"/>
                <circle cx="625" cy="455" r="1.5"/><circle cx="640" cy="455" r="1.5"/>

                <!-- Middle East & Central Asia -->
                <circle cx="695" cy="210" r="1.5"/><circle cx="710" cy="205" r="1.5"/><circle cx="725" cy="205" r="1.5"/><circle cx="740" cy="200" r="1.5"/><circle cx="755" cy="200" r="1.5"/>
                <circle cx="690" cy="225" r="1.5"/><circle cx="705" cy="225" r="1.5"/><circle cx="720" cy="220" r="1.5"/><circle cx="735" cy="220" r="1.5"/><circle cx="750" cy="215" r="1.5"/><circle cx="765" cy="215" r="1.5"/>
                <circle cx="685" cy="240" r="1.5"/><circle cx="695" cy="240" r="2" fill="#00D2FF"/><circle cx="715" cy="235" r="1.5"/><circle cx="730" cy="235" r="1.5"/><circle cx="745" cy="230" r="1.5"/><circle cx="760" cy="230" r="1.5"/><circle cx="775" cy="225" r="1.5"/>
                <circle cx="700" cy="255" r="1.5"/><circle cx="715" cy="255" r="1.5"/><circle cx="730" cy="250" r="1.5"/><circle cx="745" cy="250" r="1.5"/><circle cx="760" cy="245" r="1.5"/><circle cx="775" cy="245" r="1.5"/>
                <circle cx="710" cy="270" r="1.5"/><circle cx="725" cy="270" r="1.5"/><circle cx="740" cy="265" r="1.5"/><circle cx="755" cy="265" r="1.5"/><circle cx="770" cy="260" r="1.5"/>

                <!-- Russia & North Asia -->
                <circle cx="710" cy="110" r="1.5"/><circle cx="730" cy="105" r="1.5"/><circle cx="750" cy="110" r="1.5"/><circle cx="770" cy="105" r="1.5"/><circle cx="790" cy="100" r="1.5"/><circle cx="810" cy="105" r="1.5"/><circle cx="830" cy="100" r="1.5"/><circle cx="850" cy="95" r="1.5"/><circle cx="870" cy="100" r="1.5"/><circle cx="890" cy="105" r="1.5"/><circle cx="910" cy="100" r="1.5"/><circle cx="930" cy="105" r="1.5"/><circle cx="950" cy="100" r="1.5"/><circle cx="970" cy="105" r="1.5"/>
                <circle cx="720" cy="130" r="1.5"/><circle cx="740" cy="125" r="1.5"/><circle cx="760" cy="130" r="1.5"/><circle cx="780" cy="125" r="1.5"/><circle cx="800" cy="120" r="1.5"/><circle cx="820" cy="125" r="1.5"/><circle cx="840" cy="120" r="1.5"/><circle cx="860" cy="115" r="1.5"/><circle cx="880" cy="120" r="1.5"/><circle cx="900" cy="125" r="1.5"/><circle cx="920" cy="120" r="1.5"/><circle cx="940" cy="125" r="1.5"/><circle cx="960" cy="120" r="1.5"/><circle cx="980" cy="125" r="1.5"/><circle cx="1000" cy="120" r="1.5"/>
                <circle cx="730" cy="150" r="1.5"/><circle cx="750" cy="145" r="1.5"/><circle cx="770" cy="150" r="1.5"/><circle cx="790" cy="145" r="1.5"/><circle cx="810" cy="140" r="1.5"/><circle cx="830" cy="145" r="1.5"/><circle cx="850" cy="140" r="1.5"/><circle cx="870" cy="135" r="1.5"/><circle cx="890" cy="140" r="1.5"/><circle cx="910" cy="145" r="1.5"/><circle cx="930" cy="140" r="1.5"/><circle cx="950" cy="145" r="1.5"/><circle cx="970" cy="140" r="1.5"/><circle cx="990" cy="145" r="1.5"/><circle cx="1010" cy="140" r="1.5"/>
                <circle cx="740" cy="170" r="1.5"/><circle cx="760" cy="165" r="1.5"/><circle cx="780" cy="170" r="1.5"/><circle cx="800" cy="165" r="1.5"/><circle cx="820" cy="160" r="1.5"/><circle cx="840" cy="165" r="1.5"/><circle cx="860" cy="160" r="1.5"/><circle cx="880" cy="155" r="1.5"/><circle cx="900" cy="160" r="1.5"/><circle cx="920" cy="165" r="1.5"/><circle cx="940" cy="160" r="1.5"/><circle cx="960" cy="165" r="1.5"/><circle cx="980" cy="160" r="1.5"/><circle cx="1000" cy="165" r="1.5"/>

                <!-- South Asia (India, Bangladesh, Pakistan) -->
                <circle cx="770" cy="240" r="1.5"/><circle cx="785" cy="235" r="1.5"/><circle cx="795" cy="248" r="2" fill="#00D2FF"/><circle cx="810" cy="245" r="1.5"/>
                <circle cx="765" cy="255" r="1.5"/><circle cx="780" cy="255" r="1.5"/><circle cx="795" cy="260" r="1.7"/><circle cx="810" cy="260" r="1.5"/>
                <circle cx="760" cy="270" r="1.5"/><circle cx="775" cy="270" r="1.5"/><circle cx="790" cy="275" r="1.5"/><circle cx="805" cy="275" r="1.5"/>
                <circle cx="765" cy="285" r="1.5"/><circle cx="780" cy="285" r="1.5"/><circle cx="795" cy="290" r="1.5"/>
                <circle cx="775" cy="305" r="1.5"/><circle cx="785" cy="305" r="1.5"/><circle cx="790" cy="320" r="1.5"/>

                <!-- East Asia & China -->
                <circle cx="830" cy="180" r="1.5"/><circle cx="845" cy="180" r="1.5"/><circle cx="860" cy="175" r="1.5"/><circle cx="875" cy="175" r="1.5"/><circle cx="890" cy="170" r="1.5"/><circle cx="905" cy="170" r="1.5"/><circle cx="920" cy="175" r="1.5"/><circle cx="935" cy="175" r="1.5"/>
                <circle cx="825" cy="195" r="1.5"/><circle cx="840" cy="195" r="1.5"/><circle cx="855" cy="190" r="1.5"/><circle cx="870" cy="190" r="1.5"/><circle cx="885" cy="185" r="1.5"/><circle cx="900" cy="185" r="1.5"/><circle cx="915" cy="190" r="1.5"/><circle cx="930" cy="190" r="1.5"/><circle cx="945" cy="195" r="1.5"/>
                <circle cx="830" cy="210" r="1.5"/><circle cx="845" cy="210" r="1.5"/><circle cx="860" cy="205" r="1.5"/><circle cx="875" cy="205" r="1.5"/><circle cx="890" cy="200" r="1.5"/><circle cx="905" cy="200" r="1.5"/><circle cx="920" cy="205" r="1.5"/><circle cx="935" cy="205" r="1.5"/><circle cx="950" cy="210" r="1.5"/>
                <circle cx="835" cy="225" r="1.5"/><circle cx="850" cy="225" r="1.5"/><circle cx="865" cy="220" r="1.5"/><circle cx="880" cy="220" r="1.5"/><circle cx="895" cy="215" r="1.5"/><circle cx="910" cy="215" r="1.5"/><circle cx="925" cy="220" r="1.5"/><circle cx="940" cy="220" r="1.5"/><circle cx="955" cy="225" r="1.5"/>
                <circle cx="840" cy="240" r="1.5"/><circle cx="855" cy="240" r="1.5"/><circle cx="870" cy="235" r="1.5"/><circle cx="885" cy="235" r="1.5"/><circle cx="900" cy="230" r="1.5"/><circle cx="915" cy="230" r="1.5"/><circle cx="930" cy="235" r="1.5"/><circle cx="945" cy="235" r="1.5"/>
                <circle cx="845" cy="255" r="1.5"/><circle cx="860" cy="255" r="1.5"/><circle cx="875" cy="250" r="1.5"/><circle cx="890" cy="250" r="1.5"/><circle cx="905" cy="245" r="1.5"/><circle cx="920" cy="245" r="1.5"/><circle cx="935" cy="250" r="1.5"/>

                <!-- Japan -->
                <circle cx="965" cy="190" r="1.5"/><circle cx="975" cy="200" r="2" fill="#00D2FF"/><circle cx="985" cy="210" r="1.5"/><circle cx="970" cy="225" r="1.5"/>

                <!-- Southeast Asia & Indonesia -->
                <circle cx="850" cy="275" r="1.5"/><circle cx="865" cy="275" r="1.5"/><circle cx="880" cy="280" r="1.5"/><circle cx="895" cy="285" r="1.5"/><circle cx="920" cy="280" r="1.5"/>
                <circle cx="860" cy="295" r="1.5"/><circle cx="875" cy="300" r="1.5"/><circle cx="890" cy="305" r="1.5"/><circle cx="925" cy="300" r="1.5"/><circle cx="940" cy="310" r="1.5"/>
                <circle cx="870" cy="320" r="1.5"/><circle cx="885" cy="325" r="2" fill="#00D2FF"/><circle cx="915" cy="325" r="1.5"/><circle cx="935" cy="330" r="1.5"/>
                <circle cx="860" cy="350" r="1.5"/><circle cx="880" cy="355" r="1.5"/><circle cx="900" cy="355" r="1.5"/><circle cx="925" cy="360" r="1.5"/><circle cx="950" cy="360" r="1.5"/><circle cx="975" cy="365" r="1.5"/>

                <!-- Australia & Oceania -->
                <circle cx="950" cy="425" r="1.5"/><circle cx="965" cy="425" r="1.5"/><circle cx="980" cy="420" r="1.5"/><circle cx="995" cy="420" r="1.5"/><circle cx="1010" cy="425" r="1.5"/>
                <circle cx="940" cy="440" r="1.5"/><circle cx="955" cy="440" r="1.5"/><circle cx="970" cy="435" r="1.5"/><circle cx="985" cy="435" r="1.5"/><circle cx="1000" cy="440" r="2" fill="#00D2FF"/><circle cx="1015" cy="440" r="1.5"/><circle cx="1030" cy="445" r="1.5"/>
                <circle cx="935" cy="455" r="1.5"/><circle cx="950" cy="455" r="1.5"/><circle cx="965" cy="450" r="1.5"/><circle cx="980" cy="450" r="1.5"/><circle cx="995" cy="455" r="1.5"/><circle cx="1010" cy="455" r="1.5"/><circle cx="1025" cy="460" r="1.5"/>
                <circle cx="940" cy="470" r="1.5"/><circle cx="955" cy="470" r="1.5"/><circle cx="970" cy="465" r="1.5"/><circle cx="985" cy="465" r="1.5"/><circle cx="1000" cy="470" r="1.5"/><circle cx="1015" cy="475" r="1.5"/>
                <circle cx="950" cy="485" r="1.5"/><circle cx="965" cy="485" r="1.5"/><circle cx="980" cy="485" r="1.5"/><circle cx="995" cy="490" r="1.5"/>
                <circle cx="965" cy="505" r="1.5"/><circle cx="980" cy="505" r="1.5"/><circle cx="1000" cy="515" r="1.5"/>
                <!-- New Zealand -->
                <circle cx="1065" cy="495" r="1.5"/><circle cx="1075" cy="510" r="1.5"/><circle cx="1060" cy="525" r="1.5"/>
            </g>

            <!-- INTERCONTINENTAL NETWORK FLIGHT ARCS & PULSES -->
            <g class="network-arcs" stroke-linecap="round" fill="none">
                <!-- Arc 1: San Francisco to New York -->
                <path id="net-arc-1" pathLength="100" d="M 215 195 Q 267 160 320 190" stroke="url(#wm-arc-soft)" stroke-width="1.2" stroke-dasharray="3 4"/>
                <use href="#net-arc-1" class="hero-globe__pulse hero-globe__pulse--1" stroke="#00D2FF" stroke-width="2.2" filter="url(#hud-glow)"/>

                <!-- Arc 2: New York to London -->
                <path id="net-arc-2" pathLength="100" d="M 320 190 Q 430 110 540 155" stroke="url(#wm-arc-soft)" stroke-width="1.4"/>
                <use href="#net-arc-2" class="hero-globe__pulse hero-globe__pulse--2" stroke="#00D2FF" stroke-width="2.5" filter="url(#hud-glow)"/>

                <!-- Arc 3: London to Frankfurt -->
                <path id="net-arc-3" pathLength="100" d="M 540 155 Q 560 145 580 165" stroke="url(#wm-arc-soft)" stroke-width="1.2"/>

                <!-- Arc 4: Frankfurt to Dubai -->
                <path id="net-arc-4" pathLength="100" d="M 580 165 Q 637 175 695 240" stroke="url(#wm-arc-soft)" stroke-width="1.3"/>
                <use href="#net-arc-4" class="hero-globe__pulse hero-globe__pulse--3" stroke="#38BDF8" stroke-width="2.2" filter="url(#hud-glow)"/>

                <!-- Arc 5: Dubai to Dhaka -->
                <path id="net-arc-5" pathLength="100" d="M 695 240 Q 745 220 795 248" stroke="url(#wm-arc-soft)" stroke-width="1.4"/>
                <use href="#net-arc-5" class="hero-globe__pulse hero-globe__pulse--4" stroke="#00D2FF" stroke-width="2.5" filter="url(#hud-glow)"/>

                <!-- Arc 6: Dhaka to Singapore -->
                <path id="net-arc-6" pathLength="100" d="M 795 248 Q 840 280 885 325" stroke="url(#wm-arc-soft)" stroke-width="1.2"/>
                <use href="#net-arc-6" class="hero-globe__pulse hero-globe__pulse--5" stroke="#00D2FF" stroke-width="2.2" filter="url(#hud-glow)"/>

                <!-- Arc 7: Singapore to Tokyo -->
                <path id="net-arc-7" pathLength="100" d="M 885 325 Q 940 260 975 200" stroke="url(#wm-arc-soft)" stroke-width="1.3"/>
                <use href="#net-arc-7" class="hero-globe__pulse hero-globe__pulse--2" stroke="#38BDF8" stroke-width="2.2" filter="url(#hud-glow)"/>

                <!-- Arc 8: Singapore to Sydney -->
                <path id="net-arc-8" pathLength="100" d="M 885 325 Q 942 382 1000 440" stroke="url(#wm-arc-soft)" stroke-width="1.2"/>
                <use href="#net-arc-8" class="hero-globe__pulse hero-globe__pulse--1" stroke="#00D2FF" stroke-width="2.2" filter="url(#hud-glow)"/>

                <!-- Arc 9: New York to São Paulo -->
                <path id="net-arc-9" pathLength="100" d="M 320 190 Q 360 290 380 390" stroke="url(#wm-arc-soft)" stroke-width="1.1" stroke-dasharray="4 4"/>
            </g>

            <!-- PULSING GLOBAL DATACENTER HUBS -->
            <g class="datacenter-hubs">
                @php
                    $globalHubs = [
                        ['x' => 215, 'y' => 195, 'label' => 'US-WEST (SF)', 'delay' => '0s'],
                        ['x' => 320, 'y' => 190, 'label' => 'US-EAST (NYC)', 'delay' => '0.8s'],
                        ['x' => 540, 'y' => 155, 'label' => 'EU-WEST (LON)', 'delay' => '1.5s'],
                        ['x' => 580, 'y' => 165, 'label' => 'EU-CENTRAL (FRA)', 'delay' => '2.1s'],
                        ['x' => 695, 'y' => 240, 'label' => 'ME-SOUTH (DXB)', 'delay' => '0.4s'],
                        ['x' => 795, 'y' => 248, 'label' => 'AP-SOUTH (DAC)', 'delay' => '1.2s'],
                        ['x' => 885, 'y' => 325, 'label' => 'AP-SOUTHEAST (SIN)', 'delay' => '1.9s'],
                        ['x' => 975, 'y' => 200, 'label' => 'AP-NORTHEAST (TYO)', 'delay' => '0.6s'],
                        ['x' => 1000, 'y' => 440, 'label' => 'OC-EAST (SYD)', 'delay' => '2.5s'],
                        ['x' => 380, 'y' => 390, 'label' => 'SA-EAST (SAO)', 'delay' => '1.7s'],
                    ];
                @endphp

                @foreach($globalHubs as $hub)
                <g class="hub-node" style="--node-delay: {{ $hub['delay'] }}">
                    <!-- Expanding Radar Rings -->
                    <circle class="hero-globe__halo" cx="{{ $hub['x'] }}" cy="{{ $hub['y'] }}" r="8" stroke="#00D2FF" stroke-width="0.75" fill="#00D2FF" fill-opacity="0.15"/>
                    <circle cx="{{ $hub['x'] }}" cy="{{ $hub['y'] }}" r="3" fill="#00D2FF" filter="url(#hud-glow)"/>
                    <circle cx="{{ $hub['x'] }}" cy="{{ $hub['y'] }}" r="1.2" fill="#FFFFFF"/>
                </g>
                @endforeach
            </g>
        </svg>
    </div>

    <!-- 3. Hardware-Accelerated 3D Particle Wave Mesh (Canvas 2D/WebGL) -->
    <canvas id="hero-particle-wave-canvas" class="absolute inset-0 w-full h-full pointer-events-none z-[3]"></canvas>

    <!-- 4. FLOATING CYBER HUD TELEMETRY WIDGETS (FLANKS) -->
    <div class="absolute inset-0 w-full h-full pointer-events-none z-[4] overflow-hidden max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        

        

        <!-- Subtle Technical Coordinate Crosshairs -->
        <div class="hidden xl:block absolute top-12 left-6 text-[9px] font-mono text-slate-500/60 select-none">
            + LOC: 23.8103° N, 90.4125° E // GLOBAL_CLUSTER_ONLINE
        </div>
        <div class="hidden xl:block absolute top-12 right-6 text-[9px] font-mono text-slate-500/60 select-none">
            PROTOCOL: TLS 1.3 / HTTP/3 // MULTI-REGION MESH +
        </div>
    </div>
</div>
