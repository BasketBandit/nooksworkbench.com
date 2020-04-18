@extends('layouts/index')

@section('title')

@section('hero')
        <div id="content" class='text-center'>
            @foreach($recipes as $recipe)
                <div class="card mt-2 col-md-3 d-inline-flex">
                  <div class="row no-gutters">

                    <div class="col-md-4 mr-3 p-2">
                      <a href="/recipe/{{ $recipe->name }}"><img class="card-img-top m-3 bg-light rounded" src="{{ $recipe->image }}" alt="{{ $recipe->name }}"></a>
                    </div>

                    <div class="col w-100">
                        <div class="card-body text-left">
                            <h5 class="card-title text-center">{{ $recipe->name }}</h5>
                            @if($recipe->m1_val > 0)
                                <a href="/material/{{ $recipe->m1_id }}">
                                    <div class="w-48 p-1 mb-1 mr-2 bg-light rounded mat">
                                        <div class="mat-img"><img src="{{ asset('/img/i/inventory/'.$recipe->m1_id.'.png') }}"/></div>
                                        <div class="mat-txt d-inline-block">{{ $recipe->m1_id }}</div>
                                        <div class="mat-val"><span class="mat-val badge badge-primary">x{{ $recipe->m1_val }}</span></div>
                                    </div>
                                </a>
                            @endif
                            @if($recipe->m2_val > 0)
                                <a href="/material/{{ $recipe->m2_id }}">
                                    <div class="w-48 p-1 mb-1 mr-2 bg-light rounded mat">
                                        <div class="mat-img"><img src="{{ asset('/img/i/inventory/'.$recipe->m2_id.'.png') }}"/></div>
                                        <div class="mat-txt d-inline-block">{{ $recipe->m2_id }}</div>
                                        <div class="mat-val"><span class="mat-val badge badge-primary">x{{ $recipe->m2_val }}</span></div>
                                    </div>
                                </a>
                            @endif
                            @if($recipe->m3_val > 0)
                                <a href="/material/{{ $recipe->m3_id }}">
                                    <div class="w-48 p-1 mb-1 mr-2 bg-light rounded mat">
                                        <div class="mat-img"><img src="{{ asset('/img/i/inventory/'.$recipe->m3_id.'.png') }}"/></div>
                                        <div class="mat-txt d-inline-block">{{ $recipe->m3_id }}</div>
                                        <div class="mat-val"><span class="mat-val badge badge-primary">x{{ $recipe->m3_val }}</span></div>
                                    </div>
                                </a>
                            @endif
                            @if($recipe->m4_val > 0)
                                <a href="/material/{{ $recipe->m4_id }}">
                                    <div class="w-48 p-1 mb-1 mr-2 bg-light rounded mat">
                                        <div class="mat-img"><img src="{{ asset('/img/i/inventory/'.$recipe->m4_id.'.png') }}"/></div>
                                        <div class="mat-txt d-inline-block">{{ $recipe->m4_id }}</div>
                                        <div class="mat-val"><span class="mat-val badge badge-primary">x{{ $recipe->m4_val }}</span></div>
                                    </div>
                                </a>
                            @endif
                            @if($recipe->m5_val > 0)
                                <a href="/material/{{ $recipe->m5_id }}">
                                    <div class="w-48 p-1 mb-1 mr-2 bg-light rounded mat">
                                        <div class="mat-img"><img src="{{ asset('/img/i/inventory/'.$recipe->m5_id.'.png') }}"/></div>
                                        <div class="mat-txt d-inline-block">{{ $recipe->m5_id }}</div>
                                        <div class="mat-val"><span class="mat-val badge badge-primary">x{{ $recipe->m5_val }}</span></div>
                                    </div>
                                </a>
                            @endif
                            @if($recipe->m6_val > 0)
                                <a href="/material/{{ $recipe->m6_id }}">
                                    <div class="w-48 p-1 mb-1 mr-2 bg-light rounded mat">
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
                                <a href="/size/{{ $recipe->grid }}"><img class="foot-img" src="{{ asset('/img/i/grid/'.$recipe->grid.'.jpg') }}" alt="{{ $recipe->grid }}"/></a>
                              @endif
                          </div>

                          <div class="col-sm text-center">
                              <img class="foot-img" src="{{ asset('/img/i/inventory/Bells.png') }}" alt="{{ $recipe->sell }}"/>
                              {{ $recipe->sell }}
                          </div>

                          <div class="col-sm text-right">
                              <a href="/category/{{ $recipe->category }}"><button class="btn btn-light text-right text-muted">{{ $recipe->category }}</button></a>
                          </div>
                      </div>
                  </div>

                </div>
            @endforeach
        </div>
@endsection



