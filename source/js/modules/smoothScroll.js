export function smoothScroll() {
    gsap.registerPlugin(ScrollTrigger, ScrollSmoother);

    let smoother = ScrollSmoother.create({
        wrapper: '#smooth-wrapper',
        content: '#smooth-content',
        smooth: 1.5,
        smoothTouch: 0.1,
        effects: true
    });

    let nav_works = document.querySelector('#nav-works');
    let nav_references = document.querySelector('#nav-references');
    let nav_contact = document.querySelector('#nav-contact');

    nav_works.addEventListener('click', () => {
        smoother.scrollTo('#studyCases-main', true, 'top top');
    });
    nav_references.addEventListener('click', () => {
        smoother.scrollTo('#ref-main', true, 'top top');
    });
    nav_contact.addEventListener('click', () => {
        smoother.scrollTo('#contact-main', true, 'top top');
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
}