const avatarTemplate = document.createElement('template');
avatarTemplate.innerHTML = `
<style>
    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        padding-left: 8px;
    }
    .icon {
        margin: 4px;
    }
    .logged-in {
        display: block;
    }
    .logged-out {
        display: none;
    }
</style>
<div class="container">
    <span class="icon logged-in">
        <svg width="32px" height="32px" viewBox="0 0 1024 1024" fill="currentColor" x="128" y="128" role="img" style="display:inline-block;vertical-align:middle" xmlns="http://www.w3.org/2000/svg">
            <path fill="currentColor" d="M521.7 82c-152.5-.4-286.7 78.5-363.4 197.7c-3.4 5.3.4 12.3 6.7 12.3h70.3c4.8 0 9.3-2.1 12.3-5.8c7-8.5 14.5-16.7 22.4-24.5c32.6-32.5 70.5-58.1 112.7-75.9c43.6-18.4 90-27.8 137.9-27.8c47.9 0 94.3 9.3 137.9 27.8c42.2 17.8 80.1 43.4 112.7 75.9c32.6 32.5 58.1 70.4 76 112.5C865.7 417.8 875 464.1 875 512c0 47.9-9.4 94.2-27.8 137.8c-17.8 42.1-43.4 80-76 112.5s-70.5 58.1-112.7 75.9A352.8 352.8 0 0 1 520.6 866c-47.9 0-94.3-9.4-137.9-27.8A353.84 353.84 0 0 1 270 762.3c-7.9-7.9-15.3-16.1-22.4-24.5c-3-3.7-7.6-5.8-12.3-5.8H165c-6.3 0-10.2 7-6.7 12.3C234.9 863.2 368.5 942 520.6 942c236.2 0 428-190.1 430.4-425.6C953.4 277.1 761.3 82.6 521.7 82zM395.02 624v-76h-314c-4.4 0-8-3.6-8-8v-56c0-4.4 3.6-8 8-8h314v-76c0-6.7 7.8-10.5 13-6.3l141.9 112a8 8 0 0 1 0 12.6l-141.9 112c-5.2 4.1-13 .4-13-6.3z"/>
        </svg>
    </span>
    <span class="icon logged-out">
        <svg width="32px" height="32px" viewBox="0 0 32 32" fill="currentColor" x="128" y="128" role="img" style="display:inline-block;vertical-align:middle" xmlns="http://www.w3.org/2000/svg">
            <path fill="currentColor" d="M16 8a5 5 0 1 0 5 5a5 5 0 0 0-5-5Zm0 8a3 3 0 1 1 3-3a3.003 3.003 0 0 1-3 3Z"/><path fill="currentColor" d="M16 2a14 14 0 1 0 14 14A14.016 14.016 0 0 0 16 2Zm-6 24.377V25a3.003 3.003 0 0 1 3-3h6a3.003 3.003 0 0 1 3 3v1.377a11.899 11.899 0 0 1-12 0Zm13.992-1.451A5.002 5.002 0 0 0 19 20h-6a5.002 5.002 0 0 0-4.992 4.926a12 12 0 1 1 15.985 0Z"/>
        </svg>
    </span>
<span class="text">Log in</span>
</div>
`;
// TODO Clicking user-avatar while logged out redirects to login page.
// TODO While logged in redirects to logout page
// TODO Whether user is logged in or not is passed in using attributes.
window.customElements.define('login-avatar', class LoginAvatar extends HTMLElement {
    constructor() {
        super();

        this.attachShadow({ mode: 'open' });
        this.shadowRoot.appendChild(avatarTemplate.content.cloneNode(true));
    }

    connectedCallback() {

    }

    disconnectedCallback() {

    }
});

