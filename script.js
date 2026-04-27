
document.addEventListener("DOMContentLoaded", function () {

    var password = document.getElementById("password");
    var checkbox = document.getElementById("showPassword");
    var form = document.querySelector("form");

    
    checkbox.addEventListener("change", function () {
        if (checkbox.checked) {
            password.type = "text";
        } else {
            password.type = "password";
        }
    });

    form.addEventListener("submit", function (e) {

        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var phone = document.getElementById("phone").value;

        
        if (name === "") {
            alert("Please enter your name");
            e.preventDefault();
            return;
        }

        
        if (email.indexOf("@") === -1) {
            alert("Enter valid email");
            e.preventDefault();
            return;
        }

        
        if (phone.length < 10 || phone.length > 10) {
            alert("Enter valid phone number");
            e.preventDefault();
            return;
        } else if(isNaN(phone)) {
            alert("Only numbers allowed!");
            e.preventDefault();
            return;
}

        alert("Form submitted successfully!");
    });

});