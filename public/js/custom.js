$(function () {
    $("#date_written").datepicker();
    $("#date_entered").datepicker();
    $("#rx_exp_date").datepicker();
    $("#refill_date").datepicker();
    $(".refill").datepicker();
    $(".written").datepicker();
    $("input[name='start_date']").datepicker();
    $("input[name='end_date']").datepicker();
});

// Add New Rx Form Methods
function calculateTotalPrice(val = '') {
    if (val === '') {
        var qty_d = $('#qty_d').val();
        var price = $('#price').val();
        var qty_p = $('#qty_p').val();
        var ele = 'total_price';
        var d_ele = '#qty_d';
    } else {
        var qty_d = $('#qty_d' + val).val();
        var price = $('#price' + val).val();
        var qty_p = $('#qty_p' + val).val();
        var ele = 'total_price' + val;
        var d_ele = '#qty_d' + val;
    }
    if (parseInt(qty_p) >= parseInt(qty_d)) {
        var total_price = qty_d * price;
        document.getElementById(ele).value = total_price;
    } else {
        $(d_ele).val('');
        alert("Please entry dispatch quantity less than prescribed quantity.");
    }
}

function calculateExpirtyDate(val = '') {
    if (val === '') {
        var days = $('#supply').val();
        var fill_date = $('#refill_date').val();
        var ele = "rx_exp_date";
    } else {
        var days = $('#supply' + val).val()
        var fill_date = $('#refill_date' + val).val();
        var ele = "rx_exp_date" + val;
    }
    var date = new Date(fill_date);
    var newdate = new Date(date);
    newdate.setDate(newdate.getDate() + parseInt(days));
    var dd = newdate.getDate();
    var mm = newdate.getMonth() + 1;
    var y = newdate.getFullYear();
    var someFormattedDate = mm + '/' + dd + '/' + y;
    document.getElementById(ele).value = someFormattedDate;
}

function addNumber(number) {
    let str = '' + number;
    str = str.length < 2 ? '0' + str : str;
    return str;
}

//Getting SIG# description
$(".sig_desc").on('blur', function (e) {
    e.preventDefault();
    let url = $(this).closest('form').parent().find('.sigurl').val();
    let _token = $("input[name*='_token']").val();
    let sig_code = $(this).closest('form').parent().find('.sig_desc').val();
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            url: url,
            _token: _token,
            sig_code: sig_code
        },
        beforeSend: function () {
            $('#loader-img').show();
        },
        success: function (response) {
            $('#loader-img').hide();
            let sig_desc = JSON.parse(response);
            let sig_data = '';
            for (let i = 0; i < sig_desc.length; i++) {
                sig_data += sig_desc[i] + ' ';
            }
            $('textarea[name="sig_desc"]').empty();
            $('textarea[name="sig_desc"]').val(sig_data)
        }
    });
});

//Getting LOG# details
$(".formula").change(function (e) {
    e.preventDefault();
    let url = $('#url').val();
    let _token = $("input[name*='_token']").val();
    let formula = $(this).closest('form').find('select[name="formula"]').val();
    let provider_id = $(this).closest('form').find('input[name="provider_id"]').val();

    $.ajax({
        url: url,
        type: 'POST',
        data: {
            url: url,
            _token: _token,
            formula: formula,
            provider_id: provider_id
        },
        beforeSend: function () {
            $('#loader-img').show();
        },
        success: function (result) {
            $('#loader-img').hide();
            var childArray = '';
            let log_data = JSON.parse(result);
            var price = log_data.pop();
            if (Array.isArray(log_data) && log_data.length) {
                $('select[name="log_id"]').empty();
                $('select[name="log_id"]').prop('required', true);
                $('input[name="price"]').empty();
                $('input[name="supply"]').empty();
                $(".schedule option:selected").prop("selected", false);
                $('.new_log_id').hide();
                if (log_data[0]['COMPOUNDED_IN_STORE'] == 'C') {
                    for (let i = 0; i < log_data.length; i++) {
                        if (typeof log_data[i]['LOGMAIN_ID'] !== "undefined" && log_data[i]['LOGMAIN_ID'] !== null) {
                            childArray += ((log_data[i]['LOGMAIN_ID'] !== null) || (log_data[i]['LOGMAIN_ID']) !== '') ? '<option value="' + log_data[i]['LOGMAIN_ID'] + '">' + log_data[i]['LOGMAIN_ID'] + '</option>' : '';
                        }
                    }
                } else {
                    $('select[name*="log_id"]').empty();
                    $('select[name*="log_id"]').prop('required', false);
                    $('select[name*="log_id"] .log_id ').hide();
                    $('input[name="price"]').empty();
                    $('input[name="supply"]').empty();
                    $(".schedule option:selected").prop("selected", false);
                    $('.new_log_id input[name="new_log_id"]').prop('required', true);
                    if (log_data[0]['NDC1'] !== null) {
                        $('.new_log_id input[name="new_log_id"]').val(log_data[0]['NDC1']);
                    }
                    $('.new_log_id').show();
                }
                $('select[name="log_id"]').append(childArray);
                $('input[name="price"]').val(price.formula_price);
                $('input[name="manufacturer"]').val(log_data[0]['MANUFACTURER']);
                $('input[name="supply"]').val(log_data[0]['DEFAULT_DAYS_SUPPLY']);
                if (log_data[0]['SCHEDULE'] !== null) {
                    let schedule = '';
                    switch (log_data[0]['SCHEDULE']) {
                        case '2':
                            schedule = '1';
                            break;
                        case '3':
                            schedule = '2';
                            break;
                        case '4':
                            schedule = '3';
                            break;
                        case '5':
                            schedule = '4';
                            break;
                        case 'L':
                            schedule = '5';
                            break;
                        case 'O':
                            schedule = '6';
                            break;
                    }
                    $(".schedule option[value=" + schedule + "]").prop("selected", true);
                }
            }
        }
    });
});