const navBarTemplate = document.createElement('template');
navBarTemplate.innerHTML = `
<link rel="stylesheet" href="./styles/styles.css">
<style>
    :host {
        --navbar-color-foreground: white;
        --navbar-color-background: #141313;
    }

    h2 {
        margin: 0px;
    }
    
    .navbar {
        position: fixed;
        top: 0px;
        left: 0px;

        background-color: var(--navbar-color-background);
        color: var(--navbar-color-foreground);
        padding: 12px;
        width: 100%;
        height: 36px;
        border-bottom: 1px solid var(--navbar-color-foreground);

        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .hamburger {
        background-color: transparent;
        color: var(--navbar-color-foreground);
        margin-right: 36px;
        border: 1px solid transparent;
        border-radius: 4px;
        cursor: pointer;
    }
    
    .hamburger:hover {
        border: 1px solid var(--navbar-color-foreground);
        border-radius: 4px;
    }

    #sidebar {
        position: fixed;
        top: 0px;
        left: -250px;
        height: 100%;
        width: 250px;
        background-color: var(--navbar-color-background);
        color: var(--navbar-color-foreground);
        box-sizing: border-box;
        padding-top: 60px;
        transition: left 0.3s ease;
    }

    .navitem {
        display: block
        width: 100%;
        border-bottom: 2px solid var(--navbar-color-foreground);
    }

    .home {
        position: absolute;
        top: 0px;
        width: 100%;
        height: 60px;
        font-size: 18pt;
        font-weight: bold;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .navitem-container {
        /* background-color: yellow; */
        width: 100%;
        height: 93%;
    }

    .menu-container {
        position: absolute;
        width: 100%;
        left: 0px;
        bottom: 0px;
        margin: 8px 0px 10px 0px;
        padding: 0px 0px 0px 0px;
        display: flex;
        justify-content: space-between;
    }
</style>

<div class="navbar">
    <h2 class="page-title">Page Title</h2>
    <button class="hamburger">
        <svg width="32px" height="32px" viewBox="0 0 16 16" fill="currentColor" x="128" y="128" role="img" style="display:inline-block;vertical-align:middle" xmlns="http://www.w3.org/2000/svg">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.75 12.25h10.5m-10.5-4h10.5m-10.5-4h10.5"/>
        </svg>
    </button>
</div>

<div id="sidebar">
    <div class="home">
        Vital Events
    </div>
    <div class="navitem-container">
        <li>
            <a href="./forms/adoption.php" rel="noopener noreferrer">Adoption</a>
        </li>
        <li>
            <a href="./forms/birth.php" rel="noopener noreferrer">Live birth</a>
        </li>
        <li>
            <a href="./forms/marriage.php" rel="noopener noreferrer">Marriage</a>
        </li>
        <li>
            <a href="./forms/separation.php" rel="noopener noreferrer">Legal separation</a>
        </li>
        <li>
            <a href="./forms/annulment.php" rel="noopener noreferrer">Annulment</a>
        </li>
        <li>
            <a href="./forms/death.php" rel="noopener noreferrer">Death</a>
        </li>
        <li>
            <a href="./forms/recognition.php" rel="noopener noreferrer">Parental recognition</a>
        </li>
        <li>
            <a href="./forms/stillbirth.php" rel="noopener noreferrer">Stillbirth</a>
        </li>
        <li>
            <a href="./forms/divorce.php" rel="noopener noreferrer">Divorce</a>
        </li>
        <li>
            <a href="./report.php" rel="noopener noreferrer">Report</a>
        </li>
    </div>
    <div class="menu-container">
        <login-avatar class="menuitem"></login-avatar>
    </div>
</div>
`;
// TODO How to add navigation links using slots? Icon for report goes next to login avatar
window.customElements.define('nav-bar', class NavBar extends HTMLElement {
    constructor() {
        super();
        this.sideBarVisible = false;

        this.attachShadow({ mode: 'open' });
        this.shadowRoot.appendChild(navBarTemplate.content.cloneNode(true));
        this.shadowRoot.querySelector('h2').innerText = this.getAttribute('page-title');


    }

    connectedCallback() {
        this.shadowRoot.querySelector('.hamburger').addEventListener('click', () => this.toggleSidebar());
    }

    disconnectedCallback() {
        this.shadowRoot.querySelector('.hamburger').removeEventListener('click', () => this.toggleSidebar());
    }

    toggleSidebar() {
        this.sideBarVisible = !this.sideBarVisible;
        const sideBar = this.shadowRoot.querySelector('#sidebar');

        if (this.sideBarVisible) {
            sideBar.style.left = "0px";
        } else {
            sideBar.style.left = "-250px";
        }
    }
});