$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Get Sub Category For Product
$(document).ready(function () {
    $('#product_category').change(function () {
        var id = $(this).val();

        $.ajax({
            url: '/products/sub_category',
            type: 'post',
            data: {
                _token: '{!! csrf_token() !!}',
                category_id: id
            },
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
            dataType: 'json',
            success: function (data) {
                console.log(data);
            },
            error: function (data) {
                console.log(data)
            },
        });
    });
})

