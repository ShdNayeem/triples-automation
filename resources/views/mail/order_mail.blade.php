
Dear {{ $username }},<br><br>

Thank you for your recent purchase from Triple-S Automation! We're thrilled to have been a part of your project and look forward to seeing how these images enhance your projects.<br><br>

If you have any questions or need further assistance, please don't hesitate to reach out. We're here to help!<br><br>


        <h1>Purchased Products:-</h1><hr><br><br>

        <table class="table table-striped thead-default table-bordered" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 100%; border: 1px solid #e2e8f0;">
            <thead>
                <tr>
                    <th style="line-height: 24px; font-size: 16px; margin: 0; padding: 12px; border-color: #e2e8f0; border-style: solid; border-width: 1px 1px 2px; text-align: left;" valign="top">Product Name</th>
                    <th style="line-height: 24px; font-size: 16px; margin: 0; padding: 12px; border-color: #e2e8f0; border-style: solid; border-width: 1px 1px 2px; text-align: left;" valign="top">Amount</th>

                </tr>
            </thead>
            <tbody>
                @php
                    $actual_amount = 0;
                @endphp

                @foreach ($order_items->order_items as $order_item)
                    <tr data-id=""  style="background-color: #f2f2f2">

                        <td data-th="Product Title" style="line-height: 24px; font-size: 16px; margin: 0; padding: 12px; border: 1px solid #e2e8f0;" valign="top">{{ $order_item->product_name }}</td>

                        <td data-th="Order_amount" style="line-height: 24px; font-size: 16px; margin: 0; padding: 12px; border: 1px solid #e2e8f0;" valign="top">$ {{$order_item->product_price}}</td>

                    </tr>
                    @php
                        $actual_amount += $order_item->product_price;
                    @endphp
                @endforeach

            </tbody>

        </table>
        <table style="table-layout: fixed; width: 100%; border-collapse: collapse;">
            <tbody>
                @if ($order_items->discount_value != 0)
                    <tr>
                        <td style="padding: 5px; text-align: right;">
                            Subtotal
                        </td>
                        <td width="20%" style="padding: 5px; text-align: right;">
                            $ {{$actual_amount}}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; text-align: right;">
                            - Discount
                        </td>
                        <td width="20%" style="padding: 5px; text-align: right;">
                            - ${{$order_items->discount_value}}
                        </td>
                    </tr>
                @endif
                <tr>
                    <td style="border-top: 2px solid #eee; padding: 8px;">
                        <span style="font-size: 16pt;">
                            Total Amount
                        </span>
                    </td>
                    <td width="20%" style="border-top: 2px solid #eee; padding: 8px;">
                        <strong style="font-size: 16pt;">
                           $ {{ ($actual_amount - $order_items->discount_value) }}
                        </strong>
                    </td>
                </tr>
            </tbody>
        </table>

<br><br>
Sincerely,<br>

The Triple-S Automation Sales Team
