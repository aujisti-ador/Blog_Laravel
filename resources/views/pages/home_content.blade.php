@extend('index')
@section('main_content')
<div class="content-grid">
    <div class="content-grid-head">
        <h3>POST OF THE DAY</h3>
        <h4>July 24, 2014,Posted by: <a href="#">Admin</a></h4>
        <div class="clearfix"></div>
    </div>
    <div class="content-grid-info">
        <h3><a href="single.html">MORBI IN SEM QUIS DUI</a></h3>
        <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat.</p>
        <img src="{{asset('public/front_end_asset/images/c1.jpg')}}" alt=""/>
        <a class="bttn" href="single.html">MORE</a>
    </div>
</div>
@endsection