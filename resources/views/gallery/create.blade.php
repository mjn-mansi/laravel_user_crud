<x-layout>
    
    <section class="row">
        <h2>Upload Image</h2>
        
        <div class="col-12">
            <div class="card p-lg-5 p-3">
                <form action="/api/users/images/{{$id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    
                    <div class="mb-3">
                        <label for="picture" class="form-label">Upload Image</label>
                        <input type="file" class="form-control" name="picture" id="picture">
                        <div class="form-text">Choose only jpg, jpeg or png format. Size should be less than 2 MB.</div>
                        {{-- @error('picture')
                            {{$message}}
                        @enderror --}}
                    </div>

                    <input type="submit" value="Upload Image" class="btn btn-primary">

                </form>
            </div>
        </div>
    </section>

</x-layout>