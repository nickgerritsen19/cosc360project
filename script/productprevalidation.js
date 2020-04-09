
//Pre-Validation
window.addEventListener("load", function() { //None of the code can run until the page loads.
    var fields=document.getElementsByClassName("required");

    /*
    //Loop to add event check if field is retroactively validated (by typing)
    for(var i = 0; i < fields.length; i++) {
        fields[i].addEventListener("keypress", changeBackground);
    }
    */

    document.getElementById("addProduct").onsubmit = function(e){
        var fieldValue;
        for(var i = 0; i < fields.length; i++) {
            fieldValue = fields[i].value;

            //Check if fields are empty
            if(fieldValue==null || fieldValue=="") {
                e.preventDefault();
                if(fields[i].name == "productname")
                    alert("You must provide a product name.");
                if(fields[i].name == "productimage")
                        alert("You must provide a product image.");
                if(fields[i].name == "description")
                    alert("You must provide a description.");
                if(fields[i].name == "saveonprice")
                    alert("You must provide a price from Save on Foods.");
                if(fields[i].name == "superstoreprice")
                    alert("You must provide a price from Superstore.");
                if(fields[i].name == "walmartprice")
                    alert("You must provide a price from Walmart.");
            }
        }
    }
});