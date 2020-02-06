<table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td>
            <table class="content" align="center" cellpadding="0" cellspacing="0" border="0">
                @foreach($order->orderDetails as $item)
                    <tr>
                        <td>
                            {{ $item->productName }}
                        </td>
                        <td>
                            {{ $item->quantity }}
                        </td>
                    </tr>
                @endforeach
            </table>
        </td>
    </tr>
    {{ trans('order.billCol.total') }} : {{ $order->amout }}
</table>