// Hide error box after delay
$("#error").show(0).delay(5000).hide(0);

//Getting DispatchTo Details
$('input[type=radio][name=dispatch_to]').change(function () {
    let url = $('#dispatch_url').val();
    let _token = $("input[name*='_token']").val();
    let dispatch_to = ($("input:radio[name*='dispatch_to']:checked").val());
    let order_id = $('#dispatch_order_id').val();
    let dispatch_to_patient_id = $('#dispatch_to_patient_id').val();
    let dispatch_to_provider_id = $('#dispatch_to_provider_id').val();
    let dispatch_to_id = '';
    if (dispatch_to === 'Provider') {
        dispatch_to_id = dispatch_to_provider_id;
    } else {
        dispatch_to_id = dispatch_to_patient_id;
    }
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            url: url,
            order_id: order_id,
            dispatch_to: dispatch_to,
            dispatch_to_id: dispatch_to_id,
            _token: _token
        },
        success: function (data) {
            if(data!=''){
                $.each(data, function (i, item) {
                    if (item.key == "first_name") {
                        $("#dispatch_first_name").val(item.val);
                    } else if (item.key === "last_name") {
                        $("#dispatch_last_name").val(item.val);
                    } else if (item.key === "address1" || item.key === "reg_address1") {
                        $("#dispatch_address_1").val(item.val);
                    } else if (item.key === "address2" || item.key === "reg_address2") {
                        $("#dispatch_address_2").val(item.val);
                    } else if (item.key === "city" || item.key === "reg_city") {
                        $("#dispatch_city").val(item.val);
                    } else if (item.key === "state" || item.key === "reg_state") {
                        $("#dispatch_state").val(item.val);
                    } else if (item.key === "zip" || item.key === "reg_zip") {
                        $("#dispatch_zip").val(item.val);
                    } else if (item.key === "phone" || item.key === "phone1") {
                        $("#dispatch_phone").val(item.val);
                    } else if (item.key === "fax") {
                        $("#dispatch_fax").val(item.val);
                    } else if (item.key === "email") {
                        $("#dispatch_email").val(item.val);
                    }
                }); 
            }else{
                $("#dispatch_first_name").val('');
                $("#dispatch_last_name").val('');
                $("#dispatch_address_1").val('');
                $("#dispatch_address_2").val('');
                $("#dispatch_city").val('');
                $("#dispatch_state").val('');
                $("#dispatch_zip").val('');
                $("#dispatch_phone").val('');
                $("#dispatch_fax").val('');
                $("#ups_tracking").val('');
                $("#fedex_tracking").val('');
                $("#dimension_l").val('');
                $("#dimension_w").val('');
                $("#dimension_h").val('');
                $("#unit").val('');
                $("#weight").val('');
                $("#service_type").val('');
                $("#dispatch_method").val('');
                $("#delivery_price").val('');
                $("#package_type").val('');

            }
            
        }
    });
});

// Delete Rx
$('.deleterx').on('click', function (e) {
    e.preventDefault();
    let url = $(this).closest('.mainrx').parent().find('.delete_rx_url').val();
    let _token = $(this).closest('.mainrx').parent().find("input[name*='_token']").val();
    let rx_id = $(this).closest('.mainrx').parent().find('.rx_id').val();
    let stage = $(this).closest('.mainrx').parent().find('.stage').val();
    let order_id = $(this).closest('.mainrx').parent().find('.order_id').val();
    let choice = confirm("Are you sure! you want to delete this Rx");
    if (choice) {
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                rx_id: rx_id,
                stage: stage,
                order_id: order_id,
                _token: _token
            },
            success: function (data) {
                window.location.reload();
            }
        });
    }
});

