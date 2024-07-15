/* Page Loader
--------------------------------------------- */
const hiddenElements = document.querySelectorAll("[data-animate]");
document.body.classList.add("mobile-menu-opened");

(function () {
  function id(v) { return document.getElementById(v); }
  function loadbar() {
    var ovrl = id("page-loader"),
        prog = id("progress"),
        stat = id("progstat"),
        img  = document.images,
        c    = 0,
        tot  = img.length;

    if (tot == 0) return doneLoading();

    function imgLoaded() {
      c += 1;
      var perc = ((100 / tot * c) << 0) + "%";
      prog.style.width = perc;
      // stat.innerHTML = "Loading<span>" + perc + "</span>";
      stat.querySelector("span").innerHTML = perc;
      if (c === tot) return doneLoading();
    }

    function doneLoading() {
      // Check if user accepted cookies
      let cookie_consent = getCookie("sd-cookie");
      if (cookie_consent != "") {
        ovrl.style.display = "none";
        animate(hiddenElements);
        document.body.classList.remove("mobile-menu-opened");
      } else {
        // ovrl.style.display = "block";
        // ovrl.style.opacity = 0;
        ovrl.style.bottom = "100%";
        setTimeout(() => {
          ovrl.style.display = "none";
          // Animate elements after page is loaded
          animate(hiddenElements);
          document.body.classList.remove("mobile-menu-opened");
          setTimeout(() => {
            document.body.classList.add("page-loaded");
          }, 6000);
        }, 2000);
      }
    }

    for (var i = 0; i < tot; i++) {
      var tImg = new Image();
      tImg.onload = imgLoaded;
      tImg.onerror = imgLoaded;
      tImg.src = img[i].src;
    }
  }

  document.addEventListener('DOMContentLoaded', loadbar, false);
}());

/* Animate on scroll
--------------------------------------------- */
const animationObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      const animateOnce = entry.target.hasAttribute("data-animate-once");
      const shouldShow = animateOnce ? entry.isIntersecting : entry.isIntersecting && !entry.target.classList.contains("show");
      
      entry.target.classList.toggle("show", shouldShow);
      if (animateOnce && shouldShow) {
        animationObserver.unobserve(entry.target);
      }
    });
  },
  { rootMargin: "-1%" }
);

function animate(elements) {
  elements.forEach((el) => animationObserver.observe(el));
}

/* Translate on scroll
--------------------------------------------- */
let introText = document.querySelector("#intro > div");

window.onscroll = function () {
  let scrollTop = document.documentElement.scrollTop * 0.3;
  introText.style.transform = "translateY(-" + scrollTop + "px)"; // translateX(-" + scrollTop + "px)
};

/* Links
--------------------------------------------- */
const circleLinks = document.querySelectorAll(".pulsating-circle");

circleLinks.forEach(l => {
  l.addEventListener("click", () => {
    let url = l.querySelector("a").getAttribute("href"); // let url = l.getAttribute("data-href");
    window.open(url, "_blank");
  })
})

/* Tabs
--------------------------------------------- */
const tabs = document.querySelectorAll(".tabs-menu li[role='tab']");
const tabContents = document.querySelectorAll(".panel-content");

tabs.forEach(tab => {
  const activate = () => activateTab(tab.getAttribute("aria-controls"));

  tab.addEventListener("click", activate);
  tab.addEventListener("keypress", (e) => {
    if (e.key === "Enter") {
      activate();
    }
  });
});

function activateTab(tabId) {
  // Deactivate all tabs
  tabs.forEach(tab => tab.setAttribute("aria-selected", "false"));
  // tabs.forEach(tab => tab.setAttribute("tabindex", "-1"));
  // alt: document.querySelectorAll(".tabs-menu li").forEach(tab => tab.classList.remove("active"));

  // Hide all tab contents
  tabContents.forEach(content => content.classList.remove("active"));
  // tabContents.forEach(content => content.querySelector("a").setAttribute("tabindex", "-1"));

  // Activate the clicked tab
  const activeTab = document.querySelector("[aria-controls='" + tabId + "']");
  activeTab.setAttribute("aria-selected", "true");
  // activeTab.setAttribute("tabindex", "0");
  // alt: const activeTab = document.querySelector("[aria-controls='" + tabId + "']").parentElement; activeTab.classList.add("active");

  // Show the corresponding tab content
  const activeTabContent = document.getElementById(tabId);
  activeTabContent.classList.add("active");
  // activeTabContent.querySelector("a").setAttribute("tabindex", "0");
}

// Marker
const tabMarker = document.querySelector("#tabs .tab-marker");
let activeTabLeft = tabMarker.style.left;
let activeTabWidth = tabMarker.style.width;

function updateActiveTabData(element) {
  activeTabLeft = element.offsetLeft + "px";
  activeTabWidth = element.offsetWidth + "px";
}

function indicator(e) {
  tabMarker.style.left = e.offsetLeft + "px";
  tabMarker.style.width = e.offsetWidth + "px";
}

tabs.forEach(t => {
  t.addEventListener("mouseover", (e) => {
    indicator(e.target);
    // tabMarker.style.opacity = 1;
  })

  t.addEventListener("mouseleave", (e) => {
    tabMarker.style.left = activeTabLeft;
    tabMarker.style.width = activeTabWidth;
    // tabMarker.style.opacity = 0;
  })

  t.addEventListener("click", (e) => {
    updateActiveTabData(e.target);
  })

  t.addEventListener("keypress", (e) => {
    if (e.key === "Enter") {
      indicator(e.target);
      updateActiveTabData(e.target);
    }
  });
})

