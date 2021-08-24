var file_name = $("#file_name").val();
var base_url = $("#base_url").val();
var token = $("#csrftoken").val();
var order_id = $("#order_id").val();
var url = base_url + '/public/attachments/' + file_name;
var total_pages = $("#total_pages").val();
var redirect_path = $("#redirect_path").val();
pdfjsLib.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.4.456/pdf.worker.js'

// Loaded via <script> tag, create shortcut to access PDF.js exports.
var pdfjsLib = window['pdfjs-dist/build/pdf'];
// The workerSrc property shall be specified.
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.4.456/pdf.worker.js';

var pdfDoc = null,
        pageNum = 1,
        pgeRendering = false,
        pageNumPending = null,
        scale = 0.8,
        canvas = document.getElementById('the-canvas'),
        ctx = canvas.getContext('2d');
/**
 * Get page info from document, resize canvas accordingly, and render page.
 * @param num Page number.
 */
function renderPage(numPage)
{

    for (var num = 1; num <= numPage; num++) {
        // Using promise to fetch the page
        pdfDoc.getPage(num).then(function (page) {
            var viewport = page.getViewport({
                scale: scale
            });
            var wrapper = document.createElement("div");
            var canvasContainer = document.getElementById('holder');
            wrapper.className = "canvas-wrapper";
            var canvas = document.createElement('canvas');
            var ctx = canvas.getContext('2d');
            var renderContext = {
                canvasContext: ctx,
                viewport: viewport
            };
            var checkbox = document.createElement("INPUT");
            checkbox.setAttribute("type", "checkbox");
            checkbox.setAttribute("data-id", page._pageIndex + 1);
			if((page._pageIndex + 1) === 1){
				checkbox.setAttribute("checked", "checked");
			}
            checkbox.className = "checkPdf";
            canvas.height = viewport.height;
            canvas.width = viewport.width;
            wrapper.appendChild(checkbox);
            wrapper.appendChild(canvas);

            canvasContainer.appendChild(wrapper);

            page.render(renderContext);

        });
    }

}

/**
 * Asynchronously downloads PDF.
 */

pdfjsLib.getDocument(url).promise.then(function (pdfDoc_) {
    pdfDoc = pdfDoc_;
    var numPages = pdfDoc.numPages
    //document.getElementById('page_count').textContent = pdfDoc.numPages;
    renderPage(numPages);
});

var array = []
jQuery(document).on('change', '.checkPdf', function (e) {
    if (this.checked == true) {
        var pageNum = jQuery(this).data('id');
        if (pageNum) {
            array.push(pageNum)
            getPdf(pageNum);
        }
    } else {
        var itemtoRemove = jQuery(this).data('id');
        array.splice(jQuery.inArray(itemtoRemove, array), 1);
        $( "#preview-holder  .canvas-wrapper"+itemtoRemove ).remove();
    }

});

var pageNum = 1;
if (pageNum) {
       array.push(pageNum)
       getPdf(pageNum);
}

function renderSinglePage(num)
{

    pageRendering = true;
    // Using promise to fetch the page
    pdfDoc.getPage(num).then(function (page) {
        
        var viewport = page.getViewport({
            scale: scale
        });
        var wrapper = document.createElement("div");
        var canvasContainer = document.getElementById('preview-holder');
        wrapper.className = "canvas-wrapper"+num;
        var canvas = document.createElement('canvas');
        var ctx = canvas.getContext('2d');
        
        canvas.height = viewport.height;
        canvas.width = viewport.width;
        
        var renderContext = {
            canvasContext: ctx,
            viewport: viewport
        };
        
        wrapper.appendChild(canvas);
        canvasContainer.appendChild(wrapper);
        var renderTask = page.render(renderContext);
    });
}


/**
 * Get single pdf data.
 */
function getPdf(num)
{

    var url = base_url + '/public/attachments/' + file_name;
    pdfjsLib.getDocument(url).promise.then(function (pdfDoc_) {
        pdfDoc = pdfDoc_;
        // Initial/first page rendering
        renderSinglePage(num);
    });
}

