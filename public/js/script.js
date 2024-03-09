let pages = document.querySelectorAll('.desktop .info');

pages.forEach(page => {
    let info = page.nextElementSibling;

    page.addEventListener('mouseenter', () => {
        info.style.display = "initial"
    })

    page.addEventListener('mouseout', () => {
        info.style.display = "none"
    })
});

let album = document.querySelector('.mobile .info');

let description = album.nextElementSibling;

album.addEventListener('touchstart', () => {
    if (description.style.display === "none") {
        description.style.display = "initial"
    } else {
        description.style.display = "none"
    }
})



let dropdown = document.querySelector(".dropdown");
let menu = document.querySelector('.menu')
let menuElements = document.querySelectorAll('.menu, .menu *');

    document.addEventListener('touchstart', (e) => {
        let target = false;
        menuElements.forEach(menuElement => {
            if (!target && e.target === menuElement || !target && e.target === dropdown) {
                target = true;
                if (menu.style.display === "flex" && e.target === dropdown){
                    menu.style.display = "none"
                } else {
                    menu.style.display = "flex";
                }
            }
        })
        if (!target && menu.style.display === "flex") {
            menu.style.display = "none";
        }
        if (target) {

        }
    })

document.addEventListener('touchstart', (e) => {
    if (description.style.display === "initial" && e.target === album) {
        description.style.display = "initial"
    } else if (description.style.display === "initial") {
        description.style.display = "none";
    }
})

let scrollable = document.querySelector('.scrollable')

let scrolling = scrollable.scrollHeight > scrollable.clientHeight;

if (scrolling) {
    scrollable.style.marginLeft= "var(--scrollbar)";
}

let images = document.querySelectorAll(".scrollable img")
let zoom = document.querySelector(".zoom")

zoom.addEventListener('click', (e) => {

        zoom.style.display = "none";
        zoom.innerHTML = "";

})

images.forEach(image => {
    image.addEventListener('click', () => {
        zoom.style.display = "flex";
        let chosenPhoto = document.createElement('img')
        chosenPhoto.src = image.src
        zoom.appendChild(chosenPhoto)
        console.log(image.src)
    })    
});


