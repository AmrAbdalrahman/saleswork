@extends('layouts.app')



@section('title')

   {{$ProductInfo->product_name}}

@endsection

@section('content')


    <style>

        .pv{
            margin-bottom: 25px;
        }
        .po > p{
            font-size: 30px;
        }

    </style>

        <div class="text-center po" >
            <h1 class="text-center pv"><span class="label label-info">{{ $ProductInfo->product_name }}</span></h1>

            <img style="margin: auto;" src="{{ checkIfImagesIsExit($ProductInfo->product_images,'/public/images/thum/','/images/thum/') }}" class="img-responsive pv">

            <div class="col-md-12 text-center" >

                <hr />

            </div>

            <div class="caption">
                <h1> {{ $ProductInfo->product_name  }} Description</h1>
                <p class="lead pv">{{ $ProductInfo->product_des  }}</p>

            </div>
        </div>



    @endsection