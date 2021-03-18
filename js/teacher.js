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
					'<button class="editar_b1"><i class="fas fa-edit editar"></i></button> <button class="eliminar_b1"><i class="fas fa-trash-alt editar"></i></button>',
			},
		],
	});

    $("#teachertable tbody").on("click", ".editar_b1", function(){
        
        let data = tableProd.row($(this).parents("tr")).data();
        $("#id").val(data["DNI"]);
        $("#dni").val(data["DNI"]);
        $("#grado").val(data["Grado"]);
		$("#name").val(data["Nombres_docente"]);
		$("#lastname").val(data["Apellidos_docente"]);
        $("#email").val(data["email_docente"]); 
        let name = data["Foto_docente"];
        $("#imgname").val(data["Foto_docente"]);
        
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Docente");            
        $("#teacherModal").modal("show");

    });

    $("#teachertable tbody").on("click", ".eliminar_b1", function(){
        let id = tableProd.row($(this).parents("tr")).data()["DNI"];
        let nameimage = tableProd.row($(this).parents("tr")).data()["Foto_docente"];
        let data = {
            action: "deleteTeacher",
            id: id,
            nameimage:nameimage
        }
        $.ajax({
            type: "POST",
            url: "../controller/teacherController.php",
            data: data,
            success: function(response){
                console.log(response);
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
    let id = $('#id').val();
    let dni = $('#dni').val();
    let grado = $('#grado').val();
    let name = $('#name').val();
    let lastname = $('#lastname').val();
    let email = $('#email').val();
    let imgname = $("#imgname").val();

    let file = $('#file')[0].files[0];
    fdata.append('action', 'insertTeacher');
    fdata.append('id', id);
    fdata.append('dni', dni);
    fdata.append('grado', grado);
    fdata.append('name', name);
    fdata.append('lastname', lastname);
    fdata.append('email', email);
    fdata.append('imgname', imgname);

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