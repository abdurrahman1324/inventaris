$(document).ready(function() {

    const flashdata = $(".flashdata").data("flashdata");
    const type = $(".flashdata").data("type");

    if (flashdata) {
        sweetAlert(flashdata, type);
    }

    function sweetAlert(text, icon) {
        Swal.fire({
            timer: 4000,
            text: text,
            icon: icon,
            timerProgressBar: true,
            showConfirmButton: false // Perhatikan penulisan di sini
        });
    }

    function deleteQuestion(url, text) {
        Swal.fire({
            text: text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yakin!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url; // Menggunakan window.location.href
            }
        });
    }
    
    // DELETE BUTTON
    $(document).on('click', '.delete-departement', function() {
        var id = $(this).data("id");
        var url = `${base_url}departement/delete/${id}`;
        deleteQuestion(url, "Yakin akan menghapus data ini ?");
    });

    $(document).on('click', '.delete-role', function() {
        var id = $(this).data("id");
        var url = `${base_url}role/delete/${id}`;
        deleteQuestion(url, "Yakin akan menghapus data ini ?");
    });
    
    $(document).on('click', '.delete-unit', function() {
        var id = $(this).data("id");
        var url = `${base_url}unit/delete/${id}`;
        deleteQuestion(url, "Yakin akan menghapus data ini ?");
    });
    

});
