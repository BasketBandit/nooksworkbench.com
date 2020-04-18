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
                        <div class="col-md-4 p-2">
                          <a href="/recipe/{{ strtolower($recipe->name) }}"><img class="card-img-top m-1 bg-light rounded" src="{{ $recipe->image }}" alt="{{ $recipe->name }}"></a>
                        </div>

                        <div class="col w-100">
                            <div class="card-body text-left">
                                <h5 class="card-title text-center">{{ $recipe->name }}</h5>
                                @if($recipe->m1_val > 0)
                                    <a href="/material/{{ strtolower($recipe->m1_id) }}">
                                        <div class="mat rounded w-100 p-1 mb-1 bg-light">
                                            <div class="mat-img"><img src="{{ asset('/img/i/inventory/'.$recipe->m1_id.'.png') }}"/></div>
                                            <div class="mat-txt d-inline-block">{{ $recipe->m1_id }}</div>
                                            <div class="mat-val"><span class="mat-val badge badge-primary">x{{ $recipe->m1_val }}</span></div>
                                        </div>
                                    </a>
                                @endif
                                @if($recipe->m2_val > 0)
                                    <a href="/material/{{ strtolower($recipe->m2_id) }}">
                                        <div class="mat rounded w-100 p-1 mb-1 bg-light">
                                            <div class="mat-img"><img src="{{ asset('/img/i/inventory/'.$recipe->m2_id.'.png') }}"/></div>
                                            <div class="mat-txt d-inline-block">{{ $recipe->m2_id }}</div>
                                            <div class="mat-val"><span class="mat-val badge badge-primary">x{{ $recipe->m2_val }}</span></div>
                                        </div>
                                    </a>
                                @endif
                                @if($recipe->m3_val > 0)
                                    <a href="/material/{{ strtolower($recipe->m3_id) }}">
                                        <div class="mat rounded w-100 p-1 mb-1 bg-light">
                                            <div class="mat-img"><img src="{{ asset('/img/i/inventory/'.$recipe->m3_id.'.png') }}"/></div>
                                            <div class="mat-txt d-inline-block">{{ $recipe->m3_id }}</div>
                                            <div class="mat-val"><span class="mat-val badge badge-primary">x{{ $recipe->m3_val }}</span></div>
                                        </div>
                                    </a>
                                @endif
                                @if($recipe->m4_val > 0)
                                    <a href="/material/{{ strtolower($recipe->m4_id) }}">
                                        <div class="mat rounded w-100 p-1 mb-1 bg-light">
                                            <div class="mat-img"><img src="{{ asset('/img/i/inventory/'.$recipe->m4_id.'.png') }}"/></div>
                                            <div class="mat-txt d-inline-block">{{ $recipe->m4_id }}</div>
                                            <div class="mat-val"><span class="mat-val badge badge-primary">x{{ $recipe->m4_val }}</span></div>
                                        </div>
                                    </a>
                                @endif
                                @if($recipe->m5_val > 0)
                                    <a href="/material/{{ strtolower($recipe->m5_id) }}">
                                        <div class="mat rounded w-100 p-1 mb-1 bg-light">
                                            <div class="mat-img"><img src="{{ asset('/img/i/inventory/'.$recipe->m5_id.'.png') }}"/></div>
                                            <div class="mat-txt d-inline-block">{{ $recipe->m5_id }}</div>
                                            <div class="mat-val"><span class="mat-val badge badge-primary">x{{ $recipe->m5_val }}</span></div>
                                        </div>
                                    </a>
                                @endif
                                @if($recipe->m6_val > 0)
                                    <a href="/material/{{ strtolower($recipe->m6_id) }}">
                                        <div class="mat rounded w-100 p-1 mb-1 bg-light">
                                            <div class="mat-img"><img src="{{ asset('/img/i/inventory/'.$recipe->m6_id.'.png') }}"/></div>
                                            <div class="mat-txt d-inline-block">{{ $recipe->m6_id }}</div>
                                            <div class="mat-val"><span class="mat-val badge badge-primary">x{{ $recipe->m6_val }}</span></div>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                      </div>

                      <div class="card-footer text-muted">
                          <div class="row">
                              <div class="col-sm text-left">
                                  @if($recipe->grid)
                                    <a href="/size/{{ strtolower($recipe->grid) }}"><img class="foot-img" src="{{ asset('/img/i/grid/'.$recipe->grid.'.jpg') }}" alt="{{ $recipe->grid }}"/></a>
                                  @endif
                              </div>

                              <div class="col-sm text-center">
                                  <img class="foot-img" src="{{ asset('/img/i/inventory/Bells.png') }}" alt="{{ $recipe->sell }}"/>
                                  {{ $recipe->sell }}
                              </div>

                              <div class="col-sm text-right">
                                  <a href="/category/{{ strtolower($recipe->category) }}"><button class="btn btn-light text-right text-muted">{{ $recipe->category }}</button></a>
                              </div>
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



