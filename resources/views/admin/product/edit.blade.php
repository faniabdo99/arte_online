@include('admin.layout.header')
<body>
    <div class="dashboard-main-wrapper">
        @include('admin.layout.navbar')
        @include('admin.layout.sidebar')
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        @include('admin.layout.errors')
                        <div class="card">
                            <h5 class="card-header">Create New Product</h5>
                            <div class="card-body">
                              <form action="{{route('admin.products.postEdit' , $ProductData->id)}}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  <input hidden name="id" value={{$ProductData->id}}>
                                  <div class="form-group">
                                      <label>Title *</label>
                                      <input type="text" class="form-control" name="title" value="{{old('title') ?? $ProductData->title}}" placeholder="Enter Title Here">
                                  </div>
                                  <div class="form-group">
                                      <label>Model Number *</label>
                                      <input type="text" class="form-control" name="model_number" value="{{old('model_number') ?? $ProductData->model_number}}" placeholder="Enter Model Number Here">
                                  </div>
                                  <div class="form-group">
                                      <label>Product Main Image (Unchanged)</label>
                                      <input type="file" class="form-control mb-4" name="image">
                                      <img width="250" src="{{$ProductData->MainImage}}" alt="">
                                  </div>
                                  <div class="form-group">
                                      <label>Description *</label>
                                      <textarea class="form-control" name="description" rows="6" placeholder="Enter Description Here">{{old('description') ?? $ProductData->description}}</textarea>
                                  </div>
                                  <div class="form-group">
                                      <label>Body *</label>
                                      <textarea class="form-control editor" name="body" rows="6" placeholder="Enter Description Here">{{old('body') ?? $ProductData->body}}</textarea>
                                  </div>
                                  <div class="form-group">
                                      <label>Main Category *</label>
                                      <select class="form-control" name="category_id" required>
                                          <option value="{{$ProductData->Category->id}}">{{$ProductData->Category->title}}</option>
                                          @forelse ($AllCategories as $Single)
                                          @if($Single->id == $ProductData->Category->id)
                                              @continue
                                          @endif
                                          <option value="{{$Single->id}}">{{$Single->title}}</option>
                                          @empty
                                          <option>Please Add Categories to The System</option>
                                          @endforelse
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label>Price</label>
                                      <input type="text" class="form-control" name="price" value="{{ old('price') ?? $ProductData->price}}" placeholder="Please Enter The Item Price in L.E" required>
                                  </div>
                                  <div class="form-group">
                                      <label>Status</label>
                                      <select class="form-control" name="status" required>
                                              <option value="{{$ProductData->status}}" selected>{{$ProductData->status}}</option>
                                              <option value="Available">Available</option>
                                              <option value="Sold Out">Sold out</option>
                                              <option value="Invisible">Invisible</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label>Sizes</label>
                                      <select class="form-control" name="size" required>
                                              <option value="{{$ProductData->size}}" selected>{{$ProductData->size}}</option>
                                              <option value="mini_bb">Mini Baby (3m - 1y)</option>
                                              <option value="bb">Baby (1-4 years)</option>
                                              <option value="medium">Medium (5-9 years)</option>
                                              <option value="adult">Adults (10-16 years)</option>
                                              <option value="older">Older (16+ years)</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label>Season</label>
                                      <select class="form-control" name="season" required>
                                              <option value="{{$ProductData->season}}" selected>{{$ProductData->season}}</option>
                                              <option value="summer">Summer</option>
                                              <option value="winter">Winter</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label>Type</label>
                                      <select class="form-control" name="type" required>
                                              <option value="{{$ProductData->type}}" selected>{{$ProductData->type}}</option>
                                              <option value="pajama">Pajama</option>
                                              <option value="tshirt">T-Shirts</option>
                                              <option value="pants">Pants</option>
                                              <option value="shoes">Shoes</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label>Discount</label>
                                      <select class="form-control" name="discount_id">
                                              <option selected value="">No Discount</option>
                                              @forelse($DiscountsList as $Discount)
                                              <option value="{{$Discount->id}}">{{$Discount->title}} , {{$Discount->amount}} {{$Discount->type}}</option>
                                              @empty
                                              @endforelse
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label>Product Gallery</label>
                                      <div id="drop-zone" class="dropzone"></div>
                                  </div>
                                  <div class="form-group">
                                      <input type="checkbox" id="is_promoted" name="is_promoted" @if($ProductData->is_promoted) checked @endif > <label for="is_promoted">Promote on Homepage ?</label>
                                  </div>
                                  <h6 class="c-grey-900 mT-40 mB-40">Advanced Data</h6>
                                  <div class="form-group">
                                      <label>Weight</label>
                                      <input type="number" class="form-control" value="{{old('weight') ?? $ProductData->weight}}" name="weight" placeholder="Please Enter a Number in KG" required>
                                  </div>
                                  <div class="form-group">
                                      <label>Height</label>
                                      <input type="number" class="form-control" value="{{old('height') ?? $ProductData->height}}"  name="height" placeholder="Please Enter a Number in CM">
                                  </div>
                                  <div class="form-group">
                                      <label>Width</label>
                                      <input type="number" class="form-control" value="{{old('width') ?? $ProductData->width}}"  name="width" placeholder="Please Enter a Number in CM">
                                  </div>
                                  <button type="submit" class="btn btn-success btn-rounded">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end main wrapper -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    @include('admin.layout.scripts')
    <script>
        //Auto Create Clean Slug...
        var SlugValue;
        $('input[name="title"]').keyup(function () {
            SlugValue = $(this).val().replace(/\s+/g, '-').replace(/[^[\u0621-\u064A0-9 ]]/g, "-").toLowerCase();
            //Assign the value to the input
            $('input[name="slug"]').val(SlugValue);
        });
        //Dropzone For Images
        var myDropzone = new Dropzone("div#drop-zone", {
             url: "{{route('admin.product.uploadGalleryImages')}}",
             paramName: "image",
             params: {'product_id':$('input[name="id"]').val()},
             acceptedFiles: 'image/*',
             maxFiles: 5,
             dictDefaultMessage: "Drag Images or Click to Upload",
     });
    </script>
</body>

</html>
