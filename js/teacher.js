$(function () {
	let tableProd = $("#teachertable").DataTable({
		scrollX: false,
		dom: '<"header__main"<"search"f>>t<"header__main"ip>',
		lengthChange: false,
		pageLength: 6,
		ajax: {
			url: "../controller/teacherController.php?action=listTeacher",
			dataSrc: "",
		},
		columns: [
            { data: "DNI" },
			{ data: "Grado" },
			{ data: "Nombres_docente" },
			{ data: "Apellidos_docente" },
            { data: "email_docente" },
			{ data: null },
            
		],
		columnDefs: [
           
			{
				data: null,
				targets: -1,
				defaultContent:
					'<button class="editar_b"><i class="fas fa-edit editar"></i></button> <button class="eliminar_b"><i class="fas fa-trash-alt editar"></i></button>',
			},
		],
	});

    $("#cousetable tbody").on("click", ".editar_b", function(){
        
        let data = tableProd.row($(this).parents("tr")).data();
        $("#id").val(data["Codigo_asignatura"]);
        $("#codecourse").val(data["Codigo_asignatura"]);
		$("#namecouse").val(data["Curso"]);
		$("#degree").val(data["Ciclo"]); 
        
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Asignatura");            
        $("#courseModal").modal("show");

    });

    $("#cousetable tbody").on("click", ".eliminar_b", function(){
        let id = tableProd.row($(this).parents("tr")).data()["Codigo_asignatura"];
        let data = {
            action: "deletecourse",
            id: id,
        }
        $.ajax({
            type: "POST",
            url: "../controller/courseController.php",
            data: data,
            success: function(response){
                console.log(response);
                let result = JSON.parse(response);
                swal({
                    title: result.title,
                    text: result.text,
                    icon: result.icon
                  }).then(function() {
                    $("#courseModal").modal("hide");
                    $("#cousetable").DataTable().ajax.reload(null, false);
                    
                  });            

            },
            
        });        
        
    });
    
    
});


$("#btnNewteacher").click(function(){
    $("#formteacher").trigger("reset");
    $(".modal-header").css("background-color", "#28a745");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Registrar Nuevo Docente");          
    $("#teacherModal").modal("show");        
});

$("#formteacher").submit(function(e){
    e.preventDefault();
    var fdata = new FormData();
    let dni = $('#dni').val();
    let grado = $('#grado').val();
    let name = $('#name').val();
    let lastname = $('#lastname').val();
    let email = $('#email').val();
    let file = $('#file')[0].files[0];
    fdata.append('action', 'insertTeacher');
    fdata.append('dni', dni);
    fdata.append('grado', grado);
    fdata.append('name', name);
    fdata.append('lastname', lastname);
    fdata.append('email', email);

    fdata.append('file', file);
    
    $.ajax({
        type: "POST",
        url: "../controller/teacherController.php",
        data: fdata,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response)
            let result = JSON.parse(response);
            swal({
                title: result.title,
                text: result.text,
                icon: result.icon
              }).then(function() {
                $("#teacherModal").modal("hide");
                $("#teachertable").DataTable().ajax.reload(null, false);
                
            });
            
            
        },
    });
    return false;

});