//Get Scanned Rx# details
function getScanRxDetails(scanned_rx_id, rx_id) {
    let token = $('#_token').val();
    let scan_rx_url = $('#scan_rx_url').val();
    $('.scan_error').empty();
    if (scanned_rx_id !== '' && scanned_rx_id == rx_id) {
        $.ajax({
            url: scan_rx_url,
            type: 'POST',
            data: {
                rx_id: rx_id,
                _token: token
            },
            beforeSend: function () {
                $('#loader-img').show();
            },
            success: function (result) {
                $('#loader-img').hide();
                let dr_first_name = result[0]['order']['provider']['first_name'] ? result[0]['order']['provider']['first_name'] : 'NA';
                let dr_last_name = result[0]['order']['provider']['last_name'] ? result[0]['order']['provider']['last_name'] : 'NA';
                let patient_name = result[1];
                let dob = result[2]
                let practise = result[0]['order']['provider']['bussiness_name'] ? result[0]['order']['provider']['bussiness_name'] : 'NA';
                let medication = result[0]['formula'] ? result[0]['formula']['fromula_short'] : 'NA';
                let address1 = result[0]['order']['provider']['reg_address1'] ? result[0]['order']['provider']['reg_address1'] : 'NA';
                let address2 = result[0]['order']['provider']['reg_address2'] ? result[0]['order']['provider']['reg_address2'] : 'NA';
                let city = result[0]['order']['provider']['reg_city'] ? result[0]['order']['provider']['reg_city'] : 'NA';
                let state = result[0]['order']['provider']['reg_state'] ? result[0]['order']['provider']['reg_state'] : 'NA';
                let zip = result[0]['order']['provider']['reg_zip'] ? result[0]['order']['provider']['reg_zip'] : 'NA';
                let due_date = '';
                let received_by = '';
                if (result.length > 0) {
                    let html = '<div class="card"><div class="card-header" id="headingFive"><h5 class="mb-0">\n\
<div class="collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">\n\
<i class="fa fa-caret-right"></i>Scanned Rx Details</div></h5></div>\n\
<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">\n\
<div class="card-body"><div class="row"><div class="col"><b>Order#:</b>' + result[0]['order_id'] + '</div></div>\n\
<div class="row"><div class="col"><b>Provider:</b>' + dr_last_name + ' ' + dr_first_name + '</div>\n\
<div class="col"><b>Practise:</b>' + practise + '</div></div>\n\
<div class="row"><div class="col"><b>Patient:</b>' + patient_name + '</div>\n\
<div class="col"><b>Pt. DOB:</b>' + dob + '</div></div>\n\
<div class="row"><div class="col"><b>Medication:</b>' + medication + '</div></div>\n\
<div class="row"><div class="col"><b>Address:</b>' + address1 + '</div><div class="col"><b>Address2:</b>' + address2 + '</div></div>\n\
<div class="row"><div class="col"><b>City:</b>' + city + '</div><div class="col"><b>State:</b>' + state + '</div></div>\n\
<div class="row"><div class="col"><b>Zip:</b>' + zip + '</div></div>\n\
<div class="row"><div class="col"><b>Due Date:</b>' + due_date + '</div><div class="col"><b>Received By:</b>' + received_by + '</div></div>\n\
</div></div>';
                    $('#headingFive').remove();
                    $('#accordionExample').append(html);
                }
            }
        });
    } else {
        $('.scan_error').append('<p style="color:red;">Enter correct Rx!</p>');
    }
}
//Get Scanned LOG# details
function getScanLogDetails(scanned_log_id, log_id, formula_id) {
    let token = $('#_token').val();
    let scan_log_url = $('#scan_log_url').val();
    $('.scan_error').empty();
    if (scanned_log_id !== '' && scanned_log_id == log_id) {
        $.ajax({
            url: scan_log_url,
            type: 'POST',
            data: {
                log_id: log_id,
                _token: token,
                formula_id: formula_id
            },
            beforeSend: function () {
                $('#loader-img').show();
            },
            success: function (result) {
                if (result.error === 'Error') {
                    $('#loader-img').hide();
                    $('.scan_error').append('<p style="color:red;">No ingredients present!!</p>');
                } else {
                    $('#loader-img').hide();
                    let chem_details = '';
                    for (let i = 0; i < result.ingredients.length; i++) {
                        chem_details += '<div class="row"><div class="col-sm-6">' + result.ingredients[i].NAME + '</div><div class="col">' + result.ingredients[i].QUANTITY_USED + '</div><div class="col">' + result.ingredients[i].EXP_DATE + '</div></div>';
                    }
                    let html = '<div class="card">\n\
<div class="card-header" id="headingSix"><h5 class="mb-0"><div class="collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix"><i class="fa fa-caret-right"></i>Scanned LOG# Details</div></h5></div>\n\
<div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">\n\
<div class="card-body rx-panel">\n\
<div class="row">\n\
<div class="col-sm-6">\n\
<b>Ingredients Count:</b>' + result.ingredients.length + '\n\
</div>\n\
</div><div class="row">\n\
<div class="col-sm-6">\n\
<b>Chemical</b>\n\
</div>\n\
<div class="col-sm-3">\n\
<b>Quantity</b>\n\
</div>\n\
<div class="col-sm-3">\n\
<b>LOT# ExpDate</b></div></div>' + chem_details + '</div></div></div>';
                    $('#headingSix').remove();
                    $('#accordionExample').append(html);
                }
            }
        });
    } else {
        $('.scan_error').append('<p style="color:red;">Enter correct LOG ID!</p>');
    }
}

