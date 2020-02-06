<table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td>
            <table class="content" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    @foreach($oder->orderDetails as $item)
                        <td>
                            {{ $item->productName }} x {{ $item->quantity }}
                        </td>
                    @endforeach
                </tr>
            </table>
        </td>
    </tr>
    {{ trans('order.billCol.total') }} : {{ $order->amout }}
</table>
