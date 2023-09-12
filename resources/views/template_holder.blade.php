<html>
  <head>
    <title>{{$template->title}}</title>
    <style type="text/css">
        body {
          background-color: #807f7f;
        }
        .header{
          background-color: #333333;
          padding: 2px;
          text-align: center;
          color: white;
        }
        .frame {
          width: 50%;
          border: 3px solid #807f7f;
          background: #fff;
          margin: auto;
          padding: 15px 10px;
        }
    </style>
  </head>
  <body>
    <div class="header">
      <h1>{{$template->title}}</h1>
    </div>
    <div class="frame">
        @include('template')
    </div>
  </body>
</html>