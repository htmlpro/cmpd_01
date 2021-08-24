$(document).scannerDetection({
    timeBeforeScanTest: 200,
    avgTimeByChar: 40,
    preventDefault: true,
    endChar: [13],
    onComplete: function (barcode, qty) {
        validScan = true;

        $('#scannerInput').val(barcode);

    },
    onError: function (string, qty) {

        $('#rx_scan').val($('#rx_scan').val() + string);

        var data = $('#rx_scan').val();
        $("input[type=checkbox][value=" + data + "]").prop("checked", true);
        $('#rx_scan').val('');
    }
});