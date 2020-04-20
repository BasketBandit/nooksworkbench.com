@extends('layouts/index')

@section('title')

@section('content')
        <div id="content">
            @php $i = 1 @endphp
            @foreach($recipes as $recipe)
                @if($i == 1)
                <div class="card-deck mb-2">
                @endif
                    <div class="card col-md-3 ml-1 mr-1 text-left">
                      <div class="row no-gutters h-100">
                        <div class="card-img-wrap col-md-4 p-2">
                          <a href="/recipe/{{ strtolower($recipe->name) }}"><img class="card-img-top m-1 bg-light rounded" src="{{ $recipe->image }}" alt="{{ $recipe->name }}"></a>
                        </div>

                        <div class="col w-100">
                            <div class="card-body text-left">
                                @if($recipe->customisable == 1)
                                <i class="fas fa-paint-brush mt-1 float-right"></i>
                                @endif

                                <h5 class="card-title text-center">{{ $recipe->name }}</h5>
                                @if($recipe->m1_val > 0)
                                    <a href="/material/{{ strtolower($recipe->m1_id) }}">
                                        <div class="mat rounded w-100 p-1 mb-1 bg-light">
                                            <div class="mat-img"><img src="{{ secure_asset('/img/i/inventory/'.$recipe->m1_id.'.png') }}" alt="{{ $recipe->m1_id }}"/></div>
                                            <div class="mat-txt d-inline-block">{{ $recipe->m1_id }}</div>
                                            <div class="mat-val"><span class="mat-val badge badge-nook">x{{ $recipe->m1_val }}</span></div>
                                        </div>
                                    </a>
                                @endif
                                @if($recipe->m2_val > 0)
                                    <a href="/material/{{ strtolower($recipe->m2_id) }}">
                                        <div class="mat rounded w-100 p-1 mb-1 bg-light">
                                            <div class="mat-img"><img src="{{ secure_asset('/img/i/inventory/'.$recipe->m2_id.'.png') }}" alt="{{ $recipe->m2_id }}"/></div>
                                            <div class="mat-txt d-inline-block">{{ $recipe->m2_id }}</div>
                                            <div class="mat-val"><span class="mat-val badge badge-nook">x{{ $recipe->m2_val }}</span></div>
                                        </div>
                                    </a>
                                @endif
                                @if($recipe->m3_val > 0)
                                    <a href="/material/{{ strtolower($recipe->m3_id) }}">
                                        <div class="mat rounded w-100 p-1 mb-1 bg-light">
                                            <div class="mat-img"><img src="{{ secure_asset('/img/i/inventory/'.$recipe->m3_id.'.png') }}" alt="{{ $recipe->m3_id }}"/></div>
                                            <div class="mat-txt d-inline-block">{{ $recipe->m3_id }}</div>
                                            <div class="mat-val"><span class="mat-val badge badge-nook">x{{ $recipe->m3_val }}</span></div>
                                        </div>
                                    </a>
                                @endif
                                @if($recipe->m4_val > 0)
                                    <a href="/material/{{ strtolower($recipe->m4_id) }}">
                                        <div class="mat rounded w-100 p-1 mb-1 bg-light">
                                            <div class="mat-img"><img src="{{ secure_asset('/img/i/inventory/'.$recipe->m4_id.'.png') }}" alt="{{ $recipe->m4_id }}"/></div>
                                            <div class="mat-txt d-inline-block">{{ $recipe->m4_id }}</div>
                                            <div class="mat-val"><span class="mat-val badge badge-nook">x{{ $recipe->m4_val }}</span></div>
                                        </div>
                                    </a>
                                @endif
                                @if($recipe->m5_val > 0)
                                    <a href="/material/{{ strtolower($recipe->m5_id) }}">
                                        <div class="mat rounded w-100 p-1 mb-1 bg-light">
                                            <div class="mat-img"><img src="{{ secure_asset('/img/i/inventory/'.$recipe->m5_id.'.png') }}" alt="{{ $recipe->m5_id }}"/></div>
                                            <div class="mat-txt d-inline-block">{{ $recipe->m5_id }}</div>
                                            <div class="mat-val"><span class="mat-val badge badge-nook">x{{ $recipe->m5_val }}</span></div>
                                        </div>
                                    </a>
                                @endif
                                @if($recipe->m6_val > 0)
                                    <a href="/material/{{ strtolower($recipe->m6_id) }}">
                                        <div class="mat rounded w-100 p-1 mb-1 bg-light">
                                            <div class="mat-img"><img src="{{ secure_asset('/img/i/inventory/'.$recipe->m6_id.'.png') }}" alt="{{ $recipe->m6_id }}"/></div>
                                            <div class="mat-txt d-inline-block">{{ $recipe->m6_id }}</div>
                                            <div class="mat-val"><span class="mat-val badge badge-nook">x{{ $recipe->m6_val }}</span></div>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                      </div>

                        <div class="row ml-1 mr-1 mb-1 pl-1 pr-1 bg-light">
                            <div class="text-center mr-1">
                                <a href="/category/{{ strtolower($recipe->category) }}"><button class="btn-sm btn-light mt-1 mb-1 text-center text-muted">{{ $recipe->category }}</button></a>
                            </div>

                            @if($recipe->tag)
                            <div class="text-center mr-1">
                                <a href="/tag/{{ strtolower($recipe->tag) }}"><button class="btn-sm btn-light mt-1 mb-1 text-center text-muted">{{ $recipe->tag }}</button></a>
                            </div>
                            @endif

                            @if($recipe->source)
                            <div class="text-center mr-1">
                                <a href="/source/{{ strtolower($recipe->source) }}"><button class="btn-sm btn-light mt-1 mb-1 text-center text-muted">{{ $recipe->source }}</button></a>
                            </div>
                            @endif
                        </div>

                      <div class="card-footer text-muted">
                          <div class="row">
                              @if($recipe->grid)
                                  <div class="col-sm text-left">
                                      <a href="/size/{{ strtolower($recipe->grid) }}"><img class="foot-img" src="{{ secure_asset('/img/i/grid/'.$recipe->grid.'.jpg') }}" alt="{{ $recipe->grid }}"/></a>
                                  </div>
                              @endif



                              @if($recipe->sell > 0)
                                  <div class="col-sm text-right">
                                      <img class="foot-img" src="{{ secure_asset('/img/i/inventory/Bells.png') }}" alt="{{ $recipe->sell }}"/> {{ $recipe->sell }}
                                  </div>
                              @endif
                          </div>
                      </div>

                    </div>
                @php $i++ @endphp
                @if($i == 4)
                </div>
                @php $i = 1; @endphp
                @endif
            @endforeach
        </div>

        <div class="p-3 text-center"><div class="container">{{ $recipes->render() }}</div></div>
@endsection



