document.addEventListener("DOMContentLoaded", function () {

    gsap.registerPlugin(ScrollTrigger);

    const defaults = {
        duration: 1,
        ease: "power3.out",
        opacity: 0
    };

    // FADE UP
    gsap.utils.toArray(".fade-up").forEach((el) => {
        gsap.from(el, {
            ...defaults,
            y: 40,
            scrollTrigger: createTrigger(el)
        });
    });

    // FADE DOWN
    gsap.utils.toArray(".fade-down").forEach((el) => {
        gsap.from(el, {
            ...defaults,
            y: -40,
            scrollTrigger: createTrigger(el)
        });
    });

    // FADE LEFT
    gsap.utils.toArray(".fade-left").forEach((el) => {
        gsap.from(el, {
            ...defaults,
            x: -60,
            scrollTrigger: createTrigger(el)
        });
    });

    // FADE RIGHT
    gsap.utils.toArray(".fade-right").forEach((el) => {
        gsap.from(el, {
            ...defaults,
            x: 60,
            scrollTrigger: createTrigger(el)
        });
    });

    // ZOOM IN
    gsap.utils.toArray(".zoom-in").forEach((el) => {
        gsap.from(el, {
            ...defaults,
            scale: 0.85,
            scrollTrigger: createTrigger(el)
        });
    });

    // BLUR IN (premium effect)
    gsap.utils.toArray(".blur-in").forEach((el) => {
        gsap.from(el, {
            ...defaults,
            filter: "blur(10px)",
            scrollTrigger: createTrigger(el)
        });
    });

    // Helper function (clean + reusable)
    function createTrigger(el) {
        return {
            trigger: el,
            start: "top 85%",
            toggleActions: "play none none none"
        };
    }

});