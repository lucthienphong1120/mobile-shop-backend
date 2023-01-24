$(document).ready(function () {

    // banner owl carousel
    $("#banner-area .owl-carousel").owlCarousel({
        dots: true,
        items: 1
    });

    // top sale owl carousel
    $("#top-sale .owl-carousel").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });

    // isotope filter
    var $productFilter = $(".product-filter").isotope({
        itemSelector: '.product-filter-item',
        layoutMode: 'fitRows'
    });

    // filter items on button click
    $(".button-group").on("click", "button", function () {
        var filterValue = $(this).attr('data-filter');
        $productFilter.isotope({ filter: filterValue });
    })


    // new phones owl carousel
    $("#new-phones .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });

    // blogs owl carousel
    $("#blogs .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            }
        }
    })

    // select all input type file
    var imgInputs = $('input[type="file"][accept="image/*"]');
    imgInputs.each(function () {
        $(this).change(function () {
            var img = $(this).get(0).files[0];
            if (img) {
                var reader = new FileReader();
                reader.onload = function () {
                    $(this).parent().find('img').attr("src", reader.result);
                }.bind(this);
                reader.readAsDataURL(img);
            }
        });
    });

    // insert product row
    $manageProductTable = $("#manage-product .table-data");
    $manageProductTableBtn = $("#manage-product .btn.addItem");
    $manageProductTableBtn.on("click", function () {
        $items = $("#manage-product .table-data tr[data-id]").length;
        $items++;
        var html =
            `<tr data-id="${$items}">
                <td>
                    <input type="number" value="${$items}" readonly name="id-${$items}">
                </td>
                <td>
                    <input type="text" value="" name="name-${$items}">
                </td>
                <td>
                    <select name="brand-${$items}">
                        <option value="1">Samsung</option>
                        <option value="2">Redmi</option>
                        <option value="3">Apple</option>
                        <option value="4">Oppo</option>
                        <option value="5">Nokia</option>
                    </select>
                </td>
                <td>
                    <input type="text" value="" disabled name="origin-${$items}">
                </td>
                <td>
                    <input type="number" step="0.01" value="0.00" name="price-${$items}">
                </td>
                <td>
                    <div class="preview-image">
                        <img src="#" alt="preview">
                        <input type="file" name="image-${$items}" accept="image/*">
                    </div>
                </td>
                <td>
                    <button type="submit" name="manage-insert" formaction="manage.php?id=${$items}"
                        class="btn btn-success">Insert</button>
                </td>
                <td>
                    <button type="submit" name="manage-delete" formaction="manage.php?id=${$items}"
                        class="btn btn-danger">Delete</button>
                </td>
            </tr>`;

        $manageProductRow = $("#manage-product .table-data tbody").get(0).insertRow(-1);
        $manageProductRow.innerHTML = html;
    });

    // insert product row
    $accMemberTable = $("#account-member .table-data");
    $accMemberTableBtn = $("#account-member .btn.addItem");
    $accMemberTableBtn.on("click", function () {
        $items = $("#account-member .table-data tr[data-id]").length;
        $items++;
        var html =
            `<tr data-id="${$items}">
                <td>
                    <input type="number" value="${$items}" readonly name="id-${$items}">
                </td>
                <td>
                    <input type="text" value="" name="username-${$items}" class="text-center">
                </td>
                <td>
                    <input type="text" value="" name="password-${$items}" class="text-center">
                </td>
                <td>
                    <select name="privilege-1">
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>
                </td>
                <td>
                    <a href="account.php?id=${$items}" class="btn btn-success">Insert</a>
                </td>
                <td>
                    <a href="account.php?id=${$items}" class="btn btn-danger">Delete</a>
                </td>
            </tr>`;

        $accMemberRow = $("#account-member .table-data tbody").get(0).insertRow(-1);
        $accMemberRow.innerHTML = html;
    });

});