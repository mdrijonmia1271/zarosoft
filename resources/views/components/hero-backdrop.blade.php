{{--
Zarosoft Enterprise Cinematic Video Backdrop
Autoplay, looped, muted, hardware-accelerated video background
--}}
<div class="hero-tech-backdrop absolute inset-0 w-full h-full overflow-hidden" style="position: absolute; inset: 0; width: 100%; height: 100%; overflow: hidden;">
    <!-- 1. Background Video -->
    <video 
        id="hero-bg-video"
        autoplay 
        loop 
        muted 
        playsinline 
        preload="auto"
        src="{{ asset('videos/video-5.mp4') }}"
        class="w-full h-full object-cover object-center"
        style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: center; pointer-events: none;"
    >
        <source src="{{ asset('videos/video-5.mp4') }}" type="video/mp4">
        <source src="{{ asset('videos/video-4.mp4') }}" type="video/mp4">
        <source src="{{ asset('videos/hero-bg.mp4') }}" type="video/mp4">
    </video>

    <!-- 2. Ambient Gradient Edge Blend for Seamless Flow into Next Section -->
    <div class="absolute inset-x-0 bottom-0 h-28 bg-gradient-to-t from-[#060A17] to-transparent pointer-events-none" style="position: absolute; left: 0; right: 0; bottom: 0; height: 112px; pointer-events: none;">
    </div>
    <div class="absolute inset-x-0 top-0 h-20 bg-gradient-to-b from-[#060A17]/60 to-transparent pointer-events-none" style="position: absolute; left: 0; right: 0; top: 0; height: 80px; pointer-events: none;">
    </div>
</div>

<script>
    (function() {
        function playHeroVideo() {
            var v = document.getElementById('hero-bg-video');
            if (v) {
                v.muted = true;
                v.defaultMuted = true;
                var promise = v.play();
                if (promise !== undefined) {
                    promise.catch(function(e) {
                        window.addEventListener('click', function() { v.play(); }, { once: true });
                        window.addEventListener('scroll', function() { v.play(); }, { once: true });
                    });
                }
            }
        }
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', playHeroVideo);
        } else {
            playHeroVideo();
        }
    })();
</script>