// Decline Notes
function declineNotes(form) {
    let url = $('#chk_note_url').val();
    let note_order_id = $('#order_id').val();
    let _token = $('#_token').val();
    let note_rx_id = $('#note_rx_id').val();
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            note_order_id: note_order_id,
            note_rx_id: note_rx_id,
            _token: _token
        },
        datatype: 'JSON',
        beforeSend: function () {
            $('#loader-img').show();
        },
        success: function (response) {
            $('#loader-img').hide();
            let res = JSON.parse(response);
            if (res.status === 'false') {
                $('#display_notes_message').show();
            } else {
                $(form).submit();
            }
        }
    });
}
// return date in ('mm/dd/yyyy') format
function formatDate(date) {
    let d = new Date(date);
    let month = '' + (d.getMonth() + 1);
    let day = '' + d.getDate();
    let year = d.getFullYear();
    return [month, day, year].join('/');
}

//Datepicker
$(function () {
    $("#dob").datepicker({
        maxDate: 0
    });
});

// To get checked Rx id.
function getCheckedRx() {
    var token = $("#csrftoken").val();
    var base_url = $("#base_url").val();
    var stage = $("#stage").val();
    if (stage === 'Order Dispatch') {
        $url = base_url + '/order/manage/dispatch';
        $redirect_url = base_url + '/order/manage/dispatch';
    } else {
        $url = base_url + '/order/manage/invoice';
        $redirect_url = base_url + '/order/manage/invoice';
    }
    var rx_array = [];
    var checkboxes = document.querySelectorAll('input[type=checkbox]:checked');
    for (var i = 0; i < checkboxes.length; i++) {
        rx_array.push(checkboxes[i].value);
    }
    if (rx_array.length !== 0) {
        $.ajax({
            type: "POST",
            url: $url,
            data: {
                rx_num: rx_array,
                _token: token
            },
            beforeSend: function () {
                $('#loader-img').show();
            },
            success: function () {
                $('#loader-img').hide();
                window.location = $redirect_url;
            }
        });
    } else {
        sweetAlert("Please select at least one Rx.", "error", '');
    }
}

