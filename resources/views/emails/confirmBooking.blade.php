@extends('emails.layouts.app')

@section('content')

<tr>
    <td style="height: 50px;"></td>
</tr>
<tr>
    <td style="padding: 0 50px;">
        <h1 style="color: #fff;">Dear <span style="color: #ffdc39;">Customers!</span> </h1>
        <p style="font-size: 20px; color: #fff;">
            Transaction # : <span style="font-weight: bold;">{{ $stripe->id }}</span>
        </p>
    </td>
</tr>
<tr>
    <td style="padding: 0 50px;">
        <table style="width: 100%;" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td>
                        <p style="color: #fff;">
                            Your booking confirmation details is below:
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold; font-size: 20px; color: #fff;">
                        Pickup Details
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid #fff; ">
                    <td style="border-bottom: 1px solid #fff; color: #fff;     padding:  10px 0;">Pickup Date</td>
                    <td
                        style="border-bottom: 1px solid #fff; color: #fff; font-weight: bold; text-align: right;     padding:  10px 0;">
                        {{ $pickup_date }}</td>
                </tr>
                <tr style="border-bottom: 1px solid #fff;">
                    <td style="border-bottom: 1px solid #fff; color: #fff;     padding:  10px 0;">Pickup Location</td>
                    <td
                        style="border-bottom: 1px solid #fff; color: #fff; font-weight: bold; text-align: right;     padding:  10px 0;">
                        {{ $request->pickup_loc }}</td>
                </tr>

                <tr>
                    <td style="height: 20px;"></td>
                </tr>

                <tr>
                    <td style="font-weight: bold; font-size: 20px; color: #fff;">
                        Dropoff Details
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid #fff; ">
                    <td style="border-bottom: 1px solid #fff; color: #fff;     padding:  10px 0;">Dropoff Date</td>
                    <td
                        style="border-bottom: 1px solid #fff; color: #fff; font-weight: bold; text-align: right;     padding:  10px 0;">
                        {{ $dropoff_date }}</td>
                </tr>
                <tr style="border-bottom: 1px solid #fff;">
                    <td style="border-bottom: 1px solid #fff; color: #fff;     padding:  10px 0;">Dropoff Location</td>
                    <td
                        style="border-bottom: 1px solid #fff; color: #fff; font-weight: bold; text-align: right;     padding:  10px 0;">
                        {{ $request->dropoff_loc }}</td>
                </tr>

                <tr>
                    <td style="height: 20px;"></td>
                </tr>

                <tr>
                    <td style="font-weight: bold; font-size: 20px; color: #fff;">
                        Payment Details
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid #fff; ">
                    <td style="border-bottom: 1px solid #fff; color: #fff;     padding:  10px 0;">Payment Type</td>
                    <td
                        style="border-bottom: 1px solid #fff; color: #fff; font-weight: bold; text-align: right;     padding:  10px 0;">
                        Visa Card</td>
                </tr>
                <tr style="border-bottom: 1px solid #fff;">
                    <td style="border-bottom: 1px solid #fff; color: #fff;     padding:  10px 0;">Total Amount Paid</td>
                    <td
                        style="border-bottom: 1px solid #fff; color: #fff; font-weight: bold; text-align: right;     padding:  10px 0;">
                        {{ '$'.$totalRent }}</td>
                </tr>
                <tr>
                    <td style="height: 20px;"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p style="text-align: center; color: #fff; font-size: 18px;">Thankyou for booking with Cobra
                            Rider</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>
<tr>
    <td style="height: 50px;"></td>
</tr>

@endsection