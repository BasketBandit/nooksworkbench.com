@extends('layouts.index')

@section('title')

@section('content')
    @if($base_url !== "/mybench")
        @if(count($recipes) == 0)
            <div class="alert alert-warning" role="alert">
                Sorry! Whatever you're trying to find doesn't exist here! <small>...exist here!</small>
            </div>
        @endif

        @auth
            <div class="secondary-nav mb-1 bg-pgreen" role="alert">
                <button class="btn btn-nook" onclick="$('.fa-check-circle').closest('.card').toggle();">Toggle Unlocked</button>
            </div>
        @endauth
    @else
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
    @endif

    <div class="row justify-content-center">
        @foreach($recipes as $recipe)
            <div class="card col-md-6 text-left m-1">
                <div class="row no-gutters h-100">
                    <div class="card-img-wrap col-md-4 p-2">

                        @if($base_url !== "/mybench")
                            @auth
                                @if($recipe->unlocked)
                                    <button class="ajaxSubmit fas fa-check-circle lead float-left position-absolute recipe-remove" data-id="{{ $recipe->id }}" data-endpoint="/removerecipe/"></button>
                                @else
                                    <button class="ajaxSubmit fas fa-plus-circle lead float-left position-absolute recipe-add" data-id="{{ $recipe->id }}" data-endpoint="/addrecipe/"></button>
                                @endif
                            @endauth
                        @endif

                        <a href="{{ $base_url }}/recipe/{{ rawurlencode(strtolower($recipe->name)) }}">
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
                                <a href="{{ $base_url }}/customisable/1"><i class="fas fa-paint-brush mr-1 float-right"></i></a>
                            @endif

                            <h6 class="card-title text-center">{{ $recipe->name }}</h6>
                            @for($i = 1; $i < 7; $i++)
                                @php $id = "m".$i."_id"; $val = "m".$i."_val"; @endphp
                                @if($recipe->$val > 0)
                                    <a href="{{ $base_url }}/material/{{ rawurlencode(strtolower($recipe->$id)) }}">
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
                        <a href="{{ $base_url }}/category/{{ strtolower($recipe->category) }}"><button class="btn-sm btn-light mt-1 mb-1 text-center text-muted">{{ $recipe->category }}</button></a>
                    </div>

                    @if($recipe->tag)
                        <div class="text-center mr-1">
                            <a href="{{ $base_url }}/tag/{{ strtolower($recipe->tag) }}"><button class="btn-sm btn-light mt-1 mb-1 text-center text-muted">{{ $recipe->tag }}</button></a>
                        </div>
                    @endif

                    @if($recipe->source)
                        <div class="text-center mr-1">
                            @foreach(explode(', ', $recipe->source) as $source)
                                <a href="{{ $base_url }}/source/{{ strtolower($source) }}"><button class="btn-sm btn-light mt-1 mb-1 text-center text-muted">{{ $source }}</button></a>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="card-footer text-muted">
                    <div class="row">
                        @if($recipe->grid)
                            <div class="col-sm text-left">
                                <a href="{{ $base_url }}/size/{{ strtolower($recipe->grid) }}"><img class="foot-img" src="{{ secure_asset('/i/grid/'.$recipe->grid.'.jpg') }}" alt="{{ $recipe->grid }}"/></a>
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

    @if($base_url !== "/mybench")
        @auth
            <script>
                $(".ajaxSubmit").on('click', function(e){
                    e.preventDefault();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: 'POST',
                        url: ($(this).attr("data-endpoint") + $(this).attr("data-id")),
                        contentType: 'text/plain',
                        data: "https://nooksworkbench.com",
                        context: this,
                        success: function() {
                            if($(this).hasClass("fa-check-circle")) {
                                $(this).removeClass("fa-check-circle");
                                $(this).addClass("fa-plus-circle");
                                $(this).attr('data-endpoint', "/addrecipe/");
                            } else {
                                $(this).removeClass("fa-plus-circle");
                                $(this).addClass("fa-check-circle");
                                $(this).attr('data-endpoint', "/removerecipe/");
                            }
                        },
                    });
                });
            </script>
        @endauth
    @endif
@endsection

@section('pagination')
    <div class="p-3 text-center"><div class="container">{{ $recipes->render() }}</div></div>
@endsection
