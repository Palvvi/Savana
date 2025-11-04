<x-header />


    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-6 col-md-6 mx-auto">
                    <div class="contact__form">
                        <div class="section-title ">
                            <h2>My Account</h2>
                        </div>
                        <img src="{{URL::asset('img/about/'.$user->Picture)}}" class="mx-auto mb-5 d-block" alt="image" width="200px" height="200px">
                        <form action="{{url("/updateUser")}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name" name="username" value="{{$user->username}}" required>
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" placeholder="Email" name="email" value="{{$user->email}}" readonly required>
                                </div>
                                <div class="col-lg-12 p-2">
                                    <input type="file"  name="picture">
                                </div>
                                <div class="col-lg-12">
                                    <input type="password" placeholder="Password" name="password" value="{{$user->password}}" required>
                                </div>
                              
                                <div class="col-lg-12">
                                    
                                    <button type="submit" name="profile" class="site-btn">Save Changes</button>
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

 