/**
 * Split functionality by ajax using post data.
 */
jQuery('#splitbutton').click(function () {

    if (array.length && (total_pages > array.length)) {
        $("#loader-img").css("display", "block");
        jQuery.ajax({
            type: "POST",
            url: base_url + '/split',
            data: {
                pagenumber: array,
                pdf: file_name,
                orderid: order_id,
                _token: token
            },
            success: function (responsedata) {
                $("#loader-img").css("display", "none");
                sweetAlert(responsedata, "success", "/orders");
            },
            error: function (error) {
                $("#loader-img").css("display", "none");
            }
        });
    } else {
        if (array.length === 0) {
            sweetAlert("Please select at least one page.", "error", '');
        } else if (array.length === 1) {
            sweetAlert("You can't split this PDF, because this PDF only has one page.", "error", '');
        } else {
            sweetAlert("You can't split all the PDF pages.", "error", '');
        }
    }
});

/**
 * Merge functionality by ajax using post data.
 */
jQuery('#mergebutton').click(function () {
    if ((array.length > 1) && (total_pages > array.length)) {
        $("#loader-img").css("display", "block");
        jQuery.ajax({
            type: "POST",
            url: base_url + '/merge',
            data: {
                pagenumber: array,
                pdf: file_name,
                orderid: order_id,
                _token: token
            },
            success: function (responsedata) {
                
                $("#loader-img").css("display", "none");
                sweetAlert(responsedata, "success", "/orders");
            },
            error: function (error) {
                $("#loader-img").css("display", "none");
            }
        });
    } else {
        if (array.length === 0) {
            sweetAlert("Please select at least one page.", "error", '');
        } else if ((array.length === 1) && (total_pages == 1)) {
            sweetAlert("You can't merge selected page, because this PDF only has one page.", "error", '');
        } else if ((array.length === 1) && (total_pages >1)) {
            sweetAlert("You can't merge only one page.", "error", '');
        } else {
            sweetAlert("You can't merge all the PDF pages.", "error", '');
        }
    }
});

/**
 * Delete functionality by ajax using post data.
 */
jQuery('#deletebutton').click(function () {

    if (array.length && (total_pages > array.length)) {
        $("#loader-img").css("display", "block");
        jQuery.ajax({
            type: "POST",
            url: base_url + '/delete',
            data: {
                pagenumber: array,
                pdf: file_name,
                orderid: order_id,
                _token: token
            },
            success: function (responsedata) {
                
                $("#loader-img").css("display", "none");
                sweetAlert(responsedata, "success", redirect_path+order_id);
            },
            error: function (error) {
                $("#loader-img").css("display", "none");
            }
        });
    } else {
        if (array.length === 0) {
            sweetAlert("Please select at least one page.", "error", '');
        } else if (array.length === 1) {
            sweetAlert("You can't delete this page, because this PDF only has one page.", "error", '');
        } else {
            sweetAlert("You can't delete all the PDF pages.", "error", '');
        }
    }
});

$(document).ready(function () {
    $('#upload_form').on('submit', function (event) {
        $("#loader-img").css("display", "block");
        event.preventDefault();
        $.ajax({
            url: base_url + '/upload',
            method: "POST",
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data.status === true) {
                    var append_pdf = data.uploaded_image;
                    jQuery.ajax({
                        type: "POST",
                        url: base_url + '/upload/merge',
                        data: {
                            pdf: file_name,
                            append_pdf: append_pdf,
                            _token: token,
                            order_id: order_id
                        },
                        success: function (responsedata) {
                            $("#loader-img").css("display", "none");
                            sweetAlert(responsedata, "sucess", redirect_path+order_id);
                        },
                        error: function (error) {
                            $("#loader-img").css("display", "none");
                        }
                    });
                } else {
                    $("#loader-img").css("display", "none");
                    sweetAlert(data.message, "error", '');
                }
            },
            error: function (error) {
                $("#loader-img").css("display", "none");
            }
        });
    });
});

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