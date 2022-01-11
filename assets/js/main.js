$('table').on('mouseup keyup', 'input[type=number]', () => calculateTotals());

$('.btn-add-row').on('click', () => {
    const $lastRow = $('.item:last');
    const $newRow = $lastRow.clone();
    $newRow.find('input').val('');
    $newRow.find('td:last').text('0.00');
    $newRow.insertAfter($lastRow);
    $newRow.find('input:first').focus();
});

function calculateTotals() {
    var taxable_amount = 0;
    const subtotals = $('.item').map((idx, val) => calculateSubtotal(val)).get();
    const total = subtotals.reduce((a, v) => a + Number(v), 0);
    $('.total td:eq(1)').text(total.toFixed(2));
    $(".item-sum").each(function() {
        taxable_amount += parseFloat($(this).val());
    });
    $('.taxable-total td:eq(1)').text(taxable_amount.toFixed(2));
    calculateDiscount();
}

function calculateSubtotal(row) {
    const $row = $(row);
    const inputs = $row.find('input');
    var subtotal = inputs[1].value * inputs[2].value;
    var taxable_subtotal = inputs[3].value ? ((subtotal * inputs[3].value) / 100) + subtotal : subtotal;
    $row.find('td:last').text(taxable_subtotal.toFixed(2));
    $row.find('.item-sum').val(subtotal.toFixed(2));
    return taxable_subtotal;
}

function calculateDiscount() {
    var sub_total = parseFloat($('.total td:eq(1)').text());
    var discount_amount = $('#discount-amount').val() ? parseFloat($('#discount-amount').val()) : 0;
    var grand_total = sub_total - discount_amount;
    $('.grand-total').text(grand_total.toFixed(2))
}

$("#discount-per").keyup(function() {
    var sub_total = parseFloat($('.total td:eq(1)').text());
    var discount_amount = (sub_total * $(this).val()) / 100;
    $('#discount-amount').val(discount_amount.toFixed(2));
    calculateDiscount();
});

$("#discount-amount").keyup(function() {
    var sub_total = parseFloat($('.total td:eq(1)').text());
    var discount_per = ($(this).val() * 100) / sub_total;
    $('#discount-per').val(discount_per.toFixed(2));
    calculateDiscount();
});