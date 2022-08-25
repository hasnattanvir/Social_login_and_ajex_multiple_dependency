<!doctype html>
<html lang="en">
  <head>
    <title>Laravel Ajax Multiple Dependency</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>
  <body>

    <div class="sections">
        {{-- @yield('admin_content')      
        --}}

        @include('frontend.layouts.selectdata')
    </div>

     {{-- @include('frontend.layouts.selectdata') --}}


  
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
    //ajax call when region id selected
      $(document).ready(function(){
        $('#region').change(function (){
          //ajax setup
          $.ajaxSetup({
            headers:{
              'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
          });

          $('#city').empty();
          var id = $(this).val();
          // ajax call for country
          $.ajax({
            type:"GET",
            url: "/getCountry/"+id,
            dataType:"json",
            success:function(data){
              console.log(data);
              $('#country').html(data);
            },
            error:function(error){
              console.log(error);
            }
          });

          $('#country').change(function(){
            //ajax call for city          
            var id = $(this).val();           
            $.ajax({
              type:"GET",
              url: "/getCity/"+id,
              dataType:"json",
              success:function(data){
                console.log(data);
                $('#city').html(data);
              },
              error:function(error){
                console.log(error);
              }
            });
          });        

        });
      });
    </script>
  
  </body>
</html>