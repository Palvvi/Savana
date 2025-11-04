<x-header />

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (session()->has('success'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('success') }}

                                    </div>
                                @endif
                                @if (session()->has('success2'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success2') }}

                                    </div>
                                @endif
                                @php
                                    $total=0;
                                @endphp
                            @foreach ($cartItem as $item)
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="{{url('uploads/'.$item->picture)}}" alt="Product" width="100px">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{$item->title}}</h6>
                                            <h5>${{$item->price}}</h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <form action="{{url('updatecart')}}" method="post">
                                            @csrf
                                            <div class="quantity">
                                                <input type="number" name="quantity" min="1" max="{{$item->pquantity}}" value="{{$item->quantity}}">
                                                <input type="hidden" name="id" value="{{$item->id}}">
                                                <input type="submit" value="Update" class="btn  btn-success" name="update">
                                            </div>
                                        </form>
                                    </td>
                                    <td class="cart__price">${{$item->price*$item->quantity}}</td>
                                    <td class="cart__close"><a href="{{url("deletefromcart/".$item->id)}}"><i class="fa fa-close"></i> </a></td>
                                </tr>
                                @php
                                    $total+=$item->price*$item->quantity;
                                @endphp
                            @endforeach
                                
                               
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="#">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>${{$total}}</span></li>
                            <li>Total <span>${{$total}}</span></li>
                        </ul>
                        <form action="{{url('checkout')}}" method="get">
                            @csrf
                            <input type="text" name="fullname" class="form-control mb-2" placeholder="Full Name" required>
                             <input type="hidden" name="total" class="form-control mb-2" value="{{$total}}">
                            <input type="text" name="address" class="form-control mb-2" placeholder="Address" required>
                            <input type="text" name="phone" class="form-control mb-2" placeholder="Phone Number" required>
                            <input type="submit" name="checkout" class="primary-btn btn-block mb-2" value="Proceed to checkout" required>
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    <x-footer />

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>