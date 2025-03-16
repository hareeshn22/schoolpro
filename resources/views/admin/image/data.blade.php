                    @foreach ($images as $image )
                    <div class="col-md-3 animated fadeIn">
                        <div class="options-container">
                            <img class="img-fluid options-item" src="{{ asset('uploads/large/' . $image->name) }}" alt="">
                            <div class="options-overlay bg-black-75">
                                <div class="options-overlay-content">
                                    <h3 class="h4 text-white mb-1">{{$image->name}}</h3>
                                    <a class="btn btn-sm btn-alt-danger" href="{{ route('admin.images.delete', [ 'id' => $image->id ]) }}">
                                        <i class="fa fa-times opacity-50 me-1"></i> Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach