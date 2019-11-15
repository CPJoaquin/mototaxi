(function() {
    var pick = function() {
        $.ajax({
            url: '/notify/pick',
            type: "GET",
            dataType: "json",
            success: function(data) {
                if (data[0].date_accident > 0) {
                    toastr.error("La fecha de recojo de medicinas ya vencio de " + data[0].date_accident + " persona(s)", { timeOut: 5000, positionClass: "toast-bottom-right" });
                }
            }
        });
    };

    var medicine = function() {
        $.ajax({
            url: '/notify/medicine',
            type: "GET",
            dataType: "json",
            success: function(data) {
                if (data[0].date_accident > 0) {
                    toastr.error("La fecha de entrega de medicinas ya vencio de " + data[0].date_accident + " persona(s)", { timeOut: 5000, positionClass: "toast-bottom-right" });
                }
            }
        });
    };
    setInterval(function() {
        pick();
        medicine();
    }, 10000);
})();

$(document).ready(function() {

    $.ajax({
        url: '/notify/pick',
        type: "GET",
        dataType: "json",
        success: function(data) {
            if (data[0].date_accident > 0) {
                toastr.error("La fecha de recojo de medicinas ya vencio de " + data[0].date_accident + " persona(s)", { timeOut: 5000, positionClass: "toast-bottom-right" });
            }
        }
    });

    $.ajax({
        url: '/notify/medicine',
        type: "GET",
        dataType: "json",
        success: function(data) {
            if (data[0].date_accident > 0) {
                toastr.error("La fecha de entrega de medicinas ya vencio de " + data[0].date_accident + " persona(s)", { timeOut: 5000, positionClass: "toast-bottom-right" });
            }
        }
    });
});