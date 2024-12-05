$(document).ready(function () {
    $("#createRoleForm").submit(function (event) {
        event.preventDefault();

        $(".error").text("");
        var formData = new FormData(this);

        // Show loading spinner and overlay
        $("#loading-spinner, #loading-overlay").show();
        $.ajax({
            type: "POST",
            url: "/roles",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                Swal.fire({
                    title: "Succes",
                    text: response.message,
                    icon: "success",
                    showConfirmButton: false,
                });
                setTimeout(function () {
                    location.reload();
                }, 1000);
            },
            error: function (xhr) {
                if (xhr.status === 500) {
                    Swal.fire({
                        title: "Error",
                        text: xhr.responseJSON.message,
                        icon: "warning",
                    });
                } else if (xhr.responseJSON && xhr.responseJSON.errors) {
                    var errors = xhr.responseJSON.errors;
                    for (var field in errors) {
                        var messages = errors[field];

                        for (var i = 0; i < messages.length; i++) {
                            var message = messages[i];
                            $("#error_" + field).text(message);
                        }
                    }
                } else {
                    console.log(xhr.responseText);
                }
            },
            complete: function () {
                // Hide loading spinner and overlay
                $("#loading-spinner, #loading-overlay").hide();
            },
        });
    });

    $("#updateRoleForm").submit(function (event) {
        event.preventDefault();
    });
});

function createRole(formElement) {
    const inputs = formElement.querySelectorAll(
        "input[required], select[required]"
    );

    let isValdi = true;
    inputs.forEach((input) => {
        if (input.value.trim() === "") {
            isValdi = false;

            //menandai field yang kosong
            input.classList.remove("border", "border-gray-300");
            input.style.borderColor = "red";
        } else {
            //menghapus border yang sebelumnya telah ditambahkan
            input.style.borderColor = "";
            input.classList.add("border", "border-gray-300");
        }
    });

    if (!isValdi) {
        Swal.fire({
            title: "Error",
            text: "Harap isi semua field yang diperlukan.",
            icon: "error",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK",
        });
        return;
    }
    Swal.fire({
        text: "Apakah Anda yakin akan membuat Role?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("btnSubmitCreateRole").click();
        }
    });
}

const updateName = document.getElementById("updateName");
const buttonUpdateRole = document.getElementById("buttonUpdateRole");

function openFormUpdate(data) {
    updateName.value = data.name;

    buttonUpdateRole.setAttribute("onclick", `updateRole(${data.id})`);
}

function updateRole(id) {
    event.preventDefault();

    $(".error").text("");

    let data = { name: updateName.value };

    // Show loading spinner and overlay
    $("#loading-spinner, #loading-overlay").show();

    $.ajax({
        type: "PUT",
        url: `/roles/${id}`,
        data: JSON.stringify(data), // Konversi objek ke JSON string
        contentType: "application/json", 
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), // Add CSRF token header
        },
        success: function (response) {
            Swal.fire({
                title: "Success",
                text: response.message,
                icon: "success",
                showConfirmButton: false,
            });
    
            setTimeout(function () {
                location.reload();
            }, 1000);
        },
        error: function (xhr) {
            if (xhr.status === 500) {
                Swal.fire({
                    title: "Error",
                    text: xhr.responseJSON.message,
                    icon: "warning",
                });
            } else if (xhr.responseJSON && xhr.responseJSON.errors) {
                var errors = xhr.responseJSON.errors;
                for (var field in errors) {
                    var messages = errors[field];

                    for (var i = 0; i < messages.length; i++) {
                        var message = messages[i];
                        $("#error_" + field).text(message);
                    }
                }
            } else {
                console.log(xhr.responseText);
            }
        },
        complete: function () {
            // Hide loading spinner and overlay
            $("#loading-spinner, #loading-overlay").hide();
        },
    });
}
