<?php
// Include database connection
include('db.php');

$message = '';
$messageType = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $firstname = $_POST['name'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $date = $_POST['dob'] ?? '';
    $address = $_POST['address'] ?? '';
    
    // Validate required fields
    if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($phone)) {
        $message = "Please fill in all required fields!";
        $messageType = "error";
    } else {
        // Insert data into database
       $stmt = $conn->prepare("INSERT INTO registration_form 
(firstname, lastname, email, password, phone, date, address) 
VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        $stmt->bind_param("sssssss", $firstname, $lastname, $email, $password, $phone, $date, $address);
        
        if ($stmt->execute()) {
            $message = "Registration successful! Your data has been saved.";
            $messageType = "success";
        } else {
            $message = "Error: " . $stmt->error;
            $messageType = "error";
        }
        
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="icon" href="./src/santa-claus.png" />
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-container">
    <h2 class="form-title">Registration Form</h2><br>
    
    <?php if (!empty($message)): ?>
        <div class="message message-<?php echo $messageType; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="">

        <div class="form-group">
            <label for="name">First Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your First name" required>
        </div>

         <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" placeholder="Enter your Last name" required>
        </div>

        
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

        
        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
        </div>

        
        <div class="form-group">
            <label>Gender:</label>
            <div class="radio-group">
                <label class="radio-label">
                    <input type="radio" name="gender" value="male"> Male
                </label>
                <label class="radio-label">
                    <input type="radio" name="gender" value="female"> Female
                </label>
            </div>
        </div>

        
        <div class="form-group">
            <label>Hobbies:</label>
            <div class="checkbox-group">
                <label class="checkbox-label">
                    <input type="checkbox" name="hobby" value="reading"> Reading
                </label>
                <label class="checkbox-label">
                    <input type="checkbox" name="hobby" value="sports"> Sports
                </label>
                <label class="checkbox-label">
                    <input type="checkbox" name="hobby" value="music"> Music
                </label>
            </div>
        </div>

        
        <div class="form-group">
            <label for="course">Select Course:</label>
            <select id="course" name="course">
                <option value="">--Select--</option>
                <option value="bca">BCA</option>
                <option value="btech">B.Tech</option>
                <option value="mca">MCA</option>
            </select>
        </div>

        
        <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob">
        </div>

        
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea id="address" name="address" placeholder="Enter your address"></textarea>
        </div>


        <div class="button-group">
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </div>
        
        <div>
            <br> <br>
            <p class="register-p">Already have an account ?<a href="/login.php" class="Register-link">Log in</a></p>
        </div>
    </form>


</div>

<script src="script.js"></script>
</body>
</html>