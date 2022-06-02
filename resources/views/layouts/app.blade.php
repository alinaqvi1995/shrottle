<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- slick slider css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- font awosome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- app custom css -->
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <!-- <link href="assets/css/responsive.css" rel="stylesheet"> -->

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
        
       <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">-->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">-->

    <title>Shrottle -  Rent A Bike</title>
    <link rel="icon" href="{{ asset('/images/cobraLogo01.png') }}"> 
    
    <script src="{{ asset('/js/jquery-3.6.0.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/3.0.0/jquery.payment.min.js"></script>
     
</head>


<body>
    {{-- <script src="{{ asset('/js/header.js') }}"></script> --}}

    @include('layouts.includes.header')
    <div>
        <!-- Content Section. Contains page content -->
        @yield('content')
    </div>
    @include('layouts.includes.footer')

    {{-- <script src="{{ asset('/js/footer.js') }}"></script> --}}

    <!-- jquery -->
    <script src="{{ asset('/js/jquery-3.6.0.min.js') }}"></script>

    <!-- slick slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }} "></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>-->
 
    <!-- custom js -->
    <script src="{{ asset('/js/custom.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <!--<script src="https://code.jquery.com/jquery-3.6.0.js"></script>-->
    <!--<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>-->
    <!--<script>-->
    <!--    $(function () {-->
    <!--        $("#datepicker").datepicker();-->
    <!--    });-->
    <!--    $(function () {-->
    <!--        $("#dropdatepicker").datepicker();-->
    <!--    });-->
    <!--    $( "#datepicker" ).datepicker({-->
    <!--       minDate: 0 -->
    <!--    });-->
    <!--    $( "#dropdatepicker" ).datepicker({-->
    <!--       minDate: 0 -->
    <!--    });-->
    <!--</script>-->
    <script>
        $(document).ready(function () {
            $('.summernote').summernote({
                placeholder: 'Type Here',
                tabsize: 2,
                height: 150
            });
        });
    </script>
    
    <script type="text/javascript">

    //     $(function() {
    //     var date_range = [ ["03-04-2022", "03-08-2022"], ["03-11-2022", "03-14-2022"], ["04-01-2022", "04-06-2022"] ];
    //       $('input[name="datefilter"]').daterangepicker({
    //           autoUpdateInput: false,
    //           timePicker: true,
    //           dateFormat: 'mm-dd-yy',
    //           locale: {
    //               cancelLabel: 'Clear',
    //               format: 'mm-dd-yy',
    //           }
    //           , datesDisabled:function(date) {
    			
    // 			var string = $.daterangepicker.formatDate('mm-dd-yy', date);
    // 			for (var i = 0; i < date_range.length; i++) {
    				
    // 				if (Array.isArray(date_range[i])) {
    // 					var from = new Date(date_range[i][0]);
    // 				// 	console.log(from);
    // 					var to = new Date(date_range[i][1]);
    // 					var current = new Date(string);
    					
    // 					if (current >= from && current <= to) return false;
    // 				}
    				
    // 			}
    			
    // 			return [date_range.indexOf(string) == -1]
    // 		},
              
    //       });
        
    //       $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
    //           $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
    //       });
        
    //       $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
    //           $(this).val('');
    //       });
        
    //     });
    
    

    
    
  
        // var datesForDisable = ["2022-04-17", "2022-04-18", "2022-04-19", "2022-04-20"]

//     $('.datepicker').datepicker({
//         format: 'mm-dd-yyyy',
//         autoclose: true,
//         todayHighlight: true,
//         datesDisabled: datesForDisable
//     });
</script>

</body>

</html>