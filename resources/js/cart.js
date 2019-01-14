Cart = {
    init: function () {
        this.addToCart();
        this.decreaseQuantity();
        this.increaseQuantity();
        this.removeFromCart();
    },
    addToCart: function () {
        $('.medicine-shopping-cart').click(function () {
            let id = $(this).attr('data-medicine-id');
            $.ajax({
                url: '/cart/add-to-cart/' + id,
                method: 'GET',
                success: function (response) {
                    swal({
                        title: response.title,
                        text: response.message,
                        type: "success",
                        confirmButtonText: "Confirm"
                    });
                },
                error: function (response) {
                    swal({
                        title: "Mistake occured",
                        type: "error",
                        confirmButtonText: "Confirm"
                    });
                }
            })
        })
    },
    decreaseQuantity: function () {
        const _this = this;
        $('.quantity-decrease').on('click', function (e) {
            let quantity = _this.updateCart($(this).data('item-id'), false);

            if(quantity == 1) {
                $(this).prop('disabled', true);
            }
        });
    },
    increaseQuantity: function () {
        const _this = this;
        $('.quantity-increase').on('click', function (e) {
            let id = $(this).data('item-id');

            let quantity = _this.updateCart(id, true);

            if(quantity == 2) {
                $('#' + id + '-quantity-decrease').prop('disabled', false);
            }
        });
    },
    updateCart: function (id, increment) {
        let itemPrice = $('#'+id+'-price');
        let itemQuantity = $('#'+id+'-quantity');
        let total = $('#total-price');

        if(increment) {
            itemQuantity.text(parseInt(itemQuantity.text()) + 1);
            total.text(parseInt(total.text()) + parseInt(itemPrice.text()));
        } else {
            itemQuantity.text(parseInt(itemQuantity.text()) - 1);
            total.text(parseInt(total.text()) - parseInt(itemPrice.text()));
        }

        this.updateSession(id, increment);

        return itemQuantity.text();
    },
    updateSession: function (id, increment) {

        $.ajax({
            url: '/cart/update/' + id + '/' + (increment ? 1 : 0),
            method: 'POST',
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            success: function (response) {
                console.log(response);
            },
            error: function (error) {
                console.log(error);
            }
        })
    },
    removeFromSession: function (id) {
        $.ajax({
            url: '/cart/delete/' + id,
            method: 'DELETE',
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            success: function (response) {
                console.log(response);
                window.location.href = '/cart';
            },
            error: function (error) {
                console.log(error);
            }
        })
    },
    removeFromCart: function () {
        let _this = this;
        $('.remove-from-cart').on('click', function (e) {
            let id = $(this).data('item-id');

            _this.removeFromSession(id);
        })
    }
}