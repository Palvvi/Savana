<x-header />


    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-10 col-md-10 mx-auto">
                    <div class="section-title">
                       <h2>  My Order History </h2>
                    </div>
                    @php
                        $i=0;
                    @endphp
                    <table class="table table-striped  table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Total Bill</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Order Date</th>
                                <th>View Products</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $item)
                            @php
                                   $i++;
                            @endphp
                         
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$item->total_amount}}</td>
                                <td>{{$item->fullname}}</td>
                                <td>{{$item->address}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->status}}</td>
                                <td>{{$item->updated_at}}</td>
                                <td>
<!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$i}}">
                                    Products
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$i}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$i}}" aria-hidden="true">
                                    <div class="modal-dialog  modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title fs-5" id="exampleModalLabel{{$i}}">Product's Details</h3>
                                           
                                        </div>
                                        <div class="modal-body">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Product</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                        <th>Subtotal</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($items as $product)
                                                        @if ($product->order_id == $item->id)
                                                        <tr>
                                                            <td><img src="{{URL::asset('uploads/'.$product->picture)}}" alt=""></td>
                                                            <td>{{$product->title}}</td>
                                                            <td>{{$product->quantity}}</td>
                                                            <td>{{$product->price}}</td>
                                                            <td>{{$product->quantity * $product->price}}</td>
                                                        </tr>
                                                        @endif
                                                        
                                                    @endforeach
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Footer Section Begin -->
    <x-footer />
    <!-- Footer Section End -->

 
