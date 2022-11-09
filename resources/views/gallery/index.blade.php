<x-layout>
    
    <section class="row">

        @if(session()->has('success'))
            <p class="alert alert-success">{{session('success')}}</p>
        @endif

        <h2 class="mb-4">User List</h2>
        
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-secondary">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Date of birth</th>
                            <th>Gender</th>
                            <th>Add Image</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (count($userList) > 0)
                            
                            @php
                                $i = 1;   
                            @endphp

                            @foreach ($userList as $item)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->userMeta->phone}}</td>
                                    <td>{{date('jS M, Y', strtotime($item->userMeta->dob))}}</td>
                                    <td>{{$item->userMeta->gender}}</td>
                                    <td><a href="/api/users/images/{{$item->id}}"><i class="fa-solid fa-plus"></i></a></td>
                                </tr>

                                <tr>
                                    <td colspan="8">
                                        @if (count($item->galleries) > 0)
                                            <div class="slider d-flex">
                                                @foreach ($item->galleries as $gallery)
                                                    <div class="img-block">
                                                        <img src="/images/{{$gallery->picture}}" alt="Image">
                                                        <form action="/api/users/images/{{$gallery->id}}" method="post" class="absolute">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-danger border-0 bg-transparent">
                                                                <i class="fa-solid fa-xmark"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                @endforeach
                                            </div>

                                        @else   
                                            <p class="text-center">
                                                
                                                <a href="/api/users/images/{{$item->id}}" class="text-primary">Add Image</a>
                                            </p>
                                        @endif
                                    </td>
                                </tr>
                                @php
                                    $i++;   
                                @endphp
                            @endforeach 
                                
                        @else
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    No Record found. 
                                    <a href="/api/users/create" class="text-primary">Add User</a>
                                </td>
                            </tr>                            
                        @endif
                        
                    </tbody>
                </table>
            </div>
        </div>

    </section>

</x-layout>