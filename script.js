// wait till page loads
document.addEventListener("DOMContentLoaded", function () {

    var password = document.getElementById("password");
    var checkbox = document.getElementById("showPassword");
    var form = document.querySelector("form");

    // show/hide password
    checkbox.addEventListener("change", function () {
        if (checkbox.checked) {
            password.type = "text";
        } else {
            password.type = "password";
        }
    });

    // form validation
    form.addEventListener("submit", function (e) {

        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var phone = document.getElementById("phone").value;

        // name check
        if (name === "") {
            alert("Please enter your name");
            e.preventDefault();
            return;
        }

        // email check
        if (email.indexOf("@") === -1) {
            alert("Enter valid email");
            e.preventDefault();
            return;
        }

        // phone check (10 digits simple check)
        if (phone.length < 10) {
            alert("Enter valid phone number");
            e.preventDefault();
            return;
        }

        alert("Form submitted successfully!");
    });

});