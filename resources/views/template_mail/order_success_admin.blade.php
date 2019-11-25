<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{-- {{dd($data)}} --}}
    <table align="center" bgcolor="#dcf0f8" border="0" cellpadding="0" cellspacing="0"
        style="margin:0;padding:0;background-color:#f2f2f2;width:100%!important;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px"
        width="100%">
        <tbody>
            <tr>
                <td align="center"
                    style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal"
                    valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" style="margin-top:15px" width="600">
                        <tbody>
                            <tr>
                                <td align="center" id="m_-231563949932531468headerImage" valign="bottom">
                                    <table cellpadding="0" cellspacing="0"
                                        style="border-bottom:3px solid #00b7f1;padding-bottom:10px;background-color:#fff"
                                        width="100%">
                                        <tbody>
                                            <tr>
                                                <td bgcolor="#FFFFFF" style="padding:0" valign="top" width="100%">
                                                    <div style="color:#fff;background-color:f2f2f2;font-size:11px">Tổng
                                                        giá
                                                        trị đơn hàng là {{pveser_numberformat($data['total'])}}</div>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <tr style="background:#fff">
                                <td align="left" height="auto" style="padding:15px" width="600">
                                    <table>
                                        <tbody>

                                            <tr>
                                                <td>
                                                    <h1
                                                        style="font-size:17px;font-weight:bold;color:#444;padding:0 0 5px 0;margin:0">
                                                        Đơn hàng mới,</h1>

                                                    

                                                    <h3
                                                        style="font-size:13px;font-weight:bold;color:#02acea;text-transform:uppercase;margin:20px 0 0 0;border-bottom:1px solid #ddd">
                                                        Thông tin đơn hàng #{{$id_order}} <span
                                                            style="font-size:12px;color:#777;text-transform:none;font-weight:normal">({{$data['created_at']}})</span>
                                                    </h3>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th align="left"
                                                                    style="padding:6px 9px 0px 9px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold"
                                                                    width="50%">Thông tin thanh toán</th>
                                                                <th align="left"
                                                                    style="padding:6px 9px 0px 9px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;font-weight:bold"
                                                                    width="50%"> Địa chỉ giao hàng </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td style="padding:3px 9px 9px 9px;border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal"
                                                                    valign="top"><span
                                                                        style="text-transform:capitalize">{{$data['name_guest']}}</span>
                                                                    <br>
                                                                    <a href="mailto:{{$data['email']}}"
                                                                        target="_blank">{{$data['email']}}</a>
                                                                    <br> {{$data['phone']}}
                                                                </td>
                                                                <td style="padding:3px 9px 9px 9px;border-top:0;border-left:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal"
                                                                    valign="top"><span
                                                                        style="text-transform:capitalize">Nguyễn Đại
                                                                        Lượng</span>
                                                                    <br>
                                                                    <a href="mailto:{{$data['email']}}"
                                                                        target="_blank">{{$data['email']}}</a>
                                                                    <br> {{$data['address']}}
                                                                    <br> T: {{$data['phone']}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"
                                                                    style="padding:7px 9px 0px 9px;border-top:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444"
                                                                    valign="top">
                                                                    <p
                                                                        style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px;font-weight:normal">
                                                                        <strong>Phương thức thanh toán: </strong>
                                                                        {{$data['method_payment'] ? 1 ==  'Thanh toán sau khi nhận hàng' : 'Chuyển khoản'}}
                                                                        <br>
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>


                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        style="background:#f5f5f5" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th align="left" bgcolor="#02acea"
                                                                    style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">
                                                                    Sản phẩm</th>
                                                                <th align="left" bgcolor="#02acea"
                                                                    style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">
                                                                    Đơn giá</th>
                                                                <th align="left" bgcolor="#02acea"
                                                                    style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">
                                                                    Số lượng</th>

                                                                <th align="right" bgcolor="#02acea"
                                                                    style="padding:6px 9px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px">
                                                                    Tổng tạm</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody bgcolor="#eee"
                                                            style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
                                                            @foreach ($carts as $item)
                                                            <tr>
                                                                <td align="left" style="padding:3px 9px" valign="top">
                                                                    <span>{{$item->name}}</span>
                                                                    <br>
                                                                </td>
                                                                <td align="left" style="padding:3px 9px" valign="top">
                                                                    <span>{{pveser_numberformat($item->price)}}</span>
                                                                </td>
                                                                <td align="left" style="padding:3px 9px" valign="top">
                                                                    {{$item->qty}}</td>

                                                                <td align="right" style="padding:3px 9px" valign="top">
                                                                    <span>{{pveser_numberformat($item->price*$item->qty)}}</span>
                                                                </td>
                                                            </tr>
                                                            @endforeach

                                                        </tbody>
                                                        <tfoot
                                                            style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#444;line-height:18px">
                                                            <tr>
                                                                <td align="right" colspan="3" style="padding:5px 9px">
                                                                    Tạm
                                                                    tính</td>
                                                                <td align="right" style="padding:5px 9px">
                                                                    <span>{{pveser_numberformat($data['total'])}}</span>
                                                                </td>
                                                            </tr>

                                                            <tr bgcolor="#eee">
                                                                <td align="right" colspan="3" style="padding:7px 9px">
                                                                    <strong><big>Tổng giá trị đơn hàng</big> </strong>
                                                                </td>
                                                                <td align="right" style="padding:7px 9px">
                                                                    <strong><big><span>{{pveser_numberformat($data['total'])}}</span>
                                                                        </big> </strong></td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>

                                                </td>
                                            </tr>
                                            <tr>

                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

        </tbody>
    </table>
</body>

</html>