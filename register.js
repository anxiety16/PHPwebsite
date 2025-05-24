function validateForm() {
    const fname = document.forms["regForm"]["first_name"].value.trim();
    const mname = document.forms["regForm"]["middle_name"].value.trim();
    const lname = document.forms["regForm"]["last_name"].value.trim();
    const email = document.forms["regForm"]["email"].value.trim();
    const mobile = document.forms["regForm"]["mobile"].value.trim();
    const password = document.forms["regForm"]["password"].value;

    // Name validation
    if (fname.length < 2 || lname.length < 2) {
        alert("First and Last name must be at least 2 characters long.");
        return false;
    }
    if (mname && mname.length < 2) {
        alert("Middle name must be at least 2 characters long if filled.");
        return false;
    }

    // Email validation
    if (!email.endsWith("@gmail.com")) {
        alert("Email must end with @gmail.com");
        return false;
    }

    // Mobile validation: Must be 11 digits, start with 0
    const mobileRegex = /^0\d{10}$/;
    if (!mobileRegex.test(mobile)) {
        alert("Mobile number must start with 0 and be exactly 11 digits.");
        return false;
    }

    // Password validation
    const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
    if (!passwordRegex.test(password)) {
        alert("Password must be at least 8 characters and include at least 1 uppercase letter, 1 number, and 1 special character.");
        return false;
    }

    return true;
}
function validateForm() {
    var pw = document.getElementById("password").value;
    var cpw = document.getElementById("confirm_password").value;
    if (pw !== cpw) {
      alert("Passwords do not match.");
      return false;
    }
    return true;
  }