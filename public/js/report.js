$('.excel').submit(function (e){
    e.preventDefault();
    var finicial = document.getElementById("init_date").value;
    var ffinal = document.getElementById("end_date").value;
    if (finicial.length==0 ||finicial== null ) {
        Swal.fire({
            type: 'error',
            title: 'Formulario incompleto',
            text: 'Ingrese fecha inicial'
        });
    }else if(ffinal.length==0 ||ffinal== null ){
        Swal.fire({
            type: 'error',
            title: 'Formulario incompleto',
            text: 'Ingrese fecha final'
        });
    }else{
        this.submit();
    }
});
