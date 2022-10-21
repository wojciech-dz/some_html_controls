var delegations = {
    showAjax: function (button) {
        const xhr = new XMLHttpRequest();
        let url = button.data('url');
        xhr.open("GET", url, true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.addEventListener("load", (event) => {
            if (xhr.status === 200) {
                let just_table = document.getElementById('Prawy');
                just_table.innerHTML = xhr.response;
            }
        });
        xhr.send();
    },
    calculate: function (row) {
        let id = row.id.match(/\d+/g);
        let net = $('#net_'+id).val();
        let vat = $('#vat-rate_'+id).val();
        let volume = $('#volume_'+id).val();
        let gross = (100 + parseInt(vat))/100 * net;
        let totalNet = net * volume;
        let totalGross = gross * volume;
        $('#gross_'+id).val(gross);
        $('#total-net_'+id).val(totalNet);
        $('#total-gross_'+id).val(totalGross);
    },
    init: function () {
        'use strict';
        $(document).on('change', '#odd-row', function () {
            $(".tg-w747").css("background-color", $("#odd-row").val());
        });
        $(document).on('change', '#even-row', function () {
            $(".tg-m9r4").css("background-color", $("#even-row").val());
        });
        $(document).on('change', '.calc-in', function () {
            delegations.calculate(this);
        });
        $(document).on('click', '.menu-btn', function () {
            delegations.showAjax($(this));
        });
        $(document).on('click', '.over1000btn', function () {
            $("tr").each(function (index) {
                console.log($('.td').innerText(index));
            });
        });
    }
};

delegations.init();
