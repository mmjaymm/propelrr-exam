$(document).ready(function() {
    $("#profileForm").submit(function(event) {
        event.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "controller/Profile.php",
            data: formData,
            success: function(response) {

                if (response.status) {
                    console.log(response);
                    alert(response.message);
                    document.getElementById("profileForm").reset();
                }
            },
            error: function(xhr){
                console.error(xhr.responseJSON);
                alert(xhr.responseJSON.message);
            }
        });
    });
});

const computeAge = () => {
    var dob = document.getElementById("dob").value;
    var dobDate = new Date(dob);
    var currentDate = new Date();
    var age = currentDate.getFullYear() - dobDate.getFullYear();

    if (currentDate.getMonth() < dobDate.getMonth() ||
        (currentDate.getMonth() === dobDate.getMonth() && currentDate.getDate() < dobDate.getDate())) {
        age--;
    }

    document.getElementById("age").value = age;
}