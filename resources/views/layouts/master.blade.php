<!DOCTYPE html>
<head>
    <title>Doc Maps Project</title>

    <!-- Fontfaces CSS-->
    <link href="{{{'css/font-face.css'}}}" rel="stylesheet" media="all">
    <link href="{{{'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'}}}"
          rel="stylesheet" media="all">
    <link href="{{{'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'}}}" rel="stylesheet"
          media="all">
    <link href="{{{'https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css'}}}"
          rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{{'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css'}}}" rel="stylesheet"
          media="all">


    <!-- Main CSS-->
    <link href="{{{'css/theme.css'}}}" rel="stylesheet" media="all">
    <script src="{{{'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'}}}"></script>
    <script src="{{{'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js'}}}"></script>



</head>

<body class="">
<div class="page-wrapper">@include('partials.header') @include('partials.sidebar')
    <div class="page-container">
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">@yield('content')</div>
            </div>
        </div>
    </div>
</div>

<!-- Local Js file -->
<script src="/js/app.js"></script>

@yield('scripts')
</body>
