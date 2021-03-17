$(function () {
	let tableProd = $("#cousetable").DataTable({
		scrollX: false,
		dom: '<"header__main"<"search"f>>t<"header__main"ip>',
		lengthChange: false,
		pageLength: 6,
		ajax: {
			url: "../controller/courseController.php?action=listCourse",
			dataSrc: "",
		},
		columns: [
            { data: null },
			{ data: "Codigo_asignatura" },
			{ data: "Curso" },
			{ data: "Ciclo" },
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
    tableProd.on( 'order.dt search.dt', function () {
        tableProd.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

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


$("#btnNewCourse").click(function(){
    $("#formCourse").trigger("reset");
    $(".modal-header").css("background-color", "#28a745");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nueva Asignatura");          
    $("#courseModal").modal("show");        
});

$("#formCourse").submit(function(event){
    event.preventDefault();
    let action = "reguisterCourse";
    let id = $("#id").val();
    let codecourse = $("#codecourse").val();
    let namecouse = $("#namecouse").val();    
    let degree = $("#degree").val();
    let data = {
        action:action,
        id: id,
        codecourse: codecourse,
        namecouse: namecouse,
        degree: degree
    }
    console.log(data);
    $.ajax({
        url:"../controller/courseController.php",
        type: "POST",
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
