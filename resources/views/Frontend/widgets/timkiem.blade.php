<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('vendor/fontawesome/fontawesome-free-5.10.2-web/css/all.css')}}">
    <title>Hello, world!</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/frontend.css')}}">
</head>
<body>
        {{-- Navbar  --}}
        @include("Frontend.widgets.navbar", [$theloai = $theloai])
        {{-- End Navbar  --}}

        <section>
            <div class="container mt-3"> <!-- Container -->
                <h3>Từ khóa tìm kiếm : <strong>{{$tukhoa}}</strong></h3>     
                <h4 class="mt-3"><strong>{{count($timkiem)}} kết quả tìm kiếm</strong></h4>                
                <div class="row mt-5">

                    @if(count($timkiem) <= 0)
                    <div class="col-lg-12" style="visibility: hidden;height:142px;">
                        
                    </div>
                    @endif

                    @foreach($timkiem as $tins)
                    <div class="col-lg-4 mb-5">
                        <a href="{{url('/trangchu/'.$tins->tl_tenkhongdau.'/'.$tins->lt_tenkhongdau.'/'.$tins->tt_ma)}}">
                            <img src="{{asset('storage/photos/'.$tins->tt_hinhAnh)}}" class="image" alt="">
                        </a>
                    </div>
                    <div class="col-lg-8 mb-5">
                        <h5><strong><a href="{{url('/trangchu/'.$tins->tl_tenkhongdau.'/'.$tins->lt_tenkhongdau.'/'.$tins->tt_ma)}}">{{$tins->tt_tieuDe}}</a></strong></h5>
                        <p class="mt-3">{{$tins->tt_tomTat}}</p>
                    </div>
                    @endforeach
                </div>
            </div> <!-- End Container -->
        </section>
        
        
        @include('Frontend.widgets.footer')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
            $(document).ready(function(){
              $("#toggle").click(function(){
                $("#sub-menu-toggle").toggle();
              });
            });
          </script>
</body>
</html>