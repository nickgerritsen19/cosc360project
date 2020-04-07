
//Pre-Validation
window.addEventListener("load", function() { //None of the code can run until the page loads.
    var fields=document.getElementsByClassName("required");

    /*
    //Loop to add event check if field is retroactively validated (by typing)
    for(var i = 0; i < fields.length; i++) {
        fields[i].addEventListener("keypress", changeBackground);
    }
    */

    document.getElementById("mainForm").onsubmit = function(e){
        var fieldValue;
        for(var i = 0; i < fields.length; i++) {
            fieldValue = fields[i].value;

            //Check if fields are empty
            if(fieldValue==null || fieldValue=="") {
                e.preventDefault();
                if(fields[i].name == "firstname")
                    alert("You must provide a first name.");
                if(fields[i].name == "lastname")
                        alert("You must provide a last name.");
                if(fields[i].name == "username")
                    alert("You must provide a username.");
                if(fields[i].name == "email")
                    alert("You must provide an email address.");
                if(fields[i].name == "password")
                    alert("You must provide a password.");
                if(fields[i].name == "password2")
                    alert("You must verify the password before continuing.");
                if(fields[i].name == "city")
                    alert("You must choose a city of residence before continuing.");
            } else if (fields[i].name == "password2" && fieldValue != fields[i-1].value) { //Check if passwords match
                e.preventDefault();
                alert("The passwords provide do not match.");
            }
        }
    }
});

function changeBackground(e) {
    if(e.target.classList.contains("not-filled"));
        e.target.classList.remove("not-filled");
}