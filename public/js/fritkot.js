let pages = document.querySelectorAll('.page');
let wrapper = document.querySelector('.page-wrapper');

pages.forEach(page => {
    page.addEventListener('dragstart', () => {
        page.classList.add('dragging');
    })

    page.addEventListener('dragend', () => {
        page.classList.remove('dragging');
    })
})

if (wrapper) {
    wrapper.addEventListener('dragover', e => {
        e.preventDefault();
        const afterElement = getDragAfterElement(wrapper, e.clientY);
        const page = document.querySelector('.dragging'); 
        if (afterElement == null) {
            wrapper.appendChild(page);
        } else {
            wrapper.insertBefore(page, afterElement);
        }
    })
}


function getDragAfterElement(wrapper, y) {
    const draggableElements = [...wrapper.querySelectorAll('.page:not(.dragging)')];
    return draggableElements.reduce((closest, child) => {
        const box = child.getBoundingClientRect();
        const offset = y - box.top - box.height / 2
        if (offset < 0 && offset > closest.offset) {
            return {offset: offset, element: child}
        } else {
            return closest;
        }
    }, { offset: Number.NEGATIVE_INFINITY}).element;
}

let photos = document.querySelectorAll('.foto');
let columns = document.querySelectorAll('.columnwrapper div');

photos.forEach(photo => {
    photo.addEventListener('dragstart', () => {
        photo.classList.add('dragging');
    })

    photo.addEventListener('dragend', () => {
        photo.classList.remove('dragging');
        updateHiddenInputs(photo);
    })
})

columns.forEach(column => {
    column.addEventListener('dragover', e => {
        e.preventDefault();
        const afterElement = getDragAfterElement(column, e.clientY);
        const page = document.querySelector('.dragging'); 
        if (afterElement == null) {
            column.appendChild(page);
        } else {
            column.insertBefore(page, afterElement);
        }
    })    
});


function getDragAfterElement(column, y) {
    const draggableElements = [...column.querySelectorAll('.foto:not(.dragging)')];
    return draggableElements.reduce((closest, child) => {
        const box = child.getBoundingClientRect();
        const offset = y - box.top - box.height / 2
        if (offset < 0 && offset > closest.offset) {
            return {offset: offset, element: child}
        } else {
            return closest;
        }
    }, { offset: Number.NEGATIVE_INFINITY}).element;
}

function updateHiddenInputs(foto) {
    const parentElement = foto.parentNode;
    let input = foto.querySelector('input');
    input.name = "column" + parentElement.id + "_row[]"
}