// For checked all check box.
$('#checkall').click(function () {
    var total = $("#total_dispatch").val();
    if (total > 0) {
        $('input:checkbox').prop('checked', this.checked);
    } else {
        sweetAlert("No record found.", "error", '');
        $("#checkall").prop("checked", false);
    }
});
// For get courier details.
function getCourierDetails(val) {
    var token = $("#csrftoken").val();
    var base_url = $("#base_url").val();
    if (val !== "") {
        $.ajax({
            type: "POST",
            url: base_url + '/dispatch/courier',
            data: {
                dispatch_method: val,
                _token: token
            },
            dataType: 'json',
            success: function (response) {
                $('#service_type').empty();
                $('#package_type').empty();
                $.each(response.data.service_type, function (key, value) {
                    $('#service_type')
                            .append($("<option></option>")
                                    .attr("value", value.id)
                                    .text(value.service_type));
                });
                $.each(response.data.package_type, function (key, value) {
                    $('#package_type')
                            .append($("<option></option>")
                                    .attr("value", value.id)
                                    .text(value.package_type));
                });
                if (val === '1') {
                    $("#div_dimesion_l").show();
                    $("#div_dimesion_w").show();
                    $("#div_dimesion_h").show();
                    $("#div_fedex_tracking").show();
                    $("#dimesion_l").attr('required', true);
                    $("#dimesion_w").attr('required', true);
                    $("#dimesion_h").attr('required', true);
                    $("#fedex_tracking").attr('required', true);
                } else {
                    $("#div_dimesion_l").hide();
                    $("#div_dimesion_w").hide();
                    $("#div_dimesion_h").hide();
                    $("#div_fedex_tracking").hide();
                    $("#dimesion_l").attr('required', false);
                    $("#dimesion_w").attr('required', false);
                    $("#dimesion_h").attr('required', false);
                    $("#fedex_tracking").attr('required', false);
                }
                if (val === '2') {
                    $("#div_ups_tracking").show();
                    $("#ups_tracking").attr('required', true);
                    $("#div_order_id").hide();
                    $("#order_id").attr('required', false);
                } else {
                    $("#div_ups_tracking").hide();
                    $("#ups_tracking").attr('required', false);
                }
                if (val === '3') {
                    $("#div_order_id").show();
                    $("#order_id").attr('required', true);
                } else {
                    $("#div_order_id").hide();
                    $("#order_id").attr('required', false);
                }
            }

        });
    } else {
        sweetAlert("Please select dispatch method.", "error", '');
    }
}

// For check number is decimal or not.
function checkDec(el) {
    var ex = /^[0-9]+\.?[0-9]*$/;
    if (ex.test(el.value) == false) {
        el.value = el.value.substring(0, el.value.length - 1);
    }
}

$(document).ready(function () {
    if ($('#dispatch_form').length) {
        var method = $("#dispatch_method").val();
        if (method === '1') {
            $("#dimesion_l").attr("required", true);
            $("#dimesion_w").attr("required", true);
            $("#dimesion_h").attr("required", true);
            $("#fedex_tracking").attr("required", true);
        } else if (method === '2') {
            $("#ups_tracking").attr("required", true);
        } else if (method === '3') {
            $("#order_id").attr("required", true);
        }
    }
});

// For sweet alert.
function sweetAlert(title, icon, url) {
    Swal.fire({
        title: title,
        icon: icon,
        confirmButtonText: "<u>OK</u>"
    }).then(function () {
        if (url !== '') {
            window.location = base_url + url;
        }
    });

}

//Rx History
$('.rx_history_data').click(function () {
    let order_id = $(this).attr("data-orderid");
    let rx_id = $(this).attr("data-rxid");
    let url = $(this).attr("data-url");
    let _token = $(this).attr("data-token");
    $.ajax({
        url: url,
        method: "POST",
        data: {
            order_id: order_id,
            rx_id: rx_id,
            _token: _token
        },
        success: function (data) {
            $('#rx_history_detail').html(data);
            $('#rxHistoryModal').modal("show");
        }
    });
});

// Schedule validation
$('.schedule').on('change', function (e) {
    let url = $('#schedule_url').val();
    let _token = $('#_token').val();
    let patient_id = $('#patient_id').val();
    let schedule = $(this).closest('form').find('select[name="schedule"]').val();
    if (schedule === '1') {
        $("#rx_serial_red").css("display", "");
        $("#rx_serial").attr("required", "true");
    } else {
        $("#rx_serial_red").css("display", "none");
        $("#rx_serial").removeAttr('required');
    }
    if (schedule === 1 || schedule === 2 || schedule === 3 || schedule === 4) {   
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                patient_id: patient_id,
                schedule: schedule,
                _token: _token
            },
            datatype: 'JSON',
            beforeSend: function () {
                $('#loader-img').show();
            },
            success: function (data) {
                let res = JSON.parse(data);
                $('#loader-img').hide();
                if (res.status === 'Incorrect') {
                    $('.scheduleStatus').append('<p style="color:red">Please update patient details. Then try again!</p>').children().delay(5000).fadeOut(800);
                    $('#submit').attr("disabled", true);
                } else {
                    $('.scheduleStatus').empty();
                    $('.scheduleStatus').append('<p style="color:green">Patient details correct!</p>').children().delay(5000).fadeOut(800);
                }
            }
        });
    }
});

function printData() {
    var divToPrint = document.getElementById("printTable");
    newWin = window.open("");
    newWin.document.write(divToPrint.outerHTML);
    newWin.print();
    newWin.close();
}

$('#printgrid').on('click', function () {
    printData();
});

