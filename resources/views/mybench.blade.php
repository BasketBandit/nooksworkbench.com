@extends('layouts.index')

@section('content')
<div id="content">
    @if(count($recipes) == 0)
    <div class="alert alert-warning" role="alert">
        It looks like you haven't unlocked any recipes yet! ...yet!
    </div>
    @endif

    <div class="progress m-2">
        <div class="progress-bar" role="progressbar" style="width: {{ (count($recipes)/595)*100 }}%;" aria-valuenow="{{ (count($recipes)/595)*100 }}" aria-valuemin="0" aria-valuemax="100">{{ (count($recipes)/595)*100 }}%</div>
    </div>

    @php $i = 1 @endphp
    @foreach($recipes as $recipe)
    @if($i == 1)
    <div class="card-deck mb-2">
        @endif
        <div class="card col text-left">
            <div class="row no-gutters h-100">
                <div class="card-img-wrap col-md-4 p-2">
                    <a href="/mybench/recipe/{{ rawurlencode(strtolower($recipe->name)) }}">
                        <picture>
                            <source type="image/webp" srcset="https://cdn.nooksworkbench.com/crafting/{{ $recipe->image }}.webp">
                            <img class="card-img-top m-1 p-2 rounded" src="https://cdn.nooksworkbench.com/crafting/{{ $recipe->image }}.png" alt="{{ $recipe->name }}">
                        </picture>
                    </a>
                </div>

                <div class="col w-100">
                    <div class="card-body text-left p-2 pt-3">
                        @if($recipe->customisable == 1)
                        <a href="/mybench/customisable/1"><i class="fas fa-paint-brush mt-1 float-right"></i></a>
                        @endif

                        <h5 class="card-title text-center">{{ $recipe->name }}</h5>
                        @if($recipe->m1_val > 0)
                        <a href="/mybench/material/{{ rawurlencode(strtolower($recipe->m1_id)) }}">
                            <div class="mat rounded w-100 p-1 mb-1">
                                <div class="mat-img">
                                    <picture>
                                        <source type="image/webp" srcset="{{ secure_asset('/img/i/inventory/'.rawurlencode($recipe->m1_id).'.webp') }}">
                                        <img src="{{ secure_asset('/img/i/inventory/'.rawurlencode($recipe->m1_id).'.png') }}" alt="{{ $recipe->m1_id }}">
                                    </picture>
                                </div>
                                <div class="mat-txt d-inline-block">{{ $recipe->m1_id }}</div>
                                <div class="mat-val"><span class="mat-val badge badge-nook">x{{ $recipe->m1_val }}</span></div>
                            </div>
                        </a>
                        @endif
                        @if($recipe->m2_val > 0)
                        <a href="/mybench/material/{{ rawurlencode(strtolower($recipe->m2_id)) }}">
                            <div class="mat rounded w-100 p-1 mb-1">
                                <div class="mat-img">
                                    <picture>
                                        <source type="image/webp" srcset="{{ secure_asset('/img/i/inventory/'.rawurlencode($recipe->m2_id).'.webp') }}">
                                        <img src="{{ secure_asset('/img/i/inventory/'.rawurlencode($recipe->m2_id).'.png') }}" alt="{{ $recipe->m2_id }}">
                                    </picture>
                                </div>
                                <div class="mat-txt d-inline-block">{{ $recipe->m2_id }}</div>
                                <div class="mat-val"><span class="mat-val badge badge-nook">x{{ $recipe->m2_val }}</span></div>
                            </div>
                        </a>
                        @endif
                        @if($recipe->m3_val > 0)
                        <a href="/mybench/material/{{ rawurlencode(strtolower($recipe->m3_id)) }}">
                            <div class="mat rounded w-100 p-1 mb-1">
                                <div class="mat-img">
                                    <picture>
                                        <source type="image/webp" srcset="{{ secure_asset('/img/i/inventory/'.rawurlencode($recipe->m3_id).'.webp') }}">
                                        <img src="{{ secure_asset('/img/i/inventory/'.rawurlencode($recipe->m3_id).'.png') }}" alt="{{ $recipe->m3_id }}">
                                    </picture>
                                </div>
                                <div class="mat-txt d-inline-block">{{ $recipe->m3_id }}</div>
                                <div class="mat-val"><span class="mat-val badge badge-nook">x{{ $recipe->m3_val }}</span></div>
                            </div>
                        </a>
                        @endif
                        @if($recipe->m4_val > 0)
                        <a href="/mybench/material/{{ rawurlencode(strtolower($recipe->m4_id)) }}">
                            <div class="mat rounded w-100 p-1 mb-1">
                                <div class="mat-img">
                                    <picture>
                                        <source type="image/webp" srcset="{{ secure_asset('/img/i/inventory/'.rawurlencode($recipe->m4_id).'.webp') }}">
                                        <img src="{{ secure_asset('/img/i/inventory/'.rawurlencode($recipe->m4_id).'.png') }}" alt="{{ $recipe->m4_id }}">
                                    </picture>
                                </div>
                                <div class="mat-txt d-inline-block">{{ $recipe->m4_id }}</div>
                                <div class="mat-val"><span class="mat-val badge badge-nook">x{{ $recipe->m4_val }}</span></div>
                            </div>
                        </a>
                        @endif
                        @if($recipe->m5_val > 0)
                        <a href="/mybench/material/{{ rawurlencode(strtolower($recipe->m5_id)) }}">
                            <div class="mat rounded w-100 p-1 mb-1">
                                <div class="mat-img">
                                    <picture>
                                        <source type="image/webp" srcset="{{ secure_asset('/img/i/inventory/'.rawurlencode($recipe->m5_id).'.webp') }}">
                                        <img src="{{ secure_asset('/img/i/inventory/'.rawurlencode($recipe->m5_id).'.png') }}" alt="{{ $recipe->m5_id }}">
                                    </picture>
                                </div>
                                <div class="mat-txt d-inline-block">{{ $recipe->m5_id }}</div>
                                <div class="mat-val"><span class="mat-val badge badge-nook">x{{ $recipe->m5_val }}</span></div>
                            </div>
                        </a>
                        @endif
                        @if($recipe->m6_val > 0)
                        <a href="/mybench/material/{{ rawurlencode(strtolower($recipe->m6_id)) }}">
                            <div class="mat rounded w-100 p-1 mb-1">
                                <div class="mat-img">
                                    <picture>
                                        <source type="image/webp" srcset="{{ secure_asset('/img/i/inventory/'.rawurlencode($recipe->m6_id).'.webp') }}">
                                        <img src="{{ secure_asset('/img/i/inventory/'.rawurlencode($recipe->m6_id).'.png') }}" alt="{{ $recipe->m6_id }}">
                                    </picture>
                                </div>
                                <div class="mat-txt d-inline-block">{{ $recipe->m6_id }}</div>
                                <div class="mat-val"><span class="mat-val badge badge-nook">x{{ $recipe->m6_val }}</span></div>
                            </div>
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row ml-1 mr-1 mb-1 pl-1 pr-1">
                <div class="text-center mr-1">
                    <a href="/mybench/category/{{ strtolower($recipe->category) }}"><button class="btn-sm btn-light mt-1 mb-1 text-center text-muted">{{ $recipe->category }}</button></a>
                </div>

                @if($recipe->tag)
                <div class="text-center mr-1">
                    <a href="/mybench/tag/{{ strtolower($recipe->tag) }}"><button class="btn-sm btn-light mt-1 mb-1 text-center text-muted">{{ $recipe->tag }}</button></a>
                </div>
                @endif

                @if($recipe->source)
                <div class="text-center mr-1">
                    @foreach(explode(', ', $recipe->source) as $source)
                    <a href="/mybench/source/{{ strtolower($source) }}"><button class="btn-sm btn-light mt-1 mb-1 text-center text-muted">{{ $source }}</button></a>
                    @endforeach
                </div>
                @endif
            </div>

            <div class="card-footer text-muted">
                <div class="row">
                    @if($recipe->grid)
                    <div class="col-sm text-left">
                        <a href="/mybench/size/{{ strtolower($recipe->grid) }}"><img class="foot-img" src="{{ secure_asset('/img/i/grid/'.$recipe->grid.'.jpg') }}" alt="{{ $recipe->grid }}"/></a>
                    </div>
                    @endif

                    @if($recipe->sell > 0)
                    <div class="col-sm text-right">
                        <picture>
                            <source type="image/webp" srcset="{{ secure_asset('/img/i/inventory/Bells.webp') }}">
                            <source type="image/png" srcset="{{ secure_asset('/img/i/inventory/Bells.png') }}">
                            <img class="foot-img" src="secure_asset('/img/i/inventory/Bells.png')">
                        </picture>
                        {{ $recipe->sell }}
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
@endsection

@section('pagination')
<div class="p-3 text-center"><div class="container">{{ $recipes->render() }}</div></div>
@endsection
