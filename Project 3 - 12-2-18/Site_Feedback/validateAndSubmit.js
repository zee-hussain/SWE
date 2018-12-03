$("#feedbackForm").submit(function() {
    event.preventDefault();

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            $("#feedbackForm").trigger("reset");
            $("#feedbackForm").after('<p id="success" class="text-success">Your feedback has been received. Thank you!</p>');
	    console.log(this.responseText);
        }
    };

    xhttp.open("POST", "submitFeedback.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(
        "name=" + $("#name").val() +
        "&email=" + $("#email").val() +
        "&comments=" + $("#comments").val()
    );
});
