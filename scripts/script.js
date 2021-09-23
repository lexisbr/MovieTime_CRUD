const activeButton = () => {
    let path = window.location.pathname;
    let page = path.split("/").pop();
    console.log(page);
    if(page == "index.php"){
        changeClass('','active');
    }
    else if(page == "agregar.php"){
        changeClass('registro','active');
    }
    else if(page == "visualizar.php"){
        changeClass('lista','active');
    }
}

const changeClass = (id, class_) => {
    let elementos = document.getElementsByClassName(class_);
    for (let elemento of elementos) {
        document.getElementById(elemento.id).className = "";
    }
    let element = document.getElementById(id);
    if (element != null) {
        element.className = class_;
    }
};


activeButton();