/* Playing the video
--------------------------------------------- */
const video = document.querySelector("#video > video")
const videoMask = document.getElementById("video-mask")

// Options for the Intersection Observer
var options = {}
if (window.innerWidth > 640) {
  // Trigger when X % of the video is in the viewport
  options = {
    threshold: 0.7
  };
} else {
  options = {
    threshold: 0.85
  };
}

// Callback function to handle intersection changes
const callback = (entries, observer) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      // Play the video when it's in the viewport
      video.play();
      video.classList.add("playing"); // videoSection.classList.add("playing");
      if (window.innerWidth > 640) {
        videoMask.style.zIndex = "8";
        videoMask.classList.add("visible");
      }
    } else {
      // Pause the video when it's not in the viewport
      videoMask.classList.remove("visible"); // video.classList.remove("playing"); // videoSection.classList.remove("playing");
      if (window.innerWidth > 640) {
        setTimeout(() => {
          video.pause();
          videoMask.style.zIndex = "-1";
        }, 600)
      }
    }
  });
};

// Create a new Intersection Observer
const vidObserver = new IntersectionObserver(callback, options);
vidObserver.observe( document.querySelector("section#video") );

// Toggle video sound
const soundBtn = document.querySelector("#video > button.enable-sound")
const soundBtnTxt = soundBtn.querySelector(".button-text")
let soundBtnTxt1 = soundBtn.querySelector(".i18n-1.button-text").textContent
let soundBtnTxt2 = soundBtn.querySelector(".i18n-2").textContent

soundBtn.addEventListener("click", () => {
  video.muted = !video.muted;
  if (video.muted) {
    soundBtnTxt.textContent = soundBtnTxt1;
    soundBtn.setAttribute("aria-label", soundBtnTxt1)
  } else {
    soundBtnTxt.textContent = soundBtnTxt2;
    soundBtn.setAttribute("aria-label", soundBtnTxt2)
  }
});

// Play or pause video on click
video.addEventListener("click", () => {
  if (video.paused) {
    video.play();
  } else {
    video.pause();
  }
});

/* Custom cursor and mouse trail
--------------------------------------------- */
let cursor = document.getElementById("cursor")
let prim = document.querySelector("#cursor .primary");
let seco = document.querySelector("#cursor .secondary");
let title = document.querySelector("#cursor .title");
const areaDefaultTitle = title.textContent
let sx, px = sx = window.innerWidth / 2;
let sy, py = sy = window.innerHeight / 2;
const base_speed = 128;
const interactiveFrame = document.querySelector(".interactive-frame");
const areaTextMap = {
  0: document.querySelector(".grid-area.area-1").getAttribute('aria-label'),
  1: document.querySelector(".grid-area.area-2").getAttribute('aria-label'),
  2: document.querySelector(".grid-area.area-3").getAttribute('aria-label')
};

// Change title text
document.querySelectorAll(".grid-area:not(.area-coll)").forEach((area, index) => {
  area.addEventListener("mouseenter", () => {
    title.textContent = areaTextMap[index];
    cursor.classList.add("on-link")
  });
  area.addEventListener("mouseleave", () => {
    title.textContent = areaDefaultTitle;
    cursor.classList.remove("on-link")
  });
});

// Mouse move event listener
window.addEventListener("mousemove", event => {
  // Check if the mouse is over the interactive frame
  if (isMouseOverInteractiveFrame(event) && !isMouseOverOddityLogo(event.target)) {
    // Show cursor
    document.querySelector("#cursor").classList.add("visible")
    // Primary position
    px = event.clientX, py = event.clientY;
    prim.style.top = `${py}px`;
    prim.style.left = `${px}px`;
    // Adjust title position
    title.style.top = `${py}px`;
    title.style.left = `${px}px`;
  } else {
    // Hide cursor if not over interactive frame
    document.querySelector("#cursor").classList.remove("visible")
  }
});

// Check if the mouse is over the interactive frame
function isMouseOverInteractiveFrame(event) {
  const rect = interactiveFrame.getBoundingClientRect();
  return (
    event.clientX >= rect.left &&
    event.clientX <= rect.right &&
    event.clientY >= rect.top &&
    event.clientY <= rect.bottom
  );
}

// Check if the mouse is over the oddity logo or its descendants
function isMouseOverOddityLogo(target) {
  return target.closest('.oddity-logo') !== null;
}

// Secondary render loop
let render = (() => {
  // Calculates delta value
  if (!this.last) this.last = (new Date()).getTime();
  let delta = ((new Date()).getTime() - this.last) / 42;
  this.last = (new Date()).getTime();

  // Base speed, position difference, 
  // direction and distance
  let dx = px - sx, dy = py - sy;
  let dir = Math.atan2(dy, dx);
  let dis = Math.sqrt(dx * dx + dy * dy);

  // Ease-out transition
  let t = Math.min(dis / 500, 1);
  let speed = base_speed * ((t * t * (3.0 - 2.0 * t)) * .94 + .06) * delta;

  // Calculates new positions and dead zone
  sx += Math.cos(dir) * speed;
  sy += Math.sin(dir) * speed;
  if (dis <= 4) { sx = px; sy = py; }

  // Sets position
  seco.style.top = `${sy}px`;
  seco.style.left = `${sx}px`;
  
  title.style.top = `${sy}px`;
  title.style.left = `${sx}px`;

  // Loops around
  requestAnimationFrame(render);

}); render();
