$("#btnNewCourse").click(function(){
    $("#formCourse").trigger("reset");
    $(".modal-header").css("background-color", "#28a745");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo Curso");          
    $("#courseModal").modal("show");        
});