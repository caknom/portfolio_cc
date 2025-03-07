import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/all";

gsap.registerPlugin(ScrollTrigger);

export function initScrollTriggers() {
    ScrollTrigger.create({
        trigger: "#sticky-nav-con",
        pin: "#main-nav",
        start: "top top",
        end: "+=10000",
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