$("#identification").change(function () {
    var type = $("#identification :selected").text();
    $("#dln").html(type + " Number");
    $("#identification_number").attr("placeholder", trim(type) + "Number")
});
$("#additional_identification_type").change(function () {
    var type = $("#additional_identification_type :selected").text();
    $("#adln").html("Additional "+type + " Number");
    $("#additional_identification_number").attr("placeholder", "Additional "+trim(type) + "Number")
});
$("#provider_type").change(function () {
    var type = $("#provider_type").val();
    if (type === '1') {
        $('#corporate_label').show();
        $('#corporate').show();
        $('#client_label').show();
        $('#client').show();
        $('#logo_label').hide();
        $('#zpl_code').hide();
    }
    if (type === '2') {
        $('#corporate_label').hide();
        $('#corporate').hide();
        $('#client_label').show();
        $('#client').show();
        $('#logo_label').hide();
        $('#zpl_code').hide();
    }
    if (type === '3') {
        $('#corporate_label').hide();
        $('#corporate').hide();
        $('#client_label').hide();
        $('#client').hide();
        $('#logo_label').show();
        $('#zpl_code').show();
    }
});

$("#dispatch_change_state").change(function () {

    var rx_array = [];
    var token = $("#csrftoken").val();
    var base_url = $("#base_url").val();
    var state = $("#dispatch_change_state").val();
    var current_stage = $("#current_stage").val();
    if (current_stage === '7') {
        var url = base_url + "/dispatch/changeorderstate";
        var redirect_url = '/dispatch';
    } else {
        var url = base_url + "/invoice/changeorderstate";
        var redirect_url = '/invoice';
    }
    var checkboxes = document.querySelectorAll('input[type=checkbox]:checked');
    for (var i = 0; i < checkboxes.length; i++) {
        rx_array.push(checkboxes[i].value);
    }
    if (rx_array.length !== 0) {
        $.ajax({
            type: "POST",
            url: url,
            data: {
                rx_array: rx_array,
                _token: token,
                change_state: state
            },
            success: function () {
                window.location = base_url + redirect_url;
            },
            error: function (error) {
                sweetAlert(error, '');
            }
        });
    } else {
        sweetAlert("Please select at least one Rx.", "error", '');
    }
});

$("#next_stage").click(function () {

    var rx_array = [];
    var token = $("#csrftoken").val();
    var base_url = $("#base_url").val();
    var current_stage = $("#current_stage").val();
    if (current_stage === '7') {
        var url = base_url + "/dispatch/changeorderstate";
        var redirect_url = '/dispatch';
    } else {
        var state = 10;
        var url = base_url + "/invoice/changeorderstate";
        var redirect_url = '/invoice';
    }
    var checkboxes = document.querySelectorAll('input[type=checkbox]:checked');
    for (var i = 0; i < checkboxes.length; i++) {
        rx_array.push(checkboxes[i].value);
    }
    if (rx_array.length !== 0) {
        $.ajax({
            type: "POST",
            url: url,
            data: {
                rx_array: rx_array,
                _token: token,
                change_state: state
            },
            success: function () {
                window.location = base_url + redirect_url;
            },
            error: function (error) {
                sweetAlert(error, '');
            }
        });
    } else {
        sweetAlert("Please select at least one Rx.", "error", '');
    }
});

$("#complete_decline").change(function () {
    var rx_array = [];
    var token = $("#csrftoken").val();
    var base_url = $("#base_url").val();
    var stage = $("#complete_decline").val();
    var checkboxes = document.querySelectorAll('input[type=checkbox]:checked');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].value !== "on") {
            rx_array.push(checkboxes[i].value);
        }
    }
    if (rx_array.length !== 0) {
        $.ajax({
            type: "POST",
            url: base_url + "/complete/changeorderstate",
            data: {
                rx_array: rx_array,
                _token: token,
                change_state: stage
            },
            success: function () {
               window.location = base_url + '/complete';
            },
            error: function (error) {
                sweetAlert(error, '');
            }
        });
    } else {
        sweetAlert("Please select at least one Rx.", "error", '');
    }
});

// Make Rx editable
$(document).ready(function () {
    $(".make_editable").click(function (e) {
        e.preventDefault();
        $(this).parent().parent().find('.inputDisabled').prop("disabled", false);
        $(this).parent().parent().find(".editrx").show();
    });
});

// Get formula price
$('#pk_formula').change(function (e) {
    e.preventDefault();
    let formula_id = $('#pk_formula').val();
    let _token = $('#csrftoken').val();
    let base_url = window.location.origin + '/' + window.location.pathname.split('/')[1] + '/';
    $.ajax({
        type: "POST",
        url: base_url + "/pk/formula",
        data: {
            formula_id: formula_id,
            _token: _token
        },
        beforeSend: function () {
            $('#loader-img').show();
        },
        success: function (data) {
            $('#loader-img').hide();
            if (data[0]['PRICE'] !== '' || data[0]['PRICE'] !== null) {
                $('#formula_price').val(data[0]['PRICE']);
            }
        },
        error: function (error) {
            sweetAlert(error, '');
        }
    });
});

