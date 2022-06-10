<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shrottle - Rent A Bike</title>
</head>
<style>
    <blade import|%20url(%26%2339%3Bhttps%3A%2F%2Ffonts.googleapis.com%2Fcss2%3Ffamily%3DMukta%3Awght%40200%3B300%3B400%3B500%3B600%3B700%3B800%26display%3Dswap%26%2339%3B)%3B%0D>body {
        padding: 0;
        margin: 0;
        font-family: 'Mukta', sans-serif;
    }

    .h1 {
        color: #073451;
        margin: 0;
        font-size: 41px;
    }

    .h1 .span {
        color: #1884a8;
    }

    .p {
        text-align: justify;
        margin: 0;
        padding: 10px 0;
        color: #fff;
    }
</style>

<body>
    <table style="width: 600px; margin: 0 auto; background-color: #2e2e2e; padding: 0 0px;" cellpadding="0"
        cellspacing="0">
        <tbody>
            @include('emails.includes.header')
            <div>
                <!-- Content Section. Contains page content -->
                @yield('content')
            </div>
            @include('emails.includes.footer')
        </tbody>
    </table>
</body>

</html>