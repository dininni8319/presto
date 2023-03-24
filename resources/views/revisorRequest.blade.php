<x-layout>
    <x-slot name="title">Revisor</x-slot>
    <div class="container mt-5 custom-body-height">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                       <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="row justify-content-center MtClass MbClass wide-50">
          <div class="col-12 col-md-6 ">
              <form method="POST" action="{{route('revisorSubmit')}}">
                  @csrf
            
                  <div class="">
                      <label for="exampleInputText1" class="form-label my-3 p-2">
                          <h4 class="form-txt">{{__('ui.profile')}} {{Auth::user()->name}},{{__('ui.request')}}.</h4> 
                      </label>
                      <textarea class="form-control" name="message" id="" cols="50" rows="10" placeholder="{{__('ui.message')}}"></textarea>
                  </div>
                  <button type="submit" class="btn btn-custom mt-3 mb-4">{{__('ui.submit')}}</button>
              </form>

          </div>
        </div>
    </div>
</x-layout>