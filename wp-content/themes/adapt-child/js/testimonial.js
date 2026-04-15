document.addEventListener("DOMContentLoaded", function () {
    let autoPlay;
    const AUTO_DELAY = 5000; // 5 seconds

  const container = document.querySelector(".testimonial-items-container");
  if (!container) return;

  const items = Array.from(container.querySelectorAll(".testimonial-item"));
  if (!items.length) return;

  let current = items.findIndex(item => item.classList.contains("is-active"));
  if (current < 0) current = 0;

  let animating = false;

  function getParts(item) {
    return [
      item.querySelector("img"),
      item.querySelector(".testimonial-message"),
      item.querySelector(".testimonial-author-position"),
      item.querySelector(".testimonial-read-link")
    ].filter(Boolean);
  }

  function measureItemHeight(item) {
    const clone = item.cloneNode(true);

    clone.classList.add("is-active");
    clone.style.position = "absolute";
    clone.style.left = "0";
    clone.style.top = "0";
    clone.style.width = container.clientWidth + "px";
    clone.style.height = "auto";
    clone.style.inset = "auto";
    clone.style.opacity = "1";
    clone.style.visibility = "hidden";
    clone.style.pointerEvents = "none";
    clone.style.transform = "none";
    clone.style.zIndex = "-1";

    clone.querySelectorAll("*").forEach((el) => {
      el.style.opacity = "1";
      el.style.visibility = "inherit";
      el.style.transform = "none";
    });

    container.appendChild(clone);
    const height = clone.offsetHeight;
    container.removeChild(clone);

    return height;
  }

  function nextSlide() {
    const next = (current + 1) % items.length;
    showSlide(next);
    }

    function startAutoplay() {
    stopAutoplay(); // prevent duplicates
    autoPlay = setInterval(() => {
        if (!animating) {
        nextSlide();
        }
    }, AUTO_DELAY);
    }

    function stopAutoplay() {
    if (autoPlay) clearInterval(autoPlay);
    }

  function setContainerHeight(index, animate) {
    const newHeight = measureItemHeight(items[index]);

    if (animate) {
      gsap.to(container, {
        height: newHeight,
        duration: 0.45,
        ease: "power2.out"
      });
    } else {
      gsap.set(container, { height: newHeight });
    }
  }

  items.forEach((item, i) => {
    item.classList.toggle("is-active", i === current);
    gsap.set(item, {
      autoAlpha: i === current ? 1 : 0,
      zIndex: i === current ? 2 : 1
    });
  });

  const activeParts = getParts(items[current]);
  gsap.set(activeParts, { autoAlpha: 1, y: 0 });

  let dotsWrap = container.querySelector(".testimonial-dots");
  if (!dotsWrap) {
    dotsWrap = document.createElement("div");
    dotsWrap.className = "testimonial-dots";
    container.appendChild(dotsWrap);

    items.forEach((_, index) => {
      const dot = document.createElement("button");
      dot.className = "testimonial-dot" + (index === current ? " is-active" : "");
      dot.type = "button";
      dot.setAttribute("aria-label", "Go to testimonial " + (index + 1));
      dot.addEventListener("click", () => showSlide(index));
      dotsWrap.appendChild(dot);
    });
  }

  const dots = Array.from(dotsWrap.querySelectorAll(".testimonial-dot"));

  function updateDots(index) {
    dots.forEach((dot, i) => {
      dot.classList.toggle("is-active", i === index);
    });
  }

  function showSlide(next) {
    if (animating || next === current) return;
    animating = true;

    const currentItem = items[current];
    const nextItem = items[next];

    const currentParts = getParts(currentItem);
    const nextParts = getParts(nextItem);

    items.forEach(item => item.classList.remove("is-active"));
    nextItem.classList.add("is-active");
    updateDots(next);

    gsap.set(nextItem, {
      autoAlpha: 1,
      zIndex: 3
    });

    gsap.set(nextParts, {
      autoAlpha: 0,
      y: 24
    });

    setContainerHeight(next, true);

    const tl = gsap.timeline({
      onComplete() {
        gsap.set(currentItem, {
          autoAlpha: 0,
          zIndex: 1
        });

        gsap.set(currentParts, {
          autoAlpha: 0,
          y: 0
        });

        gsap.set(nextItem, {
          zIndex: 2
        });

        current = next;
        animating = false;
      }
    });

    tl.to(currentParts, {
      autoAlpha: 0,
      y: -12,
      duration: 0.22,
      stagger: 0.03,
      ease: "power2.in"
    }, 0)
    .to(currentItem, {
      autoAlpha: 0,
      duration: 0.2,
      ease: "power2.inOut"
    }, 0)
    .to(nextParts, {
      autoAlpha: 1,
      y: 0,
      duration: 0.42,
      stagger: 0.05,
      ease: "power3.out"
    }, 0.08);
  }

  setContainerHeight(current, false);
  startAutoplay();

  window.addEventListener("resize", () => {
    setContainerHeight(current, false);
  });

  const wrapper = document.querySelector(".testimonial-items-video-wrapper");
  if (!wrapper) return;

  const video = wrapper.querySelector(".video-el");
  const playBtn = wrapper.querySelector("#video-play");

  if (!video || !playBtn) return;

  playBtn.addEventListener("click", function () {
    // play video
    video.play();

    // add active class to wrapper
    wrapper.classList.add("is-playing");

    // optional: hide play button
    playBtn.style.display = "none";
  });
});