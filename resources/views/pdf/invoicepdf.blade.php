<!DOCTYPE html>
<html xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" lang="en">
    <body style="font-family:Arial Unicode MS, Helvetica , Sans-Serif;">
        <table style="table-layout: fixed; width: 100%;">
            <tbody>
                <tr>
                    <td class="">
                        <div>
                            <img src={{$logo}} alt="Triple-s Automation" style="max-width: 25%;">
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

                        <table width="100%">
                            <caption style="text-transform: uppercase; text-align: left; font-size: 30pt;">
                                <strong style="font-size: 25px;    text-decoration: underline;">
                                    EXPORT SALES INVOICE
                                </strong>
                            </caption>
                            <tbody width="50%">
                                <tr>
                                    <td style="padding:5px; width:100px">
                                        <strong >Invoice No:</strong>
                                    </td>
                                    <td style="padding:5px;">
                                        <div>
                                            {{$receipts->id}}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:5px; width:100px">
                                        <strong >Order No:</strong>
                                    </td>
                                    <td style="padding:5px;">
                                        {{$receipts->order_payment_id}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:5px; width:100px">
                                        <strong >Invoice Date:</strong>
                                    </td>
                                    <td style="padding:5px;">
                                        {{$receipts->created_at}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>

        <div style="padding-top: 1cm; padding-bottom: 1cm;">
            <table style="table-layout: fixed; width: 100%;">
                <tbody>
                    <tr valign="top">
                        <td valign="top">
                            <div style="padding-bottom: 10px;">
                                <strong style="text-transform: uppercase;">From</strong>
                            </div>
                            <div>
							Triple-s Automation Private Limited <br>
                            169J, Illat Pillimar Complex, Puliangudi <br>
                            Tenkasi – Tamilnadu – India <br>
                            Email: sales@triplesautomation.com <br>
                            TRN: 100519406100003
                            </div>
                        </td>
                        <td width="15%">

                        </td>
                        <td valign="top">
                            <div style="padding-bottom: 10px;">
                                <strong style="text-transform: uppercase;">Bill To</strong>
                            </div>
                            <div>
                                <h5 class="font-size-15 mb-2">{{auth()->guard('customer')->user()->name}}</h5>
                                {{$receipts->customer->profile->door_no}} , {{$receipts->customer->profile->street}} <br>
                                {{$receipts->customer->profile->area}} , {{$receipts->customer->profile->city}} <br>
                                {{$receipts->customer->profile->state}} , {{$receipts->customer->profile->country}} <br>
                                {{auth()->guard('customer')->user()->email}} <br>
                                <p>{{$receipts->customer->profile->mobile}}</p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <table style="table-layout: fixed; width: 100%;" BORDER=0 CELLSPACING=0 CELLPADDING=6>
                <thead>
                    <tr>
                        <th  width="40%" align="left" style="border-top: 1px solid #eee; padding: 5px;background: #0a4e91; color: #fff; font-weight: 500;border-right: 1px solid #fff;">
                            SL - NO
                        </th>
                        <th  width="40%" align="left" style="border-top: 1px solid #eee; padding: 5px;background: #0a4e91; color: #fff; font-weight: 500;border-right: 1px solid #fff;">
                            ITEM
                        </th>
                        <th  width="40%" align="left" style="border-top: 1px solid #eee; padding: 5px;background: #0a4e91; color: #fff; font-weight: 500;border-right: 1px solid #fff;">
                            PRICE
                        </th>
                        <th  width="40%" align="left" style="border-top: 1px solid #eee; padding: 5px;background: #0a4e91; color: #fff; font-weight: 500;border-right: 1px solid #fff;">
                            QTY
                        </th>
                        <th  width="40%" align="left" style="border-top: 1px solid #eee; padding: 5px;background: #0a4e91; color: #fff; font-weight: 500;">
                            Total
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @php
                        $actual_amount = 0;
                    @endphp
                    @foreach ($receipts->order_items as $index=>$order_item)
                    <tr>
                        <td style="border-top: 1px solid #eee; padding: 5px;border:1px solid #0a4e91; border-top:none;">
                            {{ $loop->iteration }}
                        </td>
                        <td style="border-top: 1px solid #eee; padding: 5px;border-bottom:1px solid #0a4e91; border-right:1px solid #0a4e91;">
                            {{$order_item->product_name}}
                        </td>
                        <td style="border-top: 1px solid #eee; padding: 5px;border-bottom:1px solid #0a4e91; border-right:1px solid #0a4e91;">
                            $ {{$order_item->product_price}}
                        </td>
                        <td style="border-top: 1px solid #eee; padding: 5px;border-bottom:1px solid #0a4e91; border-right:1px solid #0a4e91;">
                            {{$order_item->product_quantity}}
                        </td>
                        <td style="border-top: 1px solid #eee; padding: 5px;border-bottom:1px solid #0a4e91; border-right:1px solid #0a4e91;">
                            $ {{ ($order_item->product_price * $order_item->product_quantity) }}
                        </td>
                    </tr>
                    @php
                        $actual_amount += $order_item->product_price;
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>

        <div style="border-top: 1px solid #eee;">
            <table style="table-layout: fixed; width: 100%; border-collapse: collapse;">
                <tbody>
                    @if ($receipts->discount_value != 0)
                        <tr>
                            <td align="right" style="padding: 5px;">
                                Subtotal
                            </td>
                            <td align="right" width="20%" style="padding: 5px;">
                                $ {{$actual_amount}}
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="padding: 5px;">
                                - Discount
                            </td>
                            <td align="right" width="20%" style="padding: 5px;">
                                - ${{$receipts->discount_value}}
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <td align="right" style="border-top: 2px solid #eee; padding: 8px;">
                            <span style="font-size: 16pt;">
                                Total Amount
                            </span>
                        </td>
                        <td align="right" width="20%" style="border-top: 2px solid #eee; padding: 8px;">
                            <strong style="font-size: 16pt;">
                               $ {{ ($actual_amount - $receipts->discount_value) }}
                            </strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
		<div style="border-top: 1px solid #eee;">
            <table style="table-layout: fixed; width: 100%; border-collapse: collapse;">
                <tbody>
                    <tr>
                        <td align="left" width="20%" style="padding: 5px;border-top: 1px solid #adadad;">
						For Triples Automation Pvt Ltd</br>
                            <img src="https://triplesautomation.com/assets/img/stamp.jpg" alt="Triples Automation Logo" style="max-width: 100px;"> </br>
							Thank you and best regards,</br>
                            The Triple-S Automation Sales Team
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
</body>

</html>
