$(document).ready(function () {

    $('.form-check-input').on('change', function () {
        let selectedFlavors = [];
        let selectedGrades = [];
        let selectedBrands = [];



        $('.form-check-input:checked').each(function () {
            let category = $(this).attr('id').match(/^\D+/)[0];

            if (category === 'flavor') {
                selectedFlavors.push($(this).val());
            } else if (category === 'grade') {
                selectedGrades.push($(this).val());
            } else if (category === 'brand') {
                selectedBrands.push($(this).val());
            }
        });


        $.ajax({
            url: '/filter-products',
            method: 'GET',
            data: {
                flavors: selectedFlavors,
                grades: selectedGrades,
                brands: selectedBrands,
            },

            beforeSend: function (){
                $('#loading-spinner').show();

                $('.row.row-cols-1.row-cols-md-3.g-4').empty();
            },
            success: function (response) {
                $('.no-layout-impact').html(response);
            },
            error: function (xhr, status, error) {
                console.error('Ошибка', error);
            },
            complete: function (){
                $('#loading-spinner').hide();
            }
        });
    });
});
