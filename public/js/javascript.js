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
            alertify.success('Thêm sản phảm vào giỏ hàng thành công');
        });
    };

    $("#change-item-cart").on("click",".si-close i",function(){
        // console.log($(this).data("id"));
        $.ajax({
            type: 'GET',
            url: "/Delete-Item-Cart/"+$(this).data("id"),
        }).done(function (response) {
            renderCart(response);
            alertify.success('Đã xóa sản phẩm thành công');
        });
    });

    function renderCart(response){
        $("#change-item-cart").empty();
        $("#change-item-cart").html(response);
        $("#total-quant-show").text($("#total-quanty-cart").val());
    }

