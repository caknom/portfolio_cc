import { gsap } from "gsap";

export function initFormAnimations() {
    document.querySelectorAll("#contact-hero-form input, #contact-hero-form textarea").forEach((element) => {
        element.addEventListener("focus", () => {
            gsap.to(element, { scale: 1.02, duration: 0.3, ease: "power1.out" });
        });
        element.addEventListener("blur", () => {
            gsap.to(element, { scale: 1, duration: 0.3, ease: "power1.in" });
        });
    });
}