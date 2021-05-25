@extends('master')
@section('content')
<link rel="stylesheet" href="{{url('/')}}/asset/css/flexslider.css" type="text/css" media="screen" />
<link href="{{url('/')}}/asset/css/style.css" rel="stylesheet" type="text/css" media="all" />
<script src="{{url('/')}}/asset/js/imagezoom.js"></script>
<script src="{{url('/')}}/asset/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="{{url('/')}}/asset/js/bootstrap-3.1.1.min.js"></script>
<style>
    .bootstrap-tab.animated.wow.slideInUp.animated {
        padding-left: 116px;
    }
    a#add-to-chart:focus {
    display: none;
}
    .checkout {
        background: #fff;
    }
</style>


<!-- //banner-top -->
<!-- banner -->
<div class="page-head">
    <div class="container">
        <h3>Single</h3>
    </div>
</div>
<!-- //banner -->
<!-- single -->
<div class="single">
    <div class="container">
        <div class="col-md-6 single-right-left animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
            <div class="grid images_3_of_2">
                <div class="flexslider">
                    <!-- FlexSlider -->
                    <script>
// Can also be used with $(document).ready()
$(window).load(function () {
    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails"
    });
});
                    </script>

                    <!-- //FlexSlider-->
                    <ul class="slides">
                        @if(file_exists("images/product/product-1-{$allpdt->id}.{$allpdt->picture1}"))
                        <li data-thumb="{{url('/')}}/images/product/product-1-{{$allpdt->id}}.{{$allpdt->picture1}}">
                            <div class="thumb-image"> <img src="{{url('/')}}/images/product/product-1-{{$allpdt->id}}.{{$allpdt->picture1}}" data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                        @endif
                        @if(file_exists("images/product/product-2-{$allpdt->id}.{$allpdt->picture2}"))
                        <li data-thumb="{{url('/')}}/images/product/product-2-{{$allpdt->id}}.{{$allpdt->picture2}}">
                            <div class="thumb-image"> <img src="{{url('/')}}/images/product/product-2-{{$allpdt->id}}.{{$allpdt->picture2}}" data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                        @endif
                        @if(file_exists("images/product/product-3-{$allpdt->id}.{$allpdt->picture3}"))
                        <li data-thumb="{{url('/')}}/images/product/product-3-{{$allpdt->id}}.{{$allpdt->picture3}}">
                            <div class="thumb-image"> <img src="{{url('/')}}/images/product/product-3-{{$allpdt->id}}.{{$allpdt->picture3}}" data-imagezoom="true" class="img-responsive"> </div>
                        </li>
                        @endif

                    </ul>
                    <div class="clearfix"></div>
                </div>	
            </div>
        </div>

        <div class="col-md-6 single-right-left simpleCart_shelfItem animated wow slideInRight animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">
            <h3>{{$allpdt->title}}</h3>
            @php 
            $realprice = PriceCal($allpdt->price, $allpdt->vat, 0); 
            $discountprice = PriceCal($allpdt->price, $allpdt->vat, $allpdt->discount); 
            @endphp
            <p>
                <span class="item_price">৳ @php echo $discountprice  @endphp</span>
                @if ($discountprice != $realprice )
                <del>৳ @php echo $realprice @endphp</del>
                @endif

            <div class="rating1">
                <span class="starRating">
                    <input id="rating5" type="radio" name="rating" value="5">
                    <label for="rating5">5</label>
                    <input id="rating4" type="radio" name="rating" value="4">
                    <label for="rating4">4</label>
                    <input id="rating3" type="radio" name="rating" value="3" checked="">
                    <label for="rating3">3</label>
                    <input id="rating2" type="radio" name="rating" value="2">
                    <label for="rating2">2</label>
                    <input id="rating1" type="radio" name="rating" value="1">
                    <label for="rating1">1</label>
                </span>
            </div>
             @php

            $pdtid = Session::get("pdtid");
            $qtyid = Session::get("qtyid");
            
            if($pdtid){
               $index = array_search($allpdt->id,$pdtid);
               if($index !== FALSE){
                $value = $qtyid[$index];
               }else{
                $value = 1;
               }
            }else{
            $value= 1;
            }
            @endphp
            <div style="height:20px;"> </div>
            <div class="quantity"> 
                <div class="quantity-select">   
                    {{csrf_field()}}
                    <input type="hidden" id="ids" value="{{$allpdt->id}}"/>
                    <div id="minus" class="entry value-minus">&nbsp;</div>
                    <div id="entry{{$allpdt->id}}" class="entry value"><span>{{$value}}</span></div>
                    <div id="plus" class="entry value-plus active">&nbsp;</div>
                </div>
            </div>
            <div style="height:20px;"> </div>
           
            
            <div class="occasion-cart">
                <a href="#" id="add-to-chart" class="item_add hvr-outline-out button2">Add to cart</a>
                <a href="#" id="remove-chart{{$allpdt->id}}" class="btn btn-danger remove-btn" <?php echo(isset($index)&& $index !== FALSE) ? "":"style='display:none'" ?>>Remove</a>
            </div>

        </div>
        <div class="clearfix"> </div>

        <div class="bootstrap-tab animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
            <div class="bs-examplebs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
                    <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Reviews(1)</a></li>
                    <li role="presentation" class="dropdown">
                        <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown" aria-controls="myTabDrop1-contents">Information <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
                            <li><a href="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">cleanse</a></li>
                            <li><a href="#dropdown2" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">fanny</a></li>
                        </ul>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
                        <h5>Product  Description</h5>
                        <p>{{$allpdt->description}}</p>
                    </div>
                    <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile" aria-labelledby="profile-tab">
                        <div class="bootstrap-tab-text-grids">
                            <div class="bootstrap-tab-text-grid">
                                <div class="bootstrap-tab-text-grid-left">
                                    <img src="{{url('/')}}/asset/images/men3.jpg" alt=" " class="img-responsive">
                                </div>
                                <div class="bootstrap-tab-text-grid-right">
                                    <ul>
                                        <li><a href="#">Admin</a></li>
                                        <li><a href="#"><span class="glyphicon glyphicon-share" aria-hidden="true"></span>Reply</a></li>
                                    </ul>
                                    <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis 
                                        suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem 
                                        vel eum iure reprehenderit.</p>
                                </div>
                                <div class="clearfix"> </div>
                            </div>

                            <div class="add-review">
                                <h4>add a review</h4>
                                <form>
                                    <input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
                                    <input type="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">

                                    <textarea type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
                                    <input type="submit" value="SEND">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="dropdown1" aria-labelledby="dropdown1-tab">
                        <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                    </div>
                    <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="dropdown2" aria-labelledby="dropdown2-tab">
                        <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="related-product">