//Refills
function getRefillsAllowed(refill_allowed_count) {
    if (refill_allowed_count !== '') {
        $('#refill_remaining').val(refill_allowed_count);
    }
}

// To get checked Order id.
function getCheckedRxToRefill()
{
    var token = $("#csrftoken").val();
    var base_url = $("#base_url").val();
    var url = base_url + '/refills';
    var redirect_url = base_url + '/entry';
    var rx_array = [];
    var order_array = [];
    var checkboxes = document.querySelectorAll('input[type=checkbox]:checked');
    for (var i = 0; i < checkboxes.length; i++) {
        rx_array.push(checkboxes[i].value);
    }

    $('input[name="order_id[]"]').each(function () {
        order_array.push($(this).val());
    });
    if (rx_array.length !== 0) {
        $.ajax({
            type: "POST",
            url: url,
            data: {
                rx_num: rx_array,
                _token: token,
                order_array: order_array,
            },
            beforeSend: function () {
                $('#loader-img').show();
            },
            success: function () {
                $('#loader-img').hide();
                window.location = redirect_url;
            }
        });
    } else {
        sweetAlert("Please select at least one Rx to refill.", "error", '');
    }
}

// to stop default approval submission on verification
$('#scan_approval').on('click', function (e) {
    e.preventDefault();
    let scan_log = $('#scan_log').val();
    let scan_rx = $('#scan_rx').val();
    if (scan_log === '' || scan_rx === '') {
        alert('Please scan LOG and the Rx');
    } else {
        $('#decline_change_stage').submit();
    }
});

// Calculate Rx expire date
function calculateRxExpiryDate(val = '', rx_id = '') {
    if (rx_id === "") {
        if (val !== "") {
            var schedule = val;
        } else {
            var schedule = $("#schedule").val();
        }
        var written_date = $("#date_written").val();
        var expire_field = "rx_expire_date";
    } else {
        if (val !== "") {
            var schedule = val;
        } else {
            var schedule = $("#schedule" + rx_id).val();
        }
        var written_date = $("#date_written" + rx_id).val();
        var expire_field = "rx_expire_date" + rx_id;
    }
    if (schedule !== "" && written_date !== "") {
        if (schedule === '1') {
            var days = 21;
        } else if (schedule === '2' || schedule === '3' || schedule === '4') {
            var days = 180;
        } else {
            var days = 365;
        }
        var date = new Date(written_date);
        var newdate = new Date(date);
        newdate.setDate(newdate.getDate() + parseInt(days));
        var dd = newdate.getDate();
        var mm = newdate.getMonth() + 1;
        var y = newdate.getFullYear();
        var exp_date = mm + '/' + dd + '/' + y;
        document.getElementById(expire_field).value = exp_date;
    } else {
        alert('Please select schedule/written date.');
}
}

// Export invoice in .xls
function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    filename = filename?filename+'.xls':'excel_data.xls';
    downloadLink = document.createElement("a");
    document.body.appendChild(downloadLink);
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
        downloadLink.download = filename;
        downloadLink.click();
    }
}

function savematrix(that) {
    if (confirm('Are you sure ?')) {
        var rule = 1;
        if ($(that).val() == 'C' || $(that).val() == 'S' || $(that).val() == 'O') {
            $("#state").val($(that).data('state'));
            $("#field_id").val($(that).data('field'));
            $("#version").val($(that).data('version'));
            $("#field_type").val($(that).val());
            $('#myModal').modal('show');

        } else {
            if ($(that).val() == 'N' || $(that).val() == '') {
                rule = 0;

            } else {
                rule = 1;

            }
            save_each_matrix($(that).data('state'), $(that).data('field'), $(that).data('version'), $(that).val(),
                rule);

        }
    } else {
        return false;
    }
}

function saveSCMatrix() {

    save_each_matrix($("#state").val(), $("#field_id").val(), $("#version").val(), $("#field_type").val(), $(
        "#rule").val());

}

