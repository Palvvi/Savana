<x-header />


    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-6 col-md-6 mx-auto">
                    <div class="contact__form">
                        <div class="section-title ">
                            <h2>Create New Account</h2>
                        </div>
                        <form action="{{url("/registerUser")}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name" name="username" required>
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" placeholder="Email" name="email" required>
                                </div>
                                <div class="col-lg-12 p-2">
                                    <input type="file"  name="picture" required>
                                </div>
                                <div class="col-lg-12">
                                    <input type="password" placeholder="Password" name="password" required>
                                </div>
                              
                                <div class="col-lg-12">
                                    
                                    <button type="submit" name="register" class="site-btn">Sign Up</button>
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

 
