$("#btnNewCourse").click(function(){
    $("#formCourse").trigger("reset");
    $(".modal-header").css("background-color", "#28a745");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo Curso");          
    $("#courseModal").modal("show");        
});

$("#formCourse").submit(function(e){
    e.defaultPrevented();
    let action = "reguisterCourse";
    let name = $("#name").val();
    let fullname = $("#fullname").val();
    let data = {
        action:action,
        name: name,
        fullname: fullname
    }
    $.ajax({
        url:"controller/courseController.php",
        type: "POST",
        data: data,
        success: function(response){
            console.log(response);
        }
    });
});