$("#helpForm").submit(function() {
    event.preventDefault();

    clearForm();

    if (! validate()) {
        return;
    }

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            $("#helpForm").trigger("reset");
            $("#helpForm").after('<p id="success" class="text-success">Your help request has been received. Thank you!</p>');
        }
    };

    xhttp.open("POST", "submitHelp.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(
        "firstname=" + $("#firstname").val() +
        "&lastname=" + $("#lastname").val() +
        "&email=" + $("#email").val() +
        "&comments=" + $("#comments").val()
    );
});

function clearForm() {
    $("#success").remove();
    $("#firstname").removeClass("is-invalid");
    $("#email").removeClass("is-invalid");
    $("#comments").removeClass("is-invalid");
}

function validate() {
    var valid = true;
    
    if (! $("#firstname").val().length) {
        console.log("No first name entered");
        $("#firstname").addClass("is-invalid");
        valid = false;
    }
    
    var regex = /^.+@.+\..+(\..+)*$/; // one or more chars, followed by @, followed by one or more chars, followed by '.', followed by one or more chars, optionally followed by ('.' followed by one or more chars) zero or more times
    if (! regex.test($("#email").val())) {
        console.log("Invalid email");
        $("#email").addClass("is-invalid");
        valid = false;
    }
    
    if (! $("#comments").val().length) {
        console.log("No comments");
        $("#comments").addClass("is-invalid");
        valid = false;
    }
    
    return valid;
}
