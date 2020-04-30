@extends('layouts.index')

@section('content')
<div id="content">
    @if(count($recipes) == 0)
        <div class="alert alert-warning" role="alert">
            It looks like you haven't unlocked any recipes yet {{ Auth::user()->username }}! <small>...{{ Auth::user()->username }}!</small>
        </div>
    @endif

    <div class="secondary-nav mb-1 bg-pgreen" role="alert">
        <a href="/mybench/settings"><button class="btn btn-nook">Settings</button></a>
    </div>


    <div class="progress mt-4 mb-4">
        <div class="progress-bar" role="progressbar" style="width: {{ ($progress/595)*100 }}%;" aria-valuenow="{{ ($progress/595)*100 }}" aria-valuemin="0" aria-valuemax="100"></div>
        <span class="progress-label">{{ $progress.'/595' }} ({{ number_format(($progress/595)*100, 2) }}%)</span>
    </div>

    <div class="row justify-content-center">
        @foreach($recipes as $recipe)
            <div class="card col-md-6 text-left m-1">
                <div class="row no-gutters h-100">
                    <div class="card-img-wrap col-md-4 p-2">
                        <a href="/mybench/recipe/{{ rawurlencode(strtolower($recipe->name)) }}">
                            <picture>
                                <source type="image/png" srcset="https://acnhcdn.com/latest/DIYRecipeIcon/{{ $recipe->image }}.png">
                                <source type="image/webp" srcset="https://cdn.nooksworkbench.com/crafting/{{ $recipe->image }}.webp">
                                <img class="card-img-top m-1 p-2 rounded" src="https://cdn.nooksworkbench.com/crafting/{{ $recipe->image }}.png" alt="{{ $recipe->name }}">
                            </picture>
                        </a>
                    </div>

                    <div class="col w-100 mr-1">
                        <div class="card-body text-left p-2 pt-3">
                            @if($recipe->customisable == 1)
                                <a href="/mybench/customisable/1"><i class="fas fa-paint-brush mt-1 float-right"></i></a>
                            @endif

                            <h5 class="card-title text-center">{{ $recipe->name }}</h5>
                            @for($i = 1; $i < 7; $i++)
                                @php $id = "m".$i."_id"; $val = "m".$i."_val"; @endphp
                                @if($recipe->$val > 0)
                                    <a href="/mybench/material/{{ rawurlencode(strtolower($recipe->m1_id)) }}">
                                        <div class="mat rounded w-100 p-1 mb-1">
                                            <div class="mat-img">
                                                <picture>
                                                    <source type="image/webp" srcset="{{ secure_asset('/i/inventory/'.rawurlencode($recipe->$id).'.webp') }}">
                                                    <img src="{{ secure_asset('/i/inventory/'.rawurlencode($recipe->$id).'.png') }}" alt="{{ $recipe->$id }}">
                                                </picture>
                                            </div>
                                            <div class="mat-txt d-inline-block align-middle">{{ $recipe->$id }}</div>
                                            <div class="mat-val"><span class="mat-val badge badge-nook">x{{ $recipe->$val }}</span></div>
                                        </div>
                                    </a>
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>

                <div class="row m-1 mr-2 ml-2">
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
                                <a href="/mybench/size/{{ strtolower($recipe->grid) }}"><img class="foot-img" src="{{ secure_asset('/i/grid/'.$recipe->grid.'.jpg') }}" alt="{{ $recipe->grid }}"/></a>
                            </div>
                        @endif

                        @if($recipe->sell > 0)
                            <div class="col-sm text-right">
                                <picture>
                                    <source type="image/webp" srcset="{{ secure_asset('/i/inventory/Bells.webp') }}">
                                    <source type="image/png" srcset="{{ secure_asset('/i/inventory/Bells.png') }}">
                                    <img class="foot-img" src="secure_asset('/i/inventory/Bells.png')">
                                </picture>
                                {{ number_format($recipe->sell) }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('pagination')
<div class="p-3 text-center"><div class="container">{{ $recipes->render() }}</div></div>
@endsection
