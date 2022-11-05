class MobileNavbar {
    constructor(mobileMenu, navList, navLinks ) {
        this.mobileMenu = document.querySelector(mobileMenu);
        this.navList = document.querySelector(navList);
        this.navLinks = document.querySelectorAll(navLinks)
        this.activeClass = "active";
    }

    addClickEvent() {
        this.mobileMenu.addEventListener("click", ()=> console.log("olá"));
    }

    init() {
        if(this.mobileMenu) {
            this.addClickEvent();   
        }
        return this;
    }
}

const mobileNavbar = new MobileNavbar (
    ".navbar",
    ".navlist",
    ".navlist li",
);

mobileNavbar.init();