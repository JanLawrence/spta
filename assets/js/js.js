$(document).ready( function () {
    $('.dataTable').DataTable();

    $(".delete_subject").click(function () {
        if(!confirm("Are you sure you want to delete this subject?")){
            return false;
        }
    });

    $(".delete_teacher").click(function () {
        if(!confirm("Are you sure you want to delete this teacher?")){
            return false;
        }
    });

    $(".delete_student").click(function () {
        if(!confirm("Are you sure you want to delete this student?")){
            return false;
        }
    });
} );