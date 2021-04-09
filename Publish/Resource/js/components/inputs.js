window.$inputs = {};

window.$inputs.passwordToogle = function (id) {
    var field = document.querySelector('#'+id);
    if (field.attributes["type"].value == 'password') {
        field.attributes["type"].value = 'text';
    } else {
        field.attributes["type"].value = 'password';
    }
}

// Function that enable the dark mode
window.$inputs.lightToogle = function () {
    var element = document.getElementsByTagName('html');
    // Toogle dark mode
    element[0].classList.toggle("dark");
    // check if has the class
    if (element[0].classList.contains("dark")) {
        console.log('dark mode enable');
    } else {
        console.log('dark mode disable');
    }
}
