/*************************************************************************************/
// -->Template Name: Bootstrap Press Admin
// -->Author: Themedesigner
// -->Email: niravjoshi87@gmail.com
// -->File: datatable_basic_init
/*************************************************************************************/

/****************************************
 *       Basic Table                   *
 ****************************************/

$('#dataTable').DataTable();

/****************************************
 *       Doctor delete patient         *
 ****************************************/

$('#dataTable').on('click', '.deletepatientbtn', function () {

    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function () {
        return $(this).text();
    }).get();

    $('#delete_user_record').val(data[0]);

    $('#delete_model_form').attr('action', '/patient-delete/' + data[0]);

    $('#deletemodelpop').modal('show');
});






$('#dataTable').on('click', '.deletepatientbtn', function () {

    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function () {
        return $(this).text();
    }).get();

    $('#delete_user_record').val(data[0]);

    $('#delete_model_form').attr('action', '/admin-patient-delete/' + data[0]);

    $('#deletemodelpop').modal('show');
});





$('#dataTable').on('click', '.deletedoctortbtn', function () {

    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function () {
        return $(this).text();
    }).get();

    $('#delete_user_record').val(data[0]);

    $('#delete_model_form').attr('action', '/admin-doctor-delete/' + data[0]);

    $('#deletemodelpop').modal('show');
});


$('#dataTable').on('click', '.deleteusertbtn', function () {

    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function () {
        return $(this).text();
    }).get();

    $('#delete_user_record').val(data[0]);

    $('#delete_model_form').attr('action', '/user-delete/' + data[0]);

    $('#deletemodelpop').modal('show');
});


$('#dataTable').on('click', '.acceptbtn', function () {

    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function () {
        return $(this).text();
    }).get();

    $('#accept_supplier_record').val(data[0]);

    $('#accept_model_form').attr('action', '/admin-manage-supplier-status-accept/' + data[0]);

    $('#acceptmodelpop').modal('show');
});

$('#dataTable').on('click', '.declinebtn', function () {

    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function () {
        return $(this).text();
    }).get();

    $('#decline_supplier_record').val(data[0]);

    $('#decline_model_form').attr('action', '/admin-manage-supplier-status-decline/' + data[0]);

    $('#declinemodelpop').modal('show');
});
/****************************************
 *       Default Order Table           *
 ****************************************/
$('#default_order').DataTable({
    "order": [
        [3, "desc"]
    ]
});

/****************************************
 *       Multi-column Order Table      *
 ****************************************/
$('#multi_col_order').DataTable({
    columnDefs: [{
        targets: [0],
        orderData: [0, 1]
    }, {
        targets: [1],
        orderData: [1, 0]
    }, {
        targets: [4],
        orderData: [4, 0]
    }]
});
