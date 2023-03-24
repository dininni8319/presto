<x-layout>
    <x-slot name="title">Detail  Annoucement</x-slot>
    <div class="container mt-md-4 py-md-2 bg-white ">
        <main class="custom-body-height">

            {{-- INIZIO TEST --}}
                    <!--Section: Block Content-->
              <section class="mt-5 mx-3">

                <div class="row">
                  <div class="col-md-6 mb-4 mb-md-0">
                    <div id="mdb-lightbox-ui"></div>

                    <div class="mdb-lightbox">
                      <div class="row mx-1">
                        <div class="col-12">
                          <x-carousel>
                            <x-slot name="imgCarousel">
                              @foreach ($announcement->images as $key=>$image)
                                @if ($key == 0){
                                  <div class="carousel-item active">
                                    <img src="{{ $image->getUrl(300, 150)}}" class="w-100 d-block" alt="">
                                  </div>
                                }
                                @else
                                  <div class="carousel-item">
                                    <img src="{{ $image->getUrl(300, 150)}}" class="w-100 d-block" alt="">
                                  </div>
                                @endif

                              @endforeach
                            </x-slot>
                          </x-carousel>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6 detail-page-border">
                      <h2 >{{$announcement->title}}</h2>
                      <p class="mb-2 text-muted text-uppercase small">
                      <a href="{{route('show.Category', $announcement->category_id)}}">{{$announcement->category->category}}</a>
                      </p>
                      <p><span class="mr-1"><strong>{{$announcement->price}}€</strong></span></p>

                    <div class="col-12 my-5">
                      <h5 class="text-capitalize fw-bold">{{__('ui.description')}}:</h5>
                      <p class="s-product-description">
                      {{$announcement->description}}
                      </p>
                      <div class="table-responsive">
                        <table class="table table-sm table-borderless mb-0">
                          <tbody>
                            <tr>
                              <th class="pl-0 w-25 text-capitalize" scope="row"><strong>{{__('ui.seller')}}:</strong></th>
                            <td>{{$announcement->user->name}}</td>
                            </tr>
                            <tr>

                            <th class="pl-0 w-25 text-capitalize" scope="row"><strong>{{__('ui.date')}}:</strong></th>
                            <td>{{$announcement->created_at->format('d/m/Y')}}</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  
                  </div>
                </div>

              </section>

              <div class="row h-50 p-5">
                @foreach ($announcement->images as $image)
                  <div class="col-12 col-md-4 mb-2">
                    <div class="mini-imgs m-2">
                        <img src="{{ $image->getUrl(300, 150)}}" alt="">
                    </div>
                  </div>
                @endforeach
              </div>
        </main>    
    </div>          
</x-layout>