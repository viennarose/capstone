<div>
    <div class="card">
        <div class="card-header bg-info d-flex">
            <h3 class="text-center fw-bold mt-3" style="font-family: Fantasy;">Promotions</h3>
            <div class="d-flex ms-auto input-group w-50">
                <input type="search" wire:model="search" class="form-control float-end mt-1" placeholder="Search..." />
                <span class="input-group-text bg-light mt-1" wire:model="search">
                    <i class="bi bi-search"></i></span>
                <a wire:click='showForm' class="ms-3 mt-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                      </svg>
                    </i>
                </a>
            </div>
        </div>
    @if ($showData==true)

        <div class="row">
            @if (session()->has('success'))
            <div class="alert alert-success">
                <strong>{{session('success')}}</strong>
            </div>
            @endif
            @if (session()->has('error'))
            <div class="alert alert-danger">
                <strong>{{session('error')}}</strong>
            </div>
            @endif
        <div class="card-body m-3 mt-1 table-responsive">
            <div class="row">

            <table class="table table-striped">
                <tr class="table-dark">
                    <th>ID</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <tbody>
                    @if($promotions->count() > 0)
                    @foreach($promotions as $promo)
                    <tr>
                        <td>{{$promo->id}}</td>
                        <td>{{$promo->title}}</td>
                        <td><img src="{{asset('storage')}}/{{$promo->image}}" style="width: 70px;height:70px;" alt=""></td>
                        <td>{{$promo->description}}</td>
                        <td>{{$promo->status == '0' ? 'Visible':'Hidden'}}</td>
                        <td> <a type="button" wire:click='edit({{$promo->id}})'>
                            <i class="bi bi-pencil-square" style="color:rgb(0, 247, 255);"></i>
                        </a>

                        <a type="button" wire:click='delete({{$promo->id}})' onclick="return confirm('Are you sure you want to delete this?')">
                            <i class="bi bi-trash3" style="color:red;"></i>
                        </a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
            @else
            <p>No Promotions found!</p>
    @endif
    <div>{{$promotions->links()}}</div>
        </div>

        @endif
        @if ($createData==true)
        <div class="row mt-3">
            <div class="col-xl-8 col-md-8 col-sm-12 offset-xl-2 offset-md-2 offset-sm-0">
                @if (session()->has('success'))
                <div class="alert alert-success">
                    <strong>{{session('success')}}</strong>
                </div>
                @endif
                @if (session()->has('error'))
                <div class="alert alert-danger">
                    <strong>{{session('error')}}</strong>
                </div>
                @endif
                <div class="card w-150">
                    <div class="card-header bg-info">
                        <div class="d-flex mt-3">
                            <i class="bi bi-arrow-left" wire:click="back()"></i>
                            <h3 class="text-center mx-auto">Create Service</h3>
                        </div>
                    </div>
                    <form action="" wire:submit.prevent='create'>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" wire:model='title' name="title" id="title"
                                    class="form-contro-lg form-control" placeholder="Service Title">
                            </div>
                            <div class="from-group">
                                <textarea class="form-control" wire:model="description" id="description" cols="30"
                                    rows="10"  placeholder="Service Description"></textarea>
                                @error('description')<span class="error text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="from-group">
                                <select class="form-select mt-2" name="status" wire:model.defer="status">
                                    <option selected>Choose Status</option>
                                    <option value="1">Hidden</option>
                                    <option value="0">Visible</option>
                                  </select>
                                    @error('status')<span class="error text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="custom-file mt-3">
                                <input type="file" wire:model='image' class="custom-file-input form-control" id="customFile">
                            </div>
                            @if ($image)
                            <img src="{{$image->temporaryUrl()}}" style="width: 200px;height:200px;" alt="">
                            @endif
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button wire:click="back()" class="btn btn-secondary">Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif

        @if ($updateData == true)
        <div class="row mt-2">
            <div class="col-xl-8 col-md-8 col-sm-12 offset-xl-2 offset-md-2 offset-sm-0">
                @if (session()->has('success'))
                <div class="alert alert-success">
                    <strong>{{session('success')}}</strong>
                </div>
                @endif
                @if (session()->has('error'))
                <div class="alert alert-danger">
                    <strong>{{session('error')}}</strong>
                </div>
                @endif
                <div class="card mb-4">
                    <div class="card-header bg-info">
                        <div class="d-flex mt-3">
                            <i class="bi bi-arrow-left" wire:click="back()"></i>
                            <h3 class="text-center mx-auto">Update Service</h3>
                        </div>
                    </div>
                    <form action="" wire:submit.prevent='update({{$edit_id}})'>
                        <div class="card-body">
                            <div class="from-group mb-2">
                                <label for="">Service Title</label>
                                <input type="text" wire:model='edit_title' name="title" id="title"
                                    class="form-contro-lg form-control">
                            </div>
                            <div class="from-group mb-3">
                                <label for="">Description</label>
                                <textarea type="text" wire:model='edit_description' name="description" id="description"
                                    class="form-contro-lg form-control" cols="20"
                                    rows="5"  placeholder="Service Description"></textarea>
                            </div>
                            <div class="from-group">
                                <label for="">Status</label>
                                <select name="status" wire:model.defer="edit_status" >
                                    <option value="1">Hidden</option>
                                <option value="0">Visible</option>
                                </select>
                            </div>
                            <div class="custom-file mt-3">
                                <input type="file" wire:model='new_image' class="custom-file-input form-control" id="customFile">
                                {{-- <label class="custom-file-label" for="customFile">Choose file</label> --}}
                            </div>
                            @if ($new_image)
                            <img src="{{$new_image->temporaryUrl()}}" style="width: 200px;height:200px;" alt="">
                            @else
                            <img src="{{ asset('storage') }}/{{$old_image}}" style="width: 200px;height:200px;" alt="">
                            @endif
                            <input type="hidden" wire:model='old_image' name="" id="">
                        </div>
                        <div class="card-footer d-flex ms-3">
                            <button type="submit" class="btn btn-primary ms-auto">Update</button>
                            <button wire:click="back()" class="btn btn-secondary ms-2">Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif

</div>
