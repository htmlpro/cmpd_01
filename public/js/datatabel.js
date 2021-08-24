$(document).ready(function() {
    try {
        var data_table = $('#pharmacy_tabel').DataTable({
            "order": [[ 1, "asc" ]],
            "lengthMenu": [10, 25, 50, 250, 500],
            colReorder: true,
            initComplete: function() {
                renderDropdown(this.api());
            }
        });

        var user_id = $("#userid").val();
        var token = $("#csrftoken").val();
        var getcolumorderurl = $("#getcolumorderurl").val();
        var orderchangeurl = $("#orderchangeurl").val();
        var stage = $("#stage").val();
        $.ajax({
            url: getcolumorderurl,
            type: "POST",
            data: {
                userid: user_id,
                "stage": stage,
                _token: token
            },
            success: function(data) {
                $("#pharmacy_tabel").show();
                data = data.replace(/"/g, '');
                data = data.split(',');
                let order_reception_td = [];
                data.forEach(function(val) {
                    var cell_index = $('#table_tr [data-id="' + val + '"]').get(0).cellIndex;
                    order_reception_td.push(cell_index);
                })
                data_table.colReorder.order(order_reception_td);
                renderDropdown(data_table);
            },
            complete: function(data) {
                $("#pharmacy_tabel").show();
                data_table.on('column-reorder', function(e, settings, details) {
                    let order_reception_td = [];
                    $("#table_tr th").each(function() {
                        order_reception_td.push($(this).attr('data-id'))
                    })
                    order_reception_td.pop();
                    order_reception_td = order_reception_td.join(',');
                    $.ajax({
                        url: orderchangeurl,
                        type: "POST",
                        data: {
                            userid: user_id,
                            "stage": stage,
                            "column_order": order_reception_td,
                            _token: token
                        },
                        success: function(data) {}
                    });
                });
            }
        });
    } catch (e) {

    }
});

function renderDropdown(data_table) {
        data_table.columns().every(function() {
            var column = this;
            //added class "filter_dropdown"
            if (column.index() !== $('#table_tr .nofilter').get(0).cellIndex) {
                var select = $('<select class="filter_dropdown" multiple="multiple"><option value=""></option></select>')
                    .appendTo($(column.header()).empty())
                    .on('change', function() {
                        var vals = $('option:selected', this).map(function(index, element) {
                            return $.fn.dataTable.util.escapeRegex($(element).val());
                        }).toArray().join('|');

                        column
                            .search(vals.length > 0 ? '^(' + vals + ')$' : '', true, false)
                            .draw();
                    });

                column.data().unique().sort().each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                });
            }
        });
        $(".filter_dropdown").select2({
            width: '100%',
            dropdownCssClass: "filter_dropdown_font"
        });
}