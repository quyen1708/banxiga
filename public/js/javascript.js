// // search
// $(document).ready(function() {
//     $('#search').keypress(function(event) {
//         if(event.keyCode == 13 || event.which == 13) {
//             let value = $(this).val();
//         }
//     });
// };

// $(() => {
//     $('#btn-search').click(() => {
//         let text = $('#search').val();
//         if (text.trim().length === 0) {
//             alert('Vui lòng nhập từ khóa!')
//         } else {
//             ('#form-search').submit();
//         }
//     })
// })

// $('.multiple-items').slick({
//     infinite: true,
//     slidesToShow: 2,
//     slidesToScroll: 2
// })

function handleCLickAddCart(id) {
    $.ajax({
        type: 'GET',
        url: "/Add-Cart/" + id,
    }).done(function (response) {
        renderCart(response);
        // window.location.href = "/Order";
        alertify.success('Thêm sản phảm vào giỏ hàng thành công');
    });
};

function handleCLickBuyNow(id) {
    $.ajax({
        type: 'GET',
        url: "/Add-Cart/" + id,
    }).done(function () {
    window.location.href = "/Order";
    });
};

$("#change-item-cart").on("click", ".si-close i", function () {
    // console.log($(this).data("id"));
    $.ajax({
        type: 'GET',
        url: "/Delete-Item-Cart/" + $(this).data("id"),
    }).done(function (response) {
        renderCart(response);
        alertify.success('Đã xóa sản phẩm thành công');
    });
});

function renderCart(response) {
    $("#change-item-cart").empty();
    $("#change-item-cart").html(response);
    $("#check-out").on('click', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: '/Check-out',
            data: {
                "_token": "{{ csrf_token() }}",
                name: $("#txtName").val(),
                email: $("#txtEmail").val(),
                phone: $("#txtPhone").val(),
                address: $("#address").val(),
            },
            success: function (res) {
                alert("Đơn hàng đã được gửi đi thành công!");
                window.location.href = "/home"
            },
            error: function (xhr) {
                $('#validation-errors').html('');
                $.each(xhr.responseJSON.errors, function (key, value) {
                    $('#validation-errors').append('<div class="alert alert-danger">' + value + '</div');
                });
            },
        });
    })

    $("#total-quant-show").text($("#total-quanty-cart").val());
}


$('#send-order').on("click", function (){
    if (confirm('Bạn muốn gửi yêu cầu cho đơn hàng này?')) {
        var $totalQuanty=$("#totalQuanty").html();
        if($totalQuanty==='0'){
            alert("Bạn chưa có sản phẩm nào trong giỏ hàng!");
            window.location.href = "/home"
        } else {
            window.location.href = "/Send-Order"
        }
    }
})


