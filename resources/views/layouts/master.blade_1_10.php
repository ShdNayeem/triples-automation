<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>:TRIPLE-S AUTOMATION:</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Favicons -->
  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  
  
  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">
  <script src="/assets/js/zoom.js"></script>
  <!-- =======================================================
  * Template Name: FlexStart
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    {{-- Header --}}
    @include('layouts.header')

    @yield('content')

    <!-- =========={ FOOTER }==========  -->
    @include('layouts.footer')


     <!-- Custom Fonts -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<style>
  .wow:first-child {
    visibility: hidden;
  }
  .whatsapp {
  position: fixed;
  right: 1%;
  bottom: 10%;
  z-index: 9;
}
.whatsapp h5 {
  color: white;
  background: #20b20f;
  padding: 7px 10px;
  border-radius: 5px;
}
</style>
<div class="whatsapp">
<a href="https://api.whatsapp.com/send?phone=919080666043" target="_blank">	
<h5><i class="fa fa-whatsapp fa-2x fa-spin" aria-hidden="true"></i></h5></a>
              </div>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="/assets/vendor/aos/aos.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/assets/vendor/php-email-form/validate.js"></script>
{{-- <script src="/assets/js/ajaxproduct.js"></script> --}}
{{-- <script>
  // Initiate zoom effect:
  imageZoom("myimage", "myresult");
  </script> --}}
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
  

<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>
<script>
  // update cart
//   $(".update-cart").change(function (e) {
//         e.preventDefault();
  
//         var ele = $(this);
        
//         $.ajax({
//             url:  '{{ route('update-cart') }}' ,
//             method: "patch",
//             data: {
//                 _token: '{{ csrf_token() }}', 
//                 id: ele.parents("tr").attr("data-id"), 
//                 quantity: ele.parents("tr").find(".quantity").val()
//             },
//             success: function (response) {
//               console.log(response);
//               window.location.reload();
//             }
            
            
            
//         });
//     });
  // remove from cart
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
        
        var ele = $(this);
        
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url:  '{{ route('remove-from-cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
// disable cart button @first click
    // $('.add-to-cart').on('click', function () {
    //         // Disable the button
    //         $(this).prop('disabled', true);

    //         // Perform the AJAX request or page redirect
    //         // ...

    //         // Optionally, you can re-enable the button after a certain time
    //         setTimeout(function () {
    //             $('.add-to-cart').prop('disabled', false);
    //         }, 5000); // 5000 milliseconds (5 seconds) in this example
    //     });
</script>
 <script>

        let items = document.querySelectorAll('.carousel .carousel-item')

        items.forEach((el) => {
            const minPerSlide = 4
            let next = el.nextElementSibling
            for (var i = 1; i < minPerSlide; i++) {
                if (!next) {
                    // wrap carousel by using first child
                    next = items[0]
                }
                let cloneChild = next.cloneNode(true)
                el.appendChild(cloneChild.children[0])
                next = next.nextElementSibling
            }
        })
</script>
 <script>
         document.addEventListener('DOMContentLoaded', function () {

            // Function to check and toggle download link based on localStorage
            function checkAndToggleDownloadLink() {
                var downloadLink = document.querySelector('.downloadLink');
                var downloadCompleted = localStorage.getItem('downloadCompleted') === 'true';

                if (downloadCompleted) {
                    downloadLink.classList.add('disabled');
                    console.log('Download not completed. Disabling the anchor tag.');
                }
            }

            // Check and toggle download link on page load
            checkAndToggleDownloadLink();

            // Add event listener to the download link
            var downloadLinks = document.querySelectorAll('.downloadLink');
            downloadLinks.forEach(function (link) {
                link.addEventListener('click', disableDownloadLink);
            });

            // Function to disable download link
            function disableDownloadLink(event, orderId) {
                    event.preventDefault();

                    var downloadLink = event.target;
                    downloadLink.innerText = 'Downloading...';
                    var orderId = document.getElementById('orderId').value;
                    // Generate a unique key for the current product
                    var productKey = 'downloadCompleted_' + orderId;

                    // Check if the product download is completed based on the unique key
                    var downloadCompleted = localStorage.getItem(productKey) === 'true';
                    // alert(downloadCompleted );
                if (!downloadCompleted) {
                    fetch("/mark-as-downloaded/" + encodeURIComponent(orderId), {
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify({ orderId: orderId })
                    })
                    .then(response => response.json())
                    .then(data => {
                        window.location.href = downloadLink.getAttribute('href');
                        downloadLink.classList.add('disabled');
                        downloadLink.removeEventListener('click', function (event) {
                            disableDownloadLink(event, orderId);
                        });
                        downloadLink.innerText = 'Download Complete';

                        // Use the unique key to set localStorage for the specific product
                        localStorage.setItem(productKey, 'true');
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                }
            }
        });
                
    </script>
    <script>
        $('.product-img--main')
            // tile mouse actions
            .on('mouseover', function () {
                $(this).children('.product-img--main__image').css({ 'transform': 'scale(' + $(this).attr('data-scale') + ')' });
            })
            .on('mouseout', function () {
                $(this).children('.product-img--main__image').css({ 'transform': 'scale(1)' });
            })
            .on('mousemove', function (e) {
                $(this).children('.product-img--main__image').css({ 'transform-origin': ((e.pageX - $(this).offset().left) / $(this).width()) * 100 + '% ' + ((e.pageY - $(this).offset().top) / $(this).height()) * 100 + '%' });
            })
            // tiles set up
            .each(function () {
                $(this)
                    // add a image container
                    .append('<div class="product-img--main__image"></div>')
                    // set up a background image for each tile based on data-image attribute
                    .children('.product-img--main__image').css({ 'background-image': 'url(' + $(this).attr('data-image') + ')' });
            });
    </script>
    <script>
   document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("myForm").addEventListener("submit", function (event) {
        event.preventDefault();

        var inputData = document.getElementById("inputcouponcode").value;

        fetch("/discount", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ inputData: inputData })
        })
        .then(response => response.json())
        .then(data => {
            var message = JSON.stringify(data.message);
            var coupon_msg = message.slice(1, -1);
            document.getElementById("responseContainer").innerHTML =  coupon_msg;
            refreshPage();
            // console.log(JSON.stringify(data.message));
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });
});
function refreshPage() {
    location.reload();
}

</script>

</body>
</html>