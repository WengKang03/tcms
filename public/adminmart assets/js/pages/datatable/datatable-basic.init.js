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


$('#dataTable').on('click', '.deletetimetabletbtn', function () {

    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function () {
        return $(this).text();
    }).get();

    $('#delete_timetable_record').val(data[0]);

    $('#delete_model_form').attr('action', '/admin-timetable-delete/' + data[0]);

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


$('#dataTable').on('click', '.deletematerialtbtn', function () {

    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function () {
        return $(this).text();
    }).get();

    $('#delete_material_record').val(data[0]);

    $('#delete_model_form').attr('action', '/material-delete/' + data[0]);

    $('#deletemodelpop').modal('show');
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
