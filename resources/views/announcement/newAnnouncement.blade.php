<x-layout>
  <x-slot name="title">New Annoucement</x-slot>
    <div class="container px-5 my-5">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="card border-0 rounded-3 shadow-lg">
              <div class="card-body p-4">
                <div class="text-center">
                  <div class="h1 fw-light">{{__('ui.newListing')}}</div>
                </div>
      
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- <h3>DEBUG: SECRET {{$uniqueSecret}}</h3> --}}
                <form id="contactForm" enctype="multipart/form-data" data-sb-form-api-token="API_TOKEN" method="POST" action="{{route('create.Announcement')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="uniqueSecret" value="{{$uniqueSecret}}">

                  <!-- Name Input -->
                  <div class="form-floating mb-3">
                      <label for="title"></label>
                      <input class="form-custom" id="title" type="text" placeholder="{{__('ui.title')}}" data-sb-validations="required" name="title" value="{{old('title')}}"/>
                      <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                  </div>
      
                  <!-- Email Input -->
                  <div class="form-floating mb-3">
                      <label for="description"></label>
                      <textarea class="form-custom" placeholder="{{__('ui.description')}}" id="description" type="text" placeholder="Inserisci la tua descrizione" style="height: 10rem;" data-sb-validations="required" name="description">{{old('message')}}</textarea>
                      <div class="invalid-feedback" data-sb-feedback="description:required">text is required.</div>
                  </div>
      
                  <!-- Message Input -->
                  <div class="form-floating mb-3">
                      <input type="text" id="price" name="price" placeholder="{{__('ui.price')}}"/>
                    <div class="invalid-feedback" data-sb-feedback="price:required">price is required.</div>
                  </div>

                  {{__('ui.category')}}
                  <div class="form-floating mb-3">
                    <select name="category_id">
                      @foreach ($categories as $category)
                          <option value="{{$category->id}}">
                            {{$category->category}}
                          </option>   
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group row">
                     <label for="images" class="col-md-12 col-form-label text-md-right">
                       {{__('ui.insertImg')}}
                     </label>
                    <div class="col-md-12">
                      <div class="dropzone" id="drophere"></div>
                      @error('images')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{$message}}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
      
                  <!-- Submit success message -->
                  <div class="d-none" id="submitSuccessMessage">
                    <div class="text-center mb-3">
                      <div class="fw-bolder">Form submission successful!</div>
                      <p>To activate this form, sign up at</p>
                      <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                    </div>
                  </div>
      
                  <!-- Submit error message -->
                  <div class="d-none" id="submitErrorMessage">
                    <div class="text-center text-danger mb-3">Error sending message!</div>
                  </div>
      
                  <!-- Submit button -->
                  <div class="d-grid">
                    <button type="submit" class="btn btn-custom mb-5">{{__('ui.newListing')}}</button>
                  </div>
                </form>
                <!-- End of contact form -->
      
              </div>
            </div>
          </div>
        </div>
    </div>
      
      <!-- CDN Link to SB Forms Scripts -->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</x-layout>