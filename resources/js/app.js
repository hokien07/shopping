require('./bootstrap');

import 'admin-lte/plugins/jquery/jquery.min.js';
import 'admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js';
import 'admin-lte/plugins/sweetalert2/sweetalert2.min.js';
import 'admin-lte/plugins/toastr/toastr.min.js';
import 'admin-lte/plugins/daterangepicker/daterangepicker.js';
import 'admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js';
import 'admin-lte/dist/js/adminlte.min.js';

$('.btn-delete').click(function () {
    const that = $(this)
    swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            const id = that.data('id');
            const model = that.data('model')
            axios.delete(`${model}/delete/${id}`).then(function (response) {
                if(response.data.code === 200) {
                    const target = that.closest('tr');
                    target.hide('slow', function(){ target.remove(); });
                    toastr.success(response.data.message);
                    return;
                }
                toastr.error(response.data.message);
            })
        }
    });
});

$('.btn-add-card').click(function () {
    const that = $(this)
    const id = that.data('id');
    axios.post(`cart/add`, {product_id: id}).then(function (response) {
        if(response.data.code === 200) {
            if(response.data.total > 0) {
                $('#cart').html(`<i class="fas fa-shopping-cart m-1 me-md-2"></i><p class="d-none d-md-block mb-0">My cart (${response.data.total})</p>`);
            }
            toastr.success(response.data.message);
            return;
        }
        toastr.error(response.data.message);
    })
});

$('.btn-cart-remove').click(function () {
    const that = $(this)
    swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            const hash = that.data('hash');
            axios.post(`cart/delete`, {hash: hash}).then(function (response) {
                if(response.data.code === 200) {
                    toastr.success(response.data.message);
                    location.reload();
                    return;
                }
                toastr.error(response.data.message);
            })
        }
    });
})
