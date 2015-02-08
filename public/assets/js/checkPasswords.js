function checkPassword() {
    // Store the password fields
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    
    // Store the confirmation message object
    var message = document.getElementById('confirmMessage');
    
    // Set the colors
    var goodColor = '#66cc66';
    var badColor = '#ff6666';
    
    // Compare the values in the password fields
    if (pass1.value == pass2.value) {
        // The passwords match
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!";
    }
    else {
        // The passwords do not match
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!";
    }
    
}