<!DOCTYPE html>
<html>
<head>
    <title>Print Invoice</title>
    <style>
        body {

            font-family: Arial, Helvetica, sans-serif;

            font-size: 12px;

        }

        .text-center {

            text-align: center;

        }

        td {

            padding-left: 4px !important;

            padding-right: 4px !important;

        }

        th {

            padding-left: 4px !important;

            padding-right: 4px !important;

        }

        .left_padding {

            padding-left: 8px !important;

        }

        table {
            page-break-inside: auto
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto
        }

        @page {

            @PageBreak {
                page-break: always;
                page-break-inside: avoid;
            }
    </style>

</head>


<body>

    <div style="width:100%;">

        <div style="text-align: center;font-size: 14px;padding: 3px;" class="text-center">

            <b style="font-size: 18px">COMPANY NAME</b><br>
            addrees, of billing ,
            company@gmail.com, 9539751639<br>
            GSTIN NO : HJDS3555
        </div><br><br>

        <table style="font-size: 12px; width:100%">

            <tr>
                <td style=" font-size: 14px; width:10%;">Invoice&nbsp;#</td>
                <td>:&nbsp;<b><?php echo $_POST['bill_no']; ?><b></td>
                <td style="font-size: 14px;text-align:right">Dated </td>
                <td>:&nbsp;<b><?php echo date('d-M-Y'); ?></b></td>
            </tr>



        </table>


        <br>
        <table style="width:100%; font-size: 12px; border-top:1px  dashed black; border-collapse: collapse;">

            <tr>

                <th style="border-top:1px dashed; border-bottom: 1px dashed; width:5%;line-height: 22px;text-align: left;">No</th>

                <th style="border-top:1px dashed; border-bottom: 1px dashed;text-align: left;">Items</th>

                <th style="border-top:1px dashed; border-bottom: 1px dashed; text-align: right;">Rate</th>

                <th style="border-top:1px dashed; border-bottom: 1px dashed; text-align: right;">Qty</th>

                <th style="border-top:1px dashed; border-bottom: 1px dashed; text-align: right;">Amount</th>

                <th style="border-top:1px dashed; border-bottom: 1px dashed;text-align: right;">Tax</th>

                <th style="border-top:1px dashed; border-bottom: 1px dashed; text-align: right;">Tot.Amt</th>

            </tr>

            <?php

            $total_amount = 0;
            $total_tax = 0;
            $total_sub = 0;

            for ($i = 0; $i < count($_POST['cost']); $i++) {
                $amount = $_POST['cost'][$i] * $_POST['qty'][$i];
                $tax = ($amount *  $_POST['tax'][$i]) / 100;
                $total = $amount  + $tax;

                $total_amount += $amount;
                $total_tax += $tax;
                $total_sub += $total;
            ?>

                <tr>

                    <td style="line-height: 20px;text-align: right;"><?php echo $i + 1; ?></td>

                    <td><?= $_POST['item'][$i]; ?> </td>

                    <td style=" text-align: right;"><?= number_format($_POST['cost'][$i], 2); ?></td>

                    <td style=" text-align: right;"><?= number_format($_POST['qty'][$i], 2); ?> </td>

                    <td style=" text-align: right;"><?= number_format($amount, 2); ?></td>

                    <td style=" text-align: right;"><?= number_format($tax, 2); ?></td>

                    <td style=" text-align: right;"><?= number_format($total, 2); ?></td>

                </tr>

            <?php


            }

            ?>
            <tr>

            </tr>

        </table>

        <br>


        <table style="width:100%; font-size: 12px; border-top:1px  dashed black; border-collapse: collapse;">

            <tr><br>
                <td style=" text-align: right;line-height: 18px">Total Amount</td>

                <td style=" text-align: right;"><?php echo number_format($total_amount, 2); ?></td>
            </tr>
            <tr>
                <td style="text-align: right;line-height: 18px">Total Tax</td>
                <td style="text-align: right;"><?php echo number_format($total_tax, 2); ?></td>
            </tr>
            <tr>
                <td style="text-align: right;line-height: 18px">Sub Total</td>
                <td style="text-align: right;"><?php echo number_format($total_sub, 2); ?></td>
            </tr>
            <tr>
                <td style="text-align: right;line-height: 18px">Discount</td>
                <td style="text-align: right;"><?php echo number_format($_POST['discount_amount'], 2); ?></td>
            </tr>
            <tr>
                <td style=" text-align: right;line-height: 18px">Net Total</td>

                <td style="text-align: right; font-weight: bold; font-size: 16px;"><?php echo number_format($total_sub - $_POST['discount_amount'], 2); ?></td>
            </tr>
        </table>


        <table style="width:100%; border-top:1px  dashed black;">

            <tr>

                <td style="text-align: center; font-size: 12px;">
                    <!-- AMOUNT INCLUSIVE OF APPLICABLE TAXES<br> -->
                    Terms & Conditions Apply<br>
                    * Thank You for Shopping with us *
                </td>

            </tr>

        </table>

    </div>

    </div>



</body>
<script>
    window.print();
</script>

</html>