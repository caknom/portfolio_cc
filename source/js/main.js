gsap.registerPlugin(ScrollTrigger, ScrollSmoother);
(() => {

    let smoother = ScrollSmoother.create({
        wrapper: '#smooth-wrapper',
        content: '#smooth-content',
        smooth: 1.5,
        smoothTouch: 0.1,
        effects: true
    })

    let nav_works = document.querySelector('#nav-works');
    let nav_references = document.querySelector('#nav-references');
    let nav_contact = document.querySelector('#nav-contact');

    nav_works.addEventListener('click', (e) => {
        smoother.scrollTo('#studyCases-main', true, 'top top')
    });
    nav_references.addEventListener('click', (e) => {
        smoother.scrollTo('#ref-main', true, 'top top')
    });
    nav_contact.addEventListener('click', (e) => {
        smoother.scrollTo('#contact-main', true, 'top top')
    });

    let tween = gsap.to(".slider", {
        xPercent: -100,
        repeat: -1,
        duration: 10,
        ease: "linear"
    });


    let skewSetter = gsap.quickTo('.skew', 'skewY');
    let clamp = gsap.utils.clamp(-2, 2);

    ScrollSmoother.create({
        wrapper: '#wrapper',
        content: '#content',
        smooth: 2,
        effects: true,
        onUpdate: self => skewSetter(clamp(self.getVelocity() / -100)),
        onStop: () => skewSetter(0)
    });
})();

(() => {
    document.querySelectorAll("#contact-hero-form input, #contact-hero-form textarea").forEach((element) => {
        element.addEventListener("focus", () => {
            gsap.to(element, { scale: 1.02, duration: 0.3, ease: "power1.out" });
        });
        element.addEventListener("blur", () => {
            gsap.to(element, { scale: 1, duration: 0.3, ease: "power1.in" });
        });
    });
})();


(() => {

    let menuStatic = ScrollTrigger.create({
        trigger: "#sticky-nav-con",
        pin: "#main-nav",
        start: "top top",
        end: "+=10000",
    });

    let st1 = ScrollTrigger.create({
        trigger: ".hero-text-con",
        pin: ".hero-text-con-1",
        start: "top top",
        end: "+=2000",
    });

    let st2 = ScrollTrigger.create({
        trigger: ".hero-text-con",
        pin: ".hero-text-con-2",
        start: "top top",
        end: "+=2000",
    });

})();