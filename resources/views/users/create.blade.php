<x-layout>
    
    <section class="row">
        <h2>Add User</h2>
        
        <div class="col-12">
            <div class="card p-lg-5 p-3">
                <form action="/api/users" method="post">
                    @csrf
                    <fieldset>
                        <legend>User Information</legend>

                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="name" class="form-label">Enter name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="{{old('name')}}" autofocus>

                            {{-- @error('name')
                                {{$message}}
                            @enderror --}}
                        </div>


                            <div class="col-lg-6 mb-3">
                                <label for="email" class="form-label">Enter Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email" value="{{old('email')}}">
                                {{-- @error('email')
                                    {{$message}}
                                @enderror --}}
                            </div>

                           
                        </div>

                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="password" class="form-label">Enter Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                                {{-- @error('password')
                                    {{$message}}
                                @enderror --}}
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="cpassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" id="cpassword" placeholder="Confirm Password">
                                {{-- @error('password_confirmation')
                                    {{$message}}
                                @enderror --}}
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>

                        <legend>User Meta</legend>

                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="phone" class="form-label">Enter Phone number</label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone" value="{{old('phone')}}">
                                {{-- @error('phone')
                                    {{$message}}
                                @enderror --}}
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="dob" class="form-label">Enter Date of birth</label>
                                <input type="date" class="form-control" name="dob" id="dob" placeholder="Enter date of birth" value="{{old('dob')}}">
                                {{-- @error('dob')
                                    {{$message}}
                                @enderror --}}
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="form-label">Select Gender</label>
                            @foreach ($gender as $item)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="{{$item}}"   value="{{$item}}">
                                    <label class="form-check-label" for="{{$item}}">{{$item}}</label>
                                </div>
                            @endforeach
                           
                        </div>

                    </fieldset>

                    <input type="submit" value="Add user" class="btn btn-primary">

                </form>
            </div>
        </div>
    </section>

</x-layout>