            @foreach ($images as $image )
                        <div class="col-md-3 animated fadeIn">
                            <div class="options-container">
                                <img class="img-fluid options-item" src="{{ asset('uploads/large/' . $image->name) }}"
                                    alt="">
                                <div class="options-overlay bg-black-75">
                                    <div class="options-overlay-content">
                                        <h3 class="h4 text-white mb-1">{{$image->name}}</h3>
                                        <a class="btn btn-sm btn-primary"
                                            onClick="selectImage('{{ $image->id }}', '{{ $image->name }}' )">
                                            Select
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach