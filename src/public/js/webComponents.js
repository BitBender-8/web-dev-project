const avatarHtml = `
<div id="login-avatar">
    <link rel="stylesheet" href="/src/public/styles/avatar.css">
    <a class="container" href="#" rel="noopener noreferrer">
        <span id="logged-in" class="icon">
            <svg width="24px" height="24px" viewBox="0 0 1024 1024"
                fill="currentColor" role="img"
                xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor"
                    d="M521.7 82c-152.5-.4-286.7 78.5-363.4 197.7c-3.4 5.3.4 12.3 6.7 12.3h70.3c4.8 0 9.3-2.1 12.3-5.8c7-8.5 14.5-16.7 22.4-24.5c32.6-32.5 70.5-58.1 112.7-75.9c43.6-18.4 90-27.8 137.9-27.8c47.9 0 94.3 9.3 137.9 27.8c42.2 17.8 80.1 43.4 112.7 75.9c32.6 32.5 58.1 70.4 76 112.5C865.7 417.8 875 464.1 875 512c0 47.9-9.4 94.2-27.8 137.8c-17.8 42.1-43.4 80-76 112.5s-70.5 58.1-112.7 75.9A352.8 352.8 0 0 1 520.6 866c-47.9 0-94.3-9.4-137.9-27.8A353.84 353.84 0 0 1 270 762.3c-7.9-7.9-15.3-16.1-22.4-24.5c-3-3.7-7.6-5.8-12.3-5.8H165c-6.3 0-10.2 7-6.7 12.3C234.9 863.2 368.5 942 520.6 942c236.2 0 428-190.1 430.4-425.6C953.4 277.1 761.3 82.6 521.7 82zM395.02 624v-76h-314c-4.4 0-8-3.6-8-8v-56c0-4.4 3.6-8 8-8h314v-76c0-6.7 7.8-10.5 13-6.3l141.9 112a8 8 0 0 1 0 12.6l-141.9 112c-5.2 4.1-13 .4-13-6.3z" />
            </svg>
        </span>
        <span id="logged-out" class="icon">
            <svg width="24px" height="24px" viewBox="0 0 32 32"
                fill="currentColor" role="img"
                xmlns="http://www.w3.org/2000/svg">
                <path fill="currentColor"
                    d="M16 8a5 5 0 1 0 5 5a5 5 0 0 0-5-5Zm0 8a3 3 0 1 1 3-3a3.003 3.003 0 0 1-3 3Z" /><path
                    fill="currentColor"
                    d="M16 2a14 14 0 1 0 14 14A14.016 14.016 0 0 0 16 2Zm-6 24.377V25a3.003 3.003 0 0 1 3-3h6a3.003 3.003 0 0 1 3 3v1.377a11.899 11.899 0 0 1-12 0Zm13.992-1.451A5.002 5.002 0 0 0 19 20h-6a5.002 5.002 0 0 0-4.992 4.926a12 12 0 1 1 15.985 0Z" />
            </svg>
        </span>
        <span id="login-text"></span>
    </a>
</div>`;

const avatarTemplate = document.createElement('template');
avatarTemplate.innerHTML = avatarHtml;

window.customElements.define('login-avatar', class LoginAvatar extends HTMLElement {
    constructor() {
        super();
        this.attachShadow({ mode: 'open' });
        this.shadowRoot.appendChild(avatarTemplate.content.cloneNode(true));

        // Defining href attribute
        const redirectUrl = this.getAttribute('href');
        this.shadowRoot.querySelector('a').setAttribute('href', redirectUrl);

        // Defining length and width attributes
        const svgElements = this.shadowRoot.querySelectorAll('svg');
        svgElements.forEach(svg => {
            const width = this.getAttribute('width');
            const height = this.getAttribute('height');

            // Check for null values before setting attributes
            if (width !== null) {
                svg.setAttribute('width', width);
            }
            if (height !== null) {
                svg.setAttribute('height', height);
            }
        });


        // Defining viewbox attribute
        const viewBox = this.getAttribute('viewBox');
        svgElements.forEach(svg => {
            const viewBox = this.getAttribute('viewBox');

            // Check for null value before setting attribute
            if (viewBox !== null) {
                svg.setAttribute('viewBox', viewBox);
            }
        });
    }

    connectedCallback() {
        this.updateLoginState();
    }

    static get observedAttributes() {
        return ['logged-in']; // Define which attributes to observe changes for
    }

    attributeChangedCallback(name, oldValue, newValue) {
        if (name === 'logged-in') {
            this.updateLoginState(); // Handle attribute change
        }
    }

    updateLoginState() {
        const isLoggedIn = this.hasAttribute('logged-in');
        if (isLoggedIn) {
            this.shadowRoot.querySelector('#logged-in').style.display = 'block';
            this.shadowRoot.querySelector('#logged-out').style.display = 'none';
            this.shadowRoot.querySelector('#login-text').textContent = 'Log out';
            this.shadowRoot.querySelector('.container').setAttribute('href', '/src/auth/logout.php');
        } else {
            this.shadowRoot.querySelector('#logged-in').style.display = 'none';
            this.shadowRoot.querySelector('#logged-out').style.display = 'block';
            this.shadowRoot.querySelector('#login-text').innerHTML = 'Log in | Sign up';
            this.shadowRoot.querySelector('.container').setAttribute('href', '/src/auth/login.php');
        }
    }
});


const navBarHtml = `
<link rel="stylesheet" href="/src/public/styles/navbar.css">

<div class="navbar">
    <h2 class="page-title">Page Title</h2>
    <button type="button" class="hamburger">
        <svg width="32px" height="32px" viewBox="0 0 16 16" fill="currentColor"
            x="128" y="128" role="img" alt="hamburger-menu"
            xmlns="http://www.w3.org/2000/svg">
            <path fill="none" stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="1.5"
                d="M2.75 12.25h10.5m-10.5-4h10.5m-10.5-4h10.5" />
        </svg>
    </button>
</div>
<div id="sidebar">
    <a href="/src/index.html" rel="noopener noreferrer" class="home">Vital Events</a>
    <div class="navitem-container">
        <slot></slot>
    </div>
    <div class="menu-container">
        <login-avatar></login-avatar>
        <a class="report-icon" href="/src/report.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
            viewBox="0 0 48 48"><defs><mask id="ipSTableReport0"><g fill="none"
                        stroke-linejoin="round" stroke-width="4"><path
                            fill="#fff" stroke="#fff"
                            d="M5 7a3 3 0 0 1 3-3h24a3 3 0 0 1 3 3v37H8a3 3 0 0 1-3-3z" /><path
                            stroke="#fff"
                            d="M35 24a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v17a3 3 0 0 1-3 3h-5z" /><path
                            stroke="#000" stroke-linecap="round"
                            d="M11 12h8m-8 7h12" /></g></mask></defs><path
                fill="currentColor" d="M0 0h48v48H0z"
                mask="url(#ipSTableReport0)" /></svg>
                Reports
        </a>
    </div>
</div>
`;

const navBarTemplate = document.createElement('template');
navBarTemplate.innerHTML = navBarHtml;

window.customElements.define('nav-bar', class NavBar extends HTMLElement {
    constructor() {
        super();
        this.attachShadow({ mode: 'open' });
        this.shadowRoot.appendChild(navBarTemplate.content.cloneNode(true));

        this.sideBarVisible = false;
        this.shadowRoot.querySelector('.page-title').innerText = this.getAttribute('title');

        // Login state for avatar
        if (this.hasAttribute('logged-in')) {
            this.shadowRoot.querySelector('login-avatar').setAttribute('logged-in', '');
        } else {
            this.shadowRoot.querySelector('login-avatar').removeAttribute('logged-in');
        }

        // Bind event handlers
        this.toggleSidebar = this.toggleSidebar.bind(this);
        this.handleOutsideClick = this.handleOutsideClick.bind(this);
    }

    connectedCallback() {
        this.shadowRoot.querySelector('.hamburger').addEventListener('click', this.toggleSidebar);
        document.addEventListener('click', this.handleOutsideClick);
    }

    disconnectedCallback() {
        this.shadowRoot.querySelector('.hamburger').removeEventListener('click', this.toggleSidebar);
        document.removeEventListener('click', this.handleOutsideClick);
    }

    toggleSidebar(event) {
        event.stopPropagation(); // Prevent the click from propagating to document
        this.sideBarVisible = !this.sideBarVisible;
        const sideBar = this.shadowRoot.querySelector('#sidebar');

        if (this.sideBarVisible) {
            sideBar.style.left = "0px";
        } else {
            sideBar.style.left = "-314px";
        }
    }

    handleOutsideClick(event) {
        if (!this.contains(event.target) && this.sideBarVisible) {
            this.toggleSidebar(event); // Close sidebar if clicked outside
        }
    }
});


const siteFooterHtml = `
<link href="/src/public/styles/fontawesome/css/fontawesome.min.css"
            rel="stylesheet">
<link href="/src/public/styles/fontawesome/css/all.min.css"
            rel="stylesheet">
<link href="/src/public/styles/site-footer.css" rel="stylesheet">
<footer>
    <div class="info-container">
        <div class="other-info">
            <span class="contact-info">
                <h2>Contact Information</h2>
                <p><i class="fa-regular fa-envelope"></i>vitaleventregistration@example.com</p>
                <p><i class="fa-regular fa-map"></i>4 Kilo, Addis Ababa, Ethiopia</p>
                <p><i class="fa-solid fa-phone"></i>+251 912 345 6789</p>
            </span>
            <span class="help-info">
                <h2>Help</h2>
                <p>FAQ</p>
            </span>
        </div>
        <div class="legal-info">
            <span>&copy; 2024 Vital Event Registration Website</span>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Service</a>
        </div>
    </div>
</footer>
`;
const siteFooterTemplate = document.createElement('template');
siteFooterTemplate.innerHTML = siteFooterHtml;

window.customElements.define('site-footer', class SiteFooter extends HTMLElement {
    constructor() {
        super();
        this.attachShadow({ mode: 'open' });
        this.shadowRoot.appendChild(siteFooterTemplate.content.cloneNode(true));
    }
});