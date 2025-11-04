<x-header />


    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-6 col-md-6 mx-auto">
                    <div class="contact__form">
                        <div class="section-title ">
                            <h2>Login Here</h2>
                        </div>
                        <form action="{{url("/loginuser")}}" method="POST">
                            @csrf
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}

                                </div>
                            @endif
                            @if (session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}

                                </div>
                            @endif
                            <div class="row">
                               
                                <div class="col-lg-12">
                                    <input type="email" placeholder="Email" name="email" required>
                                </div>
                               
                                <div class="col-lg-12">
                                    <input type="password" placeholder="Password" name="password" required>
                                </div>
                              
                                <div class="col-lg-12">
                                    
                                    <button type="submit" name="login" class="site-btn">Log In</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Footer Section Begin -->
    <x-footer />
    <!-- Footer Section End -->

 
