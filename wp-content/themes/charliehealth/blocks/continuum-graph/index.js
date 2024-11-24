import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  let iopGraph = gsap.timeline();

  iopGraph.set('#graphGraph', {
    scaleX: 0,
    transformOrigin: 'bottom left',
  });
  iopGraph.set(
    '#lineER, #lineOutpatient, #lineInpatient, #lineCH',
    {
      scaleY: 0,
      transformOrigin: 'bottom left',
    }
  );
  iopGraph.set(
    '#textER, #textOutpatient, #textInpatient, #textCH, #lineShield',
    {
      translateY: '20px',
      autoAlpha: 0,
      transformOrigin: 'bottom center',
    }
  );
  iopGraph.to('#graphGraph', {
    scaleX: 1,
    duration: 3,
    ease: 'power4.inOut',
  });
  iopGraph.to(
    '#lineER, #lineInpatient, #lineOutpatient',
    {
      scaleY: 1,
      duration: 3,
      stagger: 0.2,
      ease: 'power4.inOut',
    },
    '>-2'
  );
  iopGraph.to(
    '#textER, #textOutpatient, #textInpatient',
    {
      translateY: 0,
      duration: 2,
      stagger: 0.2,
      ease: 'power4.inOut',
    },
    '<1'
  );
  iopGraph.to(
    '#textER, #textOutpatient, #textInpatient',
    {
      autoAlpha: 0.5,
      duration: 1.5,
      stagger: 0.2,
      ease: 'power4.inOut',
    },
    '<.2'
  );
  iopGraph.to(
    '#lineCH',
    {
      scaleY: 1,
      duration: 3,
      stagger: 0.2,
      ease: 'power4.inOut',
    },
    '>-1'
  );
  iopGraph.to(
    '#lineShield, #textCH',
    {
      translateY: 0,
      duration: 2,
      ease: 'power4.inOut',
    },
    '<1'
  );
  iopGraph.to(
    '#lineShield, #textCH',
    {
      autoAlpha: 1,
      duration: 1.5,
      ease: 'power4.inOut',
    },
    '<.2'
  );
});
