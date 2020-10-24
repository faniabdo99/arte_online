@include('admin.layout.header')
<body class="app">
    <div>
        @include('admin.layout.sidebar')
        <div class="page-container">
            @include('admin.layout.navbar')
            <main class="main-content bgc-grey-100">
                <div id="mainContent">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                              <h2>Current Product Variations</h2>
                              <div class="bgc-white p-20 bd mb-5">
                                <table class="table table-striped">
                                  <thead>
                                    <th>Code</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Color Code</th>
                                    <th>Inventory</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  </thead>
                                  <tbody>
                                    @forelse ($CurrentVariations as $Variation)
                                      <tr>
                                        <td>{{$Variation->ref_code}}</td>
                                        <td>{{$Variation->size}}</td>
                                        <td>{{$Variation->color}}</td>
                                        <td>{{$Variation->color_code}}</td>
                                        <td>{{$Variation->inventory}}</td>
                                        <td>{{$Variation->status}}</td>
                                        <td><a class="btn btn-sm btn-danger mr-3" href="{{route('admin.products.variation.delete' , $Variation->id)}}">Delete</a></td>
                                      </tr>
                                    @empty

                                    @endforelse
                                  </tbody>
                                </table>
                              </div>
                                <h2>Add Product Variations: {{$TheProduct->title}}</h2>
                                <div class="bgc-white p-20 bd">
                                    <div>
                                        <form action="{{route('admin.products.postVariations' , $TheProduct->id)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label>Size</label>
                                                <input type="text" class="form-control" name="size" value="{{old('size') ?? ''}}" placeholder="Enter Size Here">
                                            </div>
                                            <div class="form-group">
                                                <label>Color *</label>
                                                <input type="text" class="form-control" name="color" value="{{old('color') ?? ''}}" placeholder="Enter Color Here">
                                            </div>
                                            <div class="form-group">
                                                <label>Color Code *</label>
                                                <input maxlength="7" type="text" class="form-control" name="color_code" value="{{old('color_code') ?? ''}}" placeholder="Enter Color Code Here">
                                            </div>
                                            <div class="form-group">
                                                <label>Count in Inventory</label>
                                                <input type="number" class="form-control" name="inventory" placeholder="Please Enter a Number" value="{{ old('inventory') ?? '0'}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status" required>
                                                        <option selected value="Available">Available</option>
                                                        <option value="SoldOut">Sold out</option>
                                                        <option value="Invisible">Invisible</option>
                                                </select>
                                            </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </main>
    </div>
    </div>
    @include('admin.layout.scripts')
    <script>
        //Auto Create Clean Slug...
        var SlugValue;
        $('input[name="title"]').keyup(function () {
            SlugValue = $(this).val().replace(/\s+/g, '-').replace(/[^[\u0621-\u064A0-9 ]]/g, "-").toLowerCase();
            //Assign the value to the input
            $('input[name="slug"]').val(SlugValue);
        });
    </script>
</body>

</html>
