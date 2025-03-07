export function scroll() {
    gsap.registerPlugin(ScrollTrigger);

    ScrollTrigger.create({
        trigger: "#sticky-nav-con",
        start: "top top",
        end: "bottom bottom",
        pin: true,
        pinSpacing: false
    });

    ScrollTrigger.create({
        trigger: ".hero-text-con",
        pin: ".hero-text-con-1",
        start: "top top",
        end: "+=2000",
    });

    ScrollTrigger.create({
        trigger: ".hero-text-con",
        pin: ".hero-text-con-2",
        start: "top top",
        end: "+=2000",
    });
}