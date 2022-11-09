<x-layout>
    
    <section class="row">

        @if(session('success'))
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
                            <th>Action</th>
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
                                    <td class="d-flex">
                                        <a href="/api/users/{{$item->id}}/edit" class="text-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <form action="/api/users/{{$item->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-danger border-0 bg-transparent">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td><a href="/api/users/images/{{$item->id}}"><i class="fa-solid fa-plus"></i></a></td>
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