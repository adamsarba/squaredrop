/* Accessibility
--------------------------------------------- */
const a11y        = document.querySelector('.footer-tools #accessibility');
const a11yBtn     = a11y.querySelector('.a11y-button');
const a11yData    = JSON.parse(localStorage.getItem('sd-a11y')) || {};

const templateDir = window.location.origin + '/wp-content/themes/really-simple';

if (cookie_consent && a11yData) {
  loadCSS();

  Object.keys(a11yData).forEach(key => {
    if (a11yData[key] === true) {
      document.body.classList.add('a11y-' + key)
    }
  });
}

const activate = () => {
  loadCSS();
  toggleMenu();

  a11y.querySelectorAll('.a11y-item a').forEach(link => {
    link.addEventListener('click', (event) => {
      event.preventDefault();

      runOption(link);
    })
  })
}

const runOption = (el) => {
  if (el.getAttribute('data-action') !== 'reset') {
    el.classList.toggle('active')
  }

  if (el.getAttribute('data-action') === 'high-contrast') {
    document.body.classList.toggle('a11y-high-contrast')
    updateLocalStorage('high-contrast', document.body.classList.contains('a11y-high-contrast'))
  } else if (el.getAttribute('data-action') === 'links-underline') {
    document.body.classList.toggle('a11y-links-underline')
    updateLocalStorage('links-underline', document.body.classList.contains('a11y-links-underline'))
  } else if (el.getAttribute('data-action') === 'readable-font') {
    document.body.classList.toggle('a11y-readable-font')
    updateLocalStorage('readable-font', document.body.classList.contains('a11y-readable-font'))
  } else if (el.getAttribute('data-action') === 'reset') {
    document.body.classList.remove('a11y-high-contrast', 'a11y-links-underline', 'a11y-readable-font')
    a11y.querySelectorAll('.a11y-item a').forEach(item => {
      item.classList.remove('active')
    })
    updateLocalStorage('reset')
  }
}

a11yBtn.addEventListener("click", activate);
a11yBtn.addEventListener("keypress", (e) => {
  if (e.key === "Enter") {
    activate();
  }
});

// Update local storage
function updateLocalStorage(option, value) {
  if (option === 'reset') {
    localStorage.removeItem('sd-a11y')
  } else {
    a11yData[option] = value
    localStorage.setItem('sd-a11y', JSON.stringify(a11yData))
  }
}

// This string stores if the toolbar has been opened before
var firstClick = true

// Open and close the menu
function toggleMenu() {
  if (!a11y.classList.contains('a11y-toolbar-open')) {
    a11y.classList.add('a11y-toolbar-open')
    a11y.setAttribute('aria-expanded', 'true')
    
    if (firstClick) {
      let a11yToolbar = document.createElement("nav")
      a11y.append(a11yToolbar)
      a11yToolbar.outerHTML = toolbarCode
      firstClick = false

      if (cookie_consent && a11yData) {
        Object.keys(a11yData).forEach(key => {
          if (a11yData[key] === true) {
            a11y.querySelector("[data-action='" + key + "']").classList.add('active')
          }
        })
      }

    } else {
      a11y.querySelector('#a11y-toolbar').style.display = "block"
    }

    if (window.innerWidth >= 900) {
      let rect = a11y.getBoundingClientRect();
      a11y.style.position = 'fixed';
      a11y.style.top = `${rect.top}px`;
      a11y.style.left = `${rect.left}px`;
    }

    if (isElementInViewport(a11y.querySelector('#a11y-toolbar'))) {
      a11y.querySelector('#a11y-toolbar').style.left = "calc(100% - 1px)"
    } 

  } else {
    a11y.classList.remove('a11y-toolbar-open')
    a11y.setAttribute('aria-expanded', 'false')
    a11y.removeAttribute('style')

    a11y.querySelector('#a11y-toolbar').style.display = "none"
  }
}

// Get the offset of an element
function getOffset(el) {
  const rect = el.getBoundingClientRect();
  return {
    left: rect.left + window.scrollX,
    top: rect.top + window.scrollY
  };
}

// Check if an element is in the viewport
function isElementInViewport(element) {
  const rect = element.getBoundingClientRect();
  const isInViewport = (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
  return !isInViewport;
}

// This string stores the name of files added till now 
var filesAdded = false;

// Load CSS file
function loadCSS() {
  if (filesAdded === true)
    return

  // Creating link element 
  let style = document.createElement('link')
  style.href = templateDir + '/a11y.css'
  style.type = 'text/css'
  style.rel = 'stylesheet'
  document.getElementsByTagName('head')[0].append(style)

  // Adding the name of the file to keep record 
  filesAdded = true
}

// Toolbar HTML code
const toolbarCode = `
  <nav id="a11y-toolbar" class="a11y-toolbar" role="navigation">
    <p class="a11y-toolbar-title">
      ${a11yLocal.TITLE}
    </p>
    <ul>
      <li class="a11y-item">
        <a href="#" aria-label="${a11yLocal.TOGGLE}" data-action="high-contrast">
          <img src="${templateDir}/icns/a11y-contrast.svg" width="14px" />
          <span>${a11yLocal.NEGATIVE_CONTRAST}</span>
        </a>
      </li>
      <li class="a11y-item">
        <a href="#" aria-label="${a11yLocal.TOGGLE}" data-action="links-underline">
          <img src="${templateDir}/icns/a11y-link.svg" width="14px" />
          <span>${a11yLocal.LINKS_UNDERLINE}</span>
        </a>
      </li>
      <li class="a11y-item">
        <a href="#" aria-label="${a11yLocal.TOGGLE}" data-action="readable-font">
          <img src="${templateDir}/icns/a11y-font.svg" width="14px" />
          <span>${a11yLocal.READABLE_FONT}</span>
        </a>
      </li>
      <li class="a11y-item">
        <a href="#" aria-label="${a11yLocal.TOGGLE}" data-action="reset">
          <img src="${templateDir}/icns/a11y-reset.svg" width="14px" />
          <span>${a11yLocal.RESET}</span>
        </a>
      </li>
    </ul>
  </nav>
`