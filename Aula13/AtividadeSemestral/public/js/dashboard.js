    const nav = document.getElementById("navbar");
    const btnMenu = document.getElementById("btn-menu");

    btnMenu.addEventListener("click", () => {
        nav.classList.toggle("expanded");
    });
