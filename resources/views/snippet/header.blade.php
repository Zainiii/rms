<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ResuMuse | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/templatemo-style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">


    <style type="text/css">
      .header{
        background-color: #333333;
        padding: 2px;
        text-align: center;
        color: white;
      }
      body {
        background-color: #0093E9;
        background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
        background-attachment: fixed;
      }
      .button-63{
        display: inline-block;
        outline: 0;
        border: 0;
        cursor: pointer;
        border-radius: 8px;
        padding: 14px 24px 16px;
        font-size: 18px;
        font-weight: 700;
        line-height: 1;
        transition: transform 200ms,background 200ms;
        color: #000000;
        background-color: #fff;
        box-shadow: 0 0 0 3px #000000 inset;
      }

      .btn-right{
        margin-right: -210px;    
      }

      .btn-left{
        margin-left: -165px;    
      }

      .button-63:hover{
        background-color: #000;
        color: #fff !important;
        transform: translateY(-2px);
      }
      .clr-default{
        color: #4f46e5 !important;
      }
      .bg-default{
        background-color: #4f46e5 !important;
      }
      .frame {
        width: 50%;
        border-top: 3px solid #0093E9;
        background: #fff;
        margin: auto;
        padding: 15px 10px;
      }


      /*toggle button style*/
      .toggle {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        width: 41px;
        height: 20px;
        display: inline-block;
        position: relative;
        border-radius: 50px !important;
        overflow: hidden;
        outline: none;
        border: none;
        cursor: pointer;
        background-color: #707070;
        transition: background-color ease 0.3s;
        margin-left:0 !important;
      }

      .toggle:before {
        content: "yes no";
        display: block;
        position: absolute;
        z-index: 2;
        width: 15px;
        height: 15px;
        background: #fff;
        left: 2px;
        top: 2px;
        border-radius: 50%;
        font: 10px/18px Helvetica;
        text-transform: uppercase;
        font-weight: bold;
        text-indent: -22px;
        word-spacing: 16px;
        color: #fff;
        text-shadow: -1px -1px rgba(0,0,0,0.15);
        white-space: nowrap;
        box-shadow: 0 1px 2px rgba(0,0,0,0.2);
        transition: all cubic-bezier(0.3, 1.5, 0.7, 1) 0.3s;
      }

      .toggle:checked {
        background-color: #4CD964;
      }

      .toggle:checked:before {
        left: 24px;
      }

      .card{
        padding: 1rem;
        background-color: #fff;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        max-width: 320px;
        border-radius: 20px;
      }

    </style>

    @yield('style')
  </head>

  <body>
    @yield('content')



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <script src="https://kit.fontawesome.com/a7ad1ba4e3.js" crossorigin="anonymous"></script>

    <script type="text/javascript">
      function closeAlert(){
        $('.alert').hide();
      }
    </script>

    @yield('js')

  </body>

</html>