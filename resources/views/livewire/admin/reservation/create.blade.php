<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form wire:submit.prevent='submit'  >
             <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col mb-3"> 	
                  <label for="nameBasic" class="form-label">first name</label>
                           <input type="text" wire:model='first_name' id="nameBasic" class="form-control" placeholder="Enter first name" />
                  @error('name')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
                </div>
                <div class="col mb-3"> 	
                  <label for="nameBasic" class="form-label">email</label>
                           <input type="text" wire:model='email' id="nameBasic" class="form-control" placeholder="Enter email" />
                  @error('email')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
                </div>
                <div class="col mb-3">
                    <label for="nameBasic" class="form-label">last name </label>
                             <input type="text" wire:model='last_name' id="nameBasic" class="form-control" placeholder="Enter last name" />
                    @error('last_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                  </div>
              </div>
              <div class="row g-2">
                <div class="col mb-0">
                  <label for="emailBasic" class="form-label">guet_number</label>
                  <input type="number" id="emailBasic"  wire:model='guest_number' class="form-control" placeholder="guet_number" />
                    @error('guest_number')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
                </div>
                
                <div class="col mb-3">
                  <label for="nameBasic" class="form-label">res_data </label>
                           <input type="time" wire:model='res_data'  class="form-control" placeholder="" />
                  @error('res_data')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
                </div>
                <div class="col mb-3">
                  <label for="nameBasic" class="form-label">tel number </label>
                           <input type="text" wire:model='tel_number' id="nameBasic" class="form-control" placeholder="Enter telelphone number" />
                  @error('tel_number')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
                </div>
                <div class="col mb-0">
                    <label for="emailBasic" class="form-label">table</label>
                    <div class="mt-1">
                        <select id="status"  wire:model='table' class="form-multiselect block w-full mt-1">
                            @foreach ($tables as $table)
                                <option value="{{ $table->id }}">{{$table->name  }}</option>
                            @endforeach
                        </select>
                    </div>
                     
                  </div>
                {{-- <div class="col mb-0">
                  <label for="dobBasic" class="form-label">DOB</label>
                  <input type="text" id="dobBasic" class="form-control" placeholder="DD / MM / YY" />
                </div> --}}
               

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
              </button>
              <button type="submit"  class="btn btn-primary">
                <span wire:loading.remove >
                  submit
                </span>
                <div class="spinner-border"   wire:loading  wire:target='submit'  role="status">
                  <span class="sr-only">Loading...</span>
                </div>
              
              </button>
            </div>
          </div>
        </form>
     
    </div>
  </div>

