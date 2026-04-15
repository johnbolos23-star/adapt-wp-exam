document.addEventListener("DOMContentLoaded", function () {
  window.addEventListener("load", function () {
    const list = document.querySelector(".events-calendar-item-counts > div");
    const listItems = Array.from(list.children);
    const slides = gsap.utils.toArray(".events-calendar-item-image");
    const eventItems = gsap.utils.toArray(".events-calendar-item");

    let currentIndex = 0;

    gsap.set(slides, { autoAlpha: 0 });

    // initial state
    listItems.forEach(item => item.classList.remove("active"));
    listItems[0]?.classList.add("active");
    gsap.set(slides[0], { autoAlpha: 1 });

    slides.forEach((item, i) => {
        if( i === 0 ){
            gsap.fromTo(
                item,
                {
                    autoAlpha: 0,
                    scale: 1.3
                },
                {
                    autoAlpha: 1,
                    scale: 1,
                    duration: 0.3,
                    ease: "power1.out",
                    overwrite: "auto"
                }
            );
        }else{
            gsap.to(item, {
                autoAlpha: 0,
                scale: 1.3,
                duration: 0.3,
                ease: "power1.out",
                overwrite: "auto"
            });
        }
    });

    ScrollTrigger.create({
      trigger: ".events-calendar-items",
      start: "top top",
      end: "+=" + listItems.length * 80 + "%",
      pinSpacing: false,
      pin: true,
      scrub: true,
      anticipatePin: 1,
      invalidateOnRefresh: true,
      onUpdate: self => {
        const index = getClosestToViewportCenter(eventItems);

        if (index < 0) return;

        listItems.forEach((item, i) => {
          item.classList.toggle("active", i === index);
        });

        eventItems.forEach((item, i) => {
          item.classList.toggle("active", i === index);
        });

        if (index === currentIndex) return;

        gsap.to(slides[currentIndex], {
          autoAlpha: 0,
          scale: 1.3,
          duration: 0.3,
          ease: "power1.out",
          overwrite: "auto"
        });

        gsap.fromTo(
          slides[index],
          {
            autoAlpha: 0,
            scale: 1.3
          },
          {
            autoAlpha: 1,
            scale: 1,
            duration: 0.3,
            ease: "power1.out",
            overwrite: "auto"
          }
        );

        currentIndex = index;
      }
    });



    gsap.fromTo(".video-inner-wrapper",
    { width: "80%" },
    {
        width: "100%",
        ease: "none", // important for smooth scrub
        scrollTrigger: {
            trigger: ".video-inner-wrapper",
            start: "top 80%",
            end: "top 20%",
            scrub: true,
            invalidateOnRefresh: true
        }
    }
    );


    function getClosestToViewportCenter(items) {
      const viewportCenter = window.innerHeight / 2;
      let closestIndex = -1;
      let closestDistance = Infinity;

      items.forEach((item, i) => {
        const rect = item.getBoundingClientRect();

        // ignore items completely outside viewport
        if (rect.bottom <= 0 || rect.top >= window.innerHeight) return;

        const itemCenter = rect.top + rect.height / 2;
        const distance = Math.abs(viewportCenter - itemCenter);

        if (distance < closestDistance) {
          closestDistance = distance;
          closestIndex = i;
        }
      });

      return closestIndex;
    }
  }, false);
});