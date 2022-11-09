<x-layout>
    
    <section class="row">
        <h2>Edit User</h2>
        
        <div class="col-12">
            <div class="card p-lg-5 p-3">
                <form action="/api/users/{{$user->id}}" method="post">
                    @csrf
                    @method('PUT')
                    <fieldset>
                        <legend>User Information</legend>

                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="name" class="form-label">Enter name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="{{$user->name}}" autofocus>

                            {{-- @error('name')
                                {{$message}}
                            @enderror --}}
                        </div>


                            <div class="col-lg-6 mb-3">
                                <label for="email" class="form-label">Enter Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email" value="{{$user->email}}">
                                {{-- @error('email')
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
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone" value="{{$user->userMeta->phone}}">
                                {{-- @error('phone')
                                    {{$message}}
                                @enderror --}}
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="dob" class="form-label">Enter Date of birth</label>
                                <input type="date" class="form-control" name="dob" id="dob" placeholder="Enter date of birth" value="{{$user->userMeta->dob}}">
                                {{-- @error('dob')
                                    {{$message}}
                                @enderror --}}
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="form-label">Select Gender</label>
                            @foreach ($gender as $item)
                                <div class="form-check">
                                    @if ($user->userMeta->gender == $item)
                                        <input class="form-check-input" type="radio" name="gender" id="{{$item}}" value="{{$item}}" checked>
                                    @else
                                        <input class="form-check-input" type="radio" name="gender" id="{{$item}}"   value="{{$item}}">
                                    @endif
                                    
                                    <label class="form-check-label" for="{{$item}}">{{$item}}</label>
                                </div>
                            @endforeach
                        </div>

                    </fieldset>

                    <input type="submit" value="Update user" class="btn btn-primary">

                </form>
            </div>
        </div>
    </section>

</x-layout>