<div class="container">
    <div class="row">
        <div class="title">
            <h4>You May Interested Those Product Also !!</h4>
        </div>
        @foreach($allscat as $relpdt)
            @php
                $realprice = PriceCal($relpdt->price, $relpdt->vat, 0) ;
                $discountprice = PriceCal($relpdt->price, $relpdt->vat, $relpdt->discount) ;

            @endphp
            <div class="col-md-3 product-men yes-marg">
                <div class="men-pro-item simpleCart_shelfItem">
                    <div class="men-thumb-item">

                        @if($relpdt->default_picture == "1" && file_exists("images/product/product-1-{$relpdt->id}.{$relpdt->picture1}"))
                            <img  class="pro-image-front" src="{{url('/')}}/images/product/product-1-{{$relpdt->id}}.{{$relpdt->picture1}}"  />
                        @elseif($relpdt->default_picture == "2" && file_exists("images/product/product-1-{$relpdt->id}.{$relpdt->picture2}"))
                            <img  class="pro-image-front" src="{{url('/')}}/images/product/product-2-{{$relpdt->id}}.{{$relpdt->picture2}}"  />
                        @elseif($relpdt->default_picture == "3" && file_exists("images/product/product-1-{$relpdt->id}.{$relpdt->picture3}"))
                            <img  class="pro-image-front" src="{{url('/')}}/images/product/product-3-{{$relpdt->id}}.{{$relpdt->picture3}}"  />
                        @elseif(file_exists("images/product/product-1-{$relpdt->id}.{$relpdt->picture1}"))
                            <img  class="pro-image-front" src="{{url('/')}}/images/product/product-1-{{$relpdt->id}}.{{$relpdt->picture1}}"  />
                        @elseif(file_exists("images/product/product-2-{$relpdt->id}.{$relpdt->picture2}"))
                            <img  class="pro-image-front" src="{{url('/')}}/images/product/product-2-{{$relpdt->id}}.{{$relpdt->picture2}}"  />
                        @elseif(file_exists("images/product/product-3-{$relpdt->id}.{$relpdt->picture3}"))
                            <img  class="pro-image-front" src="{{url('/')}}/images/product/product-3-{{$relpdt->id}}.{{$relpdt->picture3}}"  />
                        @else
                            <img  class="pro-image-front" src="{{url('/')}}/images/no-images.jpg"  />
                        @endif

                        @if($relpdt->default_picture == "1" && file_exists("images/product/product-1-{$relpdt->id}.{$relpdt->picture1}"))
                            <img  class="pro-image-back" src="{{url('/')}}/images/product/product-1-{{$relpdt->id}}.{{$relpdt->picture1}}"  />
                        @elseif($relpdt->default_picture == "2" && file_exists("images/product/product-1-{$relpdt->id}.{$relpdt->picture2}"))
                            <img  class="pro-image-back" src="{{url('/')}}/images/product/product-2-{{$relpdt->id}}.{{$relpdt->picture2}}"  />
                        @elseif($relpdt->default_picture == "3" && file_exists("images/product/product-1-{$relpdt->id}.{$relpdt->picture3}"))
                            <img  class="pro-image-back" src="{{url('/')}}/images/product/product-3-{{$relpdt->id}}.{{$relpdt->picture3}}"  />
                        @elseif(file_exists("images/product/product-1-{$relpdt->id}.{$relpdt->picture1}"))
                            <img  class="pro-image-back" src="{{url('/')}}/images/product/product-1-{{$relpdt->id}}.{{$relpdt->picture1}}"  />
                        @elseif(file_exists("images/product/product-2-{$relpdt->id}.{$relpdt->picture2}"))
                            <img  class="pro-image-back" src="{{url('/')}}/images/product/product-2-{{$relpdt->id}}.{{$relpdt->picture2}}"  />
                        @elseif(file_exists("images/product/product-3-{$relpdt->id}.{$relpdt->picture3}"))
                            <img  class="pro-image-back" src="{{url('/')}}/images/product/product-3-{{$relpdt->id}}.{{$relpdt->picture3}}"  />
                        @else
                            <img  class="pro-image-back" src="{{url('/')}}/images/no-images.jpg"  />
                        @endif<div class="men-cart-pro">
                            <div class="inner-men-cart-pro">
                                <a href="{{url('/')}}/{{Replace($relpdt->cname)}}/{{Replace($relpdt->scname)}}/{{$relpdt->id}}/{{Replace($relpdt->title)}}" class="link-product-add-cart">Quick View</a>
                            </div>
                        </div>

                    </div>
                    <div class="item-info-product ">
                        <h4><a href="{{url('/')}}/{{Replace($relpdt->cname)}}/{{Replace($relpdt->scname)}}/{{$relpdt->id}}/{{Replace($relpdt->title)}}">{{$relpdt->title}}</a></h4>
                        <div class="info-product-price">
                            <span class="item_price">৳ @php echo $discountprice  @endphp</span>
                            @if ($discountprice != $realprice )
                                <del>৳ @php echo $realprice @endphp</del>
                            @endif
                        </div>
                        <a href="#" id="add-to-chart{{$relpdt->id}}" class="item_add single-item hvr-outline-out home-add-to-cart button2">Add to cart</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>
