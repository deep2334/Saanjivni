
// Function to set error messages
function seterror(id, error){
    // Find the element by ID and set its inner text to the provided error message
    document.getElementById(id).innerText = error;
}

// Function to validate the form
function validateForm(){
    var returnval = true;

    // Clear any previous error messages
    var errorElements = document.getElementsByClassName("form-error");
    for (var i = 0; i < errorElements.length; i++) {
        errorElements[i].innerText = "";
    }

    // Extract form field values
    var name = document.forms["myForm"]["name"].value.trim();
    var mobno = document.forms["myForm"]["ContactNumber"].value.trim();
    var email = document.forms["myForm"]["EmailId"].value.trim();
    var BloodGroup = document.forms["myForm"]["BloodGroup"].value.trim();
    var BloodRequirefor = document.forms["myForm"]["BloodRequirefor"].value.trim();
    var password = document.forms["myForm"]["password"].value.trim();

    // Validation for Name field
    if (name === "") {
        seterror("nameError", "*Name must be filled out");
        returnval = false;
    } else if (!/^[a-zA-Z ]+$/.test(name)) {
        seterror("nameError", "*Name must contain only alphabetic characters");
        returnval = false;
    } else if (name.length < 5) {
        seterror("nameError", "*Name too short");
        returnval = false;
    }

    // Validation for Mobile Number field
    if (mobno === "") {
        seterror("mobnoError", "*Mobile number must be filled out");
        returnval = false;
    } else if (mobno.length !== 10 || isNaN(mobno)) {
        seterror("mobnoError", "*Mobile Number must be a ten-digit number");
        returnval = false;
    }

    // Validation for Email field
    if (email === "") {
        seterror("emailError", "*Email must be filled out");
        returnval = false;
    } 

    // Validation for State field
    if (BloodGroup === "") {
        seterror("bgError", "*blood group must be selected");
        returnval = false;
    }

    // Validation for Address field
    if (BloodRequirefor === "") {
        seterror("addressError", "*Blood Require must be filled out");
        returnval = false;
    }
    
    // Validation for Password field
    if (password === "") {
        seterror("passwordError", "*Password must be filled out");
        returnval = false;
    } else if (!/(?=.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?])(?=.*[A-Z])(?=.*[0-9])(?=.*[a-zA-Z]).{6,}/.test(password)) {
        seterror("passwordError", "*Password must contain at least one special character, one uppercase letter, one number, and be at least 6 characters long");
        returnval = false;
    }

    // Return the validation result
    return returnval;
}
