gsap.registerPlugin(ScrollTrigger);

    gsap.timeline({
        scrollTrigger: {
            trigger: "#bus-section",
            start: "top 80%", 
            end: "center center", 
            scrub: 3,
        }
    })
    .fromTo(".bus-container",
        { x: "-20vw", y: "10vh", scale: 0.3 },
        { x: "10vw", y: "0vh", scale: 1.3, duration: 3, ease: "power2.out" }
    );