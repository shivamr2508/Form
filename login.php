<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <div class="form-container">
        <h2 class="form-title">Login Form</h2><br>

        <form>
             <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" class="hello-one" name="email" placeholder="Enter your email address">
        </div>

        
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <div class="checkbox-group" style="margin-top: 10px;">
                <label class="checkbox-label">
                    <input type="checkbox" id="showPassword" name="showPassword"> Show Password
                </label>
            </div>
        </div>

         <div class="button-group">
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </div> <br> <br> <br>


        <p class="register-p">Don't have an account ?<a href="/index.php" class="Register-link">Register</a></p>
        </form>
    </div>

    <script src="/script.js"></script>
    
</body>
</html>