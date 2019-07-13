
          <div class="sidebar col-xl-3 col-lg-4">
            <div class="block">
              <h6 class="text-uppercase">Product Categories</h6>
              <ul class="list-unstyled">
                @foreach($categories as $category)
                    <li class="active">
                        <a href="#" class="d-flex justify-content-between align-items-center"><span>{{ $category->name }}</span></a>
                        @if(count($category->childs))
                            @include('frontend.layouts.childcat',['childs' => $category->childs])
                        @endif
                    </li> 
                @endforeach
              </ul>
            </div>
           <!--  <div class="block">
              <h6 class="text-uppercase">Filter By Price  </h6>
              <div id="slider-snap"></div>
              <div class="value d-flex justify-content-between">
                <div class="min">From <span id="slider-snap-value-lower" class="example-val"></span>$</div>
                <div class="max">To <span id="slider-snap-value-upper" class="example-val"></span>$</div>
              </div><a href="#" class="filter-submit">filter</a>
            </div>
            <div class="block">
              <h6 class="text-uppercase">Brands </h6>
              <form action="#">
                <div class="form-group mb-1">
                  <input id="brand0" type="checkbox" name="clothes-brand" checked class="checkbox-template">
                  <label for="brand0">Calvin Klein <small>(18)</small></label>
                </div>
                <div class="form-group mb-1">
                  <input id="brand1" type="checkbox" name="clothes-brand" checked class="checkbox-template">
                  <label for="brand1">Levi Strauss <small>(30)</small></label>
                </div>
                <div class="form-group mb-1">
                  <input id="brand2" type="checkbox" name="clothes-brand" class="checkbox-template">
                  <label for="brand2">Hugo Boss <small>(120)</small></label>
                </div>
                <div class="form-group mb-1">
                  <input id="brand3" type="checkbox" name="clothes-brand" class="checkbox-template">
                  <label for="brand3">Tomi Hilfiger <small>(70)</small></label>
                </div>
                <div class="form-group mb-1">
                  <input id="brand4" type="checkbox" name="clothes-brand" class="checkbox-template">
                  <label for="brand4">Tom Ford  <small>(110)</small></label>
                </div>
              </form>
            </div>
            <div class="block"> 
              <h6 class="text-uppercase">Size </h6>
              <form action="#">  
                <div class="form-group mb-1">
                  <input id="size0" type="radio" name="size" checked class="radio-template">
                  <label for="size0">Small</label>
                </div>
                <div class="form-group mb-1">
                  <input id="size1" type="radio" name="size" class="radio-template">
                  <label for="size1">Medium</label>
                </div>
                <div class="form-group mb-1">
                  <input id="size2" type="radio" name="size" class="radio-template">
                  <label for="size2">Large</label>
                </div>
                <div class="form-group mb-1">
                  <input id="size3" type="radio" name="size" class="radio-template">
                  <label for="size3">X-Large</label>
                </div>
              </form>
            </div> -->
          </div>