<script>
    $(document).ready(function (e) {
        $(document).on('click', '#minus', function (e) {
            var ids = $('#ids').val();
            var qnty = $('#entry'+ids).text();
            if(qnty>1){
                qnty--;
            }
            $('#entry'+ids).text(qnty);
        });
        $(document).on('click', '#plus', function (e) {
            var ids = $('#ids').val();
            var qnty = $('#entry'+ids).text();
            qnty++;
            $('#entry'+ids).text(qnty);
        });
        /**/
        $(document).on('click','#add-to-chart',function(e){
            var ids = $('#ids').val();
            var qty = $('#entry'+ids).text();
            $.ajax({
                type:'POST',
                url : "{{route('cart.add')}}",
                data: {
                    'pid': ids,
                    'qty': qty,
                    '_token': $('input[name=_token]').val()
                },
                success:function(data){
                    alert(data['msg']);
                    if(data['status'] == 1){
                        var items = parseInt($('#simpleCart_quantity').text());
                        items++;
                        $('#simpleCart_quantity').text(items);
                        var cartItems = "<div class='single-cart-item'>"
                        cartItems += "<div class='pdt-image'><img src=\"{{url('/')}}/images/product/"+data['picture']+"\"/></div>";
                        cartItems += "<div class='pdt-text'><h4>"+data['title']+"</h4></div>";
                        cartItems += "<i id='item-close"+ids+"' class='glyphicon glyphicon-remove pull-right close-btn'></i>";
                        cartItems += "<span id='qty-"+ids+"' class='qntity'></span> X " ;
                        cartItems += "<span class='qntity'>"+data['price']+"</span>";
                        cartItems += "</div>";
                        $(".cart-product-item").append(cartItems);
                    }
                    $('#totalAmount').text(data['Total']);
                    $('#remove-chart'+ids).show();
                    $('#qty-'+ids).text(qty);
                }
            });
            return false;
        });

        $(document).on('click','.close-btn', function(){

            var ids = $(this).attr("id");
            ids = ids.substr(10);
            $(this).parent().hide();
            $.ajax({
                type: "POST",
                url:"{{route('cart.remove')}}",
                data:{
                    'pid': ids,
                    '_token': $('input[name=_token]').val()
                },
                success: function(data) {
                    if (data > 0) {
                        $("#totalAmount").text(data);
                        var items = parseInt($('#simpleCart_quantity').text());

                        items--; //minus an items
                        $('#simpleCart_quantity').text(items);
                        $('#remove-chart'+ids).hide();
                    }
                    else {
                        $("#totalAmount").text(0);
                        $('#simpleCart_quantity').text(0);
                    }

                }
            });

        });
        $(document).on('click','.remove-btn',function () {
            var ids = $(this).attr("id");
            ids = ids.substr(12);
            $(this).hide();
            $.ajax({
                type:"POST",
                url:"{{route('cart.remove.single')}}",
                data: {
                    'pid': ids,
                    '_token': $('input[name=_token]').val()
                },
                success:function (data) {
                    if (data > 0) {
                        $("#totalAmount").text(data);
                        var items = parseInt($('#simpleCart_quantity').text());

                        items--; //minus an items
                        $('#simpleCart_quantity').text(items);
                        $('#item-close'+ids).parent().hide();
                    }
                    else {
                        $("#totalAmount").text(0);
                        $('#simpleCart_quantity').text(0);
                    }
                }
            });
        });
    });
</script>
<!-- //single -->
<!-- //product-nav -->

@endsection

@php
            /*
           Session::flush("pdtid");
           Session::flush("qtyid");
           Session::flush("totalPrice");
           Session::flush("stitle");
           Session::flush("spicture");
           */

            //print_r(Session::get("pdtid"));
            //print_r(Session::get("qtyid"));
@endphp