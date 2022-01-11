<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <form action="print-bill.php" method="post">
        <input type="hidden" name="bill_no" value="<?= $bill_no = rand(1000, 9999) ?>">
        <div class="invoice-box">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="4">
                        <table>
                            <tr>
                                <td class="title">
                                    COMPANY NAME
                                </td>

                                <td>
                                    Invoice #: <?= $bill_no ?><br> Created: <?= date('M d, Y') ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>


                <tr class="heading">
                    <td> Item </td>

                    <td width="12%"> Unit Cost </td>

                    <td width="12%"> Quantity </td>

                    <td width="12%"> Tax </td>

                    <td width="12%"> Price </td>
                </tr>

                <tr class="item">
                    <td>
                        <input type="text" required name="item[]" />
                    </td>

                    <td>
                        $<input type="number" step="0.01" required name="cost[]" />
                    </td>

                    <td>
                        <input type="number" step="0.01" required name="qty[]" />
                    </td>

                    <td>
                        <input type="number" step="0.01" required name="tax[]" />
                        <input type="hidden" value="0.00" class="item-sum">
                    </td>

                    <td>0.00 </td>
                </tr>

                <tr>
                    <td colspan="5">
                        <div class="btn-add-row btn btn-primary btn-xs">+ Add</div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right">Discount : </td>
                    <td><input type="number" step="0.01" placeholder="%" id="discount-per"></td>
                    <td><input type="number" step="0.01" placeholder="amount" id="discount-amount" name="discount_amount"></td>
                </tr>
                <tr class="taxable-total">
                    <td colspan="3" class="text-right"><b>Taxable Amount : </b></td>

                    <td colspan="2">
                        0.00
                    </td>
                </tr>

                <tr class="total">
                    <td colspan="3" class="text-right"><b>Total : </b></td>

                    <td colspan="2">
                        0.00
                    </td>
                </tr>

                <tr>
                    <td colspan="3" class="text-right"><b>Grand Total : </b></td>

                    <td colspan="2" class="grand-total">
                        0.00
                    </td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right"><br>
                        <button type="submit" class="btn btn-success">Generate Invoice</button>
                        <button type="reset" class="btn btn-danger">Clear</button>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</body>
<!-- jQuery library -->
<script src="assets/js/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="assets/js//bootstrap.min.js"></script>

<script src="assets/js/main.js"></script>

</html>