function save_each_matrix(state_id, field_id, version, field_type, rule) {
    let url = $('#url').val();
    $.ajax({
        type: "POST",
        url: url,
        data: {
            state_code: state_id,
            field_id: field_id,
            field_type: field_type,
            version: version,
            rule: rule,

        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function() {
            $("#loader-img").css("display", "block");

        },
        success: function(responsedata) {

            $("#loader-img").css("display", "none");
            alert('Updated Successfully');
            if (field_type == 'C' || field_type == 'S' || field_type == 'O') {
                $('#myModal').modal('hide');
                $('#fieldtype_' + state_id + '_' + field_id).parent().removeClass();
                if (rule == 1) {
                    $('#fieldtype_' + state_id + '_' + field_id).parent().addClass('yellowcolor');

                } else {
                    $('#fieldtype_' + state_id + '_' + field_id).parent().addClass('orangecolor');

                }
            } else if (field_type == 'N' || field_type == '') {
                $('#fieldtype_' + state_id + '_' + field_id).parent().removeClass();
                $('#fieldtype_' + state_id + '_' + field_id).parent().addClass('redcolor');
            } else {
                $('#fieldtype_' + state_id + '_' + field_id).parent().removeClass();
                $('#fieldtype_' + state_id + '_' + field_id).parent().addClass('greencolor');
            }
        },
        error: function(error) {
            $("#loader-img").css("display", "none");
        },
        complete: function() {
            $("#loader-img").css("display", "none");
        },
    });

}

function changeVersion(that, state) {
    $('.fieldtype_' + state).attr('data-version', $(that).val());
}

$(".add-more").click(function(){ 
     var html = $(".copy").html();
    $(".more-feilds").append(html);        
});


function removeState(that){
    $(that).parent().parent().remove();
}

$(".dispatch_to").on('click',function(){
    if($(this).val()=='Other'){
        $(".other_show").removeClass('d-none');
        $(".other_req").attr('required','required');
    }else{
        $(".other_show").addClass('d-none');
        $(".other_req").removeAttr('required');
    }
})
// For checked all check box.
$('#checkallstage').click(function () {
    if($('.checked').is( ':checked' )){
        $('.checked').removeAttr('checked');

    }else{
        $('.checked').attr('checked','checked');

    }
 })
// To Change Stage checked Rx id.
function changeStage() {
    var token = $("#csrftoken").val();
    var base_url = $("#base_url").val();
    var stage = $("#stage").val();
    var current_stage=$("#current_stage").val();
    $url = base_url + '/order/manage/changeStage';
   
    var rx_array = [];
    var checkboxes = document.querySelectorAll('.checked:checked');
    for (var i = 0; i < checkboxes.length; i++) {
        rx_array.push(checkboxes[i].value);
    }
    if (rx_array.length !== 0) {
        $.ajax({
            type: "POST",
            url: $url,
            data: {
                rx_num: rx_array,
                stage:stage,
                current_stage:current_stage,
                _token: token
            },
            dataType:'json',
            beforeSend: function () {
                $('#loader-img').show();

            },
            success: function (response) {
                $('#loader-img').hide();
                if(response.status==true){
                  //  sweetAlert(response.message, "success", '');
                    window.location.reload();
                }else{
                    sweetAlert(response.message, "error", '');
                }
              
            }
        });
    } else {
        sweetAlert("Please select at least one Rx.", "error", '');
    }
}
function printLabel(){
    var token = $("#csrftoken").val();
    var base_url = $("#base_url").val();
    var url = base_url + '/printMutlipleLabel';
   
    var rx_array = [];
    var checkboxes = document.querySelectorAll('.checked:checked');
    for (var i = 0; i < checkboxes.length; i++) {
        rx_array.push(checkboxes[i].value);
    }
    if (rx_array.length !== 0) {
        if(rx_array.length>10){
            sweetAlert("Please select not more the 10 Rx.", "error", '');
            return false;
        }
        $.ajax({
            type: "POST",
            url: url,
            data: {
                rx_num: rx_array,
                _token: token
            },
            dataType:'json',
            beforeSend: function () {
                $('#loader-img').show();

            },
            success: function (response) {
                $('#loader-img').hide();
                if(response.status==true){
                    window.open(response.redirect_path, '_blank')
                }else{
                    sweetAlert(response.message, "error", '');
                }
              
            }
        });
    } else {
        sweetAlert("Please select at least one Rx.", "error", '');
    } 
}

function printWorkSheet(){
    var base_url = $("#base_url").val();
    var url = base_url + '/printMutlipleWorkSheet';
    var rx_array = [];
    var checkboxes = document.querySelectorAll('.checked:checked');
    for (var i = 0; i < checkboxes.length; i++) {
        rx_array.push(checkboxes[i].value);
    }
    if (rx_array.length !== 0) {
        if(rx_array.length>10){
            sweetAlert("Please select not more the 10 Rx.", "error", '');
            return false;
        }
        var redirect_path= url +'?rx_num='+rx_array;
        window.open(redirect_path, '_blank');
    } else {
        sweetAlert("Please select at least one Rx.", "error", '');
    } 
}
