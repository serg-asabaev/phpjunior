console.log('attat');
var submit = document.getElementById('submit');


submit.onclick = function () {
    var username = document.getElementById('name').value;
    var pass = document.getElementById('password').value;
    var flag = true;

    if (username != null || username != "") {
        if (pass != null || pass != "") {
            if (pass.length >= 4) {
                if (pass.length <= 100) {
                    alert("ты красавчик");
                } else {
                    flag = false;
                    alert('Длина пароля должна быть не более 100 символов!');
                }
            } else {
                flag = false;
                alert("Длина пароля должна быть не менее 4 символов!");
            }
        } else {
            flag = false;
            alert("Введите пароль!");
        }
    } else {
        flag = false;
        alert("Введите имя пользователя!");
    }

    if (!event.isDefaultPrevented()) {
        // предотвратим действие по умолчанию (событие отправки с формы)
        event.returnValue = flag;
    }
}