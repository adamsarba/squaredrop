/* Navigation scripts
--------------------------------------------- */
if (window.innerWidth <= 768) {
  // Add text to social media icons
  const instagram = document.querySelector('.menu-icons a[href*="instagram"]')
  instagram.innerHTML = instagram.innerHTML + '<span class="only-mobile">@squaredrop</span>';

  // Add arrows to menu items with children
  document.querySelectorAll('.really-first-menu .menu-item-has-children > a').forEach(function(item) {
    item.insertAdjacentHTML('beforeend', '<span class="arrow"></span>');
  });

  // Close sub menus on mobile
  document.getElementById('site-navigation').classList.add('mobile');
  document.querySelectorAll('.menu-item-has-children > a').forEach( (item) => {
    item.querySelector('.arrow').addEventListener('click', function(e) {
      e.preventDefault();
      item.parentElement.classList.toggle('opened');
    });
  });
}

// Prevent body from scrolling when mobile menu is opened
document.querySelector('.open-nav-mobile').addEventListener('click', function(e) {
  setTimeout(() => {
    document.body.classList.add('mobile-menu-opened');
  }, 0) // Animation timeout
});

document.querySelector('.close-nav-mobile').addEventListener('click', function(e) {
  document.body.classList.remove('mobile-menu-opened');
  document.querySelectorAll('.opened').forEach( (item) => {
    item.classList.remove('opened');
  });
});

document.querySelector('.close-search').addEventListener('click', function(e) {
  document.body.classList.remove('mobile-menu-opened');
});

/* Sticky navigation
--------------------------------------------- */
const headerMenu = document.querySelector('header#masthead');
const introSection = document.querySelector('#intro');
let lastScrollTop = 0;

window.addEventListener('scroll', () => {
  let currentScroll = window.pageYOffset || document.documentElement.scrollTop; // Get current scroll position
  let introBottom = introSection ? introSection.offsetHeight + introSection.offsetTop : 0; // Check if we are past the intro section on the home page
  
  if (window.innerWidth >= 769) {
    // Check if user is on top of the page or we are not past the intro section on the home page
    if ( currentScroll <= 0 || (document.body.classList.contains('home') && currentScroll < introBottom) ) {
      headerMenu.classList.remove('header-hidden');
      setTimeout(() => {
        headerMenu.classList.remove('header-sticky');
      }, 600)        
    } else {
      if (currentScroll > lastScrollTop) {
        // Scrolling down
        headerMenu.classList.add('header-hidden');
      } else {
        // Scrolling up
        headerMenu.classList.remove('header-hidden');
        headerMenu.classList.add('header-sticky');
      }
    }
  }
  
  lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // Update scroll position
}, false);

/* Multilanguage scripts
--------------------------------------------- */
// Replace text in menu with the mapped value
function replaceMenuText() {
  const textMap = {
    'Polish': 'PL', 'Polski': 'PL', 'English': 'EN', 'Angielski': 'EN'
  };
  const menuItems = document.querySelectorAll('.menu-icons .wpml-ls-native');
  menuItems.forEach(item => {
    const text = item.textContent.trim();
    if (textMap.hasOwnProperty(text)) {
      item.textContent = textMap[text];
    }
  });
};

if (window.innerWidth >= 769) {
  replaceMenuText();
};

if (window.innerWidth <= 768) {
  const currentLang = document.querySelector('.wpml-ls-menu-item')
  const secondLang = currentLang.querySelector('.sub-menu a')
  if (secondLang) {
    currentLang.querySelector('a').classList.add('current')
    currentLang.append(secondLang)
    currentLang.querySelector('.sub-menu').remove()
    currentLang.querySelector('.arrow').remove()
  }
};

/* Back to top
--------------------------------------------- */
const backToTop = document.querySelector('.back-to-top');
let backToTopOffset = 300

document.addEventListener('DOMContentLoaded', function () {
  window.onscroll = function () {
    scrollFunction()
  };
});

function scrollFunction() {
  if (document.body.scrollTop > backToTopOffset || document.documentElement.scrollTop > backToTopOffset) {
    backToTop.classList.add('visible')
  } else {
    backToTop.classList.remove('visible')
  }
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

/* Cookies Consent
--------------------------------------------- */
const cookiesEl = document.getElementById('cookies-notice');
document.body.appendChild(cookiesEl);

// Create cookie
function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = 'expires='+ d.toUTCString();
  document.cookie = cname + '=' + cvalue + ';' + expires + ';path=/';
}

// Delete cookie
function deleteCookie(cname) {
  const d = new Date();
  d.setTime(d.getTime() + (24*60*60*1000));
  let expires = 'expires='+ d.toUTCString();
  document.cookie = cname + '=;' + expires + ';path=/';
}

// Read cookie
function getCookie(cname) {
  let name = cname + '=';
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return '';
}

// Set cookie consent
function acceptCookieConsent(){
  deleteCookie('sd-cookie');
  setCookie('sd-cookie', 1, 30);
  cookiesNoticeClosed()
}

function cookiesNoticeOpened() {
  cookiesEl.style.display = 'block';
  document.body.classList.add('cookies-visible');
  document.body.style.paddingBottom = cookiesEl.getBoundingClientRect().height + 'px';
}

function cookiesNoticeClosed() {
  cookiesEl.style.display = 'none';
  document.body.classList.remove('cookies-visible');
  document.body.style.paddingBottom = '0';
}

// Check the cookie acceptance flag in JavaScript Cookies when the web page is loaded
let cookie_consent = getCookie('sd-cookie');

document.addEventListener('DOMContentLoaded', function() {
  if (cookie_consent != '') {
    cookiesNoticeClosed()
  } else {
    cookiesNoticeOpened()
  }
});
